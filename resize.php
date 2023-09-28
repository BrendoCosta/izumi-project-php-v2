<?php

    error_reporting(0);
    
    require_once $_SERVER['DOCUMENT_ROOT'] . "/include/config.php";
    
    function redirectTo($link) {
        ob_start();
        header('Location: '.$link);
        ob_end_flush();
        die(); 
    }
    
    function random_str(
        int $length = 64,
        string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ): string {
        if ($length < 1) {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }
    
    if (!isset($_GET['url']) || $_GET['url'] == "") {
        
        redirectTo("https://izumiproject.com.br/");
        
    }
    
    $url = $_GET['url'];
    $tmpExt = @end(explode('/', $url));
    $tmpExt = @end(explode('/', $url));
    
    $maxWidth = @$_GET['mwidth'];
    $maxHeight = @$_GET['mheight'];
    
    // PATH INSIDE PUBLIC_HTML
    
    $path = "images/cache";
    $absolutePath = $_SERVER["DOCUMENT_ROOT"] . "/" . $path;
    
    // MAX DAYS STORED IN CACHE
    
    $maxDaysInCache = 31;
    $seconds = $maxDaysInCache * 24 * 60 * 60;
    
    if (empty($maxHeight) && empty($maxWidth)) {
        
        redirectTo("https://izumiproject.com.br/");
        
    }

    if ($maxWidth <= 1920 && $maxHeight <= 1920) {
        
        callDataBaseConfig();
    
        $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
            
        if (mysqli_connect_errno($connection)) {
            
            callErrorPage(mysqli_connect_error($connection));
            mysqli_close($connection);
            die();
            
        } else {
            
            mysqli_set_charset($connection, "utf8mb4");
            
            $query = mysqli_prepare($connection, "SELECT * FROM " . DATABASE_TABLE_IMAGES_CACHE . " WHERE url = ? AND width = ? AND height = ? LIMIT 1");
            mysqli_stmt_bind_param($query, "sii", $url, $maxWidth, $maxHeight);
            
            if (empty($maxHeight)) {
                
                $query = mysqli_prepare($connection, "SELECT * FROM " . DATABASE_TABLE_IMAGES_CACHE . " WHERE url = ? AND width = ? LIMIT 1");
                mysqli_stmt_bind_param($query, "si", $url, $maxWidth);
                
            }
            if (empty($maxWidth)) {
                
                $query = mysqli_prepare($connection, "SELECT * FROM " . DATABASE_TABLE_IMAGES_CACHE . " WHERE url = ? AND height = ? LIMIT 1");
                mysqli_stmt_bind_param($query, "si", $url, $maxHeight);
                
            }
            
            mysqli_stmt_execute($query);
            $result = mysqli_stmt_get_result($query);
            
            if (mysqli_num_rows($result) > 0) {
                
                while($call = mysqli_fetch_assoc($result)) {
                    
                    $filename = $call['filename'];
                    
                    if (file_exists($absolutePath . "/" . $filename)) {
                        
                        //$image = new Imagick($absolutePath . "/" . $filename);
                        //header("Content-type: image/jpeg");
                        //echo $image;
                        //$image->clear();
                        //$image->destroy();
                        header("Content-Type: image/jpeg");
                        header("Cache-Control: max-age=$seconds");
                        header("Content-Length: ".filesize($absolutePath . "/" . $filename));
                        header("Content-Disposition: filename=".$filename);
                        readfile($absolutePath . "/" . $filename);
                        
                    }
                    
                    $currentDate    = date("Y-m-d");
                    $creationDate   = $call['date'];
                    
                    $diff = strtotime($currentDate) - strtotime($creationDate);
                    $diff = round($diff / 86400);
                    
                    if ($diff > $maxDaysInCache) {
                        
                        if (unlink($absolutePath . "/" . $filename)) {
                            
                            $deleteQuery = "DELETE FROM " . DATABASE_TABLE_IMAGES_CACHE . " WHERE filename = '$filename'";
                            $deleteResult = mysqli_query($connection, $deleteQuery);
                            
                        }
                        
                    }
                    
                }
            } else {
                
                $imageFromUrl = @file_get_contents($url);
                
                if ($imageFromUrl) {
                    
                    $image = new Imagick();
                    $image->readImageBlob($imageFromUrl);
                    $image->setImageFormat("png24");
                    
                    $geo    = $image->getImageGeometry();
                    $width  = $geo['width'];
                    $height = $geo['height'];
                    
                    if($width > $height) {
                        
                        $scale = ($width > $maxWidth) ? $maxWidth/$width : 1;
                        
                    } else {
                        
                        $scale = ($height > $maxHeight) ? $maxHeight/$height : 1;
                        
                    }
                    
                    $newWidth   = $scale * $width;
                    $newHeight  = $scale * $height;
                    
                    $image->setImageCompressionQuality(85);
                    $image->resizeImage($newWidth, $newHeight, Imagick::FILTER_LANCZOS, 1.1);
                    
                    @mkdir($absolutePath, 0755, true);
                    
                    $filename = random_str(64) . ".jpeg";
                    
                    $image->writeImage($absolutePath . "/" . $filename);
                    
                    header("Content-type: image/jpeg");
                    echo $image;
                    
                    $image->clear();
                    $image->destroy();
                    
                    if (file_exists($absolutePath . "/" . $filename)) {
                        
                        $currentDate = date("Y-m-d");
                        
                        $query = mysqli_prepare($connection, "INSERT INTO " . DATABASE_TABLE_IMAGES_CACHE . " (date, url, width, height, filename) VALUES (?, ?, ?, ?, ?)");
                        mysqli_stmt_bind_param($query, "ssiis", $currentDate, $url, $maxWidth, $maxHeight, $filename);
                        mysqli_stmt_execute($query);
                        //error_log("ERR = ".mysqli_error($connection), 0);
                        
                    }
                    
                } else {
                    
                    redirectTo("https://izumiproject.com.br/");
                    
                }
                
            }
            
            mysqli_stmt_close($query);
            mysqli_close($connection);
            
        }
        
        
    } else {
        
        redirectTo("https://izumiproject.com.br/");
        
    }
    
?>