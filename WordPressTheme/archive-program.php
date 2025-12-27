<?php get_header(); ?>

<section class="sub-fv sub-fv-layout">
    <picture class="sub-fv__img">
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/yoga.jpg" media="(max-width: 767px)" />
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/yoga.jpg" alt="sports" />
    </picture>
    <h1 class="sub-fv__title sub-fv__title--program">スポーツ講座<span>sports program</span></h1>
</section>

<!-- パンくず -->
<div class="breadcrumbs breadcrumbs-blog-layout">
    <?php get_template_part('parts/breadcrumb') ?>
</div>
<section class="program-intro program-intro-layout">
    <div class="inner program-intro__inner">
        <h2 class="program-intro__title section-title">
            スポーツ講座のご案内
        </h2>
        <p class="program-intro__text">
            「スポーツプラスおおはる」では、多彩なスポーツ講座を開催しています。ご参加をお待ちしております。
            <br>（※スポーツプラスおおはるへの入会が必要です。）
        </p>
        <div class="program-intro__guide">
            <nav class="program-intro__toc toc">
                <ul class="program-intro__toc-list toc__list">
                    <li class="program-intro__toc-item toc__item"><a href="#archive" class="toc__link">講座一覧</a></li>
                    <li class="program-intro__toc-item toc__item"><a href="#pamphlet" class="toc__link">講座パンフレット</a></li>
                    <li class="program-intro__toc-item toc__item"><a href="#calendar" class="toc__link">カレンダー</a></li>
                    <li class="program-intro__toc-item toc__item"><a href="#availability" class="toc__link">講座の申込状況</a></li>
                </ul>
            </nav>
        </div>
        <!-- お申込リンク -->
        <div class="program__btn common-btn">
            <a class="program__btn-link common-btn__link common-btn__link--color" href="<?php echo esc_url(home_url("/entry#school")) ?>">お申込方法はこちら</a>
        </div>
    </div>
</section>

