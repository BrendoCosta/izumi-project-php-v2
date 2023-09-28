<?php
    
    require_once $_SERVER['DOCUMENT_ROOT'] . "/include/config.php";
    
    callDataBaseConfig();
    
    $PAGE_TITLE         = "Doações";

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
                                
                                <p>Para manter o site online e disponibilizar arquivos para download, eu, Neofox, pago mensalmente um plano de hospedagem para o site. Além disso, o domínio .com.br do site é pago anualmente. Abaixo estão tabelados todos os gastos exclusivos do projeto. Os valores podem divergir tanto para cima quanto para baixo, uma vez que as empresas costumam aplicar taxas convertidas do dólar ou do euro para o real e, portanto, os valores dependem das cotações de câmbio dessas duas moedas estrangeiras. Além disso, há casos em que há promoções, cupons de descontos, etc.
                                </p>
                                
                                <table>
                                    <tr>
                                        <th>Serviço</th>
                                        <th>Custo mensal</th>
                                        <th>Custo anual</th>
                                        <th>Total</th>
                                    </tr>
                                    <tr>
                                        <td>Hospedagem do site <br /><span style="font-size: 0.8em;"><a href="https://alphimedia.com/">Serviço pela Alphimedia</a></span></td>
                                        <td>R$ 9,99</td>
                                        <td>R$ 119,88</td>
                                        <td rowspan="3">R$ 179,87</td>
                                    </tr>
                                    <tr>
                                        <td>Domínio do site <br /><span style="font-size: 0.8em;"><a href="https://www.hostinger.com.br">Serviço pela Hostinger</a></span></td>
                                        <td>R$ 4,99</td>
                                        <td>R$ 59,99</td>
                                    </tr>
                                    <tr>
                                        <td>Hospedagem dos arquivos <br /><span style="font-size: 0.8em;"><a href="https://mega.nz">Serviço pela MEGA</a></span></td>
                                        <td>—</td>
                                        <td>—</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" style="font-size: 0.8em;">Última atualização em 4 de janeiro de 2022</td>
                                    </tr>
                                </table>
								
								<h2 class="title">Meios</h2>
								
								<p>
								    Estamos abertos para receber qualquer quantia em doação para ajudar com os gastos do projeto. Para isso, em estamos disponibilizando abaixo uma chave Pix para o projeto.
								</p>
								
								<p style="color: var(--red);"><b>Nota:</b> listarei o valor doado com parte do seu nome no registro de doações abaixo. Opcionalmente, você pode enviar o Pix com a mensagem "Anônimo" caso não queira deixá-lo registrado aqui. Quaisquer eventuais problemas contate a administração do servidor no Discord ou envie um e-mail para contato@izumiproject.com.br 😉</p>
								
								<ul style="text-align: left;">
								    <li><b>Chave Pix:</b> pix@izumiproject.com.br</li>
								    <li><b>Nome:</b> Brendo Costa dos Santos</li>
								    <li><b>Banco:</b> 260 - Nu Pagamentos S.A. - Instituição de Pagamento</li>
								    <li><b>Identificador:</b> DoacaoIzumiProject</li>
								    <li><b>Código do QR Code:</b> 00020126760014BR.GOV.BCB.PIX0123pix@izumiproject.com.br0227Doação para o Izumi Project5204000053039865802BR5923Brendo Costa dos Santos6009SAO PAULO61080540900062220518DoacaoIzumiProject63043AB2</li>
								</ul>
								
								<img class="post-image small" src="https://i.imgur.com/NiensJz.png">
								<p style="text-align: center;"><a href="https://nubank.com.br/pagar/shtpy/1TiGZe4nXn">https://nubank.com.br/pagar/shtpy/1TiGZe4nXn</a></p>
								
								<h2 class="title">Registro de Doações</h2>
								
								<table>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Quantia</th>
                                        <th>Data</th>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="color: var(--red);">Última atualização em 4 de janeiro de 2022</td>
                                    </tr>
                                    <tr>
                                        <td>—</td>
                                        <td>—</td>
                                        <td>—</td>
                                    </tr>
                                    <tr>
                                        <td>—</td>
                                        <td>—</td>
                                        <td>—</td>
                                    </tr>
                                    <tr>
                                        <td>—</td>
                                        <td>—</td>
                                        <td>—</td>
                                    </tr>
                                </table>
								
								<h2 class="title">Registro de Gastos</h2>
								
								<table>
                                    <tr>
                                        <th>Serviço</th>
                                        <th>Quantia</th>
                                        <th>Data</th>
                                    </tr>
                                    <tr>
                                        <td colspan="3" style="color: var(--red);">Última atualização em 4 de janeiro de 2022</td>
                                    </tr>
                                    <tr>
                                        <td>—</td>
                                        <td>—</td>
                                        <td>—</td>
                                    </tr>
                                    <tr>
                                        <td>—</td>
                                        <td>—</td>
                                        <td>—</td>
                                    </tr>
                                    <tr>
                                        <td>—</td>
                                        <td>—</td>
                                        <td>—</td>
                                    </tr>
                                </table>
								
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