<?php get_header(); ?>
<!-- メインビュー -->
<section class="sub-fv sub-fv-layout">
    <picture class="sub-fv__img">
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/faq.jpg"
            media="(max-width: 767px)" />
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/faq.jpg" alt="diving" />
    </picture>
    <h1 class="sub-fv__title sub-fv__title--faq">q&a<span>よくあるご質問 </span></h1>
</section>

<!-- パンくずリスト -->
<div class="breadcrumbs breadcrumbs-blog-layout">
    <div class="breadcrumbs__inner inner">
        <?php get_template_part('parts/breadcrumb'); ?>
    </div>
</div>
<!-- faq -->
<section class="faq faq-layout">
    <div class="faq__inner inner">
        <h2 class="faq__title section-title">よくあるご質問</h2>

        <?php $faq_blocks = SCF::get('faq_blocks'); ?>
        <?php if (!empty($faq_blocks)) : ?>
            <?php foreach ($faq_blocks as $block) : ?>
                <?php
                $block_title = esc_html($block['faq_block_title']);
                $block_id = esc_attr($block['faq_block_id']);
                ?>
                <div class="faq__block" id="<?php echo $block_id; ?>">
                    <h3 class="faq__sub-title"><?php echo $block_title; ?></h3>
                    <ul class="faq-item__accordion-area js-faq-accordion-area">

                        <?php
                        for ($i = 1; $i <= 10; $i++) :
                            $q = $block["faq_question_{$i}"] ?? '';
                            $a = $block["faq_answer_{$i}"] ?? '';
                            if (!empty($q) && !empty($a)) :
                        ?>
                                <li class="faq-item faq__item">
                                    <div class="faq-item__accordion-title js-faq-accordion-title">
                                        <span class="faq-item__accordion-title-text"><?php echo esc_html($q); ?></span>
                                    </div>
                                    <div class="faq-item__accordion-box js-faq-accordion-box">
                                        <p class="faq-item__accordion-box-text"><?php echo nl2br(esc_html($a)); ?></p>
                                    </div>
                                </li>
                        <?php
                            endif;
                        endfor;
                        ?>

                    </ul>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>