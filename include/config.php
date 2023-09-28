<?php

    // # PAGE VARIABLES
    
    $PAGE_TITLE         = "";
    $PAGE_AUTHOR        = "";
    $PAGE_DESCRIPTION   = "Trazendo as garotas mais fofas e docinhas dos animes e mangás até você!";
    $PAGE_TEXT          = "";
    $PAGE_DATE          = "";
    $PAGE_TAGS          = "";
    $PAGE_IMAGE_PATH    = "https://cdn.izumiproject.com.br/images/izumiDefault2.png";
    $PAGE_IMAGE_TYPE    = "image/jpeg";
    $PAGE_IMAGE_WIDTH   = "400";
    $PAGE_IMAGE_HEIGHT  = "225";
    define("PAGE_URL", "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    
    // # ESSENTIAL SCRIPTS
    
    define("PATH_JQUERY", "https://code.jquery.com/jquery-3.5.1.min.js");
    define("JQUERY_INTEGRITY", "sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=");
    define("JQUERY_CROSSORIGIN", "anonymous");
    
    define("HTML5SHIV_PATH", "https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js");
    define("HTML5SHIV_INTEGRITY", "sha384-RPXhaTf22QktT8KTwZ6bUz/C+7CnccaIw5W/y/t0FW5WSDGj3wc3YtRIJC0w47in");
    define("HTML5SHIV_CROSSORIGIN", "anonymous");
    
    define("RESPONDJS_PATH", "https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js");
    define("RESPONDJS_INTEGRITY", "sha384-HwX0n9BiVutdIP0m3jKYarATBrBQMARe4JqN2bNN+eqbEirLWcklhaZgkovSBfc+");
    define("RESPONDJS_CROSSORIGIN", "anonymous");
    
    define("LINEAWESOME_PATH", "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css");
    define("TYPICONS_PATH", "/fonts/typicons.min.css");
    define("FONTAWESOME_PATH", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css");
    define("SLICK_CSS_PATH", "//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css");
    define("SLICK_THEME_PATH", "//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css");
    
    // # SITE CONFIGS
    
    setlocale(LC_ALL, 'pt_BR.utf-8');
    date_default_timezone_set("America/Buenos_Aires");
    
    define("SITE_NAME", "Izumi✰Project");
    define("TITLE_SEPARATOR", " | ");
    define("CSS_PATH", "/style.css");
    define("FAVICON_PATH", "/images/logos/v7/v7_icon_full.png");
    $PAGE_ROBOTS = "index, follow, archive";
    define("PAGE_LOCALE", "pt_BR");
    define("PAGE_TYPE", "article");
    define("SITE_GLOBAL_TAGS", "Izumi✰Project, Izumi Project, Izumi Fansub, Izumi, Fansub, Mangá, Anime, Legendado, Português, Filme de Anime, OVA, OAD, Bluray, Blu-ray, BDrip, BD-rip, FullHD, HD, HDTV, DVD, DVDrip, DVD-rip, SD, MP4, MKV, 1080p, 720p, 480p, Download, Torrent");
    
    define("SITE_LANG", "pt-BR");
    define("TEXT_DIR", "ltr");
    define("ALLOW_TRANSLATE", "yes");
    
    // # INCLUDE FILES
    
    define("DATABASE_CONFIG_PATH", __DIR__ . "/../../database_config.php");
    define("CSS_FILE_PATH", $_SERVER["DOCUMENT_ROOT"] . "/include/css.php");
    define("HEAD_PATH", $_SERVER["DOCUMENT_ROOT"] . "/include/head.php");
    define("SIDEHEADER_PATH", $_SERVER["DOCUMENT_ROOT"] . "/include/sideheader.php");
    define("HEADER_PATH", $_SERVER["DOCUMENT_ROOT"] . "/include/header.php");
    define("CARROUSEL_PATH", $_SERVER["DOCUMENT_ROOT"] . "/include/carrousel.php");
    define("TOP_BANNER_PATH", $_SERVER["DOCUMENT_ROOT"] . "/include/topBanner.php");
    define("SHARE_PATH", $_SERVER["DOCUMENT_ROOT"] . "/include/share.php");
    define("COMMENTS_PATH", $_SERVER["DOCUMENT_ROOT"] . "/include/comments.php");
    define("SIDEBAR_PATH", $_SERVER["DOCUMENT_ROOT"] . "/include/sidebar.php");
    define("FOOTER_PATH", $_SERVER["DOCUMENT_ROOT"] . "/include/footer.php");
    define("SCRIPTS_PATH", $_SERVER["DOCUMENT_ROOT"] . "/include/scripts.php");
    define("NOT_FOUND_PATH", $_SERVER["DOCUMENT_ROOT"] . "/404.shtml");
    
    require_once "Parsedown.php";
    $Parsedown = new Parsedown();
    
    // # USEFUL FUNCTIONS
    
    function callErrorPage($error) {
        
        echo "<!DOCTYPE HTML PUBLIC '-//IETF//DTD HTML 2.0//EN'>\n";
        echo "<html>\n";
        echo "  <head>\n";
        echo "      <title>Erro" . TITLE_SEPARATOR . SITE_NAME . "</title>\n";
        echo "  </head>\n";
        echo "  <body>\n";
        echo "      <h1>Error</h1>\n";
        echo "      <p>". $error ."</p>\n";
        echo "  </body>\n";
        echo "</html>\n";
        
        return;
        
    }
    
    function callDataBaseConfig() {
        
        if (file_exists(DATABASE_CONFIG_PATH)) {
            
            require DATABASE_CONFIG_PATH;
            
        }
        else {
            
            callErrorPage("The database call file could not be found in the specified directory.");
            die();
            
        }
        
        return;
        
    }
    
    function callPageError($code) {
        
        if ($code == "404") {
            
            http_response_code(404);
            include(NOT_FOUND_PATH);
        
        }
        
        exit();
        
    }
    
    // VIEWS COUNTER
    
    function getUserIp() {
        
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            
        	$ipAddress = $_SERVER['HTTP_CLIENT_IP'];
        	
        }
        else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            
        	$ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        	
        }
        else {
            
        	$ipAddress = $_SERVER['REMOTE_ADDR'];
        	
        }
        
        return $ipAddress;
        
    }
    
    function getPageViews($pageId) {
        
        $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
        
        if ($connection->connect_errno) {
        
            callErrorPage($connection->connect_error);
            $connection->close();
            die();
        
        }
        else {
            
            $connection->set_charset('utf8mb4');
        
            $query = "SELECT views FROM " . DATABASE_TABLE_POST . " WHERE id=" . $pageId;
            $result = mysqli_query($connection, $query);
            
            $views = 0;
            
            while($call = mysqli_fetch_assoc($result)) {
            
                $views = $call['views'];
                
            }
            
            return $views;
            
        }
        
        $connection->close();
        
    }
    
    function addPageView($pageId): void {
        
        $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
        
        if ($connection->connect_errno) {
        
            callErrorPage($connection->connect_error);
            $connection->close();
            die();
        
        }
        else {
            
            $connection->set_charset('utf8mb4');
            
            $firstVisit = true;
            
            $userIp = getUserIp();
            $currentDate = date_create(date("Y-m-d"));
            
            $query = "SELECT * FROM " . DATABASE_TABLE_VIEWERS . " WHERE id = '$pageId' AND ip = '$userIp' ORDER BY pos DESC";
            $result = mysqli_query($connection, $query);
            
            while(($call = mysqli_fetch_assoc($result)) && $firstVisit == true) {
                
                $verifyIp = $call['ip'];
                $verifyId = $call['id'];
                $verifyDate = date_create($call['date']);
                
                $dateDiff = date_diff($currentDate, $verifyDate);
                $dateDiff = $dateDiff->format('%a');
                
                if ($verifyIp == $userIp && $dateDiff <= 2 && $verifyId == $pageId) {
                    
                    $firstVisit = false;
                    
                } elseif ($verifyIp == $userIp && $dateDiff > 2 && $verifyId == $pageId) {
                    
                    $verifyDate = $call['date'];
                    $deleteQuery = "DELETE FROM " . DATABASE_TABLE_VIEWERS . " WHERE id = '$verifyId' AND ip = '$verifyIp' AND date = '$verifyDate'";
                    $deleteResult = mysqli_query($connection, $deleteQuery);
                    
                }
                
            }
            
            if ($firstVisit == true) {
                
                $currentDate = date("Y-m-d");
                $query = "INSERT INTO " . DATABASE_TABLE_VIEWERS . " (date, ip, id) VALUES ('$currentDate', '$userIp', '$pageId')";
                $result = mysqli_query($connection, $query);
                $query = "UPDATE " . DATABASE_TABLE_POST . " SET views = views + 1 WHERE id=" . $pageId;
                $result = mysqli_query($connection, $query);
                
            }
            
        }
        
        $connection->close();
        
    }
    
    function getTheme() {
        
        if (isset($_COOKIE["theme"])) {
            
            echo $_COOKIE["theme"];
            
        }
        return;
    }
    
    function trimText($string, $int) {
        $s = substr($string, 0, $int);
        $result = substr($s, 0, strrpos($s, ' '));
        return $result;
    }

    function description($string) {
        
        $dom = new domDocument("1.0", "utf-8");
        
        $DESCRIPTION = "";
                                                
        @$dom->loadHTML(mb_convert_encoding($string, "HTML-ENTITIES", "UTF-8"));
        $dom->preserveWhiteSpace = false; 
        $paragraphs = $dom->getElementsByTagName("p");
        
        $firstParagraph = "";
        $secondParagraph = "";
        
        if (is_object($paragraphs ->item(0))) { $firstParagraph = $paragraphs->item(0)->nodeValue; }
        if (is_object($paragraphs ->item(1))) { $secondParagraph = $paragraphs->item(1)->nodeValue; }
        
        if (strlen($firstParagraph) > 50) {
            
            $DESCRIPTION = $firstParagraph . " " . $secondParagraph;
            
        } else {
            
            $DESCRIPTION = $secondParagraph;
            
        }
        
        $DESCRIPTION = trimText($DESCRIPTION, 140) . "...";
        
        return $DESCRIPTION;
        
    }

    function convertToTextDate($date) {
        // FORMAT YYYY-MM-DD HH:MM:SS
        return strftime("%d de %B de %Y às %H:%Mh", strtotime($date));
    }
    
    function adminValidate(): void {
        

        if (isset($_GET["exit"]) || !isset($_SESSION["login_id"]) || !isset($_SESSION["login_email"]) || !isset($_SESSION["login_name"]) || !isset($_SESSION["login_password"])) {
            
            session_unset();
            session_destroy();
            
            header("Location: login");
            die();
            
        }
        
        $VALID_SESSION   = false;
        
        $USER_ID         = filter_var($_SESSION["login_id"], FILTER_SANITIZE_STRING);
        $USER_EMAIL      = filter_var($_SESSION["login_email"], FILTER_SANITIZE_STRING);
        $USER_NAME       = filter_var($_SESSION["login_name"], FILTER_SANITIZE_STRING);
        $USER_PASSWORD   = filter_var($_SESSION["login_password"], FILTER_SANITIZE_STRING);
        
        $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
        if (mysqli_connect_errno($connection)) {
            
            callErrorPage(mysqli_connect_error($connection));
            mysqli_close($connection);
            die();
            
        } else {
            
            mysqli_set_charset($connection, "utf8mb4");
            
            $query = "SELECT id, user, email, password FROM ".DATABASE_TABLE_USERS." WHERE email = ? AND password = ? LIMIT 1";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, "ss", $USER_EMAIL, $USER_PASSWORD);
            
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            if (mysqli_num_rows($result) > 0) {
                
                while($call = mysqli_fetch_row($result)) {
                    
                    // mysqli_fetch_row RETURNS ONLY A SINGLE ROW!
                    
                    $userId         = $call[0];
                    $userName       = $call[1];
                    $userEmail      = $call[2];
                    $userPassword   = $call[3];
                    
                    if ($userId != $USER_ID || $userEmail != $USER_EMAIL || $userName != $USER_NAME || $USER_PASSWORD != $userPassword) {
                        
                        $VALID_SESSION   = false;
                        
                    } else {
                        
                        $VALID_SESSION   = true;
                        
                    }
                    
                }
                
            }
            
            mysqli_free_result($result);
            
        }
        
        mysqli_stmt_close($stmt);
        mysqli_close($connection);
        
        if ($VALID_SESSION === false) {
            
            header("Location: login");
            die();
            
        }
        
    }

?>