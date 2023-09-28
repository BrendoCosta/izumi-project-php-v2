<?php
    
    require_once $_SERVER["DOCUMENT_ROOT"] . "/include/config.php";
    
    callDataBaseConfig();
    
    $PAGE_TITLE         = "Dúvidas";

?>
<!DOCTYPE html>
<html lang="<?= SITE_LANG; ?>" dir="<?= TEXT_DIR; ?>" translate="<?= ALLOW_TRANSLATE; ?>" data-theme="<?php getTheme(); ?>">
<?php require_once HEAD_PATH; ?>
    <style>
        <?php require_once CSS_FILE_PATH; ?>
        .main-wrapper .page-wrapper .content-wrapper .post-body .post-text p.indent {
            
            text-indent: 1rem;
            
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
                                
                                <p>Esta página almeja reunir e esclarecer algumas perguntas frequentes.</p>
                                <div class="post-box">
                                    <h2>ÍNDICE</h2>
                                    <h3>Quanto aos lançamentos</h3>
                                        <p class="indent">&bull; Onde posso fazer o download dos lançamentos dos projetos postados no site?</p>
                                        <p class="indent">&bull; Onde posso encontrar a lista de todos os projetos do grupo?</p>
                                        <p class="indent">&bull; Quais são os métodos de download disponíveis?</p>
                                        <p class="indent">&bull; Quando sairá o episódio/capítulo X do anime/mangá Y?</p>
                                    <h3>Problemas frequentes</h3>
                                        <p class="indent">&bull; Fiz o download, mas o arquivo com o episódio não quer abrir!</p>
                                        <p class="indent">&bull; O arquivo com o episódio abriu, mas a reprodução está travando, com erros na imagem e/ou áudio e legendas dessincronizados!</p>
                                    <h3>Perguntas técnicas</h3>
                                        <p class="indent">&bull; Quais formatos de arquivo são utilizados para a distribuição dos lançamentos?</p>
                                        <p class="indent">&bull; Quais formatos e modos de legendas são utilizados nos episódios?</p>
                                        <p class="indent">&bull; Quais codecs de vídeo e áudio são utilizados nos encodes dos episódios?</p>
                                        <p class="indent">&bull; Por que os arquivos com episódios possuem tamanhos tão grandes?</p>
                                    <h3>Perguntas administrativas</h3>
                                        <p class="indent">&bull; Como posso entrar para o grupo?</p>
                                        <p class="indent">&bull; Vocês aceitam fazer projetos em parceria?</p>
                                </div>
                        
                                <h2 class="title">Quanto aos lançamentos</h2>
                        
                                <h3>Onde posso fazer o download dos lançamentos dos projetos postados no site?</h3>
                                    <p class="indent">&bull; Postamos todos os links de download na seção "Downloads" na página do projeto em questão. Um botão com um link para a página do projeto também pode ser encontrado na postagem do lançamento.</p>
                                <h3>Onde posso encontrar a lista de todos os projetos do grupo?</h3>
                                    <p class="indent">&bull; A lista contendo nossos projetos de anime pode ser encontrada <a href="https://izumiproject.com.br/projetos/animes">aqui</a> e nossos mangás <a href="https://izumiproject.com.br/projetos/mangas">aqui</a>.</p>
                                <h3>Quais são os métodos de download disponíveis?</h3>
                                    <p class="indent">&bull; No momento, só disponibilizamos transferências de arquivos através do download direto de servidores de hospedagem em nuvem e via BitTorrent por <i>tracker</i> público e sem controle de ratio.</p>
                                <h3>Quando sairá o episódio/capítulo X do anime/mangá Y?</h3>
                                    <p class="indent">&bull; Não temos periodicidade quanto aos lançamentos do grupo. Cada membro da equipe possui seu nível de dedicação ao projeto, e paralelamente a isso sua vida e afazeres pessoais. Não há problema algum em perguntar, mas cobrar já é outra história.</p>
                                
                                <h2 class="title">Problemas frequentes</h2>
                        
                                <h3>Fiz o download, mas o arquivo com o episódio não quer abrir!</h3>
                                    <p class="indent">&bull; Certifique-se que haja um reprodutor de vídeo com suporte ao <i>container</i> Matroska (.MKV) e aos <i>codecs</i> utilizados no arquivo em seu dispositivo, e verifique se o arquivo não está corrompido comparando o CRC dele com o informado por nós (<a href="https://izumiproject.com.br/noticias/20200420/crc32--para-que-isso-serve">tutorial disponível aqui</a>).</p>
                                    <p class="indent" style="color: var(--red);"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Embora a maioria das TVs e outros dispositivos atuais venham com suporte ao <i>codec</i> de vídeo H.264/AVC, há casos em que eles não suportam o perfil High 10 e/ou o nível 5.1, utilizados nos <i>encodes</i> dos episódios disponibilizados pelo grupo. Em caso de problemas, recomendamos realizar <i>re-encoding</i> do episódio através do programa <a href="https://handbrake.fr/downloads.php">HandBrake</a>, de modo com que o novo arquivo atenda as limitações (geralmente especificadas no manual do usuário) do dispositivo em questão.</p>
                                <h3>O arquivo com o episódio abriu, mas a reprodução está travando, com erros na imagem e/ou áudio e legendas dessincronizados!</h3>
                                    <p class="indent">&bull; Este problema geralmente ocorre quando seu reprodutor de vídeo suporta os <i>codecs</i> utilizados no arquivo com o episódio, mas não consegue reproduzir o vídeo com um desempenho satisfatório, ocasionando em travamentos, artefatos na imagem e dessincronizações no áudio e/ou nas legendas.
                                    Esse problema é comum de acontecer em computadores, smartphones, tablets e TVs com processadores mais antigos. Para amenizar o problema, recomendamos a utilização dos reprodutores <a href="https://mpv.io/installation/">mpv</a> ou <a href="https://github.com/mpc-hc/mpc-hc/releases">MPC-HC</a>, que são capazes de entregar reproduções com alto desempenho em dispositivos mais simples.
                                    Além disso, recomendamos também que você encerre processos e aplicações conhecidas por consumir muitos recursos do processador, como navegadores de internet e jogos.</p>
                                    <div class="post-image-box">
                                        <figure>
                                            <img src="https://imgur.com/bTu3joq.png" class="post-image full">
                                            <figcaption>Exemplo de um frame normal.</figcaption>
                                        </figure>
                                        <figure>
                                            <img src="https://imgur.com/2SsZWnL.png" class="post-image full">
                                            <figcaption>O mesmo frame, mas com erros ocasionados pelo baixo desempenho no decodificador do reprodutor de vídeo.</figcaption>
                                        </figure>
                                    </div>
                        
                                <h2 class="title">Perguntas técnicas</h2>
                                    
                                <h3>Quais formatos de arquivo são utilizados para a distribuição dos lançamentos?</h3>
                                    <p class="indent">&bull; Em todos os lançamentos de episódios de anime, utilizaremos o <i>container</i> Matroska (.MKV). Não utilizamos MP4 ou AVI. Quanto aos mangás, eles serão distribuidos no formato Portable Document Format (.PDF).</p>
                                <h3>Quais formatos e modos de legendas são utilizados nos episódios?</h3>
                                    <p class="indent">&bull; Em todos os lançamentos, utilizamos o Advanced SubStation Alpha (.ASS) no modo <i>softsub</i>, onde o arquivo de legendas e as fontes tipográficas utilizadas nelas são inclusas no <i>container</i> de mídia, e não no arquivo de vídeo em si.</p>
                                <h3>Quais <i>codecs</i> de vídeo e áudio são utilizados nos <i>encodes</i> dos episódios?</h3>
                                    <p class="indent">&bull; Geralmente utilizamos o <i>codec</i> de vídeo H.264/AVC com o perfil High 10 (também conhecido como Hi10p), 10 bit de profundidade de cor, espaço de cor YUV420P10LE e nível 5.1, enquanto que para o áudio utilizamos o <i>codec</i> AAC-LC com <i>sample rate</i> de 48 kHz e <i>bit rate</i> de 256 kb/s.</p>
                                    <p class="indent"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Vale ressaltar que podemos preferir não realizar <i>encoding</i> em alguns animes mais antigos para preservar tanto a qualidade de imagem quanto a de áudio. Nesses casos, poderão ser utilizados os <i>codecs</i> da mídia de origem dos episódios.</p>
                                <h3>Vocês disponibilizam lançamentos de episódios em H.265/HEVC?</h3>
                                    <p class="indent">&bull; No momento não, talvez futuramente.</p>
                                <h3>Por que os arquivos com episódios possuem tamanhos tão grandes?</h3>
                                    <p class="indent">&bull; Sempre tentaremos priorizar uma boa qualidade de imagem e áudio, ao mesmo tempo em que tentaremos manter o tamanho de arquivo em um valor aceitável.
                                    Nosso foco não é o <i>streaming</i>, então não espere ver um episódio de 24 minutos com 70 MB por aqui.</p>
                            
                                <h2 class="title">Perguntas administrativas</h2>
                                
                                <h3>Como posso entrar para o grupo?</h3>
                                    <p class="indent">&bull; Acesse <a href="http://izumiproject.com.br/participe">esta página aqui</a> para mais informações.</p>
                                <h3>Vocês aceitam fazer projetos em parceria?</h3>
                                    <p class="indent">&bull; Claro! Entre em contato conosco através do nosso email, <a href="mailto:contato@izumiproject.com.br">contato@izumiproject.com.br</a>, ou fale diretamente com algum dos administradores do grupo em <a href="https://discord.gg/u7gFSNQfNy">nosso servidor no Discord</a>.</p>
								
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