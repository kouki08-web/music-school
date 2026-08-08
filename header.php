<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/header-icon.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet"  type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
    <title>きたむらミュージックスクール</title>
    <?php wp_head(); ?>
</head>
<body style="display: none;" <?php
    $extra_body_classes = array();
    if ( is_page( 'plan' ) ) {
        $extra_body_classes[] = 'page-plan';
    }
    if ( is_singular( 'result' ) ) {
        $extra_body_classes[] = 'page-result-details';
    }
    if ( is_page( 'contact' ) ) {
        $extra_body_classes[] = 'page-contact';
    }
    if ( is_page( 'contact-send' ) ) {
        $extra_body_classes[] = 'page-contact-send';
    }
    body_class( $extra_body_classes );
?>>
    <div id="container">
        <header class="header">
            <button id="js-hamburger" class="hamburger" aria-label="メニューを開く" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="header-menu">
            <nav>
                <?php
                wp_nav_menu(
                array(
                    'menu_class'     => 'l-header__nav-ul',
                    'theme_location' => 'primary',
                    'container'      => false,
                )
                );
                ?>
            </nav>
        </div>
        <div id="js-overlay" class="overlay"></div>
        <div class="inner">
            <div class="header__left"> 
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header__link">
                    <div class="header__image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/header-icon.svg" alt="ヘッダーアイコン">
                    </div>
                    <h1 class="header__logo">きたむら<br class="pc"><span>ミュージックスクール</span></h1>
                </a>
            </div>
            <nav class="header__nav pc">
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/plan/')); ?>"><span>料金</span></a></li>
                    <li><a href="<?php echo esc_url(get_post_type_archive_link('blog')); ?>"><span>ブログ</span></a></li>
                    <li><a href="<?php echo esc_url(get_post_type_archive_link('result')); ?>"><span>卒業実績</span></a></li>
                    <li class="nav-contact"><a href="<?php echo esc_url(home_url('contact')); ?>">お問い合わせ</a></li>
                </ul>
            </nav>
        </div>
        </header>