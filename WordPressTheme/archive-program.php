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
            <br>各種教室については、下記「講座一覧」をご覧ください。
        </p>
    </div>
</section>
<section class="program program-layout">
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
                        <!-- カード -->
                        <li class="intro-card js-program-modal-open" data-target="<?php echo esc_attr($modal_id); ?>">
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

    <!-- お申込リンク -->
    <div class="program__btn common-btn">
        <a class="program__btn-link common-btn__link" href="<?php echo esc_url(home_url("/entry")) ?>">お申込方法はこちら</a>
    </div>
</section>

<?php
// 講座申し込み状況PDF
$pdf_page = get_page_by_path('program-pdf');
$pdf_page_id = $pdf_page ? $pdf_page->ID : null;
$pdf_availability = get_field('pdf_availability', $pdf_page_id);
?>

<section class="program-availability program-availability-layout">
    <div class="inner program-availability__inner">
        <h2 class="program-availability__title section-title">講座の申し込み状況</h2>
        <div class="program-availability__item">
            <div class="program-availability__pdf">
                <?php if ($pdf_availability) : ?>
                    <embed src="<?php echo esc_url($pdf_availability); ?>" type="application/pdf" width="100%" height="600px" class="pdf__url" />
                    <div class="access__btn common-btn">
                        <a class="access__btn-link common-btn__link" href="<?php echo esc_url($pdf_availability); ?>" download target="_blank" rel="noopener">PDFをダウンロードする</a>
                    </div>
                <?php else : ?>
                    <p>現在準備中</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>