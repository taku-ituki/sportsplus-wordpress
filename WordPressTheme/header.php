<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <?php wp_head(); ?>
</head>

<body>
    <!-- ページトップボタン -->
    <button class="top-button js-top-button"><span></span>TOP</button>
    <header class="header layout-header js-header">
        <div class="header__inner">
            <h1 class="header__logo">
                <a href="<?php echo esc_url(home_url("/")) ?>">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo.svg" alt="ロゴ" />
                </a>
            </h1>
            <nav class="header__nav">
                <ul class="header__nav-list">
                    <li class="header__nav-modal-wrap">
                        <p>実施事業</p>
                        <ul class="header__nav-modal">
                            <li class="header__nav-modal-item">
                                <a href="<?php echo esc_url(home_url("/program")) ?>"><span>スポーツ講座</span></a>
                            </li>
                            <li class="header__nav-modal-item">
                                <a href="<?php echo esc_url(home_url("/club")) ?>"><span>部活動地域展開</span></a>
                            </li>
                            <li class="header__nav-modal-item">
                                <a href="<?php echo esc_url(home_url("/challenge")) ?>"><span>スポーツチャレンジ</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="header__nav-modal-wrap">
                        <p>施設案内</p>
                        <ul class="header__nav-modal">
                            <li class="header__nav-modal-item">
                                <a href="<?php echo esc_url(home_url("/guide")) ?>"><span>施設案内</span></a>
                            </li>
                            <li class="header__nav-modal-item">
                                <a href="<?php echo esc_url(home_url("/support")) ?>"><span>賛助団体</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="header__nav-item">
                        <a href="<?php echo esc_url(home_url("/entry")) ?>"><span>会員募集</span></a>
                    </li>
                    <li class="header__nav-item">
                        <a href="<?php echo esc_url(home_url("/blog")) ?>"><span>活動報告</span></a>
                    </li>
                    <li class="header__nav-item">
                        <a href="<?php echo esc_url(home_url("/application")) ?>"><span>各種申込用紙</span></a>
                    </li>
                    <li class="header__nav-item header__nav-item--access">
                        <a href="mailto:spplus-oharu@clovernet.ne.jp">お問合せ</a>
                    </li>
                </ul>
            </nav>
            <button class="header__hamburger js-hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="header__drawer js-drawer">
                <nav class="header__drawer-nav">
                    <ul class="header__drawer-list">
                        <li class="header__drawer-item">
                            <p class="header__drawer-accordion-title js-drawer-accordion">実施事業</p>
                            <ul class="header__drawer-accordion-list">
                                <li class="header__drawer-accordion-item">
                                    <a href="<?php echo esc_url(home_url("/program")) ?>"><span>スポーツ講座</span></a>
                                </li>
                                <li class="header__drawer-acc-accordion-item">
                                    <a href="<?php echo esc_url(home_url("/club")) ?>">部活動地域展開</a>
                                </li>
                                <li class="header__drawer-accordion-item">
                                    <a href="<?php echo esc_url(home_url("/challenge")) ?>">スポーツチャレンジ</a>
                                </li>
                            </ul>
                        </li>
                        <li class="header__drawer-item">
                            <p class="header__drawer-accordion-title js-drawer-accordion">施設案内</p>
                            <ul class="header__drawer-accordion-list">
                                <li class="header__drawer-accordion-item">
                                    <a href="<?php echo esc_url(home_url("/guide")) ?>">施設案内</a>
                                </li>
                                <li class="header__drawer-accordion-item">
                                    <a href="<?php echo esc_url(home_url("/support")) ?>">賛助団体</a>
                                </li>
                            </ul>
                        </li>
                        <li class="header__drawer-item">
                            <a href="<?php echo esc_url(home_url("/entry")) ?>"><span>会員募集</span></a>
                        </li>
                        <li class="header__drawer-item">
                            <a href="<?php echo esc_url(home_url("/blog")) ?>">活動報告</a>
                        </li>
                        <li class="header__drawer-item">
                            <a href="<?php echo esc_url(home_url("/application")) ?>">各種申込用紙</a>
                        </li>
                        <li class="header__drawer-item">
                            <a href="mailto:spplus-oharu@clovernet.ne.jp">お問合せ</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>