<?php
    
    if (!isset($_GET["id"])) {
        
        header("Location: https://izumiproject.com.br/projetos?p=mangas");
        die();
        
    }
    else {
        
        $PROJECT_ID = $_GET["id"];
        
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
                
                $PAGE_TITLE         = $call['title'];
                $PAGE_AUTHOR        = $call['author'];
                $PAGE_TAGS          = $call['title'];
                $PAGE_IMAGE_PATH    = $call['image'];
                $PAGE_DESCRIPTION   = $call['synopsis'];
                
                $PROJECT_TITLE          = $call['title'];
                $PROJECT_ORIGINAL_TITLE = $call['originalTitle'];
                $PROJECT_IMAGE          = $call['image'];
                $PROJECT_AUTHOR         = $call['author'];
                $PROJECT_ILLUSTRATOR    = $call['illustrator'];
                $PROJECT_START          = $call['start'];
                $PROJECT_END            = $call['end'];
                $PROJECT_CHAPTERS       = $call['chapters'];
                $PROJECT_VOLUMES        = $call['volumes'];
                $PROJECT_SYNOPSIS       = $call['synopsis'];
                $PROJECT_STATUS         = $call['status'];
                
            }
            
        } else {
            header("Location: https://izumiproject.com.br/projetos?p=mangas");
            die();
        }
        
        mysqli_free_result($result);
        mysqli_stmt_close($query);
        
    }

    mysqli_close($connection);

