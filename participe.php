<?php
    
    require_once $_SERVER["DOCUMENT_ROOT"] . "/include/config.php";
    
    callDataBaseConfig();
    
    $PAGE_TITLE         = "Participe";
    
    if (isset($_POST["send"])) {
        
        $filePath = $_SERVER["DOCUMENT_ROOT"] . "/solicitacoes/solicitacoes.json";
        $status = false;
        
        if (!file_exists($filePath)) {
            
            $jsonFile = fopen($filePath, "w") or exit("error");
            
            flock($jsonFile, LOCK_EX);
                fwrite($jsonFile, "[]") or exit("error");
            flock($jsonFile, LOCK_UN);
            
            fclose($jsonFile);
            
        }
        
        $jsonSend = [
            
            "id"                => uniqid(),
            "data"              => date("Y-m-d H:i:s"),
            "nome"              => htmlentities($_POST["nome"], ENT_QUOTES, "UTF-8"),
            "idade"             => htmlentities($_POST["idade"], ENT_QUOTES, "UTF-8"),
            "email"             => htmlentities($_POST["email"], ENT_QUOTES, "UTF-8"),
            "discord"           => htmlentities($_POST["discord"], ENT_QUOTES, "UTF-8"),
            "whatsapp"          => htmlentities($_POST["whatsapp"], ENT_QUOTES, "UTF-8"),
            "funcao"            => htmlentities($_POST["funcao"], ENT_QUOTES, "UTF-8"),
            "experiencia"       => htmlentities($_POST["experiencia"], ENT_QUOTES, "UTF-8"),
            "tempo-disponivel"  => htmlentities($_POST["tempo"], ENT_QUOTES, "UTF-8"),
            "observacoes"       => htmlentities($_POST["observacoes"], ENT_QUOTES, "UTF-8")
            
        ];
        
        $jsonFile = fopen($filePath, "r+") or exit("error");
        
        flock($jsonFile, LOCK_EX);
        
            $jsonData = json_decode(file_get_contents($filePath), true);
            
            if (!is_array($jsonData)) {
                
                error_log("Invalid JSON file.", 0);
                exit("error");
                
            }
            
            array_push($jsonData, $jsonSend);
            
            $jsonData = json_encode($jsonData, JSON_PRETTY_PRINT);
            
            fwrite($jsonFile, $jsonData) or exit("error");
            
            exit("success");
            
        flock($jsonFile, LOCK_UN);
        
        fclose($jsonFile);
        
    }

