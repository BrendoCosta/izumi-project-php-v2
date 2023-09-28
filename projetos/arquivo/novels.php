<?php
    
    require_once $_SERVER['DOCUMENT_ROOT'] . "/include/config.php";
    
    callDataBaseConfig();
    
    $PAGE_TITLE         = "Novels";
    $IS_A_PROJECT       = false;
    
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        
        if (ctype_digit($_GET['id']) == true) {
            
            $PAGE_ID = intval(preg_replace('/[^0-9]+/', '', $_GET['id']), 10);
            
            $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
    
            if ($connection->connect_errno) {
                
                callErrorPage($connection->connect_error);
                $connection->close();
                die();
                
            }
            else {
                
                $connection->set_charset('utf8mb4');
                
                $query = "SELECT * FROM " . DATABASE_TABLE_NOVELS . " WHERE id=" . $PAGE_ID;
                $result = mysqli_query($connection, $query);
                
                if (mysqli_num_rows($result) > 0) {
                    
                    while($call = mysqli_fetch_assoc($result)) {
                    
                        $NOVEL_TITLE            = $call['titulo'];
                        $PAGE_TITLE = $NOVEL_TITLE;
                        $NOVEL_ORIGINAL_TITLE   = $call['tituloOriginal'];
                        $NOVEL_COVER            = $call['capa'];
                        $NOVEL_IMAGE            = $call['imagem'];
                        $NOVEL_AUTHOR           = $call['autor'];
                        $NOVEL_ILUST            = $call['ilustrador'];
                        $NOVEL_START_DATE       = $call['dataInicio'];
                        $NOVEL_END_DATE         = $call['dataFim'];
                        $NOVEL_VOLUMES          = $call['volumes'];
                        $NOVEL_SINOPSIS         = $call['sinopse'];
                        $NOVEL_STATUS           = $call['estado'];
                        
                    }
                    
                    $IS_A_PROJECT = true;
                    
                }
                else {
                    
                    callPageError("404");
                    
                }
                
                $connection->close();
                
            }
            
            
        }
        else {
            
            callPageError("404");
            
        }
        
    }

