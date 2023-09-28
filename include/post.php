<?php
    
    require_once $_SERVER['DOCUMENT_ROOT'] . "/include/config.php";
    
    if (isset($_GET["year"]) && isset($_GET["month"]) && isset($_GET["slug"])) {
        
        $retriveYear    = $_GET["year"];
        $retriveMonth   = $_GET["month"];
        $retriveSlug    = $_GET["slug"];
        
    } else {
        
        callPageError("404");
        
    }
    
    callDataBaseConfig();
    
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
    if (mysqli_connect_errno($connection)) {
        
        callErrorPage(mysqli_connect_error($connection));
        mysqli_close($connection);
        die();
        
    } else {
        
        mysqli_set_charset($connection, "utf8mb4");
        
        $query = mysqli_prepare($connection, "SELECT * FROM " . "posts" . " WHERE year = ? AND month = ? AND slug = ? LIMIT 1");
        mysqli_stmt_bind_param($query, "iis", $retriveYear, $retriveMonth, $retriveSlug);
        
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);
        
        if (mysqli_num_rows($result) > 0) {
            
            while($call = mysqli_fetch_assoc($result)) {
            
                $PAGE_TITLE         = $call['title'];
                $PAGE_AUTHOR        = $call['author'];
                $PAGE_DATE          = $call['date'];
                $PAGE_TAGS          = $call['tags'];
                $PAGE_IMAGE_PATH    = $call['image'];
                $PAGE_TEXT          = $call['text'];
                
            }
            
        }
        else {
            
            error_log("Aqui", 0);
            callPageError("404");
            
        }
        
        $connection->close();
        
    }
    
?>
<!DOCTYPE html>
<html lang="<?= SITE_LANG; ?>" dir="<?= TEXT_DIR; ?>" translate="<?= ALLOW_TRANSLATE; ?>" data-theme="<?php getTheme(); ?>">
<?php require_once HEAD_PATH; ?>
    <style>
        :root {
            --Neofox: url("https://c.disquscdn.com/uploads/users/20531/7584/avatar92.jpg?1610067421");
            --TwinT: url("https://i.imgur.com/O7WpGQs.jpg");
            --Kamal: url("https://c.disquscdn.com/uploads/users/20531/7584/avatar92.jpg?1610067421");
        }
        <?php require_once CSS_FILE_PATH; ?>
    </style>
    <body>
        <div class="main-wrapper">
            <?php require_once HEADER_PATH; ?>
            <div class="page-wrapper">
                <div class="content-wrapper">
					<div class="main-content-wrapper">
						<div class="post-body">
						    <div class="post-header" style="background-image: url(<?= $PAGE_IMAGE_PATH ?>)">
								<div class="post-header-shadow"></div>
								<div class="post-header-info">
									<h1><?= $PAGE_TITLE ?></h1>
									<a href="https://izumiproject.com.br/equipe#<?= $PAGE_AUTHOR ?>">
    									<div class="author-wrapper">
    										<div class="author-rounded" style="background-image: var(--<?= $PAGE_AUTHOR ?>);"></div>
    										<p><?= $PAGE_AUTHOR ?></p>
    									</div>
									</a>
									<p><span class="iconify" data-icon="bx:bx-calendar" data-inline="true"></span> 
									    <time itemprop="startDate" datetime="<?php echo substr($PAGE_DATE, 0, 9); ?>"><?php echo strftime("%d de %B de %Y às %H:%Mh", strtotime($PAGE_DATE)); ?></time>
									</p>
									<p><span class="iconify" data-icon="bx:bx-comment-detail" data-inline="true"></span> <a href='<?= PAGE_URL ?>#disqus_thread'></a></p>
									<p><span class="iconify" data-icon="akar-icons:eye" data-inline="true"></span> <?php //addPageView($PAGE_ID); echo getPageViews($PAGE_ID); ?> visualizações</p>
								</div>
							</div>
							<div class="post-text">
								<?= $PAGE_TEXT ?>
								<?php //require_once SHARE_PATH; ?>
							    <?php //require_once COMMENTS_PATH; ?>
							</div>
						</div>
					</div>
					<?php require_once SIDEBAR_PATH; ?>
				</div>
            </div>
            <?php require_once FOOTER_PATH; ?>
        </div>
        <?php require_once SCRIPTS_PATH; ?>
    </body>
</html>