?>
<!DOCTYPE html>
<html lang="<?= SITE_LANG; ?>" dir="<?= TEXT_DIR; ?>" translate="<?= ALLOW_TRANSLATE; ?>" data-theme="<?php getTheme(); ?>">
<?php require_once HEAD_PATH; ?>
    <style>
        <?php require_once CSS_FILE_PATH; ?>
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
                                
                                <p>
                                    Membros novos são mais que bem-vindos! Dentro da equipe, cada membro desempenha uma ou mais funções de sua preferência, e cada uma delas são importantes para o produto final. Com a exceção dos tradutores e  revisores, que necessitam ter certos conhecimentos linguísticos prévios, <b>todas as outras funções podem ser ensinadas</b>, a quem se interessar, pelos membros mais experientes do grupo, de acordo com o conhecimento que eles possuem e o tempo livre disponível de cada um deles.
                                </p>
                                <p>
                                    Além disso, é preciso ressaltar que a maioria, senão todas as tarefas listadas abaixo, são repetitivas, demoradas e consequentemente desgastantes. <b>Ter paciência é fundamental.</b> Gostar de café é recomendado.
                                </p>
                                
                                <table>
                                    <tr>
                                        <th>Função</th>
                                        <th>Tarefas</th>
                                        <th>Requisitos Iniciais</th>
                                    </tr>
                                    <tr>
                                        <td>Tradutor</td>
                                        <td>Responsável pela tradução dos diálogos em inglês ou japonês para legendas em português</td>
                                        <td>Domínio intermediário do inglês ou japonês, além do português</td>
                                    </tr>
                                    <tr>
                                        <td>Revisor</td>
                                        <td>Responsável pela revisão ortográfica das legendas traduzidas</td>
                                        <td>Domínio intermediário do português</td>
                                    </tr>
                                    <tr>
                                        <td>Timmer</td>
                                        <td>Responsável pela correta sincronização das legendas com seus respectivos diálogos</td>
                                        <td>—</td>
                                    </tr>
                                    <tr>
                                        <td>Typesetter</td>
                                        <td>Responsável por editar textos escritos em japonês nas cenas</td>
                                        <td>—</td>
                                    </tr>
                                    <tr>
                                        <td>Karaoke Maker</td>
                                        <td>Responsável pelo karaoke de músicas e seus efeitos gráficos</td>
                                        <td>—</td>
                                    </tr>
                                    <tr>
                                        <td>Encoder</td>
                                        <td>Responsável pela codificação dos episódios em arquivos de vídeo menores</td>
                                        <td>Possuir um PC eficiente o suficiente para codificar os arquivos em um tempo aceitável</td>
                                    </tr>
                                    <tr>
                                        <td>Editor</td>
                                        <td>Responsável pela edição gráfica das páginas de um mangá</td>
                                        <td>—</td>
                                    </tr>
                                </table>
                                
                                <h2 class="title">Formulário de Solicitação</h2>
                                
                                <p>
                                    Caso deseje entrar para o grupo, preencha corretamente o formulário abaixo e clique em "enviar solicitação". Entraremos em contato com você preferencialmente pelo primeiro meio de contato informado assim que analisarmos sua solicitação.
                                </p>
                                
                                <form class="post-box">
                                    <h2>Dados Pessoais</h2>
                                    
                                    <p>Nome <span style="color: var(--red);">(obrigatório)</span></p>
                                    <input type="text" name="nome" required>
                                    <p>Idade <span style="color: var(--red);">(obrigatório)</span></p>
                                    <input type="text" name="idade" required>
                                    
                                    <h2>Meios de Contato</h2>
                                    <p>Informe ao menos uma opção <span style="color: var(--red);">(obrigatório)</span></p>
                                    
                                    <p>Email</p>
                                    <input type="text" name="email">
                                    <p>Discord</p>
                                    <input type="text" name="discord">
                                    <p>WhatsApp</p>
                                    <input type="text" name="whatsapp">
                                    
                                    <h2>Requisição</h2>
                                    
                                    <p>Função que deseja desempenhar <span style="color: var(--red);">(obrigatório)</span></p>
                                    
                                    <div class="select-wrapper">
                                        <select name="funcao" required>
                                            <option value="">Escolha</option>
                                            <option value="tradutor">Tradutor</option>
                                            <option value="revisor">Revisor</option>
                                            <option value="timmer">Timmer</option>
                                            <option value="typesetter">Typesetter</option>
                                            <option value="karaoke maker">Karaoke Maker</option>
                                            <option value="encoder">Encoder</option>
                                            <option value="editor">Editor</option>
                                        </select>
                                    </div>
                                    
                                    <p>Possui experiência? <span style="color: var(--red);">(obrigatório)</span></p>
                                    
                                    <div class="select-wrapper">
                                        <select name="experiencia" required>
                                            <option value="">Escolha</option>
                                            <option value="não">Não</option>
                                            <option value="sim">Sim</option>
                                        </select>
                                    </div>
                                    
                                    <p>Tempo disponível que você teria para o projeto <span style="color: var(--red);">(obrigatório)</span></p>
                                    
                                    <div class="select-wrapper">
                                        <select name="tempo" required>
                                            <option value="">Escolha</option>
                                            <option value="1 hora">1 hora</option>
                                            <option value="2 horas">2 horas</option>
                                            <option value="3 horas ou mais">3 horas ou mais</option>
                                        </select>
                                    </div>
                                    
                                    <p>Deseja fazer observações?</p>
                                    
                                    <textarea type="text" name="observacoes"></textarea>
                                    
                                    <button type="button" class="post-button green" name="send"><i class="fa fa-check" aria-hidden="true"></i> Enviar</button>
                                    
                                </form>
								
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
        <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
        <script>
            
            var button = "[name='send']";
            
            $(button).click(function(e) {
                
                $.validator.messages.required = "";
                
                if ($("form").valid() == false) {
                    
                    alert("É necessário preencher todos os campos obrigatórios");
                    return false;
                    
                } else {
                    
                    var submitData = $("form").serialize();
                    var btnName = $(button).attr("name");
                    var btnVal = $(button).val();
                    var btn = '&'+btnName+'='+btnVal;
                    submitData += btn;
                    
                    e.preventDefault();
                    $(button).attr("disabled", true);
                    
                    $.ajax({
                        type: "POST",
                        url: "participe",
                        data: submitData,
                        success: function(resposta) {
                            
                            if (resposta == "success") {
                                
                                sucessNotification("Formulário enviado com sucesso!", "Entraremos em contato com você pelos meios informados acima assim que pudermos.", 10000);
                                $(this).prop("disabled", true);
                                
                            }
                            
                            if (resposta == "error") {
                                
                                errorNotification("Falha ao enviar o formulário!", "Aguarde 10 segundos e tente enviá-lo novamente.", 10000);
                                
                            }
                             
                        }
                        
                    });
                    
                }
                
            });
            
        </script>
    </body>
</html>