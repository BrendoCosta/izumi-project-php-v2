<?php
    
    session_start();
    
    require_once $_SERVER['DOCUMENT_ROOT'] . "/include/config.php";
    
    callDataBaseConfig();
    
    adminValidate();
    
    $PAGE_TITLE     = "Editar postagem";
    $PAGE_ROBOTS    = "noindex, nofollow, noarchive";
    
    $postId = NULL;
    
    if (isset($_GET["id"]) && !empty($_GET["id"])) {
        
        $postId = $_GET["id"];
        
    }
    
    if (isset($_POST['update'])) {
        
        $sendId     = $_POST['oldId'];
        $sendTitle  = $_POST['title'];
        $sendImage  = $_POST['image'];
        $sendAuthor = $_POST['author'];
        $sendDate   = $_POST['date'];
        $sendTags   = $_POST['tags'];
        $sendText   = $_POST['editordata'];
        
        $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
        
        if (mysqli_connect_errno($connection)) {
            
            callErrorPage(mysqli_connect_error($connection));
            mysqli_close($connection);
            die();
            
        } else {
            
            mysqli_set_charset($connection, "utf8mb4");
            
            $query = mysqli_prepare($connection, "UPDATE ".DATABASE_TABLE_POST." SET title=?, image=?, author=?, date=?, tags=?, text=? WHERE id=?");
            mysqli_stmt_bind_param($query, "sssssss", $sendTitle, $sendImage, $sendAuthor, $sendDate, $sendTags, $sendText, $sendId);
            
            mysqli_stmt_execute($query);
            
        }

        mysqli_stmt_close($query);
        mysqli_close($connection);
        
    }

?>
<!DOCTYPE html>
<html lang="<?= SITE_LANG; ?>" dir="<?= TEXT_DIR; ?>" translate="<?= ALLOW_TRANSLATE; ?>" data-theme="<?php getTheme(); ?>">
<?php require_once HEAD_PATH; ?>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
        <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    </head>
    <style>
        <?php require_once CSS_FILE_PATH; ?>
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .top-button-wrapper {
            
            width: 100%;
            
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            
            margin-bottom: 1rem;
            
        }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text .top-button-wrapper button.post-button {
            
            margin: unset;
            
        }
        .note-editor.note-airframe, .note-editor.note-frame {
            
            margin: 1em auto 1rem auto;
            
        }
        .note-editor .note-editing-area .note-editable a {
            
            text-decoration: none;
            
        }
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text input[type=text] {
            
            width: 100%;
            
            color: var(--post-body-text);
            font-size: 1rem;
            
            padding: 1rem;
            
            border: solid 0.2rem var(--themeD);
            border-radius: 5em;
            
            background: var(--post-body);
            
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
                                
                                <div class="top-button-wrapper">
                                    <button class="post-button" onclick="confirmarVoltar()"><i class="fa fa-chevron-left" aria-hidden="true"></i> Voltar</button>
                                    <button class="post-button red" onclick="confirmarApagar()"><i class="fa fa-times" aria-hidden="true"></i> Apagar</button>
                                </div>
                                
                                <form>
                                    <?php
                                        
                                        $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
                            
                                        if (mysqli_connect_errno($connection)) {
                                            
                                            callErrorPage(mysqli_connect_error($connection));
                                            mysqli_close($connection);
                                            die();
                                            
                                        } else {
                                            
                                            mysqli_set_charset($connection, "utf8mb4");
                                            
                                        }
                                        
                                        $query = "";
                                        
                                        if ($postId != NULL) {
                                            
                                            $query = "SELECT * FROM ".DATABASE_TABLE_POST." WHERE id=$postId";
                                            
                                        } else {
                                            
                                            $query = "SELECT * FROM ".DATABASE_TABLE_POST." ORDER BY id DESC LIMIT 1";
                                        
                                        }
                                        
                                        $result = mysqli_query($connection, $query);
                                        
                                        while($call = mysqli_fetch_assoc($result)) {
                                            
                                            if ($postId == NULL) {
                                                $postId = $call['id'];
                                            }
                                            
                                            $postTitulo = $call['title'];
                                            $postAutor = $call['author'];
                                            $postData = $call['date'];
                                            $postTags = $call['tags'];
                                            $postImagem = $call['image'];
                                            $postTexto = $call['text'];
                                            
                                        }
                                        
                                        mysqli_free_result($result);
                                        mysqli_close($connection);
                                        
                                    ?>
                                    <table>
                                        <tr>
                                            <th style="width: 10%;">Campo</th>
                                            <th style="width: 40%;">Valor atual</th>
                                            <th>Valor novo</th>
                                        </tr>
                                        <tr>
                                            <td>Id</td>
                                            <td><input type="text" name="oldId" value="<?php echo $postId; ?>" readonly></td>
                                            <td><input type="text" name="id" value="<?php echo $postId; ?>" readonly></td>
                                        </tr>
                                        <tr>
                                            <td>Título</td>
                                            <td><input type="text" name="oldTitle" value="<?php echo $postTitulo; ?>" readonly></td>
                                            <td><input type="text" name="title" value="<?php echo $postTitulo; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Imagem</td>
                                            <td><input type="text" name="oldImage" value="<?php echo $postImagem; ?>" readonly></td>
                                            <td><input type="text" name="image" value="<?php echo $postImagem; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Autor</td>
                                            <td><input type="text" name="oldAuthor" value="<?php echo $postAutor; ?>" readonly></td>
                                            <td><input type="text" name="author" value="<?php echo $postAutor; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Data</td>
                                            <td><input type="text" name="oldDate" value="<?php echo $postData; ?>" readonly></td>
                                            <td><input type="text" name="date" value="<?php echo $postData; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Tags</td>
                                            <td><input type="text" name="oldTags" value="<?php echo $postTags; ?>" readonly></td>
                                            <td><input type="text" name="tags" value="<?php echo $postTags; ?>"></td>
                                        </tr>
                                    </table>
                                    <textarea id="editor" name="editordata"><?=$postTexto ?></textarea>
                                    <script>
                                        var simplemde = new SimpleMDE({ element: $("#editor")[0] });
                                    </script>
                                    
                                    <button class="post-button green" name="update"><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
                                    
                                </form>
								
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
        <script type="text/javascript">
            function confirmarVoltar() {
              var dialogoVoltar = confirm("Tem certeza que deseja voltar para a página administrativa?\nConteúdo não salvo será perdido!");
              if (dialogoVoltar == true) {
                window.location.replace("https://izumiproject.com.br/admin");
              }
            }
            function confirmarApagar() {
              var dialogoApagar = confirm("Tem certeza que deseja apagar esta postagem?\nEsta ação não pode ser revertida!");
              if (dialogoApagar == true) {
                window.location.replace("https://izumiproject.com.br/apagar-postagem?id=<?php echo $postId; ?>");
              }
            }
        </script>
        <script type="text/javascript">
            
            var button = "[name='update']";
            
            $(button).click(function(event) {
                
                $("#editor").val(simplemde.value());
                var submitData = $('form').serialize();
                var btnName = $(button).attr('name');
                var btnVal = $(button).val();
                var btn = '&'+btnName+'='+btnVal;
                submitData += btn;
                
                event.preventDefault();
                
                $.ajax({
                    type: 'POST',
                    url: 'editar-postagem',
                    data: submitData,
                    success: function() {
                        console.log("Successful");
                        alert("✓ Postagem atualizada com sucesso!");
                    },
                    error: function() {
                        console.log("Failed");
                        alert("✖ Não foi possível atualizar a postagem!");
                    }
                });
                
            });
            
        </script>
    </body>
</html>