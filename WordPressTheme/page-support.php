<?php get_header(); ?>
<!-- メインビュー -->
<section class="sub-fv sub-fv-layout">
    <picture class="sub-fv__img">
        <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/support.jpg"
            media="(max-width: 767px)" />
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/support.jpg" alt="メイン画像" />
    </picture>
    <div class="sub-fv__overlay"></div>
    <h1 class="sub-fv__title">賛助団体<span>support group</span></h1>
</section>
<!-- パンくずリスト -->
<div class="breadcrumbs breadcrumbs-layout">
    <?php get_template_part('parts/breadcrumb'); ?>
</div>
<section class="support support-layout">
    <div class="support_inner inner">
        <h2 class="support__title section-title">助成団体</h2>

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

<!-- 賛助会員 -->
<section class="member member-layout">
    <div class="inner member__inner ">
        <h2 class="member-info__title section-title">賛助会員の募集</h2>
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
    </div>
</section>

<?php get_footer(); ?>