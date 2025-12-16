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
<!-- 目次 -->
<section class="entry-toc entry-toc-layout program-intro__guide">
    <div class="inner entry-toc__inner">
        <nav class="entry-toc__nav entry-toc toc">
            <h2 class="entry-toc__title toc__title">【目次】</h2>
            <ul class="entry-toc-list toc__list">
                <li class="entry-toc-item toc__item"><a href="#school" class="toc__link">年間講座の申込方法</a></li>
                <li class="entry-toc-item toc__item"><a href="#apply-club" class="toc__link">部活動地域展開の申込方法</a></li>
                <li class="entry-toc-item toc__item"><a href="#apply-challenge" class="toc__link">授業後スポーツチャレンジの申込方法</a></li>
                <li class="entry-toc-item toc__item"><a href="#member" class="toc__link">賛助会員の募集</a></li>
                <li class="entry-toc-item toc__item"><a href="#support-group" class="toc__link">助成団体</a></li>
            </ul>
        </nav>
    </div>
</section>
<!-- 年間講座 -->
<section class="entry entry-layout" id="school">
    <div class="entry__inner inner">
        <h2 class="entry__title section-title">①年間講座の申込方法</h2>
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
                        申込みは、スポーツプラスおおはる窓口での提出が必要です。申込書は窓口で受け取るか、
                        <a class="entry__link" href="<?php echo esc_url(home_url("/application")) ?>" target="_blank" rel="noopener noreferrer">こちら</a>
                        から入会申込書ダウンロードしてご持参ください。<br />抽選対象の講座もございますので、ご注意ください。
                    </p>
                </div>
            </li>
            <li class="entry__step">
                <div class="entry__step-label">step 3</div>
                <div class="entry__step-content">
                    <h3 class="entry__step-heading">年会費・参加費を確認する</h3>
                    <p class="entry__step-text">
                        年会費（一般3,000円／65歳以上2,200円/中学生以下1,500円）と、講座の参加費（昼講座は２ヶ月単位・夜講座は3ヶ月単位）を納入してください。<br />
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
                        <dt class="membership-info__term">随時受付</dt>
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
    </div>
</section>

<!-- 部活動地域展開 -->
<section class="apply apply-layout" id="apply-club">
    <div class="inner apply__inner apply__inner--club">
        <h2 class="apply__title section-title">②部活動地域展開の<br>申込方法</h2>
        <div class="apply__border">
            <h3 class="apply__sub-title">参加手順</h3>

            <?php
            $group = get_field('group_apply_club'); // グループフィールドの取得
            if ($group):
            ?>
                <!-- 対象者 -->
                <div class="apply__step">
                    <h3 class="apply__step-title">対象者</h3>
                    <div class="apply__content">
                        <?php
                        echo !empty($group['apply_club_step1'])
                            ? wp_kses_post($group['apply_club_step1'])
                            : '現在準備中';
                        ?>
                    </div>
                </div>

                <!-- 参加申込 -->
                <div class="apply__step">
                    <h3 class="apply__step-title">参加申込</h3>
                    <div class="apply__content">
                        <?php
                        echo !empty($group['apply_club_step2'])
                            ? wp_kses_post($group['apply_club_step2'])
                            : '現在準備中';
                        ?>
                    </div>
                </div>

                <!-- 連絡方法 -->
                <div class="apply__step">
                    <h3 class="apply__step-title">連絡方法</h3>
                    <div class="apply__content">
                        <?php
                        echo !empty($group['apply_club_step3'])
                            ? wp_kses_post($group['apply_club_step3'])
                            : '現在準備中';
                        ?>
                    </div>
                </div>

                <!-- 備考 -->
                <div class="apply__step">
                    <h3 class="apply__step-title">備考</h3>
                    <div class="apply__content">
                        <?php
                        echo !empty($group['apply_club_step4'])
                            ? wp_kses_post($group['apply_club_step4']) // HTMLタグOK、安全に出力
                            : '現在準備中';
                        ?>
                    </div>
                </div>

                <!-- 連絡先 -->
                <div class="apply__contact">
                    <h3 class="apply__step-title">連絡先</h3>
                    <?php
                    echo !empty($group['apply_contact_info'])
                        ? wp_kses_post($group['apply_contact_info'])
                        : '現在準備中';
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>


