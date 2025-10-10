"use strict";

jQuery(function ($) {
  // ===== ローディングアニメーション =====
  function loading() {
    const hasLoadedSession = sessionStorage.getItem("hasLoaded");
    const hasLoadedLocal = localStorage.getItem("hasLoaded");

    if (!hasLoadedSession && !hasLoadedLocal) {
      setTimeout(function () {
        $(".js-loading").addClass("is-hide");
        setTimeout(function () {
          $(".js-loading").remove();
        }, 800);
      }, 2000);
      sessionStorage.setItem("hasLoaded", "true");
      localStorage.setItem("hasLoaded", "true");
    } else {
      $(".js-loading").remove();
    }
  }

  let loadingExecuted = false;
  function executeLoading() {
    if (!loadingExecuted) {
      loadingExecuted = true;
      loading();
    }
  }

  $(document).ready(executeLoading);
  $(window).on("load", executeLoading);

  // ===== ハンバーガーメニュー =====
  $(".js-hamburger").on("click", function () {
    $(this).toggleClass("is-open");
    $(".js-header").toggleClass("is-color");
    $(".js-drawer").fadeToggle();
  });

  $(".js-drawer a[href]").on("click", function () {
    $(".js-hamburger").removeClass("is-open");
    $(".js-header").removeClass("is-color");
    $(".js-drawer").fadeOut();
  });

  $(window).on("resize", function () {
    if (window.matchMedia("(min-width: 768px)").matches) {
      $(".js-hamburger").removeClass("is-open");
      $(".js-header").removeClass("is-color");
      $(".js-drawer").fadeOut();
    }
  });

  $(".js-drawer-accordion").on("click", function () {
    $(this).next().slideToggle();
    $(this).toggleClass("is-open");
  });

  // ===== ドロワー開閉でスクロール制御 =====
  const drawer = document.querySelector(".js-drawer");
  const overlay = document.querySelector(".js-overlay");

  function openDrawer() {
    drawer.classList.add("is-open");
    overlay.style.display = "block";
    document.body.style.overflow = "hidden";
  }

  function closeDrawer() {
    drawer.classList.remove("is-open");
    overlay.style.display = "none";
    document.body.style.overflow = "";
  }

  const hamburger = document.querySelector(".js-hamburger");
  if (hamburger) {
    hamburger.addEventListener("click", function () {
      drawer.classList.contains("is-open") ? closeDrawer() : openDrawer();
    });
  }

  if (overlay) overlay.addEventListener("click", closeDrawer);

  // ===== MVスライダー =====
  const mv_swiper = new Swiper(".js-mv-swiper", {
    loop: true,
    speed: 2000,
    effect: "fade",
    fadeEffect: { crossFade: true },
    autoplay: { delay: 4000, disableOnInteraction: false },
  });

  // ===== FAQアコーディオン =====
  $(".js-faq-accordion-title").on("click", function () {
    $(this).next(".js-faq-accordion-box").slideToggle();
    $(this).toggleClass("close");
  });

  // ===== フェードインアニメーション =====
  $(window)
    .on("scroll", function () {
      $(".js-fadeIn").each(function () {
        if ($(this).offset().top < $(window).scrollTop() + $(window).height() * 0.75) {
          $(this).addClass("is-active");
        }
      });
    })
    .trigger("scroll");

  // ===== 講座カテゴリータブ（Ajax切り替え） =====
  $(".js-program-tabs .category__menu a").on("click", function (e) {
    e.preventDefault();

    const $this = $(this);
    const slug = $this.data("slug");

    $this.closest(".category__menu").addClass("category__menu--current").siblings().removeClass("category__menu--current");

    $.ajax({
      url: ajax_news.url,
      type: "POST",
      data: {
        action: "filter_program_by_category",
        slug: slug,
      },
      success: function (res) {
        $("#program-list").html(res);
        // 🔁 新しく生成されたHTMLにイベントを再度バインド
        initProgramModals();
      },
      error: function () {
        $("#program-list").html("<p class='program__no-posts'>読み込みに失敗しました。</p>");
      },
    });
  });

  // ===== 講座ページ モーダル処理（Ajax対応） =====
  function initProgramModals() {
    let programScrollPosition = 0;

    $(".js-program-modal-open")
      .off("click")
      .on("click", function (e) {
        e.preventDefault();
        const target = $(this).data("target");
        const modal = document.getElementById(target);

        if (!modal) {
          console.warn("モーダルが見つかりません:", target);
          return;
        }

        $(modal).fadeIn(200);
        programScrollPosition = $(window).scrollTop();
        $("html").addClass("program--modal-open");
      });

    $(".js-program-modal-close")
      .off("click")
      .on("click", function () {
        $(".js-program-modal").fadeOut(200);
        $("html").removeClass("program--modal-open");
        $(window).scrollTop(programScrollPosition);
      });
  }

  // 初回登録
  initProgramModals();

  // ===== トップページへ戻るボタン =====
  const button = document.querySelector(".js-top-button");
  if (button) {
    button.addEventListener("click", () => {
      window.scroll({ top: 0, behavior: "smooth" });
    });

    window.addEventListener("scroll", () => {
      if (window.scrollY > 100) {
        button.classList.add("is-active");
      } else {
        button.classList.remove("is-active");
      }
    });
  }

  // ===== information タブ切り替え =====
  $(document).ready(function () {
    const params = new URLSearchParams(window.location.search);
    const defaultTab = "license-link";
    const selectedTab = params.get("tab") || defaultTab;

    $(".js-info-content-tab").removeClass("active");
    $(".js-info-content-card").hide();

    $(".js-info-content-tab[data-id='" + selectedTab + "']").addClass("active");
    $("#" + selectedTab).show();

    $(".js-info-content-tab").on("click", function () {
      const tabId = $(this).data("id");
      $(".js-info-content-tab").removeClass("active");
      $(".js-info-content-card").hide();
      $(this).addClass("active");
      $("#" + tabId).show();
    });
  });

  // ===== ページネーション =====
  const $pagination = $(".news__pagination");
  const $items = $pagination.find(".news__pagination__page");
  const $prev = $pagination.find(".news__pagination__prev");
  const $next = $pagination.find(".news__pagination__next");

  function changeActive($target) {
    $items.removeClass("pagination__page--current");
    $target.addClass("pagination__page--current");
  }

  function moveActive(direction) {
    const $current = $items.filter(".news__pagination__page--current");
    const index = $items.index($current);
    const nextIndex = Math.min($items.length - 1, Math.max(0, index + direction));
    changeActive($items.eq(nextIndex));
  }

  $items.on("click", function (e) {
    e.preventDefault();
    changeActive($(this));
  });

  $prev.on("click", function (e) {
    e.preventDefault();
    moveActive(-1);
  });

  $next.on("click", function (e) {
    e.preventDefault();
    moveActive(1);
  });

  // ===== トップページお知らせ（Ajax） =====
  $(".js-top-news__tabs .category__menu a").on("click", function (e) {
    e.preventDefault();
    const $this = $(this);
    const slug = $this.data("slug");

    $this.closest(".category__menu").addClass("category__menu--current").siblings().removeClass("category__menu--current");

    $.ajax({
      url: ajax_news.url,
      type: "POST",
      data: {
        action: "filter_news_by_category",
        slug: slug,
      },
      success: function (res) {
        $("#news-list").html(res);
      },
      error: function () {
        $("#news-list").html("<p>読み込みに失敗しました。</p>");
      },
    });
  });
});

// ===== 部活動地域移行カードのフェードアニメーション =====
document.addEventListener("DOMContentLoaded", () => {
  const cards = document.querySelectorAll(".js-club-card");

  const observer = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry, index) => {
        if (entry.isIntersecting) {
          setTimeout(() => {
            entry.target.classList.add("is-visible");
          }, index * 150);
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.1 }
  );

  cards.forEach((card) => observer.observe(card));
});
