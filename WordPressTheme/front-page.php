<?php get_header(); ?>
<!-- ローディングアニメーション -->
<div class="loading js-loading">
    <div class="loading__img">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/logo.svg" alt="ロゴ" loading="lazy" />
    </div>
</div>
<!-- メインビューのセクション -->
<div class="mv">
    <div class="mv__inner mv__scroll-inner">
        <div class="mv__scroll-track">
            <?php
            $prefix = 'slide_image_';
            $rows = 3;
            $images_per_row = 3;

            for ($row = 1; $row <= $rows; $row++) :
                $start = ($row - 1) * $images_per_row + 1;
                $end = $start + $images_per_row - 1;

                echo "<!-- row $row -->";

            ?>
                <div class="mv__scroll-row mv__scroll-row--row<?php echo $row; ?>">
                    <?php for ($loop = 0; $loop < 10; $loop++): ?>
                        <?php for ($i = $start; $i <= $end; $i++): ?>
                            <?php
                            $image_url = get_field($prefix . $i);
                            echo "<!-- image: $prefix$i -->";

                            if ($image_url): ?>
                                <img src="<?php echo esc_url($image_url); ?>" alt="スライド画像">
                            <?php else: ?>
                                <?php echo "<!-- $prefix$i is empty -->"; ?>
                            <?php endif; ?>
                        <?php endfor; ?>
                    <?php endfor; ?>
                </div>
            <?php endfor; ?>
        </div>

        <div class="mv__title">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/main.png" alt="メンビューのアイコン" />
        </div>
    </div>
</div>
</section>
<section class="top-news top-news-layout" id="news">
    <div class="top-news__inner inner">
        <h2 class="top-news__title section-title">お知らせ</h2>

        <!-- タブ -->
        <ul class="top-news__tabs category__list js-top-news__tabs">
            <li class="category__menu category__menu--current">
                <a href="#" data-slug="all">最新</a>
            </li>
            <li class="category__menu">
                <a href="#" data-slug="info">お知らせ</a>
            </li>
            <li class="category__menu">
                <a href="#" data-slug="boshu">募集</a>
            </li>
        </ul>
        <!-- Ajaxで切り替えるエリア -->
        <div id="news-list">
            <?php
            $args = [
                'post_type'      => 'news',
                'posts_per_page' => 5,
                'post_status'    => 'publish',
            ];
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
                wp_reset_postdata();
            else :
                echo '<p>現在お知らせはありません。</p>';
            endif;
            ?>
        </div>
        <div class="top-news__btn-wrap common-btn">
            <a class="top-news-btn common-btn__link" href="<?php echo esc_url(home_url("/news")) ?>">お知らせ一覧へ</a>
        </div>
    </div>
</section>


<!-- スポーツプラスおおはるについて -->
<section class="about about-layout" id="about">
    <div class="about__inner inner">
        <h2 class="about__title section-title fade-in js-fadeIn">「スポーツプラス<br />おおはる」について</h2>
        <p class="about__intro fade-in js-fadeIn">
            大治町総合型地域スポーツクラブ　スポーツプラスおおはるは、地域住民のみなさんが主体となって自ら運営・管理する組織として、２０１５年（平成２７年）２月８日に設立されました。
        </p>
        <h3 class="about__sub-title fade-in js-fadeIn">
            【総合型地域スポーツクラブとは】
        </h3>
        <p class="about__sub-intro fade-in js-fadeIn">
            国が提唱している地域住民のための新しいタイプのスポーツクラブです。子供から高齢者まで幅広い年齢層が自分にあった種目を選択できるとともに、初心者から上級者までそれぞれの志向・レベルに合わせて参加でき、住民の健康・体力づくりだけでなく、交流を深める・豊かなコミュニティ形成の場を目指しています。
        </p>
        <h3 class="about__sub-title fade-in js-fadeIn">
            【スポーツプラスおおはるの理念】
        </h3>
        <div class="about-sub-list-block">
            <ul class="about__sub-list fade-in js-fadeIn">
                <li class="about__sub-item fade-in js-fadeIn">
                    <p>大人から子どもまで、いつでも、いつまでも加入できます。</p>
                </li>
                <li class="about__sub-item fade-in js-fadeIn">
                    <p>おもしろく、気軽にスポーツに参加できる環境をつくります。</p>
                </li>
                <li class="about__sub-item fade-in js-fadeIn">
                    <p>ハッピーでプラスαの毎日をおくるために、がんばるみなさんを応援します。</p>
                </li>
            </ul>
        </div>
        <p class="about__sub-intro fade-in js-fadeIn">
            みなさんの健康・体力づくりだけでなく、地域の仲間・豊かなコミュニティづくりもできるクラブとして、大治町を元気にします。
        </p>
    </div>
</section>

