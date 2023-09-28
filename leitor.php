<?php
    
    if (!isset($_GET["id"])) {
        
        header("Location: https://izumiproject.com.br/projetos?p=mangas");
        die();
        
    }
    else {
        
        $PROJECT_ID = $_GET["id"];
        
    }
    
    if (!isset($_GET["ch"])) {
        
        header("Location: https://izumiproject.com.br/projetos?p=mangas");
        die();
        
    }
    else {
        
        $PROJECT_CHAPTER = $_GET["ch"];
        
    }
    
    require_once $_SERVER['DOCUMENT_ROOT'] . "/include/config.php";
    
    callDataBaseConfig();
    
    $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
        
    if (mysqli_connect_errno($connection)) {
        
        callErrorPage(mysqli_connect_error($connection));
        mysqli_close($connection);
        die();
        
    } else {
        
        mysqli_set_charset($connection, "utf8mb4");
        
        $query = mysqli_prepare($connection, "SELECT * FROM " . DATABASE_TABLE_MANGAS . " WHERE id = ?");
        mysqli_stmt_bind_param($query, "i", $PROJECT_ID);
        
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);
        
        if (mysqli_num_rows($result) > 0) {
            
            while($call = mysqli_fetch_assoc($result)) {
                
                $PAGE_AUTHOR            = $call['author'];
                $PAGE_TAGS              = $call['title'];
                $PAGE_IMAGE_PATH        = $call['cover'];
                $PAGE_DESCRIPTION       = $call['synopsis'];
                
                $PROJECT_TITLE          = $call['title'];
                $PROJECT_ORIGINAL_TITLE = $call['originalTitle'];
                $PROJECT_COVER          = $call['cover'];
                $PROJECT_AUTHOR         = $call['author'];
                $PROJECT_ILLUSTRATOR    = $call['illustrator'];
                $PROJECT_START          = $call['start'];
                $PROJECT_END            = $call['end'];
                $PROJECT_SYNOPSIS       = $call['synopsis'];
                
            }
            
        } else {
            header("Location: https://izumiproject.com.br/projetos?p=mangas");
            die();
        }
        
        mysqli_free_result($result);
        mysqli_stmt_close($query);
        
        $query = mysqli_prepare($connection, "SELECT * FROM " . DATABASE_TABLE_MANGAS_CHAPTERS . " WHERE projectID = ? AND chapter = ?");
        mysqli_stmt_bind_param($query, "ii", $PROJECT_ID, $PROJECT_CHAPTER);
        
        mysqli_stmt_execute($query);
        $result = mysqli_stmt_get_result($query);
        
        if (mysqli_num_rows($result) > 0) {
            
            while($call = mysqli_fetch_assoc($result)) {
                
                $PROJECT_VOLUME         = $call['volume'];
                $PROJECT_PAGES          = explode("||", $call['pages']);
                
            }
            
        } else {
            header("Location: https://izumiproject.com.br/projetos/mangas?id=" . $PROJECT_ID);
            die();
        }
        
        mysqli_free_result($result);
        mysqli_stmt_close($query);
        
    }

    mysqli_close($connection);
    
    $PAGE_TITLE         = $PROJECT_TITLE . " | Capítulo " . $PROJECT_CHAPTER;

