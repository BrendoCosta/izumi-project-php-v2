<?php
    
    require_once $_SERVER['DOCUMENT_ROOT'] . "/include/config.php";
    
    callDataBaseConfig();
    
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if ($connection->connect_errno) {
        
        callErrorPage($connection->connect_error);
        die();
        
    }
    else {
        
        $connection->set_charset('utf8mb4');
    
        $query = "SELECT * FROM " . DATABASE_TABLE_POST . " WHERE id=" . $PAGE_ID;
        $result = mysqli_query($connection, $query);
        
        while($call = mysqli_fetch_assoc($result)) {
            
            $PAGE_TITLE         = $call['titulo'];
            $PAGE_AUTHOR        = $call['autor'];
            $PAGE_DATE          = $call['data'];
            $PAGE_TAGS          = $call['tags'];
            $PAGE_IMAGE_PATH    = $call['postImg'];
            $PAGE_DESCRIPTION   = $call['cardTexto'];
            $PAGE_TEXT          = $call['texto'];
                
        }
        
        $connection->close();
        
    }
    
?>
<!DOCTYPE html>
<html lang='pt-BR'>
<?php require_once HEAD_PATH; ?>
<style>
</style>
<body>
    <?php require_once SIDEHEADER_PATH; ?>
    <div id='wrapper'>
        <?php require_once HEADER_PATH; ?>
        <div id='content-wrapper'>
            <div id="content">
                <div id='post-wrapper' style="width: 100%;">
                    <div class='post-container' style="width: 100%;">
                        <div class='post-text'>
                            <h2 class="post-titulo"><?php echo $PAGE_TITLE; ?></h2>
                            <hr class="hr-titulo" />
                            <p>
                                <?php
                                    addPageView($PAGE_ID);
                                    echo getPageViews($PAGE_ID);
                                ?> visualizações
                            </p>
                            <p><?php echo $PAGE_TEXT; ?></p>
                        </div>
                        <?php require_once SHARE_PATH; ?>
                        <?php require_once COMMENTS_PATH; ?>
                    </div>
                </div>
            </div>
            <?php require_once FOOTER_PATH; ?>
          </div>
      </div>
    </div>
    <?php require_once SCRIPTS_PATH; ?>
  </body>
</html>