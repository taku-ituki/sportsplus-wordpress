<?php get_header(); ?>
<!-- メインビュー -->
<section class="sub-fv sub-fv-layout">
    <picture class="sub-fv__img">
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/spo.jpg"
            media="(max-width: 767px)" />
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/spo.jpg" alt="diving" />
    </picture>
    <div class="sub-fv__overlay"></div>
    <h2 class="sub-fv__title sub-fv__title--entry">会員募集<span>join us</span></h2>
</section>
<!-- パンくずリスト -->
<div class="breadcrumbs breadcrumbs-blog-layout">
    <?php get_template_part('parts/breadcrumb'); ?>
</div>
<section class="entry entry-layout">
    <div class="entry__inner inner">
        <h2 class="entry__title section-title">ご参加までの流れ</h2>
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
                        年会費（一般3,000円／65歳以上2,200円/中学生以下1,500円）と、講座の参加費（昼講座は２ヶ月単位・夜講座は3ヶ月単位）を支払います。<br />
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
        <div class="membership-info__section membership-info__section--blue">
            <h2 class="membership-info__title">入会手続きの方法</h2>
            <dl class="membership-info__definition-list">
                <?php
                $entry_group = get_field('entry_group1');
                if ($entry_group) : ?>
                    <div class="membership-info__definition">
                        <dt class="membership-info__term">継続会員受付</dt>
                        <dd class="membership-info__desc"><?php echo esc_html($entry_group['term1_desc']); ?></dd>
                    </div>
                    <div class="membership-info__definition">
                        <dt class="membership-info__term">新規会員受付</dt>
                        <dd class="membership-info__desc">
                            <?php echo nl2br(esc_html($entry_group['term2_desc'])); ?>
                        </dd>
                    </div>
                    <div class="membership-info__definition">
                        <dt class="membership-info__term">随 時 受 付</dt>
                        <dd class="membership-info__desc"><?php echo esc_html($entry_group['term3_desc']); ?></dd>
                    </div>
            </dl>

            <dl class="membership-info__definition-list">
                <div class="membership-info__definition">
                    <dt class="membership-info__term">場所</dt>
                    <dd class="membership-info__desc"><?php echo esc_html($entry_group['term4_desc']); ?></dd>
                </div>
                <div class="membership-info__definition">
                    <dt class="membership-info__term">方法</dt>
                    <dd class="membership-info__desc"> <?php echo apply_filters('the_content', $entry_group['term5_desc'] ?? ''); ?></dd>
                </div>
                <div class="membership-info__definition">
                    <dt class="membership-info__term">注意</dt>
                    <dd class="membership-info__desc"><?php echo esc_html($entry_group['term6_desc']); ?></dd>
                </div>
            </dl>
        </div>
    <?php endif; ?>
    <!-- 年会費・参加費 -->
    <div class="membership-info__section membership-info__section--orange">
        <h2 class="membership-info__title">年会費・参加費</h2>
        <p class="membership-info__text">入会には、年会費（保険料を含む）＋参加費が必要です。</p>
        <?php
        $entry_group2 = get_field('entry_group2');
        if ($entry_group2) : ?>
            <table class="membership-info__table membership-table">
                <thead>
                    <tr>
                        <th>区分</th>
                        <th>年会費（10月以降）</th>
                        <th>参加費</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo esc_html($entry_group2['fee_row1_label']); ?></td>
                        <td><?php echo esc_html($entry_group2['fee_row1_price']); ?></td>
                        <td rowspan="3">
                            <?php echo apply_filters('the_content', $entry_group2['participation_fee_note'] ?? ''); ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html($entry_group2['fee_row2_label']); ?></td>
                        <td><?php echo esc_html($entry_group2['fee_row2_price']); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo esc_html($entry_group2['fee_row3_label']); ?></td>
                        <td><?php echo esc_html($entry_group2['fee_row3_price']); ?></td>
                    </tr>
                </tbody>
            </table>

            <div class="membership-info__notes">
                <div class="membership-info__note-list">
                    <?php echo apply_filters('the_content', $entry_group2['fee_notes'] ?? ''); ?>
                </div>
            </div>
    </div>
<?php endif; ?>

<div class="membership-info__btn common-btn">
    <a class="membership-info__btn-link common-btn__link" href="<?php echo esc_url(home_url("/application")) ?>">各種申込書はこちら</a>
</div>
    </div>
</section>
<?php get_footer(); ?>