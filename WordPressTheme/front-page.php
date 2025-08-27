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
            <div class="mv__scroll-row mv__scroll-row--row1">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/hand1.jpg" alt="スライド画像" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/soccer.jpg" alt="スライド画像" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/baseball.jpg" alt="スライド画像" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/hand1.jpg" alt="スライド画像" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/soccer.jpg" alt="スライド画像" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/baseball.jpg" alt="スライド画像" />
            </div>
            <div class="mv__scroll-row mv__scroll-row--row2">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/pinpon2.jpg" alt="スライド画像" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv01.jpg" alt="スライド画像" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv01.jpg" alt="スライド画像" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/pinpon2.jpg" alt="スライド画像" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv01.jpg" alt="スライド画像" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv01.jpg" alt="スライド画像" />
            </div>
            <div class="mv__scroll-row mv__scroll-row--row3">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv01.jpg" alt="スライド画像" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv01.jpg" alt="スライド画像" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv01.jpg" alt="スライド画像" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv01.jpg" alt="スライド画像" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv01.jpg" alt="スライド画像" />
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/mv01.jpg" alt="スライド画像" />
            </div>
        </div>
        <div class="mv__title">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/main.png" alt="メンビューのアイコン" />
        </div>
    </div>
</div>
<section class="top-news top-news-layout">
    <div class="top-news__inner inner">
        <h2 class="top-news__title section-title">お知らせ</h2>

        <!-- タブ -->
        <ul class="top-news__tabs category__list">
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
                'posts_per_page' => 3,
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
            <a class="top-news-btn common-btn__link" href="<?php echo esc_url(home_url("/news")) ?>">一覧へ</a>
        </div>
    </div>
</section>



<!-- スポーツプラスおおはるについて -->
<section class="about about-layout">
    <div class="about__inner inner">
        <h2 class="about__title section-title fade-in js-fadeIn">「スポーツプラス<br />おおはる」とは</h2>
        <p class="about__intro fade-in js-fadeIn">
            総合型地域スポーツクラブは、人々が、身近な地域でスポ－ツに親しむことのできる新しいタイプのスポーツクラブで、子供から高齢者まで（多世代）、様々なスポーツを愛好する人々が（多種目）、初心者からトップレベルまで、それぞれの志向・レベルに合わせて参加できる（多志向）、という特徴を持ち、地域住民により自主的・主体的に運営されるスポーツクラブです。
            スポーツの振興やスポーツを通じた地域づくりなどに向けた多様な活動を展開し、地域スポーツの担い手としての役割や交流を深める場・豊かなコミュニティ形成の場にもなっています。
        </p>
        <ul class="about__list fade-in js-fadeIn">
            <li class="about__item">
                <div class="about__item-img">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/family.jpg" alt="スポーツクラブアイコン"
                        class="about__icon" />
                </div>
                <h3 class="about__item-title">幅広い年齢層が選べる<br />スポーツクラブ</h3>
                <p class="about__text">子どもから高齢者まで、自分にあった種目を選べて、初心者から上級者まで参加できます。</p>
            </li>
            <li class="about__item">
                <div class="about__item-img">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/run.jpg" alt="健康アイコン"
                        class="about__icon" />
                </div>
                <h3 class="about__item-title">健康・体力づくりの場</h3>
                <p class="about__text">地域住民の健康・体力づくりを目的とし、誰もが楽しく継続できる運動環境を提供します。</p>
            </li>
            <li class="about__item">
                <div class="about__item-img">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/frend.jpg" alt="コミュニティアイコン"
                        class="about__icon" />
                </div>
                <h3 class="about__item-title">交流を深めるコミュニティ</h3>
                <p class="about__text">スポーツを通じて地域住民同士の交流を深め、豊かな地域コミュニティを育みます。</p>
            </li>
        </ul>
    </div>
