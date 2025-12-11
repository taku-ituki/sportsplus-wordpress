<?php get_header(); ?>
<!-- メインビュー -->
<section class="sub-fv sub-fv-layout">
  <picture class="sub-fv__img">
    <source srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/valley.jpg" media="(max-width: 767px)" />
    <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/valley.jpg" alt="valley" />
  </picture>
  <div class="sub-fv__overlay"></div>
  <h1 class="sub-fv__title sub-fv__title--club">部活動地域展開<span>club partnership</span></h1>
</section>
<!-- パンくずリスト -->
<div class="breadcrumbs breadcrumbs-blog-layout">
  <?php get_template_part('parts/breadcrumb') ?>
</div>
<!-- 部活動地域展開 -->
<section class="club club-layout">
  <div class="inner club__inner">
    <h2 class="club__title section-title">部活動地域展開</h2>
    <nav class="club__toc toc">
      <div class="club__tok-title toc__title">【目次】</div>
      <ul class="club__toc-list toc__list">
        <li class="club__toc-item toc__item"><a href="#club" class="toc__link">部活動地域展開とは？</a></li>
        <li class="club__toc-item toc__item"><a href="#ongoing-activities" class="toc__link">実施中の地域クラブ活動</a></li>
      </ul>
    </nav>
    <!-- お申込リンク -->
    <div class="club__btn common-btn">
      <a class="club__btn-link common-btn__link common-btn__link--color" href="<?php echo esc_url(home_url("/entry#apply-club")) ?>">お申込方法はこちら</a>
    </div>
    <?php
    // ページスラッグからIDを取得
    $club_page = get_page_by_path('club-archive-settings');

    if ($club_page) :
      $club_page_id = $club_page->ID;
    ?>

      <div class="club__bg-color">
        <?php if (get_field('club_title', $club_page_id)) : ?>
          <h3 class="club__sub-title club__sub-title--color" id="club">
            <?php the_field('club_title', $club_page_id); ?>
          </h3>
        <?php endif; ?>

        <?php if (get_field('club_text', $club_page_id)) : ?>
          <div class="club__text">
            <?php the_field('club_text', $club_page_id); ?>
          </div>
        <?php endif; ?>
      </div>

    <?php endif; ?>
    <h3 class="club__sub-title" id="ongoing-activities">実施中の地域クラブ活動</h3>
    <ul class="club__cards club-cards">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <li class="club-card js-club-card">
            <a href="<?php the_permalink(); ?>">
              <figure class="club-card__image">
                <?php
                $main_image = get_field('main_image'); // ここはURL文字列として返る
                if ($main_image):
                ?>
                  <img src="<?php echo esc_url($main_image); ?>" alt="<?php the_title_attribute(); ?>" />
                <?php else: ?>
                  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/no-image.jpg" alt="画像なし" />
                <?php endif; ?>
              </figure>
              <div class="club-card__content">
                <h3 class="club-card__title">
                  <?php the_field('intro_text'); ?>
                </h3>
                <p class="club-card__text">
                  <?php the_field('club_title_text'); ?>
                </p>
              </div>
            </a>
          </li>
        <?php endwhile; ?>
      <?php else : ?>
        <p>クラブ情報がまだありません。</p>
      <?php endif; ?>
    </ul>


    <!-- <div class="club__support-wrap">
      <h3 class="club__sub-title" id="support-members">賛助会員の募集</h3>
      <div class="club__support">
        <div class="club__support-lead">
          <p class="club__support-text">
            スポーツプラスおおはるの賛助会員になって部活動地域展開のサポーターになっていただき、 企業名等を練習用Tシャツに印刷して生徒へ配布します。<br />
            生徒たちに応援してくださる地元企業を知る機会として紹介していきます。
          </p>
        </div>
        <div class="club__support-shirt">
          <h4 class="club__support-title">サポーターTシャツについて</h4>
          <p class="club__support-text">Tシャツの前後を12分割し、協力いただける企業様の名称を印刷します。</p>
          <ul class="club__support-list">
            <li class="club__support-item">【前後】（ひと枠）：縦10cm×横10cm　10万円</li>
            <li class="club__support-item">上部2列・下部2列：各8万円</li>
            <li class="club__support-item">【袖】（ひと枠）：縦5cm×横8cm　5万円</li>
          </ul>
        </div>
      </div>
    </div> -->
    <!-- 申込・お問合せ -->
    <!-- <div class="club__info">
      <h3 class="club__info-title section-title" id="club-info">申込・問合せ先</h3>
      <table class="club__access-table access__table">
        <tbody class="access-table__body">
          <tr class="access-table__row">
            <th class="access-table__label">問合せ先</th>
            <td class="access-table__data">
              <div class="access-table__address">
                <span>スポーツプラスおおはる事務所</span>
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
                href="mailto:spplus-oharu@clovernet.ne.jp">spplus-oharu@clovernet.ne.jp</a></td>
          </tr>
        </tbody>
      </table>
    </div> -->
  </div>
</section>

<?php get_footer(); ?>