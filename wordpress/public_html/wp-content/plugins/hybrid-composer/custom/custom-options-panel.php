<?php

/*
=============================================================================
CUSTOM SETTINGS FOR THE THEME OPTIONS PANEL
=============================================================================

Add new settings to the theme options panel here.
Every array item is a new setting.

Available values for "type" setting: checkbox,select,text,textarea,color,image_upload
Available values for "label" setting: main,layout,menu,footer,lists,titles,customizations,social

$HC_CUSTOM_PANEL
name : Theme's name
version : Theme's version
colors : Theme's panel colors

Documentation: wordpress.framework-y.com/advanced-api-documentation/#custom-theme

 */

global $HC_CUSTOM_PANEL;

$HC_CUSTOM_PANEL = array(
	'name'    => 'Signflow',
	'version' => '1.0.0',
    'colors'  => array("#5584ff","#0e1a35"),
    'demos' => array(array('id' => 'signflow','name' => 'All demos')),
    'demos_url' => 'http://themes.framework-y.com/demo-import/'
);


$HC_CUSTOM_FONT = "Roboto:100,300,400,500,700,900";
$HC_SITE_COLORS = '.nav:not(.ms-rounded) li > a:before, .boxed.advs-box-top-icon-img .advs-box-content, [class*="col-md-"].boxed,
.advs-box-side-img hr, .mi-menu .sidebar-nav, .advs-box-top-icon-img.niche-box-post:after, .accordion-list .list-group-item:before, [class*=header-] .title-base h1:before, .title-base h2:before,
.woocommerce .product span.onsale, .circle-button, .btn.circle-button, .btn, .header-bootstrap, .header-title hr, .advs-box.boxed, i.circle, .intro-box:after, .intro-box:before,
.advs-box-side-img hr, .call-action-box, .title-base hr, .nav.inner.ms-mini, .header-title.white .title-base hr, .header-animation.white .title-base hr,header .btn,.header-base.white,
.title-base .scroll-top, .title-modern .scroll-top, i.square, .progress-bar, .tagbox span, .niche-box-post .block-infos .block-data,.woocommerce ul.products li.product .button {
    background-color: [MAIN-COLOR];
}

.navbar-inner .nav.ms-minimal li a:before, .header-base.white, .advs-box-multiple.boxed .advs-box-content, .section-two-blocks.bg-color > .row > div:last-child, .list-items .list-item span,
.woocommerce button.button.alt, .woocommerce a.button.alt,.woocommerce input.button {
    background-color: [MAIN-COLOR] !important;
}

.btn:not(.btn-border):hover, .btn-primary:focus, .boxed .btn, .btn-primary.focus, .side-menu .active, .boxed.white .btn,.woocommerce ul.products li.product .button:hover,
.white.circle-button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover,
.woocommerce input.button.alt:hover, .white .title-base.yellow-bar hr, .img-box.i-center i.fa-play, .white.call-action-box .btn,.woocommerce input.button:hover {
    background-color: [HOVER-COLOR] !important;
}

i.icon, .fullpage-menu .active i, .navbar-default .navbar-toggle:hover i, .navbar-default .navbar-toggle:focus i, header .side-menu .active > a,
.adv-img-button-content .caption i, .icon-menu ul.nav > li.active > a i, .icon-menu ul.nav > li:hover > a i, .active .maso-order i, .btn.btn-border i, .advs-box-top-icon:not(.boxed) i.icon,
.datepicker-panel > ul > li.picked, .pricing-table .list-group-item:before, .btn-text i, .dropdown-menu ul > li:hover > a,.shop-menu-cnt > i:hover,
.advs-box-content h2:hover a, .pricing-table .pricing-price span, .datepicker-panel > ul > li.picked:hover, footer h4, .box-menu-inner .icon-box i,
.caption-bottom p, .mi-menu li .fa, .fullpage-arrow.arrow-circle .arrow i, .accordion-list .list-group-item > a i, .mega-menu .fa-ul .fa-li,.shop-menu-cnt .cart-total,
.adv-circle.adv-circle-center i, .mi-menu a > .fa, .box-steps .step-item:after, .box-steps .step-number, h6, li.panel-item .fa-li, .icon-menu .navbar-collapse ul.nav i,
.side-menu i, .side-menu ul a i, .bs-menu li:hover > a, .bs-menu li.active > a, .hamburger-button:hover, .img-box.adv-circle i, .advs-box-side .icon, .advs-box-side-icon i,
.title-icon i, i, .fullpage-menu.white li.active a i, .timeline > li > .timeline-label h4, .anima-button i, .advs-box-multiple div i,
.footer-center .footer-title, .accordion-list .list-group-item > a.active, footer a:hover, .block-quote.quote-1:before, .text-muted .block-quote.quote-2:before, .breadcrumb > li + li:before, div .extra-content, .navbar-default .navbar-nav > .active > a {
    color: [MAIN-COLOR];
}

@media (max-width: 994px) {
    .navbar-nav .open .dropdown-menu > li > a[href="#"] {
        color: [MAIN-COLOR] !important;
    }
}

