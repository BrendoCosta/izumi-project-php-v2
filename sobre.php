<?php
    
    require_once $_SERVER['DOCUMENT_ROOT'] . "/include/config.php";
    
    callDataBaseConfig();
    
    $PAGE_TITLE         = "Sobre nós";

?>
<!DOCTYPE html>
<html lang="<?= SITE_LANG; ?>" dir="<?= TEXT_DIR; ?>" translate="<?= ALLOW_TRANSLATE; ?>" data-theme="<?php getTheme(); ?>">
<?php require_once HEAD_PATH; ?>
    <style>
        <?php require_once CSS_FILE_PATH; ?>
        
        .discord-widget {
            
            width: 17em;
            height: auto;
            background-color: transparent;
            border: none;
            border-radius: 1em;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            align-content: center;
            justify-content: flex-start;
            align-items: center;
            white-space: nowrap;
            
        }
        
        .discord-widget * { font-size: 0.95em; }
        
        .discord-widget .discord-widget-header {
            width: 100%;
            height: 5em;
            background-color: #5865F2;
            border-bottom: 0.2em solid #2F3136;
            display: flex;
            align-items: center;
            flex-direction: row;
            flex-wrap: nowrap;
            color: white;
            padding: 1em;
            
        }
        
        .discord-widget .discord-header-left-wrapper {
            width: 3em;
            height: 3em;
            margin-right: 1em;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: nowrap;
        }
        
        @keyframes discord-icon-hover {
          0%   { transform: rotate(0deg); }
          25%  { transform: rotate(-15deg); }
          50%  { transform: rotate(15deg); }
          100% { transform: rotate(0deg); }
        }
        
        .discord-widget .discord-header-left-wrapper svg {
            
            width: 80%;
            height: 80%;
            
        }
        
        .discord-widget .discord-header-left-wrapper svg:hover {
            
            animation: discord-icon-hover 0.5s;
            animation-timing-function: ease;
            
        }
        
        .discord-widget .discord-widget-header .discord-widget-header-text {
            
            
            
        }
        
        .discord-widget .discord-widget-entry {
            width: 100%;
            background-color: #36393F;
            border-bottom: 0.2em solid #2F3136;
            display: flex;
            align-items: center;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-between;
            padding: 1em 2em 1em 1em;
        }
        
        .discord-widget .discord-widget-entry .discord-widget-entry-right-wrapper { 
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            align-items: center;
        }
        .discord-widget .discord-widget-entry .discord-widget-entry-left-wrapper { 
            
        }
        
        .discord-widget .discord-widget-entry .discord-widget-entry-avatar {
            
            width: 3em;
            height: 3em;
            border: none;
            border-radius: 50%;
            background-color: #2F3136;
            margin-right: 1em;
            overflow: hidden;
            display: flex;
            flex-wrap: nowrap;
            
        }
        
        .discord-widget .discord-widget-entry .discord-widget-entry-avatar img {
            
            width: 100%;
            height: 100%;
            
        }
        
        .discord-widget .discord-widget-entry .discord-widget-entry-text {
            
            color: white;
            
        }
        
        .discord-widget .large-text {
            
            font-weight: bold;
            font-size: larger;
            
        }
        
        .discord-widget .small-text {
            
            font-size: smaller;
            opacity: 90%;
            
        }
        
        .discord-widget .discord-widget-entry .discord-widget-entry-status {
            
            width: 1em;
            height: 1em;
            border: none;
            border-radius: 50%;
            background-color: #2F3136;
            
        }
        
        .discord-widget .discord-widget-entry .discord-widget-entry-status.online { background-color: #43B581; }
        .discord-widget .discord-widget-entry .discord-widget-entry-status.idle { background-color: #FAA61A; }
        .discord-widget .discord-widget-entry .discord-widget-entry-status.dnd { background-color: #F04747; }
        
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
                                    Nosso grupo inicou suas atividades em 12 de janeiro de 2019, a fim de traduzir para o português animes e mangás do gênero moe que não foram traduzidos pela comunidade dos fansubbers ou cujas traduções existentes se perderam. Estamos aqui para trazer ao nosso público cada vez mais animes e mangás na maior qualidade possível!
                                </p>
                                
                                <img class="post-image mid" src="https://i.imgur.com/GvvjSOj.png"/>
								
								<h2 class="title">Aviso legal</h2>
								
								<p>
								    O Izumi☆Project é um grupo informal que agrega fãs de diferentes obras reunidos aqui com o único propósito de entreter, sem obter nenhuma espécie de retorno financeiro direto ou indireto em troca. Nós atuamos nas áreas de <i>fansubbing</i> e <i>scanlation</i> de animações e conteúdo impresso — respectivamente — de obras não-traduzidas para a língua portuguesa ou cujas traduções existentes já não se encontram disponíveis. Não concordamos com, e nem promovemos, a utilização de conteúdos produzidos por terceiros — detentores dos direitos autorais de suas respectivas obras — aqui disponibilizados para fins que entram em conflito com o já citado propósito do grupo.
								</p>
								
								<!--- <div class="discord-widget" id="discord-widget">
								    <div class="discord-widget-header">
								        <div class="discord-header-left-wrapper">
								            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515a.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0a12.64 12.64 0 0 0-.617-1.25a.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057a19.9 19.9 0 0 0 5.993 3.03a.078.078 0 0 0 .084-.028c.462-.63.874-1.295 1.226-1.994a.076.076 0 0 0-.041-.106a13.107 13.107 0 0 1-1.872-.892a.077.077 0 0 1-.008-.128a10.2 10.2 0 0 0 .372-.292a.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127a12.299 12.299 0 0 1-1.873.892a.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028a19.839 19.839 0 0 0 6.002-3.03a.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.956-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.955-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.946 2.418-2.157 2.418z" fill="currentColor"/></svg>
								        </div>
								        <div class="discord-widget-header-text">
								            <span class="large-text">Izumi Project</span><br/>
								            <span class="small-text">9 members online</span>
								        </div>
								    </div>
								    
								    <div class="discord-widget-entry">
								        <div class="discord-widget-entry-right-wrapper">
								            <div class="discord-widget-entry-avatar">
								                <img src="https://cdn.discordapp.com/widget-avatars/KHDrBMLDrbnvSwSAf9W3v3P4-kP-CYBVjJYg87J2PbI/kj-Ajji3zVJAN5xRYvWYtxTW7PmzEGr9HTNzZvfvbLY52e0uHKRSzLzMGKYwVzyv_kv5HHFh-gGb_pmsek4AmmEWVXmyIAalFUbYVYqDCuInAw1Q-MsWeUgdCCE-rFNeWXC2utY7KoMyng" />
								            </div>
								            <div class="discord-widget-entry-text">
								                <span class="large-text">Exemplo</span><br/>
								                <span class="small-text">Genshin Impact</span>
								            </div>
								        </div>
								        <div class="discord-widget-entry-left-wrapper">
								            <div class="discord-widget-entry-status online" title="Online"></div>
								        </div>
								    </div>
								    
								    <div class="discord-widget-entry">
								        <div class="discord-widget-entry-avatar"></div>
								        <div class="discord-widget-entry-status idle" title="Idle"></div>
								    </div>
								    <div class="discord-widget-entry">
								        <div class="discord-widget-entry-avatar"></div>
								        <div class="discord-widget-entry-status dnd" title="Do not disturb"></div>
								    </div>
								</div> -->
								
								<div class="discord-widget" id="discord-widgetb"></div>
								
								<script>
 
								    $.fn.myfunction = function(args) {
								        
								        let element = $(this);
								        let jsonObj = null;

								        $.getJSON(args.url, function(jsonData) {
								            
								            jsonObj = jsonData;
								            //jsonObj = JSON.parse(`{"id": "680168088993398939", "name": "Izumi\u2606Project", "instant_invite": "https://discord.com/invite/fensAfad", "channels": [{"id": "811043576548818984", "name": "\ud83c\udfa7\u30fbM\u00fasica", "position": 0}], "members": [{"id": "0", "username": "[!color] discordColors", "discriminator": "0000", "avatar": null, "status": "online", "avatar_url": "https://cdn.discordapp.com/widget-avatars/0BgFhBeYszu1dsa6ewZRQdpluedV8lP_jLko5yoFFuE/Jm-3M-5jkIUVur0svWgnZFQBLSC76I3NvvWFfOVRFeVImvKJgh6Qt-7IzbCEpvqFXTV2KyG5iIn1eb4pDvQ8FbuqzqAMOk0Ax6e1SuPNvNUrDLcz69InTsCZggk_edXAkwTSw9M6RTlN_w"}, {"id": "1", "username": "AniCris", "discriminator": "0000", "avatar": null, "status": "online", "avatar_url": "https://cdn.discordapp.com/widget-avatars/tWhT9iQzOpwFn4RcflvPUbduCASg_7X_jBmZpq25LmQ/HVojhRpIOvskjlFrAmVYKj-oSgwXQCcDDq5cshiKe5VWCUYDee-RrHjNl5Cuu2gCBRLCc_FlIkxkxa7ZEk_WPBeoozDnP-qUUV73U870P7cRV0FYN1rHmnuTOlyrfWLIL3wzOr-9LBO5NA"}, {"id": "2", "username": "Gabriel Ainsworth", "discriminator": "0000", "avatar": null, "status": "online", "game": {"name": "Genshin Impact"}, "avatar_url": "https://cdn.discordapp.com/widget-avatars/KHDrBMLDrbnvSwSAf9W3v3P4-kP-CYBVjJYg87J2PbI/kj-Ajji3zVJAN5xRYvWYtxTW7PmzEGr9HTNzZvfvbLY52e0uHKRSzLzMGKYwVzyv_kv5HHFh-gGb_pmsek4AmmEWVXmyIAalFUbYVYqDCuInAw1Q-MsWeUgdCCE-rFNeWXC2utY7KoMyng"}, {"id": "3", "username": "Neofokkusu", "discriminator": "0000", "avatar": null, "status": "online", "avatar_url": "https://cdn.discordapp.com/widget-avatars/arfDKhoLCGwGCScn89JeYoyj8azW_KM8H43CeFOLEW8/GFYITGMIrNyz3sHqiH1P4zSZvtKb1UpJ66sWUm1TUgw-XYVX8W4dFc7rMsT0hwG-1n05l63fqBICVXwfC0Z3SbUnWW6C8ilXdCCV3z_sUf2sL__Ll35N70mPJeeFqAIIyUPmidOKyonTZg"}, {"id": "4", "username": "Noismoscada", "discriminator": "0000", "avatar": null, "status": "online", "avatar_url": "https://cdn.discordapp.com/widget-avatars/ylw7tQenh1Onn78ZHCsb0PmxNvagDWZF1TMFVLPkf4c/tGNdFn3hCjGy0NjcIjMPcDa8afKj7zVtT2mI7ACLCl52sxXX8sxVIhXWWIydE-KnPThOaHAdoutoANK6Y5FX6DximvTdE0fO-r_RMy4gQT1nkELhMbgFmbXu_CfZfg4VQckVuLTxSKT4HQ"}, {"id": "5", "username": "Rudra", "discriminator": "0000", "avatar": null, "status": "dnd", "avatar_url": "https://cdn.discordapp.com/widget-avatars/1xw5TikFEeSHThfxwZENEIHUGsf3P8EvCEWMgb04llY/nbjueU_P4Val-15jfhJerMVQyTDFkZcev6aQNnqI_AJb4tvr-AoqnDR1XKa3YjeUBsw232b5KHQo3ctf_c0vKyClDXhkx-jQVN6rc2SxoW8NqzIMSqijvFMBV5GkHmReVR1D8s0KSzpwYw"}, {"id": "6", "username": "Yukari", "discriminator": "0000", "avatar": null, "status": "online", "avatar_url": "https://cdn.discordapp.com/widget-avatars/NGrFztySbKfdt6R2d0j0uT5rq30ZK9pFfOy3ZNSo918/BqvgnjbfTTdZeuF2WLV7eC0CZqsMVcCHr-AcAqd4AqOP6yUOVvlNyQ9vLUDiS03F0qX1ynuAvmQ_2aYvkYqXGAY1Qv-nvIaQhyrly4Tx6p7pcO6pWMQta0sv1cEffiL4O7psY1vOH1CMzw"}], "presence_count": 9}`);
								            
								            console.log("Widget iniciado " + (args.a + args.b));
								            console.log(jsonObj);
								            
								            let usersHtml = '<p>AAAAAAAAAAAA</p>';
								        
								            element.append(`
								                <div class="discord-widget-header">
								                    <div class="discord-header-left-wrapper">
								                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515a.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0a12.64 12.64 0 0 0-.617-1.25a.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057a19.9 19.9 0 0 0 5.993 3.03a.078.078 0 0 0 .084-.028c.462-.63.874-1.295 1.226-1.994a.076.076 0 0 0-.041-.106a13.107 13.107 0 0 1-1.872-.892a.077.077 0 0 1-.008-.128a10.2 10.2 0 0 0 .372-.292a.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127a12.299 12.299 0 0 1-1.873.892a.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028a19.839 19.839 0 0 0 6.002-3.03a.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.956-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419c0-1.333.955-2.419 2.157-2.419c1.21 0 2.176 1.096 2.157 2.42c0 1.333-.946 2.418-2.157 2.418z" fill="currentColor"/></svg>
								                    </div>
            								        <div class="discord-widget-header-text">
            								            <span class="large-text">${jsonObj["name"]}</span><br/>
            								            <span class="small-text">${jsonObj["presence_count"]} Members Online</span>
            								        </div>
								                </div>
								            `);
								            
								            jsonObj["members"].forEach(function(member) {
								                
								                if ((member.username).length > 16) member.username = (member.username).substring(0, 16) + "...";
                                                
                                                let memberGame = "";
                                                
                                                if (typeof member.game !== 'undefined') {
                                                    memberGame = member.game.name;
                                                }
                                                
                                                element.append(`
    								                <div class="discord-widget-entry">
    								                    <div class="discord-widget-entry-right-wrapper">
    								                        <div class="discord-widget-entry-avatar">
    								                            <img src="${member.avatar_url}" />
    								                        </div>
    								                        <div class="discord-widget-entry-text">
    								                            <span class="large-text">${member.username}</span><br/>
    								                            <span class="small-text">${memberGame}</span>
    								                        </div>
    								                    </div>
    								                    <div class="discord-widget-entry-left-wrapper"><div class="discord-widget-entry-status ${member.status}" title="${member.status}"></div></div>
    								                </div>
    								            `);
								            
                                            });
                                            
                                            element.append(``);
								            
								        });
								        
								    };
								    
								    $("#discord-widgetb").myfunction({
								        url: "https://discord.com/api/guilds/680168088993398939/widget.json",
								        a: 2,
								        b: 3
								    });
								    
								</script>
								
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