<!-- スポーツチャレンジ -->
<section class="apply apply-layout" id="apply-challenge">
    <div class="inner apply__inner apply__inner--challenge">
        <h2 class="apply__title section-title">③授業後スポーツチャレンジの申込方法</h2>
        <div class="apply__border">
            <h3 class="apply__sub-title">参加手順</h3>
            <?php
            $group = get_field('group_apply_challenge'); // グループフィールドの取得
            if ($group):
            ?>
                <!-- 対象者 -->
                <div class="apply__step">
                    <h3 class="apply__step-title">対象者</h3>
                    <div class="apply__content">
                        <?php
                        // 最大3校まで想定
                        for ($i = 1; $i <= 3; $i++) {
                            $school_name = isset($group["school_{$i}_name"]) ? $group["school_{$i}_name"] : '';
                            $school_low  = isset($group["school_{$i}_low"])  ? $group["school_{$i}_low"]  : '';
                            $school_high = isset($group["school_{$i}_high"]) ? $group["school_{$i}_high"] : '';

                            if ($school_name && $school_low && $school_high): ?>
                                <div class="apply__school">
                                    <p class="apply__school-name"><?php echo esc_html($school_name); ?></p>
                                    <div class="apply__school-group">
                                        <span class="apply__school-grade"><?php echo esc_html($school_low); ?></span>
                                        <span class="apply__school-grade"><?php echo esc_html($school_high); ?></span>
                                    </div>
                                </div>
                        <?php endif;
                        }
                        ?>
                    </div>
                </div>


                <!-- 参加申込 -->
                <div class="apply__step">
                    <h3 class="apply__step-title">参加申込</h3>
                    <div class="apply__content">
                        <?php
                        echo !empty($group['group_apply_challenge2'])
                            ? wp_kses_post($group['group_apply_challenge2'])
                            : '現在準備中';
                        ?>
                    </div>
                </div>

                <!-- 連絡方法 -->
                <div class="apply__step">
                    <h3 class="apply__step-title">連絡方法</h3>
                    <div class="apply__content">
                        <?php
                        echo !empty($group['group_apply_challenge3'])
                            ? wp_kses_post($group['group_apply_challenge3'])
                            : '現在準備中';
                        ?>
                    </div>
                </div>

                <!-- 備考 -->
                <div class="apply__step">
                    <h3 class="apply__step-title">備考</h3>
                    <div class="apply__content">
                        <?php
                        echo !empty($group['group_apply_challenge4'])
                            ? wp_kses_post($group['group_apply_challenge4'])
                            : '現在準備中';
                        ?>
                    </div>
                </div>

                <!-- 連絡先 -->
                <div class="apply__contact">
                    <h3 class="apply__step-title">連絡先</h3>
                    <p class="apply__contact-info">
                        <?php
                        echo !empty($group['apply_contact_info'])
                            ? wp_kses_post($group['apply_contact_info'])
                            : '現在準備中';
                        ?>
                    </p>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>

