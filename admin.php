<?php
    
    session_start();
    
    require_once $_SERVER['DOCUMENT_ROOT'] . "/include/config.php";
    
    callDataBaseConfig();
    
    adminValidate();
    
    $PAGE_ROBOTS    = "noindex, nofollow, noarchive";
    $PAGE_TITLE     = "Painel Administrativo";

?>
<!DOCTYPE html>
<html lang="<?= SITE_LANG; ?>" dir="<?= TEXT_DIR; ?>" translate="<?= ALLOW_TRANSLATE; ?>" data-theme="<?php getTheme(); ?>">
<?php require_once HEAD_PATH; ?>
    <style>
        <?php require_once CSS_FILE_PATH; ?>
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text button.post-button { margin: 1rem auto; }
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
                                
                                <a href="https://izumiproject.com.br/escrever-postagem"><button class="post-button">Escrever Postagem</button></a>
                                <a href="https://izumiproject.com.br/editar-postagem"><button class="post-button">Editar Postagem</button></a>
								
							    <?php //require_once SHARE_PATH; ?>
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