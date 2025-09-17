
  <?php get_header(); ?>
  <?php
  $hex = get_field('theme_color') ?: '#8a2be2';
  if (!function_exists('hex_to_rgb')) {
    function hex_to_rgb($hex)
    {
      $hex = ltrim($hex, '#');
      if (strlen($hex) === 3) {
        $r = hexdec(str_repeat(substr($hex, 0, 1), 2));
        $g = hexdec(str_repeat(substr($hex, 1, 1), 2));
        $b = hexdec(str_repeat(substr($hex, 2, 1), 2));
      } else {
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
      }
      return [$r, $g, $b];
    }
  }

  $rgb = hex_to_rgb($hex);
  ?>

  <style>
    .club-fv {
      background-color: <?php echo esc_attr($hex); ?>;
    }

    .single-club__inner.inner h2 {
      color: <?php echo esc_attr($hex); ?>;
      border-bottom: 1px solid rgba(<?php echo esc_attr("{$rgb[0]}, {$rgb[1]}, {$rgb[2]}, 0.5"); ?>);
    }
  </style>

  <section class="club-fv club-fv-layout">
    <div class="club-fv__flex">
      <picture class="club-fv__img">
        <source srcset="<?php the_field('main_image'); ?>" media="(max-width: 767px)" />
        <img src="<?php the_field('main_image'); ?>" alt="クラブのメイン画像" />
      </picture>
      <div class="club-fv__intro-wrap">
        <h1 class="club-fv__intro"><?php the_field('intro_text'); ?></h1>
      </div>
    </div>
  </section>

  <div class="breadcrumbs breadcrumbs-blog-layout">
    <?php get_template_part('parts/breadcrumb'); ?>
  </div>

  <section class="single-club single-club-layout">
    <div class="single-club__inner inner">
      <h2 class="single-club__title-text"><?php the_field('club_title_text'); ?></h2>
      <p class="single-club__head-text"><?php the_field('club_head_text'); ?></p>
      <?php if (get_field('club_mv')) : ?>
        <div class="single-club__mv">
          <img src="<?php echo esc_url(get_field('club_mv')); ?>" alt="クラブ活動写真" />
        </div>
      <?php endif; ?>

      <ul class="single-club__items">
        <?php
        for ($i = 1; $i <= 3; $i++) :
          $title = get_field("item_title_{$i}");
          $text  = get_field("item_text_{$i}");
          if (!$title && !$text) {
            continue;
          }
        ?>
          <li class="single-club__item">
            <?php if ($title) : ?>
              <h2 class="single-club__read"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>

            <?php if ($text) : ?>
              <p class="single-club__text"><?php echo nl2br(esc_html($text)); ?></p>
            <?php endif; ?>
          </li>
        <?php endfor; ?>
      </ul>


      <div class="single-club__pdf-block">
        <h2 class="single-club__title">日程表</h2>
        <div class="single-club__pdf pdf">
          <embed src="<?php the_field('club_pdf'); ?>" class="pdf__url" type="application/pdf" width="100%" height="600px">
        </div>
      </div>
    </div>

    <div class="single-club__link page-link">
      <div class="page-link__inner inner">
        <div class="page-link__archive">
          <a href="<?php echo esc_url(home_url('/club/')); ?>">クラブ一覧へ戻る</a>
        </div>
      </div>
    </div>
  </section>
  <?php get_footer(); ?>