<!-- 賛助会員の募集 -->
<section class="member member-layout" id="member">
    <div class="inner member__inner ">
        <h2 class="member__title section-title">④賛助会員の募集</h2>
        <h3 class="member__sub-title section-sub-title"><span>スポーツぷらすおおはる賛助会員</span></h3>
        <?php
        $member = get_field('member_group');
        if ($member) : ?>
            <table class="member-info__table membership-table">
                <thead>
                    <tr>
                        <th>区分</th>
                        <th>年会費</th>
                        <th>備考</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>個人</td>
                        <td><?php echo esc_html($member['member_individual_fee']); ?></td>
                        <td rowspan="2">
                            <?php echo wp_kses_post($member['member_note']); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>法人および団体</td>
                        <td><?php echo esc_html($member['member_corporate_fee']); ?></td>
                    </tr>
                </tbody>
            </table>
        <?php endif; ?>
        <div class="member__club-support-wrap">
            <h3 class=" section-sub-title" id="support-members">部活動地域展開サポーターTシャツ</h3>
            <?php
            $block = get_field('club_support_block');
            if ($block) :
            ?>
                <div class="member__club-support">
                    <?php if (!empty($block['lead_text'])) : ?>
                        <div class="member__club-support-lead">
                            <p class="member__club-support-text">
                                <?php echo nl2br(esc_html($block['lead_text'])); ?>
                            </p>
                        </div>
                    <?php endif; ?>

                    <div class="member__club-support-shirt">
                        <?php if (!empty($block['title'])) : ?>
                            <h4 class="member__club-support-title">
                                <?php echo esc_html($block['title']); ?>
                            </h4>
                        <?php endif; ?>

                        <?php if (!empty($block['subtext'])) : ?>
                            <p class="member__club-support-text">
                                <?php echo nl2br(esc_html($block['subtext'])); ?>
                            </p>
                        <?php endif; ?>

                        <ul class="member__club-support-list">
                            <?php if (!empty($block['item_1'])) : ?>
                                <li class="member__club-support-item"><?php echo esc_html($block['item_1']); ?></li>
                            <?php endif; ?>
                            <?php if (!empty($block['item_2'])) : ?>
                                <li class="member__club-support-item"><?php echo esc_html($block['item_2']); ?></li>
                            <?php endif; ?>
                            <?php if (!empty($block['item_3'])) : ?>
                                <li class="member__club-support-item"><?php echo esc_html($block['item_3']); ?></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <?php
                    $block = get_field('club_support_block');

                    if (is_array($block) && !empty($block['apply_image_list']) && is_array($block['apply_image_list'])) :
                        $images = $block['apply_image_list'];
                    ?>
                        <ul class="apply__img-list">
                            <?php if (!empty($images['img_1'])) : ?>
                                <li class="apply__item-img">
                                    <img src="<?php echo esc_url($images['img_1']); ?>" alt="スポーツチャレンジの様子">
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($images['img_2'])) : ?>
                                <li class="apply__item-img">
                                    <img src="<?php echo esc_url($images['img_2']); ?>" alt="スポーツチャレンジの様子">
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($images['img_3'])) : ?>
                                <li class="apply__item-img">
                                    <img src="<?php echo esc_url($images['img_3']); ?>" alt="スポーツチャレンジの様子">
                                </li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>
<!-- 助成団体 -->
<section class="support support-layout" id="support-group">
    <div class="support_inner inner">
        <h2 class="support__title section-title">⑤助成団体</h2>
        <?php
        // SCFから繰り返しグループを取得
        $members = SCF::get('support_group');

        // 種類ごとに分類して保持する配列
        $support_by_type = [];

        // 団体の種類ごとに分類処理
        foreach ($members as $group) {
            $type = $group['group_type']; // 「ご助成団体」など

            // 未定義の場合は空の配列を初期化
            if (!isset($support_by_type[$type])) {
                $support_by_type[$type] = [];
            }

            // 該当種類に追加
            $support_by_type[$type][] = $group;
        }
        // 団体カードの出力用関数
        function display_support_group($groups)
        {
            foreach ($groups as $item) :
                $title = esc_html($item['group_title']);
                $url = esc_url($item['group_url']);
                // 添付ファイルIDから画像URLを取得（←ここが重要！）
                $image_id = $item['group_image'];
                $image_url = $image_id
                    ? esc_url(wp_get_attachment_url($image_id))
                    : esc_url(get_theme_file_uri('/assets/images/common/no-image.jpg'));
                $text = esc_html($item['group_text']);
        ?>
                <li class="support__group-link">
                    <a href="<?php echo $url; ?>" target="_blank" rel="noopener noreferrer">
                        <h3 class="support__link-title"><span><?php echo $title; ?></span></h3>
                        <div class="support__card">
                            <div class="support__card-img">
                                <img src="<?php echo $image_url; ?>" alt="<?php echo $title ? esc_attr($title) . 'のリンク画像' : 'アイキャッチ画像未設定'; ?>" />
                            </div>
                            <p class="support__card-text"><?php echo $text; ?></p>
                        </div>
                    </a>
                </li>
        <?php
            endforeach;
        }
        ?>
        <!-- 自動で種類ごとに出力 -->
        <?php foreach ($support_by_type as $type_label => $group_items) : ?>
            <?php if (!empty($group_items)) : ?>
                <div class="support__group">
                    <h3 class="support__sub-title"><span><?php echo esc_html($type_label); ?></span></h3>
                    <ul>
                        <?php display_support_group($group_items); ?>
                    </ul>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>



<?php get_footer(); ?>