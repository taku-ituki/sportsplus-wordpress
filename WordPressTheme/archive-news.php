<?php get_header(); ?>
<!-- パンくずリスト -->
<div class="breadcrumbs breadcrumbs-blog-layout">
    <div class="breadcrumbs__inner inner">
       <?php get_template_part('parts/breadcrumb'); ?>
    </div>
</div>
<div class="news news-layout">
    <div class="news__inner inner">
        <!-- ブログのカテゴリー切り替え -->
        <div class="news__nav information-category">
            <nav class="news__nav-category information-category__nav">
                <a href="#">最新</a>
                <a href="#">講座</a>
                <a href="#">部活動地域連携</a>
                <a href="#">スポーツチャレンジ</a>
            </nav>
        </div>
        <ul class="news__list news-list">
            <li class="news-list__item">
                <a href="single.html">
                    <div class="news-list__item-img">
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/dumy-archive-blog01.jpg"
                            alt="省略" />
                    </div>
                    <div class="news-list__item-meta">
                        <time class="news-list__item-date" datetime="2023-12-18">2023.12.18</time>
                        <p class="news-list__item-category">講座</p>
                    </div>
                    <p class="news-list__item-text">テキストテキストテキストテキストテキストテキスト</p>
                </a>
            </li>
            <li class="news-list__item">
                <a href="#">
                    <div class="news-list__item-img">
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/dumy-archive-blog02.jpg"
                            alt="省略" />
                    </div>
                    <div class="news-list__item-meta">
                        <time class="news-list__item-date" datetime="2023-12-18">2023.12.18</time>
                        <p class="news-list__item-category">部活動地域連携</p>
                    </div>
                    <p class="news-list__item-text">テキストテキストテキストテキストテキストテキストテキスト</p>
                </a>
            </li>
            <li class="news-list__item">
                <a href="#">
                    <div class="news-list__item-img"><img
                            src="<?php echo get_theme_file_uri(); ?>/assets/images/common/dumy-archive-blog01.jpg"
                            alt="省略" /></div>
                    <div class="news-list__item-meta">
                        <time class="news-list__item-date" datetime="2023-12-18">2023.12.18</time>
                        <p class="news-list__item-category">スポーツチャレンジ</p>
                    </div>
                    <p class="news-list__item-text">テキストテキストテキストテキストテキストテキストテキストテキスト</p>
                </a>
            </li>
            <li class="news-list__item">
                <a href="#">
                    <div class="news-list__item-img">
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/dumy-archive-blog01.jpg"
                            alt="省略" />
                    </div>
                    <div class="news-list__item-meta">
                        <time class="news-list__item-date" datetime="2023-12-18">2023.12.18</time>
                        <p class="news-list__item-category">講座</p>
                    </div>
                    <p class="news-list__item-text">テキストテキストテキストテキストテキストテキスト</p>
                </a>
            </li>
            <li class="news-list__item">
                <a href="#">
                    <div class="news-list__item-img">
                        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/dumy-archive-blog02.jpg"
                            alt="省略" />
                    </div>
                    <div class="news-list__item-meta">
                        <time class="news-list__item-date" datetime="2023-12-18">2023.12.18</time>
                        <p class="news-list__item-category">部活動地域連携</p>
                    </div>
                    <p class="news-list__item-text">テキストテキストテキストテキストテキストテキストテキスト</p>
                </a>
            </li>
        </ul>
    </div>
    <!-- ページナビ -->
    <nav class="news__pagination">
        <div class="wp-pagenavi news__pagination-nav">
            <a rel="prev" href="#" class="previouspostslink news__pagination-arrow">
                <span>Previous</span>
            </a>
            <a href="#" class="page current"><span>1</span></a>
            <a href="#" class="page smaller">2</a>
            <a href="#" class="page smaller">3</a>
            <a href="#" class="page larger">4</a>
            <a href="#" class="page larger">5</a>
            <a href="#" class="page larger">6</a>
            <a rel="next" href="#" class="nextpostslink news__pagination-arrow">
                <span>Next</span>
            </a>
        </div>
    </nav>
</div>
<?php get_footer(); ?>