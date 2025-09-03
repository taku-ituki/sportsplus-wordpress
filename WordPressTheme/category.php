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
<div class="breadcrumbs breadcrumbs-layout">
    <?php get_template_part('parts/breadcrumb') ?>
</div>
<div class="blog blog-layout">
    <div class="blog__inner inner">
        <!-- カテゴリー一覧 -->
        <div class="category">
            <ul class="category__list">
                <?php
                // 表示中のページのカテゴリーIDを取得
                $current_category_id = get_queried_object_id();

                // 「最新」リンクのクラス判定（トップページ or 投稿一覧）
                $home_class = (is_home() || is_front_page() || is_post_type_archive('post')) ? 'category__menu--current' : '';

                // 「最新」リンク出力（例: /blog にリンク）
                echo '<li class="category__menu ' . $home_class . '">';
                echo '<a href="' . esc_url(home_url('/blog')) . '">一覧</a>';
                echo '</li>';

                // カテゴリー取得と出力
                $categories = get_categories([
                    'orderby' => 'name', // 名前順でソート
                    'order'   => 'ASC',
                    'number'  => 5 // 表示数上限（必要に応じて変更）
                ]);

                if ($categories) {
                    foreach ($categories as $category) {
                        // 表示中のカテゴリーと一致するか判定
                        $category_class = ($current_category_id === $category->term_id) ? 'category__menu--current' : '';

                        echo '<li class="category__menu ' . $category_class . '">';
                        echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">';
                        echo esc_html($category->name);
                        echo '</a>';
                        echo '</li>';
                    }
                }
                ?>
            </ul>
        </div>
        <?php if (have_posts()) : ?>
            <ul class="blog__list blog-list">
                <?php while (have_posts()) : the_post(); ?>
                    <?php
                    // ▼ここでカテゴリー配列を取得（※これを消すと表示できません）
                    $cats = get_the_category();
                    // 先頭のカテゴリ名を安全に取り出す（ない場合は空文字）
                    $cat_name = ! empty($cats) ? $cats[0]->name : '';
                    ?>
                    <li class="blog-list__item">
                        <a href="<?php the_permalink(); ?>">
                            <div class="blog-list__item-img">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('full'); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/common/no-image.jpg')); ?>"
                                        alt="アイキャッチ画像未設定">
                                <?php endif; ?>
                            </div>
                            <div class="blog-list__item-meta">
                                <time class="blog-list__item-date" datetime="<?php echo esc_attr(get_the_time('Y-m-d')); ?>">
                                    <?php echo esc_html(get_the_time('Y.m.d')); ?>
                                </time>
                                <?php if ($cat_name) : ?>
                                    <p class="blog-list__item-category">
                                        <?php echo esc_html($cat_name); ?>
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