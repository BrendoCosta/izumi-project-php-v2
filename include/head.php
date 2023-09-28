<head>
    <?php
    
        $PAGE_TITLE         = strip_tags($PAGE_TITLE);
        $PAGE_DESCRIPTION   = strip_tags($PAGE_DESCRIPTION);
        $PAGE_AUTHOR        = strip_tags($PAGE_AUTHOR);
        $PAGE_TAGS          = strip_tags($PAGE_TAGS);
        $PAGE_IMAGE_PATH    = strip_tags($PAGE_IMAGE_PATH);
        $PAGE_IMAGE_WIDTH   = strip_tags($PAGE_IMAGE_WIDTH);
        $PAGE_IMAGE_HEIGHT  = strip_tags($PAGE_IMAGE_HEIGHT);
        
        $PAGE_TITLE         = str_replace('"', "'", $PAGE_TITLE);
        $PAGE_DESCRIPTION   = str_replace('"', "'", $PAGE_DESCRIPTION);
        $PAGE_AUTHOR        = str_replace('"', "'", $PAGE_AUTHOR);
        $PAGE_TAGS          = str_replace('"', "'", $PAGE_TAGS);
        $PAGE_IMAGE_PATH    = str_replace('"', "'", $PAGE_IMAGE_PATH);
        $PAGE_IMAGE_WIDTH   = str_replace('"', "'", $PAGE_IMAGE_WIDTH);
        $PAGE_IMAGE_HEIGHT  = str_replace('"', "'", $PAGE_IMAGE_HEIGHT);
        
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="<?= $PAGE_TITLE; ?>">
    <meta name="description" content="<?= $PAGE_DESCRIPTION; ?>">
    <meta name="author" content="<?= $PAGE_AUTHOR; ?>">
    <meta name="keywords" content="<?= $PAGE_TAGS; ?>, <?= SITE_GLOBAL_TAGS; ?>">
    <meta name="robots" content="<?= $PAGE_ROBOTS ?>">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn"t work if you view the page via file:// -->
    <!--[if lte IE 9]>
    <script type="text/javascript" integrity="<?= HTML5SHIV_INTEGRITY; ?>" crossorigin="<?= HTML5SHIV_CROSSORIGIN; ?>" src="<?= HTML5SHIV_PATH; ?>"></script>
    <script type="text/javascript" integrity="<?= RESPONDJS_INTEGRITY; ?>" crossorigin="<?= RESPONDJS_CROSSORIGIN; ?>" src="<?= RESPONDJS_PATH; ?>"></script>
    <![endif]-->
    
    <script type="text/javascript" integrity="<?= JQUERY_INTEGRITY; ?>" crossorigin="<?= JQUERY_CROSSORIGIN; ?>" src="<?= PATH_JQUERY; ?>"></script>
    
    <link rel="shortcut icon" type="image/png" href="<?= FAVICON_PATH; ?>">
    <!-- <link rel="stylesheet" type="text/css" href="<?= CSS_PATH; ?>"> -->
    
    <script src="https://kit.fontawesome.com/cb7f44a31a.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" type="text/css" href="<?= FONTAWESOME_PATH; ?>"> -->
    
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= SLICK_CSS_PATH; ?>">
    <link rel="stylesheet" type="text/css" href="<?= SLICK_THEME_PATH; ?>">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <meta property="og:locale" content="<?= PAGE_LOCALE; ?>">
    <meta property="og:site_name" content="<?= SITE_NAME; ?>">
    <meta property="og:type" content="<?= PAGE_TYPE; ?>">
    <meta property="og:title" content="<?= $PAGE_TITLE; ?>">
    <meta property="og:description" content="<?= $PAGE_DESCRIPTION; ?>">
    <meta property="og:url" content="<?= PAGE_URL; ?>">
    <meta property="og:image" content="<?= $PAGE_IMAGE_PATH; ?>">
    <meta property="og:image:type" content="<?= $PAGE_IMAGE_TYPE; ?>">
    <meta property="og:image:width" content="<?= $PAGE_IMAGE_WIDTH; ?>">
    <meta property="og:image:height" content="<?= $PAGE_IMAGE_HEIGHT; ?>">
    <meta name="twitter:text:title" content="<?= $PAGE_TITLE; ?>">
    <meta name="twitter:image" content="<?= $PAGE_IMAGE_PATH; ?>">
    <meta name="twitter:card" content="summary_large_image">
    
    <title><?php if (parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) == '/') {echo SITE_NAME;} else {echo $PAGE_TITLE . TITLE_SEPARATOR . SITE_NAME;} ?></title>
    
</head>