<?php
    
    require_once $_SERVER['DOCUMENT_ROOT'] . "/include/config.php";
    
    callDataBaseConfig();
    
    $PAGE_TITLE         = "Início";
    $PAGE_TAGS          = "Izumi✰Project, Izumi Project, Izumi Fansub, Izumi✰Fansub, Izumi, Project";
    $PAGE_DESCRIPTION   = "Trazendo as garotas mais fofas e docinhas dos animes e mangás até você!";
    
    if (isset($_GET["pesquisa"]) && !empty($_GET["pesquisa"])) {
        
        $search = $_GET["pesquisa"];
        $search = filter_var($search, FILTER_SANITIZE_STRING);
        
    }
    
?>
<!DOCTYPE html>
<html lang="<?= SITE_LANG; ?>" dir="<?= TEXT_DIR; ?>" translate="<?= ALLOW_TRANSLATE; ?>" data-theme="<?= getTheme(); ?>">
<?php require_once HEAD_PATH; ?>
    <style>
        <?php require_once CSS_FILE_PATH; ?>
        
        @keyframes carrousel-animation {
          0% {background-position-y: center;}
          100% {background-position-y: top;}
        }
        .main-wrapper .page-wrapper .carrousel-wrapper .carrousel {
            background-position-y: top;
            transition: 300ms ease !important;
        }
        .main-wrapper .page-wrapper .carrousel-wrapper .carrousel.slick-slide.slick-current.slick-active {
            animation: carrousel-animation 6s;
        }
    </style>
    <body>
        <div class="main-wrapper">
            <?php require_once HEADER_PATH; ?>
            <div class="page-wrapper">
                <?php require_once CARROUSEL_PATH; ?>
                <div class="content-wrapper">
					<div class="main-content-wrapper">
						<div class="post-body">
							<div class="post-text">
								
								<input type="text" class="search index" name="search" placeholder="&#xf002;&#x00a0;&#x00a0;Pesquisar..." minlength="1" maxlength="256" autocomplete="off" value="<?php if (isset($search)) { echo $search; } ?>">
									
									<?php
                                        
                                        $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
                                        
                                        if (mysqli_connect_errno($connection)) {
                                            
                                            callErrorPage(mysqli_connect_error($connection));
                                            mysqli_close($connection);
                                            die();
                                            
                                        } else {
                                            
                                            mysqli_set_charset($connection, "utf8mb4");
                                        
                                            $postsPerPage = 8;
                                            
                                            if (isset($_GET['pagina']) && !empty($_GET['pagina'])) {
                                                
                                                $currentPage = $_GET['pagina'];
                                                
                                            } else {
                                                
                                                $currentPage = 1;
                                                
                                            }
                                            
                                            $startFrom = ($currentPage * $postsPerPage) - $postsPerPage;
                                            
                                            $query  = NULL;
                                            $stmt   = NULL;
                                            
                                            if (isset($search)) {
                                                
                                                $query = "SELECT * FROM ".DATABASE_TABLE_POST." WHERE title LIKE CONCAT('%', ?, '%') OR text LIKE CONCAT('%', ?, '%') ORDER BY id DESC";
                                                
                                                $stmt = mysqli_prepare($connection, $query);
                                                mysqli_stmt_bind_param($stmt, "ss", $search, $search);
                                                
                                            } else {
                                                
                                                $query = "SELECT * FROM " . DATABASE_TABLE_POST;
                                                
                                                $stmt = mysqli_prepare($connection, $query);
                                                
                                            }
                                            
                                            mysqli_stmt_execute($stmt);
                                            $result = mysqli_stmt_get_result($stmt);
                                            
                                            $totalPosts = mysqli_num_rows($result);
                                            
                                            mysqli_free_result($result);
                                            
                                            $lastPage = ceil($totalPosts / $postsPerPage);
                                            
                                            $firstPage = 1;
                                            $nextPage = $currentPage + 1;
                                            $previousPage = $currentPage - 1;
                                            
                                            if (isset($search)) {
                                                
                                                $query = "SELECT * FROM ".DATABASE_TABLE_POST." WHERE title LIKE CONCAT('%', ?, '%') OR text LIKE CONCAT('%', ?, '%') ORDER BY id DESC LIMIT $startFrom, $postsPerPage";
                                                
                                                $stmt = mysqli_prepare($connection, $query);
                                                mysqli_stmt_bind_param($stmt, "ss", $search, $search);
                                                
                                            } else {
                                                
                                                $query = "SELECT * FROM ".DATABASE_TABLE_POST." ORDER BY id DESC LIMIT $startFrom, $postsPerPage";
                                                
                                                $stmt = mysqli_prepare($connection, $query);
                                                
                                            }
                                            
                                            mysqli_stmt_execute($stmt);
                                            $result = mysqli_stmt_get_result($stmt);
                                            
                                            if (isset($search) && mysqli_num_rows($result) > 0) {
                                                
                                                ?>
                                                <div class="search-result">Mostrando resultados para "<?= $search ?>" :</div>
                                                <?php
                                                
                                            }
                                            if (isset($search) && mysqli_num_rows($result) == 0) {
                                                
                                                ?>
                                                <div class="search-result error">A pesquisa para "<?= $search ?>" não retornou resultados.</div>
                                                <?php
                                                
                                            }

                                            ?><div class="card-wrapper"><?php
                                            
                                            while($call = mysqli_fetch_assoc($result)) {
                                            
                                                $CARD_ID = $call["id"];
                                                $CARD_YEAR = $call["year"];
                                                $CARD_MONTH = $call["month"];
                                                $CARD_TITLE = $call["title"];
                                                $CARD_SLUG = $call["slug"];
                                                $CARD_DATE = $call["date"];
                                                $CARD_IMAGE = $call["image"];
                                                
                                                if (strlen($CARD_TITLE) > 32) {
                                                    $CARD_TITLE = substr($CARD_TITLE, 0, 32) . '...';
                                                }
                                                
                                                $CARD_DESCRIPTION = description($Parsedown->text($call["text"]));
                                                
                                                ?>
                                                <div class="card" itemscope itemType="https://schema.org/BlogPosting">
                                                    <a href="https://izumiproject.com.br/posts/<?= $CARD_YEAR ?>/<?= $CARD_MONTH ?>/<?= $CARD_SLUG ?>">
                                                        <img class="card-image" itemprop="image" src="https://izumiproject.com.br/resize?url=<?= $CARD_IMAGE ?>&mwidth=400&mheight=225" />
                                                        <h3 class="card-title" itemprop="headline"><?= $CARD_TITLE ?></h3>
                                                        <p class="card-description" itemprop="description"><?= $CARD_DESCRIPTION ?></p>
                                                        <p class="card-footer date"><span class="iconify" data-icon="bx:bx-calendar" data-inline="false"></span> <time itemprop="datePublished" datetime="<?php echo date(DATE_ISO8601, strtotime($CARD_DATE)); ?>"><?= convertToTextDate($CARD_DATE); ?></time></p>
                                                    </a>
                                                    <p class="card-footer comments"><span class="iconify" data-icon="bx:bx-comment-detail" data-inline="true"></span> <a itemprop="commentCount" href="https://izumiproject.com.br/posts/<?= $CARD_YEAR ?>/<?= $CARD_MONTH ?>/<?= $CARD_SLUG ?>#disqus_thread" data-disqus-identifier="<?= $CARD_ID ?>"></a></p>
                                                </div>
                                                <?php
                                            }
                                            
                                            ?></div><?php
                                            
                                            mysqli_free_result($result);
                                            mysqli_close($connection);
                                            
                                        }
                                        
                                    ?>
								
								<div class="pagination-wrapper">
									<?php
                                        
                                        if (isset($search)) {
                                            
                                            if ($currentPage != $firstPage) {
                                                ?><a class="pagination" href="https://izumiproject.com.br/?pesquisa=<?= $search ?>&pagina=<?= $firstPage ?>" title="Primeira página"><span class="iconify" data-icon="heroicons-solid:chevron-double-left" data-inline="true"></span></a><?php
                                            }
                                            
                                            if ($currentPage >= 2) {
                                                
                                                ?><a class="pagination" href="https://izumiproject.com.br/?pesquisa=<?= $search ?>&pagina=<?= $previousPage ?>"><?= $previousPage ?></a><?php
                                                
                                            }
                                            
                                            ?><a class="pagination active" href="https://izumiproject.com.br/?pesquisa=<?= $search ?>&pagina=<?= $currentPage ?>"><?= $currentPage ?></a><?php
                                            
                                            if ($currentPage != $lastPage) {
                                                
                                                ?><a class="pagination" href="https://izumiproject.com.br/?pesquisa=<?= $search ?>&pagina=<?= $nextPage ?>"><?= $nextPage ?></a><?php
                                                ?><a class="pagination" href="https://izumiproject.com.br/?pesquisa=<?= $search ?>&pagina=<?= $lastPage ?>" title="Primeira página"><span class="iconify" data-icon="heroicons-solid:chevron-double-right" data-inline="true"></span></a><?php
                                                
                                            }
                                            
                                        } else {
                                        
                                            if ($currentPage != $firstPage) {
                                                ?><a class="pagination" href="?pagina=<?= $firstPage ?>" title="Primeira página"><span class="iconify" data-icon="heroicons-solid:chevron-double-left" data-inline="true"></span></a><?php
                                            }
                                            
                                            if ($currentPage >= 2) {
                                                
                                                ?><a class="pagination" href="?pagina=<?= $previousPage ?>"><?= $previousPage ?></a><?php
                                                
                                            }
                                            
                                            ?><a class="pagination active" href="?pagina=<?= $currentPage ?>"><?= $currentPage ?></a><?php
                                            
                                            if ($currentPage != $lastPage) {
                                                
                                                ?><a class="pagination" href="?pagina=<?= $nextPage ?>"><?= $nextPage ?></a><?php
                                                ?><a class="pagination" href="?pagina=<?= $lastPage ?>" title="Primeira página"><span class="iconify" data-icon="heroicons-solid:chevron-double-right" data-inline="true"></span></a><?php
                                                
                                            }
                                        
                                        }
                                        
                                    ?>
								</div>
							</div>
							<?php //require_once SHARE_PATH; ?>
							<?php //require_once COMMENTS_PATH; ?>
						</div>
					</div>
					<?php require_once SIDEBAR_PATH; ?>
				</div>
            </div>
            <?php require_once FOOTER_PATH; ?>
        </div>
        <?php require_once SCRIPTS_PATH; ?>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
              $('.carrousel-wrapper').on('touchstart', e => {
                  $('.carrousel-wrapper').slick('slickPlay');
              });
              $('.carrousel-wrapper').slick({
        		slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
        		speed: 1000,
                autoplaySpeed: 5000,
                dots: true,
                focusOnSelect: false,
                pauseOnHover: false,
                pauseOnFocus: false,
                accessibility: false,
                centerMode: false
              });
            });
        </script>
        <script type="text/javascript">
            var searchField = $("[name='search']");
            
            searchField.on("keypress", function (e) {
                
                if (e.which === 13) {
                    
                    if (!!searchField.val()) {
                        
                        window.location.href = "https://izumiproject.com.br/?pesquisa=" + searchField.val();
                        
                    } else {
                        
                        window.location.href = "https://izumiproject.com.br";
                        
                    }
                    
                }
                
            });
        </script>
    </body>
</html>