?>
<!DOCTYPE html>
<html lang='pt-BR'>
<?php require_once HEAD_PATH; ?>
    <style>
        
        .column {
            float: left;
            width: 48%;
            padding: 1em;
        }
        /* Clearfix (clear floats) */
        .row::after {
            content: "";
            clear: both;
            display: table;
        }
        @media screen and (max-width: 768px) { 
            .column { width: 100%; }
        }
        #pesquisa {
            font-family: "Quicksand", sans-serif;
            font-size: 1em;
            font-weight: bold;
            color: var(--postSection);
            background-color: var(--wrapper);
            border-radius: 25px;
            border: solid 3px var(--postSection);
            padding: 1em;
            text-align: left;
            text-decoration: none;
            display: inline-block;
            position: relative;
            width: -webkit-fill-available;
            width: -moz-available;
            box-sizing: border-box;
            margin-top: 1.2em;
            margin-bottom: 1.2em;
        }
        ::placeholder {
            color: var(--postSection);
        }
        ::-ms-input-placeholder {
            color: var(--postSection);
        }
        .ol-row {
            width: auto;
            padding-inline-start: 6%;
            background: transparent;
        }
        .card {
            margin-right: 3em;
            margin-bottom: 3em;
            position: relative;
            display: inline-block;
            width: 15.8em;
            height: 24em;
            border: none;
            transition: 0.3s;
            box-sizing: border-box;
            color: white;
            overflow: hidden;
            float: left;
            border-radius: 1em;
            background: var(--wrapper);
            box-shadow: 1px 2px 5px 0px var(--shadow);
        }
        .card::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 25%;
            box-sizing: border-box;
            background-image: linear-gradient(to top, black, transparent);
            opacity: 0.5;
            left: 0;
            bottom: 0;
            z-index: 2;
        }
        .card img {
            margin: 0 auto;
            width: 100%;
            height: 100%;
            transition: transform 300ms;
            z-index: 1;
        }
        .card:hover > img {
            transform: scale(1.2)
        }
        .card-top {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: auto;
            padding: 0.5em;
            background: transparent;
            z-index: 3;
        }
        .card-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: auto;
            padding: 0.5em;
            background: transparent;
            z-index: 3;
        }
        .card label {
            text-align: center;
            font-family: "Quicksand", sans-serif;
            position: relative;
            display: inline-block;
            background-color: red;
            color: white;
            padding: 0.5em;
            padding-left: 0.7em;
            padding-right: 0.7em;
            min-width: 4em;
            margin-right: 0.1em;
            border-radius: 1em;
            font-size: 0.6em;
            font-weight: bold;
            text-transform: uppercase;
            z-index: 4;
        }
        .card h3 {
            font-family: "Quicksand", sans-serif;
            color: white;
            text-shadow: 0px 0 2px #000000, -1px 0 2px #fff, 0 1px 2px #000000, 0 -1px 2px #000000, 1px 1px #000000, -1px -1px 2px #000000, 1px -1px 2px #000000, -1px 1px 2px #000000;
            bottom: 0;
        }
        .clear {
            clear:both;
        }
        ul, li {
            list-style: none;
        }
        @media screen and (max-width: 768px) {
            .ol-row {
                width: auto;
                padding-inline-start: 0;
                background: transparent;
            }
            .card {
                display: block;
                margin: 0 auto;
                margin-bottom: 2em;
                float: none;
            }
        }
    </style>
    <body>
        <?php require_once SIDEHEADER_PATH; ?>
        <div id='wrapper'>
            <?php require_once HEADER_PATH; ?>
            <div id='content-wrapper'>
                <div id="content">
                    <div id='post-wrapper' style="width: 100%;">
                        <div class='post-container' style="width: 100%;">
                            <div class='post-text'>
                                <h2 class="post-titulo"><?php echo $PAGE_TITLE; ?></h2>
                                <hr class="hr-titulo" />
                                <input id="pesquisa" onkeyup="if (!window.__cfRLUnblockHandlers) return false; pesquisar()" type="text" placeholder="&#128269; Pesquisar anime por nome...">
                                <ol id="list" class="ol-row">
                                    <?php
                                        
                                        $connection = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
                                        
                                        if ($connection->connect_errno) {
                                        
                                            callErrorPage($connection->connect_error);
                                            $connection->close();
                                            die();
                                        
                                        }
                                        else {
                                            
                                            $connection->set_charset("utf8mb4");
                                            
                                            $query = "SELECT id, titulo, capa, volumes, estado FROM ". DATABASE_TABLE_NOVELS ." ORDER BY titulo";
                                            $result = mysqli_query($connection, $query);
                                            
                                            while($call = mysqli_fetch_assoc($result)) {
                                                echo "<li>\n";
                                                echo "  <a href='" . $call['id'] . "'>\n";
                                                echo "      <div class='card' title='" . $call['titulo']  . "'>\n";
                                                echo "          <img src='" . $call['capa'] . "' />\n";
                                                echo "          <div class='card-top'>\n";
                                                echo "              <label style='background: #a55eea;'><i class='fa fa-book' aria-hidden='true'></i> ". $call['volumes'] ." volumes</label>\n";
                                                switch ($call['estado']) {
                                                    case "Concluído":
                                                        echo "              <label style='background: #2bcbba;'><i class='fa fa-check' aria-hidden='true'></i> Concluído</label>\n";
                                                    break;
                                                    case "Em andamento":
                                                        echo "              <label style='background: #fed330;'><i class='fa fa-clock-o' aria-hidden='true'></i> Em andamento</label>\n";
                                                    break;
                                                    case "Planejado":
                                                        echo "              <label style='background: #a55eea;'><i class='fa fa-clock-o' aria-hidden='true'></i> Planejado</label>\n";
                                                    break;
                                                    case "Cancelado":
                                                        echo "              <label style='background: #eb3b5a;'><i class='fa fa-times' aria-hidden='true'></i> Cancelado</label>\n";
                                                    default:
                                                        echo "              <label style='background: white; color: black;'>" . $call['estado'] . "</label>\n";
                                                }
                                                echo "          </div>\n";
                                                echo "          <div class='card-bottom'>\n";
                                                echo "              <center><h3>" . $call['titulo'] . "</h3></center>\n";
                                                echo "          </div>\n";
                                                echo "      </div>\n";
                                                echo "  </a>\n";
                                                echo "</li>";
                                            }
                                            
                                            $connection->close();
                                            
                                        }
                                    ?>
                                    <div class="clear"></div>
                                </ol>
                            </div>
                            <?php require_once SHARE_PATH; ?>
                        </div>
                    </div>
                </div>
            <?php require_once FOOTER_PATH; ?>
            </div>
        </div>
        <?php require_once SCRIPTS_PATH; ?>
        <script type="text/javascript">
    	    // Barra de pesquisa
    		function pesquisar() {
        	    let input = document.getElementById('pesquisa').value
        		input=input.toLowerCase();
        		let x = document.getElementsByClassName('card');
        		for (i = 0; i < x.length; i++) {
            	    if (!x[i].innerHTML.toLowerCase().includes(input)) {
                        x[i].style.display="none";
            		}
            		else {
                        x[i].style.display="inline-block";
            		}
        		}
    		}
    	</script>
    </body>
</html>