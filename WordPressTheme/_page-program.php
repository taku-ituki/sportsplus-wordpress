<?php get_header(); ?>
<!-- メインビュー -->
<section class="sub-fv sub-fv-layout">
    <picture class="sub-fv__img">
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/yoga.jpg"
            media="(max-width: 767px)" />
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/yoga.jpg" alt="diving" />
    </picture>
    <h1 class="sub-fv__title sub-fv__title--program">sports program<span>スポーツ講座</span></h1>
</section>
<!-- パンくずリスト -->
<?php get_template_part('parts/breadcrumb'); ?>
<section class="program program-layout">
    <div class="program__inner inner">
        <h2 class="program__title section-title">スポーツ講座のご案内</h2>

        <!-- カテゴリータブ -->
        <div class="program__category category">
            <ul class="category__list js-program-tabs">
                <li class="category__menu category__menu--current"><a href="#" data-slug="all">すべて</a></li>
                <li class="category__menu"><a href="#" data-slug="annual">年間講座</a></li>
                <li class="category__menu"><a href="#" data-slug="short">短期講座</a></li>
                <li class="category__menu"><a href="#" data-slug="event">イベント</a></li>
            </ul>
        </div>

        <!-- 投稿一覧エリア（Ajaxで切り替え） -->
        <div id="program-list">
            <ul class="program__list intro-cards">
                <?php
                $args = [
                    'post_type'      => 'program_list',
                    'posts_per_page' => -1,
                    'post_status'    => 'publish',
                ];
                $program_query = new WP_Query($args);
                if ($program_query->have_posts()) :
                    while ($program_query->have_posts()) : $program_query->the_post();
                ?>
                        <li class="intro-card">
                            <figure class="intro-card__image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium'); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/noimage.jpg'); ?>" alt="">
                                <?php endif; ?>
                            </figure>
                            <div class="intro-card__content">
                                <div class="intro-card__header">
                                    <span class="intro-card__number"></span>
                                    <h3 class="intro-card__title"><?php the_title(); ?></h3>
                                </div>
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
                    wp_reset_postdata();
                else :
                    echo '<p class="program__no-posts">該当する講座はありません。</p>';
                endif;
                ?>
            </ul>
        </div>
    </div>
</section>


<!-- 申し込み状況 -->
<section class="entry-status entry-status-layout">
    <div class="entry-status__inner inner">
        <h2 class="entry-status__title section-title">講座別入会者数</h2>
        <div class="entry-status__pdf pdf">
            <embed-pdf src="<?php echo get_theme_file_uri(); ?>/assets/images/common/school.pdf" class="pdf__url">
            </embed-pdf>
        </div>
    </div>
    <div class="entry-status__btn common-btn">
        <a class="entry-status__btn-link common-btn__link" href="<?php echo esc_url(home_url("/entry")) ?>">お申し込みの流れ</a>
    </div>
</section>
<?php get_footer(); ?>