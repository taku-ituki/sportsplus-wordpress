<?php

// CSS・JSファイル、Googleフォントの読み込み
function custom_enqueue_scripts()
{
    // Google Fonts
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Noto+Sans+JP:wght@100..900&family=Noto+Serif+JP:wght@200..900&display=swap',
        [],
        null
    );

    // Swiper CSS
    wp_enqueue_style(
        'swiper-css',
        'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css',
        [],
        '8'
    );

    // メインCSS
    wp_enqueue_style(
        'theme-style',
        get_theme_file_uri('/assets/css/style.css'),
        [],
        filemtime(get_theme_file_path('/assets/css/style.css'))
    );

    // jQuery
    // wp_enqueue_script(
    //     'custom-jquery',
    //     get_theme_file_uri('/assets/js/jquery-3.7.1.js'),
    //     [],
    //     '3.7.1',
    //     true
    // );

    wp_enqueue_script('jquery');

    // Swiper JS
    wp_enqueue_script(
        'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js',
        [],
        '8',
        true
    );

    // メインJS
    //Ajaxに必要なコード
    wp_enqueue_script(
        'theme-script',
        get_theme_file_uri('/assets/js/script.js'),
        ['jquery'], // jQuery依存を指定
        filemtime(get_theme_file_path('/assets/js/script.js')),
        true
    );

    // Ajax用のURLをJavaScriptへ渡す
    wp_localize_script('theme-script', 'ajax_news', [
        'url' => admin_url('admin-ajax.php')
    ]);
}
add_action('wp_enqueue_scripts', 'custom_enqueue_scripts');

// アイキャッチ設定やテーマサポート
function my_theme_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ]);
}
add_action('after_setup_theme', 'my_theme_setup');

// アイキャッチの width / height 属性を削除
function remove_thumbnail_dimensions($html)
{
    $html = preg_replace('/(width|height)="\d*"\s/', '', $html);
    return $html;
}
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10);

// 管理画面にアイキャッチプレビュー
function my_admin_post_thumbnail_preview()
{
    global $post;

    if (!isset($post) || !in_array(get_current_screen()->base, ['post', 'page'], true)) {
        return;
    }

    if (has_post_thumbnail($post->ID)) {
        $thumb_url = get_the_post_thumbnail_url($post->ID, 'medium');
?>
        <style>
            .editor-styles-wrapper:before {
                content: '';
                display: block;
                width: 100%;
                max-width: 600px;
                margin: 0 auto 20px;
                background-image: url('<?php echo esc_url($thumb_url); ?>');
                background-size: cover;
                background-position: center;
                aspect-ratio: 16 / 9;
                border: 2px solid #ddd;
                border-radius: 4px;
            }
        </style>
        <?php
    }
}
add_action('admin_head', 'my_admin_post_thumbnail_preview');

// クエリ変数追加
add_filter('query_vars', function ($vars) {
    $vars[] = 'program_category';
    $vars[] = 'news_category';
    return $vars;
});

////////////////////////
// ▼ Ajax: お知らせ（トップページ）
add_action('wp_ajax_filter_news_by_category', 'filter_news_by_category');
add_action('wp_ajax_nopriv_filter_news_by_category', 'filter_news_by_category');

