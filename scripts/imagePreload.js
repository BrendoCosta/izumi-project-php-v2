var images = [];

function preload() {
    for (var i = 0; i < arguments.length; i++) {
        images[i] = new Image();
        images[i].src = preload.arguments[i];
    }
}

preload(
    "https://izumiproject.com.br/images/global/logo_small_white.png",
    "https://izumiproject.com.br/images/global/logo_small_dark.png",
    "https://izumiproject.com.br/images/global/logo_small.png",
    "https://izumiproject.com.br/images/global/logo_big_white.png",
    "https://izumiproject.com.br/images/global/logo_big_dark.png",
    "https://izumiproject.com.br/images/global/icon_infoanime_dark.png",
    "https://izumiproject.com.br/images/global/icon_anidb_dark.png",
    "https://izumiproject.com.br/images/global/icon_anidb.png",
    "https://izumiproject.com.br/images/global/icon_anidb_white.png",
    "https://izumiproject.com.br/images/global/icon_infoanime.png",
    "https://izumiproject.com.br/images/global/icon_infoanime_white.png",
    "https://izumiproject.com.br/images/global/icon_cc-by-nc-sa.png",
    "https://izumiproject.com.br/images/global/icon_cc-by-nc-sa_white.png",
    "https://izumiproject.com.br/images/global/mega.png",
    "https://izumiproject.com.br/images/global/patch.png",
    "https://izumiproject.com.br/images/global/torrent.png"
);