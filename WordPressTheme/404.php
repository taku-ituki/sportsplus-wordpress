<?php get_header(); ?>
<!-- パンくずリスト -->
<?php get_template_part('') ?>
<section class="notfound notfound-layout">
    <div class="inner notfound__inner">
        <h2 class="notfound__title">404</h2>
        <p class="notfound__text">お探しのページが見つかりませんでした。</p>
        <div class="notfound__btn common-btn">
            <a class="notfound__btn-link common-btn__link" href="index.php">トップページへ戻る</a>
        </div>
    </div>
</section>
<?php get_footer(); ?>