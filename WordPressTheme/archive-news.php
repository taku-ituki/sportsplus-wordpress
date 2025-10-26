<?php get_header(); ?>
<!-- パンくずリスト -->
<div class="breadcrumbs breadcrumbs-blog-layout">
  <?php get_template_part('parts/breadcrumb') ?>
</div>

<section class="news news-layout">
  <div class="news__inner inner">
    <h2 class="news__title">お知らせ</h2>

    <?php if (have_posts()) : ?>
      <ul class="news__list list">
        <?php while (have_posts()) : the_post(); ?>
          <li class="list__item">
            <a href="<?php the_permalink(); ?>">
              <div class="news__meta list__item-meta">
                <time class="news__date list__item-date" datetime="<?php echo get_the_date('Y-m-d'); ?>">
                  <?php echo get_the_date('Y.m.d'); ?>
                </time>
                <?php
                $terms = get_the_terms(get_the_ID(), 'news_category');
                if ($terms && !is_wp_error($terms)) :
                  $term = $terms[0];
                ?>
                  <p class="news__category list__item-category"><?php echo esc_html($term->name); ?></p>
                <?php endif; ?>
              </div>
              <p class="news__title list__item-title"><?php the_title(); ?></p>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php else : ?>
      <p>現在お知らせはありません。</p>
    <?php endif; ?>
  </div>
</section>

<!-- ページナビ：メインループ用にそのまま呼び出し -->
<nav class="news__pagination">
  <?php wp_pagenavi(); ?>
</nav>

<?php get_footer(); ?>