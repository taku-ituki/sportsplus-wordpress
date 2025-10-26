</main>
<div class="overlay js-overlay"></div>
<footer class="footer footer-layout">
    <div class="footer__inner inner">
        <div class="footer__box-wrap">
            <div class="footer__box">
                <div class="footer__box-left">
                    <ul class="footer__list">
                        <li class="footer__item">
                            <a class="footer__item-link" href="<?php echo esc_url(home_url("/")) ?>">トップページ</a>
                        </li>
                        <li class="footer__item">
                            <div class="footer__item-link">実施事業</div>
                            <ul class="footer__sub-list">
                                <li class="footer__sub-item">
                                    <a class="footer__sub-item-link" href="<?php echo esc_url(home_url("/program")) ?>">スポーツ講座</a>
                                </li>
                                <li class="footer__sub-item">
                                    <a class="footer__sub-item-link" href="<?php echo esc_url(home_url("/club")) ?>">部活動地域展開</a>
                                </li>
                                <li class="footer__sub-item">
                                    <a class="footer__sub-item-link" href="<?php echo esc_url(home_url("/challenge")) ?>">スポーツチャレンジ</a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer__item">
                            <div class="footer__item-link">施設案内</div>
                            <ul class="footer__sub-list">
                                <li class="footer__sub-item">
                                    <a class="footer__sub-item-link" href="<?php echo esc_url(home_url("/guide")) ?>">施設案内</a>
                                </li>
                                <li class="footer__sub-item">
                                    <a class="footer__sub-item-link" href="<?php echo esc_url(home_url("/support")) ?>">賛助団体</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="footer__box-right">
                    <ul class="footer__list">
                        <li class="footer__item">
                            <a class="footer__item-link" href="<?php echo esc_url(home_url("/entry")) ?>">会員募集</a>
                        </li>
                        <li class="footer__item">
                            <a class="footer__item-link" href="<?php echo esc_url(home_url("/blog")) ?>">活動報告</a>
                        </li>
                        <li class="footer__item">
                            <a class="footer__item-link" href="<?php echo esc_url(home_url("/application")) ?>"><span>各種申込用紙</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer__logo">
                <a href="index.php"> <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo.svg"
                        alt="ロゴ" /></a>
            </div>
        </div>
    </div>
    <small class="footer__copy-right">Copyright &copy; 2015 - 2025 Sports plus Oharu.</small>
</footer>
<?php wp_footer(); ?>
</body>

</html>