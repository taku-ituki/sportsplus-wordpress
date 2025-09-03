<?php get_header(); ?>
<!-- メインビュー -->
<section class="sub-fv sub-fv-layout">
    <picture class="sub-fv__img">
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/spo.jpg"
            media="(max-width: 767px)" />
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/spo.jpg" alt="メイン画像" />
    </picture>
    <div class="sub-fv__overlay"></div>
    <h1 class="sub-fv__title">application<span>各種申請用紙</span></h1>
</section>
<!-- パンくずリスト -->
<div class="breadcrumbs breadcrumbs-layout">
    <?php get_template_part('parts/breadcrumb'); ?>
</div>
<!-- 各種申請用紙 -->
<section class="application application-layout">
    <div class="inner application__inner">
        <h2 class="application__title section-title">各種申請用紙</h2>
        <p class="application__description">
            スポーツプラスおおはるの講座に関する各種申請用紙がダウンロードできます。<br />
            プリントアウトしてご記入いただき、スポーツプラスおおはる事務所へ持参されることで、各種お手続きがスムーズに行えます。
        </p>
        <?php
        for ($i = 1; $i <= 5; $i++) :
            $section = get_field("application_section_{$i}");
            if (!$section || empty($section['section_title'])) continue;
        ?>
            <div class="application__section">
                <h3 class="application__sub-title"><?php echo esc_html($section['section_title']); ?></h3>
                <ul class="application__list">
                    <?php for ($j = 1; $j <= 3; $j++) :
                        $text = $section["link_{$j}_text"];
                        $url = $section["link_{$j}_url"];
                        if (!empty($text) && !empty($url)) :
                    ?>
                            <li class="application__item">
                                <a href="<?php echo esc_url($url); ?>"><?php echo esc_html($text); ?></a>
                            </li>
                    <?php endif;
                    endfor; ?>
                </ul>
            </div>
        <?php endfor; ?>
    </div>
</section>
<?php get_footer(); ?>