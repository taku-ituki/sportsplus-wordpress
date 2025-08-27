<?php get_header(); ?>
<!-- パンくずリスト -->
<div class="breadcrumbs breadcrumbs-single-news-layout">
    <div class="breadcrumbs__inner inner">
        <?php get_template_part('parts/breadcrumb'); ?>
    </div>
</div>
<section class="single-news single-news-layout">
    <div class="single-news__inner inner">
        <!-- 日付とカテゴリ -->
        <div class="single-news__meta">
            <time class="single-news__date" datetime="<?php echo get_the_date('Y-m-d'); ?>">
                <?php echo get_the_date('Y.m.d'); ?>
            </time>
            <?php
            $terms = get_the_terms(get_the_ID(), 'news_category');
            if ($terms && !is_wp_error($terms)) :
                echo '<p class="single-news__category">' . esc_html($terms[0]->name) . '</p>';
            endif;
            ?>
        </div>

        <!-- タイトル -->
        <h1 class="single-news__title"><?php the_title(); ?></h1>

        <!-- 本文 -->
        <div class="single-news__content">
            <?php the_content(); ?>
        </div>
        <!-- 一覧ページへのリンク -->
        <div class="page-link">
            <div class="page-link__inner">
                <div class="page-link__archive">
                    <a href="<?php echo esc_url(home_url('/news')); ?>">お知らせ一覧へ戻る</a>
                </div>
            </div>
        </div>

    </div>
</section>
<?php get_footer(); ?>