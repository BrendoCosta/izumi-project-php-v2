<?php
    
    require_once $_SERVER['DOCUMENT_ROOT'] . "/include/config.php";
    
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        
        if (ctype_digit($_GET['id']) == true) {
            
            $PAGE_ID = intval(preg_replace('/[^0-9]+/', '', $_GET['id']), 10);
            
        }
        else {
            
            callPageError("404");
            
        }
        
    }
    else {
        
        header("Location: https://izumiproject.com.br");
        exit();
        
    }
    
    callDataBaseConfig();
    
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if ($connection->connect_errno) {
        
        callErrorPage($connection->connect_error);
        $connection->close();
        die();
        
    }
    else {
        
        $connection->set_charset('utf8mb4');
        
        $query = "SELECT * FROM " . DATABASE_TABLE_POST . " WHERE id=" . $PAGE_ID;
        $result = mysqli_query($connection, $query);
        
        if (mysqli_num_rows($result) > 0) {
            
            while($call = mysqli_fetch_assoc($result)) {
            
                $PAGE_YEAR  = $call["year"];
                $PAGE_MONTH = $call["month"];
                $PAGE_SLUG  = $call["slug"];
                
            }
            
        }
        else {
            
            callPageError("404");
            
        }
        
        $connection->close();
        
    }
    
    header("Location: https://izumiproject.com.br/posts/$PAGE_YEAR/$PAGE_MONTH/$PAGE_SLUG");
    
?>