<?php
    
    require_once $_SERVER["DOCUMENT_ROOT"] . "/include/config.php";
    
    callDataBaseConfig();
    
    $PAGE_TITLE         = "Equipe";

?>
<!DOCTYPE html>
<html lang="<?= SITE_LANG; ?>" dir="<?= TEXT_DIR; ?>" translate="<?= ALLOW_TRANSLATE; ?>" data-theme="<?php getTheme(); ?>">
<?php require_once HEAD_PATH; ?>
    <style>
        <?php require_once CSS_FILE_PATH; ?>
        .card-equipe {
            
            display: flex;
            
            padding: 2rem;
            
            margin-bottom: 1rem;
            
            border: solid 0.1rem var(--border);
            border-radius: 2rem;
            
            box-shadow: 1px 2px 5px 0px var(--post-body-shadow);
            
        }
        .texto-autor {
            
            margin-left: 2rem;
            
        }
        .texto-autor h3, p {
            
            margin-top: 0;
            margin-bottom: 0.5em;
            
        }
        .imagem-autor {
            
            width: 5rem;
            height: 5rem;
            
            border: none;
            border-radius: 50%;
            
            background: white;
            background-image: none;
            background-size: cover;
            background-position: center;
            
        }
        @media screen and (max-width: 768px) {
            .card-equipe {
                display: block;
            }
            .texto-autor {
                
                margin-left: 0;
                margin-top: 1rem;
                
            }
            .texto-autor h3 {
                
                text-align: center;
                
            }
            .imagem-autor {
                display: inherit;
                margin: 0 auto;
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
                                
                                <div class="card-equipe" id="Neofox">
                                    <div class="imagem-autor" style="background-image: url(https://c.disquscdn.com/uploads/users/20531/7584/avatar92.jpg?1610067421);"></div>
                                    <div class="texto-autor">
                                        <h3>Neofox</h3>
                                        <p style="font-size: 0.8em"><b>Funções:</b> Fundador, Tradutor, Revisor, Timmer, Typesetter, Karaoke Maker, Encoder, Uploader</p>
                                        <p>Um universitário que em seu tempo livre também gosta de estudar desenho, computação, história e idiomas.</p>
                                    </div>
                                </div>
                                <div class="card-equipe" id="TwinT">
                                    <div class="imagem-autor" style="background-image: url(https://i.imgur.com/O7WpGQs.jpg);"></div>
                                    <div class="texto-autor">
                                        <h3>TwinT</h3>
                                        <p style="font-size: 0.8em"><b>Funções:</b> Tradutor, Revisor, Editor</p>
                                        <p>Um jovem falido, com uma mesa digitalizadora, mas sem as habilidades de desenhar.</p>
                                    </div>
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
    </body>
</html>