function filter_news_by_category()
{
    $slug = sanitize_text_field($_POST['slug']);

    $args = [
        'post_type'      => 'news',
        'posts_per_page' => 5,
        'post_status'    => 'publish',
    ];

    if ($slug !== 'all') {
        $args['tax_query'] = [
            [
                'taxonomy' => 'news_category',
                'field'    => 'slug',
                'terms'    => $slug,
            ]
        ];
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        echo '<ul class="top-news__list list">';
        while ($query->have_posts()) : $query->the_post(); ?>
            <li class="list__item">
                <a href="<?php the_permalink(); ?>">
                    <div class="list__item-meta">
                        <time class="list__item-date" datetime="<?php echo get_the_date('Y-m-d'); ?>">
                            <?php echo get_the_date('Y.m.d'); ?>
                        </time>
                        <?php
                        $terms = get_the_terms(get_the_ID(), 'news_category');
                        if ($terms && !is_wp_error($terms)) {
                            echo '<p class="list__item-category">' . esc_html($terms[0]->name) . '</p>';
                        }
                        ?>
                    </div>
                    <p class="list__item-title"><?php the_title(); ?></p>
                </a>
            </li>
        <?php endwhile;
        echo '</ul>';
    else :
        echo '<p>現在お知らせはありません。</p>';
    endif;

    wp_die();
}

////////////////////////
// ▼ Ajax: スポーツ講座（program）

add_action('wp_ajax_filter_program_by_category', 'filter_program_by_category');
add_action('wp_ajax_nopriv_filter_program_by_category', 'filter_program_by_category');

function filter_program_by_category()
{
    $slug = isset($_POST['slug']) ? sanitize_text_field($_POST['slug']) : 'all';
    error_log('Ajaxリクエスト受信。Slug: ' . $slug);

    $args = [
        'post_type'      => 'program',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    ];

    if ($slug !== 'all') {
        $args['tax_query'] = [[
            'taxonomy' => 'program_category',
            'field'    => 'slug',
            'terms'    => $slug,
        ]];
    }

    $program_query = new WP_Query($args);

    ob_start();

    if ($program_query->have_posts()) :
        echo '<ul class="program__list intro-cards">';
        while ($program_query->have_posts()) :
            $program_query->the_post();

            $fallback_src = get_theme_file_uri('/assets/images/common/no-image.jpg');
        ?>
            <li class="intro-card">
                <figure class="intro-card__image">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('medium'); ?>
                    <?php else : ?>
                        <img src="<?php echo esc_url($fallback_src); ?>" alt="no image" loading="lazy" />
                    <?php endif; ?>
                </figure>
                <div class="intro-card__content">
                    <h3 class="intro-card__title"><?php the_title(); ?></h3>
                    <dl class="intro-card__details">
                        <div class="intro-card__detail">
                            <dt>開催日</dt>
                            <dd><?php the_field('program_day'); ?></dd>
                        </div>
                        <div class="intro-card__detail">
                            <dt>時間</dt>
                            <dd><?php the_field('program_time'); ?></dd>
                        </div>
                        <div class="intro-card__detail">
                            <dt>対象年齢</dt>
                            <dd><?php the_field('program_age'); ?></dd>
                        </div>
                        <div class="intro-card__detail">
                            <dt>講師</dt>
                            <dd><?php the_field('program_teacher'); ?></dd>
                        </div>
                        <div class="intro-card__detail">
                            <dt>紹介文</dt>
                            <dd><?php the_field('program_description'); ?></dd>
                        </div>
                    </dl>
                </div>
            </li>
<?php
        endwhile;
        echo '</ul>';
        wp_reset_postdata();
    else :
        echo '<p class="program__no-posts">該当する講座はありません。</p>';
    endif;

    echo ob_get_clean();
    wp_die();
}


// 管理画面の「投稿」の名称とアイコンを変更する
function custom_post_menu_label() {
    global $menu;
    global $submenu;

    // 投稿のメニューを「ニュース」に変更
    $menu[5][0] = '活動報告';

    // 投稿 > 投稿一覧のメニュー名を変更
    $submenu['edit.php'][5][0] = '活動報告一覧';
    // 投稿 > 新規追加 のメニュー名を変更
    $submenu['edit.php'][10][0] = '活動報告を追加';
}

add_action('admin_menu', 'custom_post_menu_label');

function custom_post_menu_icon() {
    // メニューアイコンを megaphone（拡声器）アイコンに変更（dashicons）
    echo '
    <style>
        #menu-posts .dashicons-admin-post:before {
            content: "\f330"; /* dashicons-book */
        }
    </style>';
}
add_action('admin_head', 'custom_post_menu_icon');