<section class="program program-layout" id="archive">
    <div class="program__inner inner">
        <h2 class="program__title section-title">講座一覧</h2>

        <!-- カテゴリータブ -->
        <div class="program__category category">
            <ul class="category__list program-tabs js-program-tabs">
                <li class="category__menu category__menu--current"><a href="#" data-slug="all">すべて</a></li>
                <?php
                $terms = get_terms(['taxonomy' => 'program_category', 'hide_empty' => true]);
                foreach ($terms as $term) :
                ?>
                    <li class="category__menu">
                        <a href="#" data-slug="<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- 投稿一覧 -->
        <div id="program-list">
            <ul class="program__list intro-cards">
                <?php
                $args = ['post_type' => 'program', 'posts_per_page' => -1, 'post_status' => 'publish'];
                $program_query = new WP_Query($args);
                if ($program_query->have_posts()) :
                    while ($program_query->have_posts()) : $program_query->the_post();
                        $fallback_src = get_theme_file_uri('/assets/images/common/no-image.jpg');
                        $modal_id = 'programModal_' . get_the_ID();
                ?>
                        <?php
                        $terms = get_the_terms(get_the_ID(), 'program_category');
                        $category_class = '';

                        if ($terms && !is_wp_error($terms)) {
                            foreach ($terms as $term) {
                                $category_class .= ' intro-card--' . esc_attr($term->slug);
                            }
                        }
                        ?>
                        <!-- カード -->
                        <li class="intro-card js-program-modal-open<?php echo $category_class; ?>" data-target="<?php echo esc_attr($modal_id); ?>">
                            <figure class="intro-card__image">
                                <?php if (has_post_thumbnail()) : the_post_thumbnail('medium');
                                else : ?>
                                    <img src="<?php echo esc_url($fallback_src); ?>" alt="no image" loading="lazy">
                                <?php endif; ?>
                            </figure>
                            <div class="intro-card__content">
                                <h3 class="intro-card__title"><?php the_title(); ?></h3>
                                <dl class="intro-card__details">
                                    <div class="intro-card__detail">
                                        <dt>区分</dt>
                                        <dd>
                                            <?php
                                            $terms = get_the_terms(get_the_ID(), 'program_category');
                                            if ($terms && !is_wp_error($terms)) {
                                                // 複数カテゴリーがついている場合は最初の1つだけ表示
                                                echo esc_html($terms[0]->name);
                                            } else {
                                                echo 'カテゴリなし';
                                            }
                                            ?>
                                        </dd>
                                    </div>
                                    <div class="intro-card__detail">
                                        <dt>開催日</dt>
                                        <dd><?php the_field('program_day'); ?></dd>
                                    </div>
                                    <div class="intro-card__detail">
                                        <dt>時間</dt>
                                        <dd><?php the_field('program_time'); ?></dd>
                                    </div>
                                    <div class="intro-card__detail">
                                        <dt>対象</dt>
                                        <dd><?php the_field('program_age'); ?></dd>
                                    </div>
                                    <div class="intro-card__detail">
                                        <dt>講師</dt>
                                        <dd><?php the_field('program_teacher'); ?></dd>
                                    </div>
                                    <div class="intro-card__detail">
                                        <dt>定員</dt>
                                        <dd><?php the_field('program_capacity'); ?></dd>
                                    </div>
                                    <div class="intro-card__detail">
                                        <dt>紹介文</dt>
                                        <dd><?php the_field('program_description'); ?></dd>
                                    </div>
                                </dl>
                            </div>
                        </li>
                    <?php endwhile;
                    echo '</ul>'; // ✅ ul閉じる

                    // ===== モーダル一覧（ulの外） =====
                    rewind_posts();
                    while ($program_query->have_posts()) : $program_query->the_post();
                        $modal_id = 'programModal_' . get_the_ID();
                    ?>
                        <div id="<?php echo esc_attr($modal_id); ?>" class="program__modal js-program-modal" aria-hidden="true">
                            <div class="program__modal-overlay js-program-modal-close"></div>
                            <div class="program__modal-content">
                                <div class="program__modal-close js-program-modal-close">×</div>
                                <div class="program__modal-images">
                                    <?php
                                    for ($i = 1; $i <= 4; $i++) :
                                        $image = get_field('program_modal_image' . $i);
                                        if ($image) :
                                    ?>
                                            <figure class="program__modal-image">
                                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                            </figure>
                                    <?php
                                        endif;
                                    endfor;
                                    ?>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p class="program__no-posts">該当する講座はありません。</p>';
                endif;
                ?>
        </div>
    </div>
</section>

<!-- パンフレット -->
<?php
$program_page = get_page_by_path('program');

$pamphlet_pdf = null;

if ($program_page) {
    $program_page_id = $program_page->ID;
    $pamphlet_pdf = get_field('pamphlet_pdf', $program_page_id);
}
?>

<?php if (!empty($pamphlet_pdf)) : ?>
    <section class="program-pamphlet program-pamphlet-layout" id="pamphlet">
        <div class="inner program-pamphlet__inner">
            <h2 class="program-pamphlet__title section-title">パンフレット</h2>
            <div class="inner program-pamphlet__inner">
                <div class="program-pamphlet__pdf pdf">
                    <embed
                        src="<?php echo esc_url($pamphlet_pdf); ?>"
                        class="pdf__url"
                        type="application/pdf"
                        width="100%"
                        height="600px" />
                </div>
                <div class="access__btn common-btn">
                    <a class="access__btn-link common-btn__link" href="<?php echo esc_url($pamphlet_pdf); ?>" download target="_blank" rel="noopener">
                        PDFをダウンロードする
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<!-- カレンダー -->
<?php
$program_page = get_page_by_path('program');

$month_pdf = null;
$annual_pdf = null;

if ($program_page) {
    $program_page_id = $program_page->ID;

    $month_pdf1 = get_field('month_calendar_pdf_1', $program_page_id);
    $month_pdf2 = get_field('month_calendar_pdf_2', $program_page_id);
    $annual_pdf = get_field('annual_calendar_pdf', $program_page_id);
}
?>

