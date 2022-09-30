let timerInterval;
let timeClock = document.getElementById("twp-time-clock");


function myTimer() {
    const date = new Date();
    timeClock.innerHTML = date.toLocaleTimeString();
}


jQuery(document).ready(function ($) {
  "use strict"
  function twp_theme_preloader() {
    var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(
      navigator.userAgent
    )
      ? true
      : false
    var preloader = $("#theme-site-preloader")
    if (!isMobile) {
      setTimeout(function () {
        preloader.addClass("theme-site-preloaded")
      }, 800)
      setTimeout(function () {
        preloader.remove()
      }, 2000)
    } else {
      preloader.remove()
    }
  }
  function twp_theme_my_load() {
    var speed = 500
    setTimeout(function () {
      twp_theme_preloader()
    }, speed)
    setTimeout(function () {
      jQuery("body").addClass("opened")
    }, speed + 2000)
  }
  window.addEventListener("load", function () {
    twp_theme_my_load()
  })
})
// Responsive Content Render Function
var renderMenu
var menuContentMain
function motu_responsive_content(renderMenu) {
  jQuery(document).ready(function ($) {
    "use strict"
    if (!menuContentMain) {
      menuContentMain = $("#theme-toparea").html()
    }
    if ($(window).width() <= 991) {
      var dateContent = $(".theme-topbar-item").html()
      $(".responsive-content-date").html(dateContent)
      $("#theme-toparea").empty()
    } else {
      $(".responsive-content-date").empty()
      $(".responsive-content-menu").empty()
      if (renderMenu) {
        $("#theme-toparea").html(menuContentMain)
      }
    }
  })
}
jQuery(document).ready(function ($) {
  "use strict"
  // Responsive Content
  motu_responsive_content((renderMenu = false))
  $(window).resize(function () {
    motu_responsive_content((renderMenu = true))
  })
  // Hide Comments
  $(
    ".motu-no-comment .booster-block.booster-ratings-block, .motu-no-comment .comment-form-ratings, .motu-no-comment .twp-star-rating"
  ).hide()
  $(".tooltips").append("<span></span>")
  $(".tooltips").mouseenter(function () {
    $(this).find("span").empty().append($(this).attr("data-tooltip"))
  })

  var navbar = document.getElementById("twp-header-navbar")
  var headerAddHeight = 0
  if ($("div").hasClass("theme-header-ads")) {
    var result = $(".theme-header-ads").css("height")
    var headerAddHeight = parseInt(result.replace(/[^0-9.]/g, ""))
  }
  var sticky = $("#twp-header-navbar").offset().top
  var id_number = sticky - headerAddHeight
  window.onscroll = function () {
    if ($(window).scrollTop() >= id_number) {
      navbar.classList.add("sticky")
    } else {
      navbar.classList.remove("sticky")
    }
  }

  // Rating disable
  if (motu_custom.single_post == 1 && motu_custom.motu_ed_post_reaction) {
    $(".tpk-single-rating").remove()
    $(".tpk-comment-rating-label").remove()
    $(".comments-rating").remove()
    $(".tpk-star-rating").remove()
  }
  // Add Class on article
  $(".theme-article-area").each(function () {
    $(this).addClass("theme-article-loaded")
  })
  // Aub Menu Toggle
  $(".submenu-toggle").click(function () {
    $(this).toggleClass("button-toggle-active")
    var currentClass = $(this).attr("data-toggle-target")
    $(currentClass).toggleClass("submenu-toggle-active")
  })
  // Header Search show
  $(".header-searchbar").click(function () {
    $(".header-searchbar").removeClass("header-searchbar-active")
  })
  $(".header-searchbar-inner").click(function (e) {
    e.stopPropagation() //stops click event from reaching document
  })
  // Header Search hide
  $("#search-closer").click(function () {
    $(".header-searchbar").removeClass("header-searchbar-active")
    setTimeout(function () {
      $(".navbar-control-search").focus()
    }, 300)
    $("body").removeClass("body-scroll-locked")
  })
  // Focus on search input on search icon expand
  $(".navbar-control-search").click(function () {
    $(".header-searchbar").toggleClass("header-searchbar-active")
    setTimeout(function () {
      $(".header-searchbar .search-field").focus()
    }, 300)
    $("body").addClass("body-scroll-locked")
  })
  $("input, a, button").on("focus", function () {
    if ($(".header-searchbar").hasClass("header-searchbar-active")) {
      if ($(this).hasClass("skip-link-search-top")) {
        $(".header-searchbar #search-closer").focus()
      }
      if (!$(this).parents(".header-searchbar").length) {
        $(".header-searchbar .search-field").focus()
      }
    }
  })
  $(document).keyup(function (j) {
    if (j.key === "Escape") {
      // escape key maps to keycode `27`
      if ($(".header-searchbar").hasClass("header-searchbar-active")) {
        $(".header-searchbar").removeClass("header-searchbar-active")
        $("body").removeClass("body-scroll-locked")
        setTimeout(function () {
          $(".navbar-control-search").focus()
        }, 300)
      }
      if ($("body").hasClass("motu-trending-news-active")) {
        $(".trending-news-main-wrap").slideToggle()
        $("body").toggleClass("motu-trending-news-active")
        $(".navbar-control-trending-news").focus()
      }
    }
  })
  // Action On Esc Button
  $(document).keyup(function (j) {
    if (j.key === "Escape") {
      // escape key maps to keycode `27`
      if ($("#offcanvas-menu").hasClass("offcanvas-menu-active")) {
        $(".header-searchbar").removeClass("header-searchbar-active")
        $("#offcanvas-menu").removeClass("offcanvas-menu-active")
        $(".navbar-control-offcanvas").removeClass("active")
        $("body").removeClass("body-scroll-locked")
        setTimeout(function () {
          $(".navbar-control-offcanvas").focus()
        }, 300)
      }
    }
  })
  // Toggle Menu
  $(".navbar-control-offcanvas").click(function () {
    $(this).addClass("active")
    $("body").addClass("body-scroll-locked")
    $("#offcanvas-menu").toggleClass("offcanvas-menu-active")
    $(".button-offcanvas-close").focus()
  })
  // Offcanvas Close
  $(".offcanvas-close .button-offcanvas-close").click(function () {
    $("#offcanvas-menu").removeClass("offcanvas-menu-active")
    $(".navbar-control-offcanvas").removeClass("active")
    $("body").removeClass("body-scroll-locked")
    setTimeout(function () {
      $(".navbar-control-offcanvas").focus()
    }, 300)
  })
  // Offcanvas Close
  $("#offcanvas-menu").click(function () {
    $("#offcanvas-menu").removeClass("offcanvas-menu-active")
    $(".navbar-control-offcanvas").removeClass("active")
    $("body").removeClass("body-scroll-locked")
  })
  $(".offcanvas-wraper").click(function (e) {
    e.stopPropagation() //stops click event from reaching document
  })
  // Offcanvas re focus on close button
  $("input, a, button").on("focus", function () {
    if ($("#offcanvas-menu").hasClass("offcanvas-menu-active")) {
      if ($(this).hasClass("skip-link-off-canvas")) {
        if (!$("#offcanvas-menu #social-nav-offcanvas").length == 0) {
          $("#offcanvas-menu #social-nav-offcanvas ul li:last-child a").focus()
        } else if (!$("#offcanvas-menu #primary-nav-offcanvas").length == 0) {
          $("#offcanvas-menu #primary-nav-offcanvas ul li:last-child a").focus()
        }
      }
    }
  })
  $(".skip-link-offcanvas").focus(function () {
    $(".button-offcanvas-close").focus()
  })
  // Trending News Start
  $(".navbar-control-trending-news").click(function () {
    $(".trending-news-main-wrap").slideToggle()
    $("body").toggleClass("motu-trending-news-active")
    $("#trending-collapse").focus()
  })
  $(".motu-skip-link-end").focus(function () {
    $("#trending-collapse").focus()
  })
  $(".motu-skip-link-start").focus(function () {
    $(".trending-news-main-wrap .column:last-child .entry-meta a").focus()
  })
  $("#trending-collapse").click(function () {
    $(".trending-news-main-wrap").slideToggle()
    $("body").toggleClass("motu-trending-news-active")
    $(".navbar-control-trending-news").focus()
  })

  var rtled = false
  if ($("body").hasClass("rtl")) {
    rtled = true
  }

  // Trending News End
  // Single Post content gallery slide
  $(
    "ul.wp-block-gallery.columns-1, .wp-block-gallery.columns-1 .blocks-gallery-grid, .gallery-columns-1"
  ).each(function () {
    $(this).slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      fade: true,
      autoplay: false,
      autoplaySpeed: 8000,
      infinite: true,
      nextArrow:
        '<button type="button" class="slide-btn slide-btn-bg slide-next-icon">' +
        motu_custom.next_svg +
        "</button>",
      prevArrow:
        '<button type="button" class="slide-btn slide-btn-bg slide-prev-icon">' +
        motu_custom.prev_svg +
        "</button>",
      dots: false,
    })
  })
  // Content Gallery popup Start
  $(
    ".entry-content .gallery, .widget .gallery, .wp-block-gallery, .zoom-gallery"
  ).each(function () {
    $(this).magnificPopup({
      delegate: "a",
      type: "image",
      closeOnContentClick: false,
      closeBtnInside: false,
      mainClass: "mfp-with-zoom mfp-img-mobile",
      image: {
        verticalFit: true,
        titleSrc: function (item) {
          return item.el.attr("title")
        },
      },
      gallery: {
        enabled: true,
      },
      zoom: {
        enabled: true,
        duration: 300,
        opener: function (element) {
          return element.find("img")
        },
      },
    })
  })
  $(function () {
    $("#theme-banner-navs a").click(function () {
      // Check for active
      $("#theme-banner-navs li").removeClass("active")
      $(this).parent().addClass("active")
      // Display active tab
      let currentTab = $(this).attr("href")
      $(".main-banner-right .twp-banner-tab").hide()
      $(currentTab).show()
      return false
    })
  })
  // Content Gallery popup End
  // Banner Block 1
  $(".theme-slider-block").each(function () {
    $(this).slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      fade: true,
      autoplay: false,
      autoplaySpeed: 8000,
      infinite: true,
      prevArrow: $(this)
        .closest(".theme-block-navtabs")
        .find(".slide-prev-lead"),
      nextArrow: $(this)
        .closest(".theme-block-navtabs")
        .find(".slide-next-lead"),
      dots: false,
    })
  })
  // Banner Block 1
  $(".theme-main-slider-block").each(function () {
    $(this).slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      // fade: true,
      autoplay: true,
      autoplaySpeed: 5000,
      speed: 900,
      infinite: true,
      prevArrow: $(this).closest(".list-grid-one").find(".slide-prev-lead"),
      nextArrow: $(this).closest(".list-grid-one").find(".slide-next-lead"),
      dots: false,
    })
  })
  $(".header-recent-entries").each(function () {
    $(this).slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      fade: true,
      autoplay: false,
      autoplaySpeed: 8000,
      infinite: true,
      arrows: false,
      dots: false,
    })
  })

  $(".video-slider-container").slick({
    autoplay: true,
    speed: 900,
    autoplaySpeed: 4000,
    prevArrow: $(".theme-grid-video .slide-prev-lead"),
    nextArrow: $(".theme-grid-video .slide-next-lead"),
    rtl: rtled,
  })

  $(".grid-video-slider2").slick({
    autoplay: true,
    speed: 900,
    autoplaySpeed: 3000,
    arrows: false,
    dots: true,
    rtl: rtled,
  })

  $(".marquee").marquee({
    duration: 12000,
    gap: 50,
    delayBeforeStart: 0,
    direction: "left",
    duplicated: true,
    pauseOnHover: true,
    startVisible: true,
    rtl: rtled,
  })
  var pageSection = $(".data-bg")
  pageSection.each(function (indx) {
    if ($(this).attr("data-background")) {
      $(this).css("background-image", "url(" + $(this).data("background") + ")")
    }
  })
  $(window).scroll(function () {
    if ($(window).scrollTop() > $(window).height() / 2) {
      $(".scroll-up").fadeIn(300)
    } else {
      $(".scroll-up").fadeOut(300)
    }
  })
  // Scroll to Top on Click
  $(".scroll-up").click(function () {
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      700
    )
    return false
  })
})

// progress on scroll

let progressBar = document.querySelector(".progress-bar")

let scrollProgress = () => {
  let winScroll = document.body.scrollTop || document.documentElement.scrollTop
  let height =
    document.documentElement.scrollHeight -
    document.documentElement.clientHeight
  let scrolled = (winScroll / height) * 100
  let roundResult = Math.round(scrolled)
  progressBar.style.width = `${roundResult}%`
}

window.addEventListener("scroll", scrollProgress)

// modal

let imgLink = document.querySelectorAll(".theme-video-modal")

imgLink.forEach(function (item) {
  item.addEventListener("click", function (e) {
    e.preventDefault()
    let mainContainer = e.target.closest(".theme-news-article")
    let modalContainer = mainContainer.querySelector(".modal-container")

    if (modalContainer) {
      modalContainer.classList.remove("hide")

      let modal = modalContainer.lastElementChild
      modal.classList.remove("hide")
    }

    modalContainer.addEventListener("click", function (item) {
      modalContainer.classList.add("hide")

      let getIframe = modalContainer.querySelector("iframe")
      if (getIframe !== null) {
        var iframeSrc = getIframe.src
        getIframe.src = iframeSrc
      }
    })
  })
})
