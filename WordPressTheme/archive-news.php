<?php get_header(); ?>
<!-- パンくずリスト -->
<div class="breadcrumbs breadcrumbs-blog-layout">
  <?php get_template_part('parts/breadcrumb') ?>
</div>
<section class="news news-layout">
  <div class="news__inner inner">
    <h2 class="news__title">お知らせ</h2>

    <!-- お知らせ記事：カスタム投稿「news」のサブループ -->
    <?php
    // WP_Queryを使用してカスタム投稿タイプ「news」の投稿を取得
    $args = array(
      'post_type'      => 'news',             // ← 正しいカスタム投稿タイプ名
      'posts_per_page' => 10,                 // 最大10件表示
      'post_status'    => 'publish',          // 公開済みの記事のみ
    );
    $news_query = new WP_Query($args);
    ?>
    <?php if ($news_query->have_posts()) : ?>
      <ul class="news__list list">
        <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
          <li class="list__item">
            <a href="<?php the_permalink(); ?>">
              <div class="news__meta list__item-meta">
                <time class="news__date list__item-date" datetime="<?php echo get_the_date('Y-m-d'); ?>">
                  <?php echo get_the_date('Y.m.d'); ?>
                </time>
                <!-- カスタムタクソノミー「news_category」を使ってカテゴリを表示 -->
                <?php
                $terms = get_the_terms(get_the_ID(), 'news_category'); // ← カスタムタクソノミー名に合わせて変更
                if ($terms && !is_wp_error($terms)) :
                  $term = $terms[0]; // 最初のカテゴリのみ表示
                ?>
                  <p class="news__category list__item-category"><?php echo esc_html($term->name); ?></p>
                <?php endif; ?>
              </div>
              <p class="news__title list__item-title"><?php the_title(); ?></p>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
      <?php wp_reset_postdata(); ?>
    <?php else : ?>
      <p>現在お知らせはありません。</p>
    <?php endif; ?>
  </div>
</section>
<!-- ページナビ -->
<nav class="news__pagination">
  <?php wp_pagenavi(); ?>
</nav>
</div>
<?php get_footer(); ?>