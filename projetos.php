<?php
    
    require_once $_SERVER["DOCUMENT_ROOT"] . "/include/config.php";
    
    callDataBaseConfig();
    
    $PAGE_TITLE         = "Projetos";
    $PROJECT_TYPE       = "";
    
    if(isset($_GET["p"]) && !empty($_GET["p"])) {
        
        $PROJECT_TYPE       = $_GET["p"];
        
    }

    switch ($PROJECT_TYPE) {
        case "animes":
            $PAGE_TITLE = "Animes";
            break;
        case "mangas":
            $PAGE_TITLE = "Mangás";
            break;
        case "novels":
            $PAGE_TITLE = "Novels";
            break;
        default:
            header("Location: /projetos?p=animes");
            break;
    }
    
    function animes(): void {
        
        $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
                                        
        if (mysqli_connect_errno($connection)) {
            
            callErrorPage(mysqli_connect_error($connection));
            mysqli_close($connection);
            die();
            
        } else {
            
            mysqli_set_charset($connection, "utf8mb4");
            
            $query = "SELECT * FROM ".DATABASE_TABLE_ANIMES." ORDER BY titulo";
            
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_execute($stmt);
            
            $result = mysqli_stmt_get_result($stmt);
            
            if (mysqli_num_rows($result) > 0) {
                
                while($call = mysqli_fetch_assoc($result)) {
                    
                    $CARD_ID        = $call["id"];
                    $CARD_TITLE     = $call["titulo"];
                    $CARD_POSTER    = $call["poster"];
                    $CARD_TYPE      = $call["tipo"];
                    $CARD_SOURCE    = $call["origem"];
                    $CARD_STATUS    = $call["estado"];
                    
                    ?>
                    <a href="https://izumiproject.com.br/projetos/animes?id=<?= $CARD_ID ?>">
                        <div class="card" title="<?= $CARD_TITLE ?>">
                            <img src="<?= $CARD_POSTER ?>" />
                            <div class="card-header">
                    <?php
                                switch ($CARD_TYPE) {
                                    case "TV":
                                        ?><label class="light-blue">TV</label><?php
                                        break;
                                    case "OVA":
                                        ?><label class="purple">OVA</label><?php
                                        break;
                                    case "ONA":
                                        ?><label class="pink">ONA</label><?php
                                        break;
                                    case "Filme":
                                        ?><label class="purple">Filme</label><?php
                                        break;
                                    default:
                                        ?><label><?= $CARD_TYPE ?></label><?php
                                        break;
                                }
                                switch ($CARD_SOURCE) {
                                    case "Blu-ray":
                                        ?><label class="blue">Blu-ray</label><?php
                                        break;
                                    case "Web":
                                        ?><label class="pink">Web</label><?php
                                        break;
                                    case "DVD":
                                        ?><label class="yellow">DVD</label><?php
                                        break;
                                    default:
                                        ?><label><?= $CARD_SOURCE ?></label><?php
                                }
                                switch ($CARD_STATUS) {
                                    case "Concluído":
                                        ?><label class="green"><span class="iconify" data-icon="bi:check-lg" data-inline="true"></span> Concluído</label><?php
                                        break;
                                    case "Em andamento":
                                        ?><label class="yellow"><span class="iconify" data-icon="feather:clock" data-inline="false"></span> Em andamento</label><?php
                                        break;
                                    case "Planejado":
                                        ?><label class="purple"><span class="iconify" data-icon="feather:clock" data-inline="false"></span> Planejado</label><?php
                                        break;
                                    case "Cancelado":
                                        ?><label class="red"><span class="iconify" data-icon="fa-solid:times" data-inline="false"></span> Cancelado</label><?php
                                    default:
                                        ?><label><?= $CARD_STATUS ?></label><?php
                                }
                    ?>
                            </div>
                            <div class="card-footer"><h3><?= $CARD_TITLE ?></h3></div>
                        </div>
                    </a>
                    <?php
                    
                }
                
            }
            
            mysqli_free_result($result);
            mysqli_stmt_close($stmt);
            
        }
        
        mysqli_close($connection);
        
    }
    
    function mangas(): void {
        
        $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
                                        
        if (mysqli_connect_errno($connection)) {
            
            callErrorPage(mysqli_connect_error($connection));
            mysqli_close($connection);
            die();
            
        } else {
            
            mysqli_set_charset($connection, "utf8mb4");
            
            $query = "SELECT * FROM ".DATABASE_TABLE_MANGAS." ORDER BY title";
            
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_execute($stmt);
            
            $result = mysqli_stmt_get_result($stmt);
            
            if (mysqli_num_rows($result) > 0) {
                
                while($call = mysqli_fetch_assoc($result)) {
                    
                    $CARD_ID        = $call["id"];
                    $CARD_TITLE     = $call["title"];
                    $CARD_COVER     = $call["cover"];
                    $CARD_CHAPTERS  = $call["chapters"];
                    $CARD_STATUS    = $call["status"];
                    
                    ?>
                    <a href="https://izumiproject.com.br/projetos/mangas?id=<?= $CARD_ID ?>">
                        <div class="card" title="<?= $CARD_TITLE ?>">
                            <img src="<?= $CARD_COVER ?>" />
                            <div class="card-header">
                                <label class="purple"><i class="fa fa-book" aria-hidden="true"></i> <?= $CARD_CHAPTERS ?> capítulos</label>
                    <?php
                                switch ($CARD_STATUS) {
                                    case "Concluído":
                                        ?><label class="green"><span class="iconify" data-icon="bi:check-lg" data-inline="true"></span> Concluído</label><?php
                                        break;
                                    case "Em andamento":
                                        ?><label class="yellow"><span class="iconify" data-icon="feather:clock" data-inline="false"></span> Em andamento</label><?php
                                        break;
                                    case "Planejado":
                                        ?><label class="purple"><span class="iconify" data-icon="feather:clock" data-inline="false"></span> Planejado</label><?php
                                        break;
                                    case "Cancelado":
                                        ?><label class="red"><span class="iconify" data-icon="fa-solid:times" data-inline="false"></span> Cancelado</label><?php
                                    default:
                                        ?><label><?= $CARD_STATUS ?></label><?php
                                }
                    ?>
                            </div>
                            <div class="card-footer"><h3><?= $CARD_TITLE ?></h3></div>
                        </div>
                    </a>
                    <?php
                    
                }
                
            }
            
            mysqli_free_result($result);
            mysqli_stmt_close($stmt);
            
        }
        
        mysqli_close($connection);
        
    }
    
    function novels(): void {
        
        $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
                                        
        if (mysqli_connect_errno($connection)) {
            
            callErrorPage(mysqli_connect_error($connection));
            mysqli_close($connection);
            die();
            
        } else {
            
            mysqli_set_charset($connection, "utf8mb4");
            
            $query = "SELECT * FROM ".DATABASE_TABLE_NOVELS." ORDER BY title";
            
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_execute($stmt);
            
            $result = mysqli_stmt_get_result($stmt);
            
            if (mysqli_num_rows($result) > 0) {
                
                while($call = mysqli_fetch_assoc($result)) {
                    
                    $CARD_ID        = $call["id"];
                    $CARD_TITLE     = $call["title"];
                    $CARD_COVER     = $call["cover"];
                    $CARD_VOLUMES   = $call["volumes"];
                    $CARD_STATUS    = $call["status"];
                    
                    ?>
                    <a href="https://izumiproject.com.br/projetos/novels?id=<?= $CARD_ID ?>">
                        <div class="card" title="<?= $CARD_TITLE ?>">
                            <img src="<?= $CARD_COVER ?>" />
                            <div class="card-header">
                                <label class="purple"><i class="fa fa-book" aria-hidden="true"></i> <?= $CARD_VOLUMES ?> volumes</label>
                    <?php
                                switch ($CARD_STATUS) {
                                    case "Concluído":
                                        ?><label class="green"><span class="iconify" data-icon="bi:check-lg" data-inline="true"></span> Concluído</label><?php
                                        break;
                                    case "Em andamento":
                                        ?><label class="yellow"><span class="iconify" data-icon="feather:clock" data-inline="false"></span> Em andamento</label><?php
                                        break;
                                    case "Planejado":
                                        ?><label class="purple"><span class="iconify" data-icon="feather:clock" data-inline="false"></span> Planejado</label><?php
                                        break;
                                    case "Cancelado":
                                        ?><label class="red"><span class="iconify" data-icon="fa-solid:times" data-inline="false"></span> Cancelado</label><?php
                                    default:
                                        ?><label><?= $CARD_STATUS ?></label><?php
                                }
                    ?>
                            </div>
                            <div class="card-footer"><h3><?= $CARD_TITLE ?></h3></div>
                        </div>
                    </a>
                    <?php
                    
                }
                
            }
            
            mysqli_free_result($result);
            mysqli_stmt_close($stmt);
            
        }
        
        mysqli_close($connection);
        
    }