?>
<!DOCTYPE html>
<html lang="<?= SITE_LANG; ?>" dir="<?= TEXT_DIR; ?>" translate="<?= ALLOW_TRANSLATE; ?>" data-theme="<?php getTheme(); ?>">
<?php require_once HEAD_PATH; ?>
    <style>
        <?php require_once CSS_FILE_PATH; ?>
        @keyframes header-animation {
          0% {background-position-y: 0;}
          50% {background-position-y: 50%;}
          100% {background-position-y: 0;}
        }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-header {
            animation: header-animation 60s infinite;
        }
        .colunaPoster {
            width: 75%;
            height: auto;
            margin: 1em;
            background: transparent;
            float: left;
        }
        .imgPoster {
            width: 28%;
            background: transparent;
            margin-right: 2em;
            display: block;
            border-radius: 1em;
            box-shadow: 1px 2px 5px 0px var(--shadow);
        }
        .clear { clear:both; }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .download-wrapper {
            width: 100%; 
            height: auto; 
            display: flex; 
            background: transparent;
        }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .download-wrapper.intro {
            padding: 2em;
        }
        .post-text p {
            text-align: unset;
        }
        .post-text p.sinopse {
            text-align: justify;
        }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .download-wrapper .download-column {
            
            width: 50%;
            
            display: flex;
            flex-direction: column;
            align-content: center;
            justify-content: flex-start;
            align-items: center;
            
            background: transparent;
            
        }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .download-wrapper .download-column h2 {
            
            color: var(--titleA);
            text-align: center;
            
        }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .download-wrapper .download-column .download-links-wrapper {
            
            height: 4rem;
            
            display: flex;
            flex-direction: row;
            align-content: center;
            justify-content: flex-start;
            align-items: center;
            
            color: white;
            
            margin-bottom: 1rem;
            
            padding-right: 0.5rem;
            
            background: var(--themeD);
            box-shadow: 1px 2px 5px 0px var(--post-body-shadow);
            
            border-radius: 5rem;
            
            overflow: hidden;
            
        }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .download-wrapper .download-column .online-button {
            
            height: 4rem;
            
        }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .download-wrapper .download-column .download-links-wrapper label { 

            width: fit-content;
            width: -moz-max-content;
            height: 100%;
            
            display: flex;
            align-items: center;
            
            text-align: center;
            font-weight: bold;
            
            padding: 0 1.5rem 0 1.5rem;
            
            background: var(--themeA);
            
        }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .download-wrapper .download-column .download-links-wrapper .downloadSeparator {
            
            width: 0.1vh;
            height: 1.5rem;
            
            background: var(--post-body-text);
            
        }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .download-wrapper .download-column .download-links-wrapper .downloadIcon { 
            
            width: 2rem;
            height: 2rem;
            
            display: flex;
            align-items: center;
            justify-content: center;
            align-content: center;
            
            margin: 0 0.5rem 0 .5rem;
            
            background-image: url(https://izumiproject.com.br/images/global/download/mega.png);
            background-position: center;
            background-repeat: no-repeat;
            background-size: 100%;
            
            border-radius: 50%;
            
            -webkit-backface-visibility: hidden;
            -webkit-transform: translateZ(0) scale(1.0, 1.0);
            
        }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .download-wrapper .download-column .download-links-wrapper .downloadIcon.google-drive {
            background-image: url(https://izumiproject.com.br/images/global/download/google-drive.png);
        }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .download-wrapper .download-column .download-links-wrapper .downloadIcon.torrent {
            background-image: url(https://izumiproject.com.br/images/global/download/torrent.png);
        }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .download-wrapper .download-column .download-links-wrapper .downloadIcon.magnet {
            background-image: url(https://izumiproject.com.br/images/global/download/magnet.png);
        }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .download-wrapper .download-column .download-links-wrapper .downloadIcon.yandex-disk {
            background-image: url(https://izumiproject.com.br/images/global/download/yandex-disk.png);
        }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .download-wrapper .download-column .download-links-wrapper .downloadIcon.patch {
            background-image: url(https://izumiproject.com.br/images/global/download/patch.png);
        }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .download-wrapper .download-column .download-links-wrapper .downloadIcon:hover { 
            transform: translateY(-0.5rem);
        }
        
        @media screen and (max-width: 768px) {
            .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .download-wrapper {
                flex-direction: column;
            }
            .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .download-wrapper .download-column {
                width: 100%;
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
						    <div class="post-header" style="background-image: url(https://izumiproject.com.br/resize?url=<?= $PROJECT_IMAGE ?>&mwidth=1080)">
								<div class="post-header-shadow"></div>
								<div class="post-header-info">
									<h1><?= $PROJECT_TITLE ?></h1>
									<p><span class="iconify" data-icon="eva:star-fill" data-inline="true"></span>&nbsp;&nbsp;Projetos&nbsp;&nbsp;>&nbsp;&nbsp;Mangás&nbsp;&nbsp;>&nbsp;&nbsp;<?= $PROJECT_TITLE ?></p>
								</div>
							</div>
							<div class="post-text">
							    
								<table style="font-size: 0.7em;">
                                    <tr>
                                        <th>Título</th>
                                        <th>Título original</th>
                                        <th>Autor</th>
                                        <th>Início</th>
                                        <th>Fim</th>
                                        <th>Volumes</th>
                                        <th>Capítulos</th>
                                        <th>Estado</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $PROJECT_TITLE; ?></td>
                                        <td><?php echo $PROJECT_ORIGINAL_TITLE; ?></td>
                                        <td><?php echo $PROJECT_AUTHOR; ?></td>
                                        <td><?php echo $PROJECT_START; ?></td>
                                        <td><?php echo $PROJECT_END; ?></td>
                                        <td><?php echo $PROJECT_VOLUMES; ?></td>
                                        <td><?php echo $PROJECT_CHAPTERS; ?></td>
                                        <td>
                                            <?php
                                                if ($PROJECT_STATUS == "Planejado") {
                                                    echo "<span style='color: #a55eea;'><i class='fa fa-clock-o' aria-hidden='true'></i> $PROJECT_STATUS</span>";
                                                }
                                                if ($PROJECT_STATUS == "Em andamento") {
                                                    echo "<span style='color: #fed330;'><i class='fa fa-clock-o' aria-hidden='true'></i> $PROJECT_STATUS</span>";
                                                }
                                                if ($PROJECT_STATUS == "Concluído") {
                                                    echo "<span style='color: #2bcbba;'><i class='fa fa-check' aria-hidden='true'></i> $PROJECT_STATUS</span>";
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                                
                                <h2 class="title">Sinopse</h2>
                                <p class="sinopse"><?= $PROJECT_SYNOPSIS ?></p>
                                
                                <h2 class="title">Downloads</h2>
                                
                                <div class="download-wrapper">
                                    <?php
                                        
                                        $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
            
                                        if (mysqli_connect_errno($connection)) {
                                            
                                            callErrorPage(mysqli_connect_error($connection));
                                            mysqli_close($connection);
                                            die();
                                            
                                        } else {
                                            
                                            mysqli_set_charset($connection, "utf8mb4");
                                            
                                            $query = mysqli_prepare($connection, "SELECT * FROM " . DATABASE_TABLE_MANGAS_RELEASES . " WHERE projectID = ? ORDER BY volume");
                                            mysqli_stmt_bind_param($query, "i", $PROJECT_ID);
                                            
                                            mysqli_stmt_execute($query);
                                            $result = mysqli_stmt_get_result($query);
                                            
                                            echo "<div class='download-column'>";
                                            echo "<h2 class='title'>VOLUMES</h2>";
                                            
                                            if (mysqli_num_rows($result) > 0) {
                                                
                                                while ($call = mysqli_fetch_assoc($result)) {
                                                    
                                                    $mega       = $call['mega'];
                                                    $drive      = $call['drive'];
                                                    $yandex     = $call['yandex'];
                                                    $torrent    = $call['torrent'];
                                                    $magnet     = $call['magnet'];
                                                    $patchA     = $call['patchV1'];
                                                    $patchB     = $call['patchV2'];
                                                    $patchC     = $call['patchV3'];
                                                    $patchD     = $call['patchV4'];
                                                    $patchE     = $call['patchV5'];
                                                    
                                                    echo '<div class="download-links-wrapper">';
                                                    echo '<label>EPISÓDIO ' . $call['episodio'] . '</label>';
                                                    
                                                    if (!empty($mega[$i])) {
                                                        echo '<a title="Download - MEGA" target="_blank" href="' . $mega[$i] . '"><div class="downloadIcon"></div></a>';
                                                        echo '<div class="downloadSeparator"></div>';
                                                    }
                                                    
                                                    if (!empty($drive[$i])) {
                                                        echo '<a title="Download - Google Drive" target="_blank" href="' . $drive[$i] . '"><div class="downloadIcon google-drive"></div></a>';
                                                        echo '<div class="downloadSeparator"></div>';
                                                    }
                                                    if (!empty($yandex[$i])) {
                                                        echo '<a title="Download - Yandex Disk" href="' . $yandex[$i] . '"><div class="downloadIcon yandex-disk"></div></a>';
                                                        echo '<div class="downloadSeparator"></div>';
                                                    }
                                                    if (!empty($torrent[$i])) {
                                                        echo '<a title="Download - Torrent" href="' . $torrent[$i] . '"><div class="downloadIcon torrent"></div></a>';
                                                        echo '<div class="downloadSeparator"></div>';
                                                    }
                                                    if (!empty($magnet[$i])) {
                                                        echo '<a title="Download - Link magnético" href="' . $magnet[$i] . '"><div class="downloadIcon magnet"></div></a>';
                                                    }
                                                    if (!empty($patchA[$i])) {
                                                        echo '<div class="downloadSeparator"></div>';
                                                        echo '<a title="Download - Patch de correção V1" href="' . $patchA[$i] . '"><div class="downloadIcon patch"></div></a>';
                                                    }
                                                    if (!empty($patchB[$i])) {
                                                        echo '<div class="downloadSeparator"></div>';
                                                        echo '<a title="Download - Patch de correção V2" href="' . $patchB[$i] . '"><div class="downloadIcon patch"></div></a>';
                                                    }
                                                    if (!empty($patchC[$i])) {
                                                        echo '<div class="downloadSeparator"></div>';
                                                        echo '<a title="Download - Patch de correção V3" href="' . $patchC[$i] . '"><div class="downloadIcon patch"></div></a>';
                                                    }
                                                    if (!empty($patchD[$i])) {
                                                        echo '<div class="downloadSeparator"></div>';
                                                        echo '<a title="Download - Patch de correção V4" href="' . $patchD[$i] . '"><div class="downloadIcon patch"></div></a>';
                                                    }
                                                    if (!empty($patchE[$i])) {
                                                        echo '<div class="downloadSeparator"></div>';
                                                        echo '<a title="Download - Patch de correção V5" href="' . $patchE[$i] . '"><div class="downloadIcon patch"></div></a>';
                                                    }
                                                    
                                                    echo '</div>';
                                                    
                                                }
                                                
                                                mysqli_data_seek($result, 0);   // Retorna o ponteiro do mysqli_fetch_assoc para a posição 0 a fim de utilizálo novamente
                                                
                                            } else {
                                                echo "<h2>AINDA NÃO HÁ VOLUMES DISPONÍVEIS PARA DOWNLOAD!</h2>";
                                            }
                                            
                                            echo "</div>";
                                            
                                            echo "<div class='download-column'>";
                                            echo "<h2 class='title'>Online</h2>";
                                            echo "<a href='https://izumiproject.com.br/leitor?id=$PROJECT_ID&ch=1'><center><button class='post-button online-button'><i class='fas fa-globe-americas'></i> Leitura Online</button></center></a>";
                                            echo "</div>";
                                            
                                            echo "<div class='clear'></div>";
                                            
                                            mysqli_free_result($result);
                                            mysqli_stmt_close($query);
                                            
                                        }
                                        
                                        mysqli_close($connection);
                                        
                                    ?>
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
    </body>
</html>