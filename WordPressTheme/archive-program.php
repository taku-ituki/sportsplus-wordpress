<?php get_header(); ?>
<section class="sub-fv sub-fv-layout">
    <picture class="sub-fv__img">
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/yoga.jpg" media="(max-width: 767px)" />
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/yoga.jpg" alt="sports" />
    </picture>
    <h1 class="sub-fv__title sub-fv__title--program">sports program<span>スポーツ講座</span></h1>
</section>

<!-- パンくず -->
<div class="breadcrumbs breadcrumbs-blog-layout">
    <?php get_template_part('parts/breadcrumb') ?>
</div>
<section class="program program-layout">
    <div class="program__inner inner">
        <h2 class="program__title section-title">スポーツ講座のご案内</h2>

        <!-- カテゴリータブ -->
        <div class="program__category category">
            <ul class="category__list program-tabs js-program-tabs">
                <li class="category__menu category__menu--current"><a href="#" data-slug="all">すべて</a></li>
                <?php
                $terms = get_terms([
                    'taxonomy' => 'program_category',
                    'hide_empty' => true,
                ]);
                foreach ($terms as $term) :
                ?>
                    <li class="category__menu"><a href="#" data-slug="<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- 投稿一覧（Ajax対象） -->
        <div id="program-list">
            <ul class="program__list intro-cards">
                <?php
                $args = [
                    'post_type' => 'program',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                ];
                $program_query = new WP_Query($args);
                if ($program_query->have_posts()) :
                    while ($program_query->have_posts()) : $program_query->the_post();
                ?>
                        <li class="intro-card">
                            <?php
                            $fallback_src = get_theme_file_uri('/assets/images/common/no-image.jpg');
                            ?>
                            <figure class="intro-card__image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium'); ?>
                                <?php else : ?>
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
<?php get_footer(); ?>