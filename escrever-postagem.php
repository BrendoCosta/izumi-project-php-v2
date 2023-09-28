<?php
    
    /**
     * Create a web friendly URL slug from a string.
     * 
     * Although supported, transliteration is discouraged because
     *     1) most web browsers support UTF-8 characters in URLs
     *     2) transliteration causes a loss of information
     *
     * @author Sean Murphy <sean@iamseanmurphy.com>
     * @copyright Copyright 2012 Sean Murphy. All rights reserved.
     * @license http://creativecommons.org/publicdomain/zero/1.0/
     *
     * @param string $str
     * @param array $options
     * @return string
     */
    function url_slug($str, $options = array()) {
    	// Make sure string is in UTF-8 and strip invalid UTF-8 characters
    	$str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
    	
    	$defaults = array(
    		'delimiter' => '-',
    		'limit' => null,
    		'lowercase' => true,
    		'replacements' => array(),
    		'transliterate' => false,
    	);
    	
    	// Merge options
    	$options = array_merge($defaults, $options);
    	
    	$char_map = array(
    		// Latin
    		'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C', 
    		'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 
    		'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O', 
    		'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH', 
    		'ß' => 'ss', 
    		'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c', 
    		'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 
    		'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o', 
    		'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th', 
    		'ÿ' => 'y',
    
    		// Latin symbols
    		'©' => '(c)',
    
    		// Greek
    		'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
    		'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
    		'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
    		'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
    		'Ϋ' => 'Y',
    		'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
    		'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
    		'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
    		'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
    		'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
    
    		// Turkish
    		'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
    		'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g', 
    
    		// Russian
    		'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
    		'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
    		'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
    		'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
    		'Я' => 'Ya',
    		'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
    		'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
    		'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
    		'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
    		'я' => 'ya',
    
    		// Ukrainian
    		'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
    		'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
    
    		// Czech
    		'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U', 
    		'Ž' => 'Z', 
    		'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
    		'ž' => 'z', 
    
    		// Polish
    		'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z', 
    		'Ż' => 'Z', 
    		'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
    		'ż' => 'z',
    
    		// Latvian
    		'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N', 
    		'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
    		'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
    		'š' => 's', 'ū' => 'u', 'ž' => 'z'
    	);
    	
    	// Make custom replacements
    	$str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
    	
    	// Transliterate characters to ASCII
    	if ($options['transliterate']) {
    		$str = str_replace(array_keys($char_map), $char_map, $str);
    	}
    	
    	// Replace non-alphanumeric characters with our delimiter
    	$str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
    	
    	// Remove duplicate delimiters
    	$str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
    	
    	// Truncate slug to max. characters
    	$str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
    	
    	// Remove delimiter from ends
    	$str = trim($str, $options['delimiter']);
    	
    	return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
    }
    
    session_start();
    
    require_once $_SERVER['DOCUMENT_ROOT'] . "/include/config.php";
    
    callDataBaseConfig();
    
    adminValidate();
    
    $PAGE_TITLE     = "Escrever postagem";
    $PAGE_ROBOTS    = "noindex, nofollow, noarchive";
    
    if (isset($_POST['send'])) {
        
        setlocale(LC_TIME, 'portuguese');
        date_default_timezone_set('America/Buenos_Aires');
        
        $sendId     = date("YmdHis");
        $sendYear   = date("Y");
        $sendMonth  = date("m");
        $sendTitle  = $_POST['title'];
        $sendSlug   = url_slug($_POST['title'], array('transliterate' => true));
        $sendAuthor = $_POST['author'];
        $sendDate   = date('Y-m-d H:i:s');
        $sendTags   = $_POST['tags'];
        $sendImage  = $_POST['image'];
        $sendText   = $_POST['editordata'];
        $sendViews  = 0;
        
        $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
        
        if (mysqli_connect_errno($connection)) {
            
            callErrorPage(mysqli_connect_error($connection));
            mysqli_close($connection);
            die();
            
        } else {
            
            mysqli_set_charset($connection, "utf8mb4");
            
            $query = mysqli_prepare($connection, "INSERT INTO ".DATABASE_TABLE_POST." (id, year, month, title, slug, author, date, tags, image, text, views) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($query, "iiisssssssi", $sendId, $sendYear, $sendMonth, $sendTitle, $sendSlug, $sendAuthor, $sendDate, $sendTags, $sendImage, $sendText, $sendViews);
            
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
                                
                                <div class="top-button-wrapper" style="width: 100%; background: transparent; display: flex;">
                                    <button class="post-button" style="margin-left: 0; margin-bottom: 1em;" onclick="confirmarVoltar()"><i class="fa fa-chevron-left" aria-hidden="true"></i> Voltar</button>
                                </div>
                                
                                <form>
                                    <table>
                                      <tr>
                                        <th>Campo</th>
                                        <th>Valor</th>
                                      </tr>
                                      <tr>
                                        <td>Título</td>
                                        <td><input type="text" name="title"></td>
                                      </tr>
                                      <tr>
                                        <td>Imagem</td>
                                        <td><input type="text" name="image"></td>
                                      </tr>
                                      <tr>
                                        <td>Autor</td>
                                        <td><input type="text" name="author" value="<?= $_SESSION["login_name"] ?>" readonly></td>
                                      </tr>
                                      <tr>
                                        <td>Tags</td>
                                        <td><input type="text" name="tags"></td>
                                      </tr>
                                    </table>
                                    <textarea id="editor" name="editordata"></textarea>
                                    <script>
                                        var simplemde = new SimpleMDE({ element: $("#editor")[0] });
                                        simplemde.value('<p style="text-align: center;">Episódio X – "XXX"</p>\n\n<p>Escreva neste parágrafo aqui.</p>\n\n[<button class="post-button">Download na página do projeto</button>](https://izumiproject.com.br/projetos/animes?id=#)');
                                    </script>
                                    
                                    <button class="post-button green" name="send"><i class="fa fa-check" aria-hidden="true"></i> Enviar</button>
                                    
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
        </script>
        <script type="text/javascript">
            
            var button = "[name='send']";
            
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
                    url: 'escrever-postagem',
                    data: submitData,
                    success: function() {
                        console.log("Successful");
                        alert("✓ Postagem enviada com sucesso!");
                    },
                    error: function() {
                        console.log("Failed");
                        alert("✖ Não foi possível enviar a postagem!");
                    }
                });
                
            });
            
        </script>
    </body>
</html>