?>
<!DOCTYPE html>
<html lang="<?php echo SITE_LANG; ?>" dir="<?php echo TEXT_DIR; ?>" translate="<?php echo ALLOW_TRANSLATE; ?>" data-theme="<?php getTheme(); ?>">
<?php require_once HEAD_PATH; ?>
    <style>
        <?php require_once CSS_FILE_PATH; ?>
        
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .projects-wrapper {
            
		    display: flex;
            flex-direction: row;
            justify-content: center;
            flex-wrap: wrap;
            padding: 1rem 0;
		
		}
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .projects-wrapper .card {
            
            position: relative;
            
            width: 16.8rem;
            height: 24rem;
            
            display: flex;
            justify-content: center;
            
            margin: 1rem 1rem 1rem 1rem;
            
            border-radius: 2rem;
            
            box-shadow: 1px 2px 5px 0px var(--post-body-shadow);
            
            overflow: hidden;
            
        }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .projects-wrapper .card::before {
            
            position: absolute;
            content: "";
            
            width: 100%;
            height: 25%;
            
            bottom: 0;
            
            background-image: linear-gradient(to top, rgba(0, 0, 0, 0.5), transparent);
            
            z-index: 1;
            
        }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .projects-wrapper .card img {
            
            width: 100%;
            
        }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .projects-wrapper .card:hover > img {
            transform: scale(1.2)
        }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .projects-wrapper .card .card-header {
            
            position: absolute;
            
            width: 100%;
            height: auto;
            
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            flex-wrap: nowrap;
            padding: 0.8rem 0 0.5rem 0.8rem;
            align-content: center;
            align-items: center;
            
            background: transparent;

        }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .projects-wrapper .card .card-header label {
            
            color: white;
            font-weight: bold;
            text-align: center;
            font-size: 0.5rem;
            text-transform: uppercase;
            
            margin-right: 0.3rem;
            
            padding: 0.35rem 0.8rem;
            
            border: none;
            border-radius: 5rem;
            
            background: gray;
            
        }
        
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .projects-wrapper .card .card-header label.light-blue    { background: var(--lightBlue);}
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .projects-wrapper .card .card-header label.blue          { background: var(--blue);}
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .projects-wrapper .card .card-header label.purple        { background: var(--purple);}
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .projects-wrapper .card .card-header label.light-green   { background: var(--lime);}
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .projects-wrapper .card .card-header label.green         { background: var(--teal);}
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .projects-wrapper .card .card-header label.yellow        { background: var(--amber);}
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .projects-wrapper .card .card-header label.red           { background: var(--red);}
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .projects-wrapper .card .card-header label.pink          { background: var(--pink);}
        
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .projects-wrapper .card .card-footer {
            
            position: absolute;
            
            width: 100%;
            height: auto;
            
            display: flex;
            flex-direction: column;
            justify-content: center;
            flex-wrap: nowrap;
            align-content: center;
            align-items: center;
            
            bottom: 0;
            
            padding-bottom: 1rem;
            
            background: transparent;
            
            z-index: 1;

        }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .projects-wrapper .card h3 {
            
            color: white;
            text-align: center;
			text-shadow:
				-0.05rem 0 0.15rem rgba(0, 0, 0, 0.4),  
				 0.05rem 0 0.15rem rgba(0, 0, 0, 0.4),
				-0.05rem 0 0.15rem rgba(0, 0, 0, 0.4),
				 0.05rem 0 0.15rem rgba(0, 0, 0, 0.4);
            bottom: 0;
            
        }
        @media screen and (max-width: 768px) {
            
            .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .projects-wrapper .card {
                
                width: 100%;
                height: unset;
                
                margin: 1rem 0;
                
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
								
								<h2 class="title"><?php echo $PAGE_TITLE; ?></h2>
								<input type="text" class="search" name="search" placeholder="&#xf002;&#x00a0;&#x00a0;Pesquisar..." minlength="1" maxlength="256" autocomplete="off" value="">
							    
							    <div class="projects-wrapper" name="projects-wrapper">
							        <?php
                                        
                                        switch ($PROJECT_TYPE) {
                                            case "animes":
                                                animes();
                                                break;
                                            case "mangas":
                                                mangas();
                                                break;
                                            case "novels":
                                                novels();
                                                break;
                                        }
                                    
                                    ?>
							    </div>
							    <?php require_once SHARE_PATH; ?>
							    <?php //require_once COMMENTS_PATH; ?>
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
            $(document).ready(function() {
                $("[name='search']").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("[name='projects-wrapper'] a").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
        
    </body>
</html>
