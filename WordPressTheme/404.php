<?php get_header(); ?>
<section class="notfound notfound-layout">
    <div class="inner notfound__inner">
        <h2 class="notfound__title">404</h2>
        <p class="notfound__text">お探しのページが見つかりませんでした。</p>
        <div class="notfound__btn common-btn">
            <a class="notfound__btn-link common-btn__link" href="<?php echo esc_url(home_url("/")) ?>">トップページへ戻る</a>
        </div>
    </div>
</section>
<?php get_footer(); ?>