.footer-minimal .footer-title, .advs-box-top-icon.boxed .btn, .advs-box-top-icon.boxed .circle-button, .sidebar-nav ul a:hover, header .mi-menu .sidebar-nav ul a:hover,
.woocommerce div.product span.price, .white .text-color, .accordion-list .list-group-item > a:hover, .boxed .circle-button:hover i, .dropdown-menu > li > a:hover,
.pagination > .active > a, .pagination > li:not(.disabled):hover > a, .boxed .circle-button, header .btn-search:hover, .advs-box h2 a:hover, .nav.ms-minimal > li.active > a,
header.scroll-css .navbar-default .navbar-nav > .active > a, header.menu-transparent.scroll-css .navbar-default .navbar-nav > li:hover > a, header.menu-transparent.scroll-css .navbar-default .navbar-nav > .active > a, header .navbar-default .navbar-nav > li:hover > a {
    color: [MAIN-COLOR] !important;
}

.btn-border:hover, .btn.btn-border:hover, .btn.circle-button.btn-border:hover, .tag-row i {
    color: [HOVER-COLOR];
}

    .btn-border:hover i, .white .btn i {
        color: [HOVER-COLOR] !important;
    }

.btn-color.btn-border,.btn-color .btn-border, .nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus, .pagination > li:not(.disabled):hover > a i:before {
    border-color: [MAIN-COLOR] !important;
    color: [MAIN-COLOR] !important;
}

.nav.inner.ms-rounded > li > a:hover, .nav.inner.ms-rounded > li.active a, .white .btn:hover, .white .btn, .white .btn:hover {
    background-color: [MAIN-COLOR] !important;
    border-color: [MAIN-COLOR] !important;
}

    .circle-button:not(.btn-border), .btn-default, .white .btn:not(.btn-border), .bg-transparent .navbar-nav > li.active > a .caret:before, .bg-transparent .navbar-nav > li:hover > a .caret:before,
    .white .btn-text, .scroll-top-mobile:hover:before, .tab-box.left:not(.pills) .panel-box, .tab-box.right:not(.pills) .panel-box, .tab-box.right .nav-tabs {
        border-color: [MAIN-COLOR];
    }

.boxed.advs-box-multiple .advs-box-content, .niche-box-post, .extra-content, .quote-author, .border-color, .border-color.boxed-border.boxed-border.white, .timeline > li > .timeline-badge,
body div.boxed-border.border-yellow {
    border-color: [MAIN-COLOR] !important;
}

.datepicker-top-left, .datepicker-top-right {
    border-top-color: [MAIN-COLOR];
}

    .datepicker-top-left:before, .datepicker-top-right:before {
        border-bottom-color: [MAIN-COLOR];
    }

.text-color {
    color: [HOVER-COLOR];
}

.circle-button:hover, .btn:hover {
    border-color: [HOVER-COLOR] !important;
}

.btn-text, html .advs-box .btn-text:after, .btn-color.btn-border:hover {
    color: [HOVER-COLOR];
    border-color: [HOVER-COLOR];
}

body, .adv-img p, .caption-bottom p, .adv-circle .caption p, .advs-box p, .pricing-table .list-group-item, a, .list-items .list-item p, .tab-box .nav-tabs > li > a span, div.caption-bottom p,
.header-base:not(.white) p, .title-base p, div.title-icon p {
    color: [COLOR-3];
}

.img-box.inner .caption {
    color: [COLOR-3] !important;
}

header.menu-transparent .nav .caret:before, footer .tag-row span {
    border-color: [COLOR-3];
}
.btn-border, .btn.btn-border, .btn.circle-button.btn-border, h1, h2, .box-pin h3, .pricing-table h3, .pricing-table .list-group-item.pricing-price, .pricing-table .list-group-item.pricing-price span,
.niche-box-testimonails-cloud .name-box .subtitle, .icon-box label, .advs-box-multiple div.circle, .box-steps .step-item > h3, .adv-img-down-text h2 a, .counter-box-simple.text-color span + span, #comments h5,
.list-items .list-item h3, tab-box .nav-tabs > li.active > a, .counter-circle, ul.list-texts li b, .nav.ms-minimal li a, .nav.inner.ms-rounded li a, .text-color-2, .list-blog p, .tag-row span, .tag-row a,.cart-content h5,.shop-menu-cnt .cart-total span,
.niche-box-post h2 a, .list-blog h5, .block-title a, .block-infos p.bd-day, .comment-list .name, .countdown .countdown-values, .niche-box-testimonails h5, .author a, .maso-order i, .panel-default > .panel-heading {
    color: [COLOR-4];
}

.advs-box h3, .advs-box h2, h4, .breadcrumb > li:before, .advs-box h3 a, .advs-box h2 a,.woocommerce div.product p.price,.woocommerce table.shop_table th,.woocommerce-checkout .woocommerce h3 {
    color: [COLOR-4] !important;
}

footer, .flex-control-paging li a:hover, .bg-color {
    background-color: [COLOR-4] !important;
}

.flex-control-paging li a.flex-active, .header-slider .flex-control-paging li a.flex-active, .input-group-btn .btn, .btn.btn-primary:hover,.header-base.white .breadcrumb,.list-blog input[type="submit"] {
    border-color: [COLOR-4];
    background-color: [COLOR-4];
}

.flex-control-paging li a, .header-slider .flex-control-paging li a, body div .flexslider .flex-direction-nav a, div.flexslider .flex-direction-nav li a:before {
    border-color: [COLOR-4];
}';
?>