<section class="program-calendar program-calendar-layout" id="calendar">
    <div class="inner program-calendar__inner">
        <h2 class="program-calendar__title section-title">カレンダー</h2>

        <!-- 月間カレンダー -->
        <h3 class="program-calendar__sub-title">月間カレンダー</h3>
        <h4 class="program-calender__month">
            【今月分】
        </h4>
        <?php if (!empty($month_pdf1)) : ?>
            <div class="program-calendar__pdf pdf">
                <embed
                    src="<?php echo esc_url(is_array($month_pdf1) ? $month_pdf1['url'] : $month_pdf1); ?>"
                    class="pdf__url"
                    type="application/pdf"
                    width="100%"
                    height="600px" />
            </div>
            <div class="access__btn common-btn">
                <a class="access__btn-link common-btn__link" href="<?php echo esc_url(is_array($month_pdf1) ? $month_pdf1['url'] : $month_pdf1); ?>" download target="_blank" rel="noopener">PDFをダウンロードする</a>
            </div>
        <?php else : ?>
            <p>月間カレンダーは現在準備中です。</p>
        <?php endif; ?>

        <!-- 月間カレンダー -->
        <h4 class="program-calender__month">
            【翌月分】
        </h4>
        <?php if (!empty($month_pdf2)) : ?>
            <div class="program-calendar__pdf pdf">
                <embed
                    src="<?php echo esc_url(is_array($month_pdf2) ? $month_pdf2['url'] : $month_pdf2); ?>"
                    class="pdf__url"
                    type="application/pdf"
                    width="100%"
                    height="600px" />
            </div>
            <div class="access__btn common-btn">
                <a class="access__btn-link common-btn__link" href="<?php echo esc_url(is_array($month_pdf2) ? $month_pdf2['url'] : $month_pdf2); ?>" download target="_blank" rel="noopener">PDFをダウンロードする</a>
            </div>
        <?php else : ?>
            <p>月間カレンダーは現在準備中です。</p>
        <?php endif; ?>

        <!-- 年間カレンダー -->
        <h3 class="program-calendar__sub-title program-calendar__sub-title-year">年間カレンダー</h3>
        <?php if (!empty($annual_pdf)) : ?>
            <div class="program-calendar__pdf pdf">
                <embed
                    src="<?php echo esc_url(is_array($annual_pdf) ? $annual_pdf['url'] : $annual_pdf); ?>"
                    class="pdf__url"
                    type="application/pdf"
                    width="100%"
                    height="600px" />
            </div>
            <div class="access__btn common-btn">
                <a class="access__btn-link common-btn__link" href="<?php echo esc_url(is_array($annual_pdf) ? $annual_pdf['url'] : $annual_pdf); ?>" download target="_blank" rel="noopener">PDFをダウンロードする</a>
            </div>
        <?php else : ?>
            <p>年間カレンダーは現在準備中です。</p>
        <?php endif; ?>
    </div>
</section>


<?php
// 固定ページ「program」の投稿オブジェクトを取得
$program_page = get_page_by_path('program');

// nullで初期化して安全に扱う
$availability_pdf = null;

if ($program_page) {
    $program_page_id = $program_page->ID;

    // 「program」固定ページからACFフィールドを取得
    $availability_pdf = get_field('availability_pdf', $program_page_id);
}
?>

<section class="program-availability program-availability-layout" id="availability">
    <div class="inner program-availability__inner">
        <h2 class="program-availability__title section-title">講座の申込状況</h2>
        <div class="program-availability__item">
            <div class="program-availability__pdf">
                <?php if (!empty($availability_pdf)) : ?>
                    <embed
                        src="<?php echo esc_url(is_array($availability_pdf) ? $availability_pdf['url'] : $availability_pdf); ?>"
                        type="application/pdf"
                        width="100%"
                        height="600px"
                        class="pdf__url" />

                    <div class="access__btn common-btn">
                        <a
                            class="access__btn-link common-btn__link"
                            href="<?php echo esc_url(is_array($availability_pdf) ? $availability_pdf['url'] : $availability_pdf); ?>"
                            download target="_blank" rel="noopener">
                            PDFをダウンロードする
                        </a>
                    </div>
                <?php else : ?>
                    <p>現在準備中</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>