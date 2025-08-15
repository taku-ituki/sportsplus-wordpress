<?php get_header(); ?>
<!-- メインビュー -->
<section class="sub-fv sub-fv-layout">
    <picture class="sub-fv__img">
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/challenge-view.jpg"
            media="(max-width: 767px)" />
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/challenge-view.jpg" alt="メイン画像" />
    </picture>
    <div class="sub-fv__overlay"></div>
    <h1 class="sub-fv__title">activities<span>活動報告</span></h1>
</section>
<!-- パンくずリスト -->
 <?php get_template_part('parts/breadcrumb') ?>
<div class="blog blog-layout">
    <div class="blog__inner inner">
        <!-- お知らせのカテゴリー切り替え -->
        <div class="blog__category common-category">
            <nav class="blog__category-nav common-category__nav">
                <a href="#">最新</a>
                <a href="#">講座</a>
                <a href="#">部活動地域連携</a>
                <a href="#">スポーツチャレンジ</a>
            </nav>
        </div>
        <?php if ( have_posts() ) : ?>
        <ul class="blog__list blog-list">
            <?php while ( have_posts() ) : the_post(); ?>
            <?php
      // ▼ここでカテゴリー配列を取得（※これを消すと表示できません）
      $cats = get_the_category();
      // 先頭のカテゴリ名を安全に取り出す（ない場合は空文字）
      $cat_name = ! empty( $cats ) ? $cats[0]->name : '';
    ?>
            <li class="blog-list__item">
                <a href="<?php the_permalink(); ?>">
                    <div class="blog-list__item-img">
                        <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail('full'); ?>
                        <?php else : ?>
                        <img src="<?php echo esc_url( get_theme_file_uri('/assets/images/common/no-image.jpg') ); ?>"
                            alt="アイキャッチ画像未設定">
                        <?php endif; ?>
                    </div>
                    <div class="blog-list__item-meta">
                        <time class="blog-list__item-date" datetime="<?php echo esc_attr( get_the_time('Y-m-d') ); ?>">
                            <?php echo esc_html( get_the_time('Y.m.d') ); ?>
                        </time>
                        <?php if ( $cat_name ) : ?>
                        <p class="blog-list__item-category">
                            <?php echo esc_html( $cat_name ); ?>
                        </p>
                        <?php endif; ?>
                    </div>
                    <h3 class="blog-list__item-title"><?php the_title(); ?></h3>
                </a>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php else : ?>
        <p>記事が見つかりませんでした。</p>
        <?php endif; ?>
    </div>
    <!-- ページナビ -->
    <nav class="blog__pagination">
       <?php wp_pagenavi(); ?>
    </nav>
</div>
<?php get_footer(); ?>