?>
<!DOCTYPE html>
<html lang="<?= SITE_LANG; ?>" dir="<?= TEXT_DIR; ?>" translate="<?= ALLOW_TRANSLATE; ?>" data-theme="<?php getTheme(); ?>">
<?php require_once HEAD_PATH; ?>
    <style>
        <?php require_once CSS_FILE_PATH; ?>
        .post-text img.mangaPage {
            width: 100%;
            margin-bottom: 2em;
        }
        .post-text img.cover {
            width: 15%;
            margin: unset;
            margin-right: 1em;
            float: left;
            padding: 0.4em;
            background: var(--wrapper);
            box-shadow: 1px 2px 5px 0px var(--shadow);
            border: solid 1px var(--shadow);
            border-radius: 1em;
        }
        .clear { clear:both; }
        .projectHeader {
            width: 100%;
            height: auto; 
            margin-top: 2em;
        }
        .button.nav {
            background: var(--main);
            margin-top: unset;
            display: inline-block;
            width: auto;
        }
        .button.nav:hover {
            background: var(--middle);
        }
        .slick-next {
            right: 0;
        }
        .slick-prev {
            left: 0;
        }
        .slick-prev, .slick-next {
            width: 50%;
            height: 100%;
            color: transparent;
            z-index: 90;
        }
        .slick-prev:before, .slick-next:before {
            color: transparent;
        }
        .slick-slider{ touch-action: auto!important; }
        @media screen and (max-width: 768px) {
            .post-text img.cover {
                width: 100%;
                margin-right: unset;
                margin-bottom: 1em;
            }
            .projectHeader {
                margin-top: 0;
            }
            select {
                margin-top: 0;
            }
        }
    </style>
    <body>
        <div class="main-wrapper">
            <?php require_once HEADER_PATH; ?>
            <div class="page-wrapper">
                <div class="content-wrapper">
					<div class="main-content-wrapper page">
						<div class="post-body">
							<div class="post-text">
                                
                                <h2 class="title"><?= $PAGE_TITLE ?></h2>
                                
                                <div class="projectHeader">
                                    <a href="https://izumiproject.com.br/projetos/mangas?id=<?php echo $PROJECT_ID; ?>"><img class="cover" src="<?php echo $PROJECT_COVER; ?>"></img></a>
                                    <h2 class="post-titulo"><a href="https://izumiproject.com.br/projetos/mangas?id=<?php echo $PROJECT_ID; ?>"><?php echo $PROJECT_TITLE; ?></a></h2>
                                    <p style="color: var(--postSection);"><b><?php echo $PROJECT_ORIGINAL_TITLE; ?></b></p>
                                    <p><?php echo $PROJECT_SYNOPSIS; ?></p>
                                </div>
                                <div class="clear"></div>
                                
                                <div class="select-wrapper">
                                    <select id="chapterSelect">
                                        <?php
                                        
                                            $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
                                            
                                            if (mysqli_connect_errno($connection)) {
                                                
                                                callErrorPage(mysqli_connect_error($connection));
                                                mysqli_close($connection);
                                                die();
                                                
                                            } else {
                                                
                                                mysqli_set_charset($connection, "utf8mb4");
                                                
                                                $query = mysqli_prepare($connection, "SELECT * FROM " . DATABASE_TABLE_MANGAS_CHAPTERS . " WHERE projectID = ? ORDER BY chapter DESC");
                                                mysqli_stmt_bind_param($query, "i", $PROJECT_ID);
                                                
                                                mysqli_stmt_execute($query);
                                                $result = mysqli_stmt_get_result($query);
                                                
                                                if (mysqli_num_rows($result) > 0) {
                                                    
                                                    while($call = mysqli_fetch_assoc($result)) {
                                                        
                                                        $AUX_VOLUMES        = $call["volume"];
                                                        $AUX_CHAPTERS       = $call["chapter"];
                                                        $AUX_CHAPTERS_NAMES = $call["chapterName"];
                                                        
                                                        if ($AUX_CHAPTERS == $PROJECT_CHAPTER) {
                                                            if (!empty($AUX_CHAPTERS_NAMES)) {
                                                                echo "<option value='https://izumiproject.com.br/leitor?id=$PROJECT_ID&ch=$AUX_CHAPTERS' selected>Volume $AUX_VOLUMES - Capítulo $AUX_CHAPTERS - $AUX_CHAPTERS_NAMES</option>";
                                                            } else {
                                                                echo "<option value='https://izumiproject.com.br/leitor?id=$PROJECT_ID&ch=$AUX_CHAPTERS' selected>Volume $AUX_VOLUMES - Capítulo $AUX_CHAPTERS</option>";
                                                            }
    
                                                        } else {
                                                            if (!empty($AUX_CHAPTERS_NAMES)) {
                                                                echo "<option value='https://izumiproject.com.br/leitor?id=$PROJECT_ID&ch=$AUX_CHAPTERS'>Volume $AUX_VOLUMES - Capítulo $AUX_CHAPTERS - $AUX_CHAPTERS_NAMES</option>";
                                                            } else {
                                                                echo "<option value='https://izumiproject.com.br/leitor?id=$PROJECT_ID&ch=$AUX_CHAPTERS'>Volume $AUX_VOLUMES - Capítulo $AUX_CHAPTERS</option>";
                                                            }
                                                            
                                                        }
                                                        
                                                    }
                                                    
                                                }
                                                
                                                mysqli_free_result($result);
                                                mysqli_stmt_close($query);
                                                
                                            }
                                        
                                            mysqli_close($connection);
                                        ?>
                                    </select>
                                </div>
                                
                                <div style="text-align: center; width: 100%; margin-top: 2em; margin-bottom: 2em;">
                                    <a href="https://izumiproject.com.br/leitor?id=<?php echo $PROJECT_ID; ?>&ch=<?php echo $PROJECT_CHAPTER-1; ?>"><button class="button nav" type="button"><i class="fas fa-chevron-left"></i> Anterior</button></a>
                                    <a href="https://izumiproject.com.br/leitor?id=<?php echo $PROJECT_ID; ?>&ch=<?php echo $PROJECT_CHAPTER+1; ?>"><button class="button nav" type="button">Próximo <i class="fas fa-chevron-right"></i></button></a>
                                </div>
                                
                                
                                <div class="leitor">
                                    <?php
                                        for ($i = 0; $i < count($PROJECT_PAGES); $i++) {
                                            echo "<img class='mangaPage' src='$PROJECT_PAGES[$i]'></img>";
                                        }
                                    ?>
                                </div>
                                
                                <div style="text-align: center; width: 100%; margin-top: 2em; margin-bottom: 2em;">
                                    <a href="https://izumiproject.com.br/leitor?id=<?php echo $PROJECT_ID; ?>&ch=<?php echo $PROJECT_CHAPTER-1; ?>"><button class="button nav" type="button"><i class="fas fa-chevron-left"></i> Anterior</button></a>
                                    <a href="https://izumiproject.com.br/leitor?id=<?php echo $PROJECT_ID; ?>&ch=<?php echo $PROJECT_CHAPTER+1; ?>"><button class="button nav" type="button">Próximo <i class="fas fa-chevron-right"></i></button></a>
                                </div>
                                
							    <?php require_once SHARE_PATH; ?>
							    <?php require_once COMMENTS_PATH; ?>
							</div>
						</div>
					</div>
					<?php //require_once SIDEBAR_PATH; ?>
				</div>
            </div>
            <?php require_once FOOTER_PATH; ?>
        </div>
        <?php require_once SCRIPTS_PATH; ?>
        <script>
            $("#chapterSelect").on("change", function() {
                window.location = $(this).val();
            });
        </script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script type="text/javascript">
           $('.leitor').slick({
                infinite: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                adaptiveHeight: true
            }); 
        </script>
    </body>
</html>