</section>
<!-- 事業内容 -->
<section class="works works-layout">
    <div class="works__inner inner">
        <h2 class="works__title section-title fade-in js-fadeIn">実施事業</h2>
        <ul class="works__list works-list">
            <li class="works-list__item fade-in js-fadeIn">
                <div class="works-list__item-img">
                    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/works.jpg" alt="省略" />
                </div>
                <div class="works-list__item-content-bg">
                    <div class="works-list__item-content">
                        <h3 class="works-list__item-title">スポーツ講座</h3>
                        <p class="works-list__item-text">年間講座
                            、短期講座、イベントがあり、自分に合った運動を楽しむことができます。複数の講座が受講できます。大治町の方はもちろん、町外のどなたでも参加できます！</p>
                        <div class="works-list__item-btn-wrap common-btn">
                            <a class="works-list__item-btn common-btn__link" href="<?php echo esc_url(home_url("/program")) ?>">詳しく見る</a>
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
                        <h3 class="works-list__item-title">部活動地域連携</h3>
                        <p class="works-list__item-text">
                            学校で「部活動」として活動していた土日の活動を「地域クラブ活動」とし、実業団や競技経験豊富な方が指導に加わるようになります。</p>
                        <div class="works-list__item-btn-wrap common-btn">
                            <a class="works-list__item-btn common-btn__link" href="<?php echo esc_url(home_url("/partnership")) ?>">詳しく見る</a>
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
                            <a class="works-list__item-btn common-btn__link" href="<?php echo esc_url(home_url("/challenge")) ?>">詳しく見る</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>
<!-- 施設案内 -->
<section class="access access-layout">
    <div class="access__inner inner">
        <h2 class="access__title section-title fade-in js-fadeIn">施設案内</h2>
        <div class="access__wrap">
            <!-- 施設情報 -->
            <div class="access__info fade-in js-fadeIn">
                <table class="access__table access-table">
                    <tbody class="access-table__body">
                        <tr class="access-table__row">
                            <th class="access-table__label">住所</th>
                            <td class="access-table__data">
                                <div class="access-table__address">
                                    <span>愛知県海部郡大治町大字北間島字藤田33-1</span>
                                    <span>（大治町スポーツセンター内 1階）</span>
                                </div>
                            </td>
                        </tr>
                        <tr class="access-table__row">
                            <th class="access-table__label">TEL</th>
                            <td class="access-table__data">052-217-6211</td>
                        </tr>
                        <tr class="access-table__row">
                            <th class="access-table__label">営業時間</th>
                            <td class="access-table__data">
                                <div class="access-table__time">
                                    <span class="access-table__day">月・木</span>
                                    <span class="access-table__hour">9:00～17:00</span>
                                </div>
                                <div class="access-table__time">
                                    <span class="access-table__day">日・火・金</span>
                                    <span class="access-table__hour">9:00～12:00</span>
                                </div>
                            </td>
                        </tr>
                        <tr class="access-table__row">
                            <th class="access-table__label">休日</th>
                            <td class="access-table__data">水 ・ 土 ・ 祝日の翌日 ・ 年末年始（１２/２９～１/３）</td>
                        </tr>
                        <tr class="access-table__row">
                            <th class="access-table__label">メール</th>
                            <td class="access-table__data"><a
                                    href="mailto:spplus-oharu@clovernet.ne.jp">spplus-oharu@clovernet.ne.jp</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="access__google">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3261.1261931675376!2d136.8271740757655!3d35.17840717275375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600375fe844192dd%3A0x338b3aa92864acab!2z5aSn5rK755S657eP5ZCI5Z6L5Zyw5Z-f44K544Od44O844OE44Kv44Op44OWIOOCueODneODvOODhOODl-ODqeOCueOBiuOBiuOBr-OCiw!5e0!3m2!1sja!2sjp!4v1746776642662!5m2!1sja!2sjp"
                    width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="access__btn common-btn">
            <a class="access__btn-link common-btn__link" href="<?php echo esc_url(home_url("/access")) ?>">詳しく見る</a>
        </div>
    </div>
</section><?php get_footer(); ?>