<!-- 事業内容 -->
<section class="works works-layout" id="works">
    <div class="works__inner inner">
        <h2 class="works__title section-title fade-in js-fadeIn">実施事業</h2>
        <ul class="works__list works-list">
            <li class="works-list__item fade-in js-fadeIn">
                <div class="works-list__item-img">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/pin.jpg" alt="省略" />
                </div>
                <div class="works-list__item-content-bg">
                    <div class="works-list__item-content">
                        <h3 class="works-list__item-title">スポーツ講座</h3>
                        <p class="works-list__item-text">年間講座
                            、短期講座、イベントがあり、自分に合った運動を楽しむことができます。複数の講座が受講できます。大治町の方はもちろん、町外のどなたでも参加できます！</p>
                        <div class="works-list__item-btn-wrap common-btn">
                            <a class="works-list__item-btn common-btn__link"
                                href="<?php echo esc_url(home_url("/program")) ?>">詳しく見る</a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="works-list__item fade-in js-fadeIn">
                <div class="works-list__item-img">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/track.jpg" alt="省略" />
                </div>
                <div class="works-list__item-content-bg">
                    <div class="works-list__item-content">
                        <h3 class="works-list__item-title">部活動地域展開</h3>
                        <p class="works-list__item-text">
                            学校で「部活動」として活動していた土日の活動を「地域クラブ活動」とし、実業団や競技経験豊富な方が指導に加わるようになります。</p>
                        <div class="works-list__item-btn-wrap common-btn">
                            <a class="works-list__item-btn common-btn__link"
                                href="<?php echo esc_url(home_url("/club")) ?>">詳しく見る</a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="works-list__item fade-in js-fadeIn">
                <div class="works-list__item-img">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/foot.png" alt="省略" />
                </div>
                <div class="works-list__item-content-bg">
                    <div class="works-list__item-content">
                        <h3 class="works-list__item-title">スポーツチャレンジ</h3>
                        <p class="works-list__item-text">子どもたちの体力やコミュニケーション力向上を目指して、球技を中心に様々なレクリエーションをします！</p>
                        <div class="works-list__item-btn-wrap common-btn">
                            <a class="works-list__item-btn common-btn__link"
                                href="<?php echo esc_url(home_url("/challenge")) ?>">詳しく見る</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>
<section class="newsletter newsletter-layout" id="newsletter">
    <div class="inner newsletter__inner">
        <h2 class="newsletter__title section-title fade-in js-fadeIn">会報</h2>
        <ul class="newsletter__list fade-in js-fadeIn">
            <?php
            // PDFとテキストのフィールド名を対応させて配列にまとめる
            $newsletters = [
                ['pdf' => 'newsletter_pdf1', 'text' => 'newsletter_text1'],
                ['pdf' => 'newsletter_pdf2', 'text' => 'newsletter_text2'],
                ['pdf' => 'newsletter_pdf3', 'text' => 'newsletter_text3']
            ];

            // 表示したPDFの数をカウント
            $pdf_count = 0;

            foreach ($newsletters as $item) {
                $pdf_url = get_field($item['pdf']);
                $pdf_text = get_field($item['text']);

                if ($pdf_url) {
                    $pdf_count++;

                    // テキストが未入力ならデフォルト文字を使う
                    $link_text = $pdf_text ? $pdf_text : '会報をダウンロード（' . $pdf_count . '）';
            ?>
                    <li class="newsletter__item fade-in js-fadeIn">
                        <a href="<?php echo esc_url($pdf_url); ?>" target="_blank" rel="noopener">
                            <?php echo esc_html($link_text); ?>
                        </a>
                    </li>
                <?php
                }
            }
            // どのPDFも登録されていない場合
            if ($pdf_count === 0): ?>
                <li class="newsletter__item">
                    <span>現在ダウンロードできる会報はありません</span>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</section>

<!-- faq -->
<!-- <section class="faq faq-layout">
    <div class="faq__inner inner">
        <h2 class="faq__title section-title fade-in js-fadeIn">よくあるご質問</h2>

        <?php $faq_blocks = SCF::get('faq_blocks'); ?>
        <?php if (!empty($faq_blocks)) : ?>
            <?php foreach ($faq_blocks as $block) : ?>
                <?php
                $block_title = esc_html($block['faq_block_title']);
                $block_id = esc_attr($block['faq_block_id']);
                ?>
                <div class="faq__block" id="<?php echo $block_id; ?>">
                    <h3 class="faq__sub-title fade-in js-fadeIn" fade-in js-fadeIn><?php echo $block_title; ?></h3>
                    <ul class="faq-item__accordion-area js-faq-accordion-area fade-in js-fadeIn">

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
                                        <div class="faq-item__accordion-box-text">
                                            <?php echo wp_kses_post($a); ?>
                                        </div>

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
</section> -->

<?php get_footer(); ?>