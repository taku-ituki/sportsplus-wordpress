<?php get_header(); ?>
<!-- メインビュー -->
<section class="sub-fv sub-fv-layout">
    <picture class="sub-fv__img">
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/spo.jpg"
            media="(max-width: 767px)" />
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/spo.jpg" alt="diving" />
    </picture>
    <div class="sub-fv__overlay"></div>
    <h2 class="sub-fv__title sub-fv__title--entry">program entry<span>講座お申込の流れ</span></h2>
</section>
<!-- パンくずリスト -->
<div class="breadcrumbs breadcrumbs-blog-layout">
    <?php get_template_part('parts/breadcrumb'); ?>
</div>
<section class="entry entry-layout">
    <div class="entry__inner inner">
        <h2 class="entry__title section-title">講座ご参加までの流れ</h2>
        <p class="entry__lead">ご参加までの流れを4つのステップに分けてご案内します。</p>
        <ul class="entry__steps">
            <li class="entry__step">
                <div class="entry__step-label">step 1</div>
                <div class="entry__step-content">
                    <h3 class="entry__step-heading">講座を選ぶ・内容を確認する</h3>
                    <p class="entry__step-text">
                        パンフレットやホームページで講座をチェックし、受講したい講座を決めます。<br />
                        開講日・対象者・時間なども事前に確認しましょう。
                    </p>
                    <a class="entry__link" href="<?php echo esc_url(home_url("/program")) ?>">講座を見る</a>
                </div>
            </li>
            <li class="entry__step">
                <div class="entry__step-label">step 2</div>
                <div class="entry__step-content">
                    <h3 class="entry__step-heading">申込み手続きをする</h3>
                    <p class="entry__step-text">
                        継続会員・新規会員で申込み開始時期が異なります。<br />
                        申込みは、窓口での提出が必要です。申込書は窓口で受け取るか、
                        <a class="entry__link" href="<?php echo esc_url(home_url("/application")) ?>" target="_blank" rel="noopener noreferrer">こちら</a>
                        から入会申込書ダウンロードしてご持参ください。<br />抽選対象の講座もございますので、ご注意ください。
                    </p>
                </div>
            </li>
            <li class="entry__step">
                <div class="entry__step-label">step 3</div>
                <div class="entry__step-content">
                    <h3 class="entry__step-heading">年会費・参加費を支払う</h3>
                    <p class="entry__step-text">
                        年会費（一般3,000円／65歳以上2,200円）と、講座の参加費（月・3ヶ月単位）を支払います。<br />
                        ※納入後の返金はできません。
                    </p>
                </div>
            </li>
            <li class="entry__step">
                <div class="entry__step-label">STEP 4</div>
                <div class="entry__step-content">
                    <h3 class="entry__step-heading">講座に参加する</h3>
                    <p class="entry__step-text">
                        決められた日時・場所に参加し、動きやすい服装で準備を整えましょう。<br />
                        楽しく健康づくりと地域交流を始めましょう！
                    </p>
                </div>
            </li>
        </ul>
    </div>
</section>
<!-- 入会手続きの詳細 -->
<section class="membership-info membership-info-layout">
    <div class="membership-info__inner inner">
        <h2 class="entry__title section-title">入会手続・費用</h2>
        <?php
        /**
         * Template Name: 入会ページ（Entry）
         */

        get_header();
        $membership = get_field('membership_info');
        ?>

        <div class="membership-info">

            <!-- 🔵 入会手続き -->
            <div class="membership-info__section membership-info__section--blue">
                <h2 class="membership-info__title">
                    <?php echo esc_html($membership['admission_section']['admission_title']); ?>
                </h2>

                <div class="membership-info__definition-wrap">
                    <?php echo wp_kses_post($membership['admission_section']['admission_registration_dl']); ?>
                </div>

                <div class="membership-info__definition-wrap">
                    <?php echo wp_kses_post($membership['admission_section']['admission_others_dl']); ?>
                </div>
            </div>

            <!-- 🟠 年会費・参加費 -->
            <div class="membership-info__section membership-info__section--orange">
                <h2 class="membership-info__title">
                    <?php echo esc_html($membership['fee_section']['fee_title']); ?>
                </h2>

                <p class="membership-info__text">
                    <?php echo wp_kses_post($membership['fee_section']['fee_description']); ?>
                </p>

                <div class="membership-info__table-wrap">
                    <?php echo wp_kses_post($membership['fee_section']['fee_table']); ?>
                </div>

                <div class="membership-info__notes">
                    <?php echo wp_kses_post($membership['fee_section']['fee_notes']); ?>
                </div>
            </div>

            <!-- 🌸 賛助会員 -->
            <div class="membership-info__section membership-info__section--pink">
                <h2 class="membership-info__title">
                    <?php echo esc_html($membership['supporter_section']['supporter_title']); ?>
                </h2>

                <div class="membership-info__table-wrap">
                    <?php echo wp_kses_post($membership['supporter_section']['supporter_table']); ?>
                </div>
            </div>
            <div class="membership-info__btn common-btn">
                <a class="membership-info__btn-link common-btn__link" href="<?php echo esc_url(home_url("/application")) ?>">各種申込書はこちら</a>
            </div>
        </div>
</section>
<?php get_footer(); ?>