<?php
    
    session_start();
    
    if (isset($_SESSION["login_acess"]) && $_SESSION["login_acess"] === true) {
        
        $_SESSION["login_acess"] = false;
        
        header("Location: admin");
        
    }
    
    require_once $_SERVER['DOCUMENT_ROOT'] . "/include/config.php";
    
    $PAGE_ROBOTS    = "noindex, nofollow, noarchive";
    $PAGE_TITLE     = "Login";
    
    callDataBaseConfig();
    
    if (isset($_POST["submit"]) && isset($_POST["user"]) && isset($_POST["password"])) {
        
        // SANITIZE USER'S INPUT
        
        $retriveEmail = filter_input(INPUT_POST, "user", FILTER_SANITIZE_STRING);
        $retrivePassword = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
        
        $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
        if (mysqli_connect_errno($connection)) {
            
            callErrorPage(mysqli_connect_error($connection));
            mysqli_close($connection);
            die();
            
        } else {
            
            mysqli_set_charset($connection, "utf8mb4");
            
            $query = mysqli_prepare($connection, "SELECT id, email, user, password, lastAcess FROM ".DATABASE_TABLE_USERS." WHERE email = ? AND password = ? LIMIT 1");
            mysqli_stmt_bind_param($query, "ss", $retriveEmail, $retrivePassword);
            
            mysqli_stmt_execute($query);
            $result = mysqli_stmt_get_result($query);
            
            if (mysqli_num_rows($result) > 0) {
                
                while($call = mysqli_fetch_row($result)) {
                
                    // mysqli_fetch_row RETURNS ONLY A SINGLE ROW!
                    
                    $userId         = $call[0];
                    $userEmail      = $call[1];
                    $userName       = $call[2];
                    $userPassword   = $call[3];
                    $userLastAcess  = $call[4];
                    
                    $_SESSION["login_acess"]        = true;
                    $_SESSION["login_error"]        = false;
                    
                    $_SESSION["login_id"]           = $userId;
                    $_SESSION["login_email"]        = $userEmail;
                    $_SESSION["login_name"]         = $userName;
                    $_SESSION["login_password"]     = $userPassword;
                    $_SESSION["login_last_acess"]   = $userLastAcess;
                    
                    // UPDATE USER'S LAST ACESS
                    
                    $userNewAcess   = date("Y-m-d H:i:s");
                    
                    $query = "UPDATE ".DATABASE_TABLE_USERS." SET lastAcess = ? WHERE id = ?";
                    
                    $stmt = mysqli_prepare($connection, $query);
                    mysqli_stmt_bind_param($stmt, "ss", $userNewAcess, $userId);
                
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                    
                }
                
            }
            else {
                
                $_SESSION["login_acess"] = false;
                $_SESSION["login_error"] = true;
                
            }
            
            mysqli_free_result($result);
            
        }
        
        mysqli_close($connection);
        
    }

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
                                <?php
                                    if (isset($_SESSION["login_error"]) && $_SESSION["login_error"] == true) {
                                        
                                        ?><div class="search-result error"><?= "Falha de autenticação. Verifique se suas credenciais estão corretas." ?></div><?php
                                        
                                    }
                                ?>
                                <form>
                                    
                                    <h3>USUÁRIO:</h3>
                                    <input type="text" name="user">
                                    
                                    <h3>SENHA:</h3>
                                    <input type="password" name="password">
                                    
                                    <button class="post-button green" name="submit">Login</button>
                                    
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
            
            var button = "[name='submit']";
            
            $(button).click(function(event) {
                
                var submitData = $("form").serialize();
                var btnName = $(button).attr("name");
                var btnVal = $(button).val();
                var btn = '&'+btnName+'='+btnVal;
                submitData += btn;
                
                event.preventDefault();
                
                $.ajax({
                    type: "POST",
                    url: "login",
                    data: submitData
                });
                
                window.location.reload();
                
            });
            
        </script>
    </body>
</html>