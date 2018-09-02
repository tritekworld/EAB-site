<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title><?php the_title(); ?> | Банк ЕАБ</title>
  <!-- Import main styles -->
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

  <?php wp_head(); ?>

</head>
<body>

  <div id="modal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Заявка</h4>
        </div>
        <div class="modal-body">
          <?php echo do_shortcode( '[contact-form-7 id="999957127" title="Заявка (юр)"]' ); ?>
        </div>
      </div>
    </div>
  </div>

  <div id="banking" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Заголовок модального окна -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Интернет-банк</h4>
        </div>
        <div class="modal-body">
          <ul class="bank-lica list-unstyled list-inline">
            <li><a href="https://eab.handybank.ru/" target="_blank">Для физических лиц</a></li>
            <li><a href="https://dbo.eab.ru" target="_blank">Для юридических лиц</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div id="mobbank" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Заголовок модального окна -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Мобильный банк</h4>
        </div>
        <div class="modal-body">
          <ul class="bank-lica list-unstyled list-inline">
            <li class="andriod"><a href="https://play.google.com/store/apps/details?id=com.bifit.mobile.corporate.eab" target="_blank">Для Android устройств</a></li>
            <li class="apple">
              <a href="#" target="_blank" class="disabled">Для Apple устройств
                <small>(Данное приложение скоро будет доступно)</small>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <header>
    <div class="top-header">
      <div class="container">
        <ul class="list-unstyled list-inline">
          <li><span class="hidden-xs">119021, г. Москва, Зубовский бульвар, д. 22/39</span></li>
          <li><a href="mailto:info@eab.ru"><span class="hidden-xs">info@eab.ru</span></a></li>
        </ul>
        <?php wp_nav_menu( array(
          'theme_location'  => 'top-header',
          'menu'            => 'Top Menu',
          'container'       => 'ul',
          'container_class' => '',
          'container_id'    => '',
          'menu_class'      => 'list-unstyled list-inline pull-right',
          'menu_id'         => '',
          'echo'            => true,
          'fallback_cb'     => 'wp_page_menu',
          'before'          => '',
          'after'           => '',
          'link_before'     => '',
          'link_after'      => '',
          'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
          'depth'           => 0,
          'walker'          => '',
        ) ); ?>
      </div> <!-- //.container -->
    </div> <!-- //.top-header -->
    <div class="main-header">
      <div class="container">
        <div class="wrap">
          <div class="logo">
            <?php the_custom_logo(); ?>
            <a href="/">
               <span>Евроазиатский<br>Инвестиционный<br>Банк</span>
             </a>
          </div> <!-- //.logo -->
          <ul class="switcher list-unstyled list-inline">
            <li><a href="/">Частным лицам</a></li>
            <li class="active"><a href="/juridicheskim-licam/">Бизнесу</a></li>
          </ul> <!-- //.switcher -->
          <a href="#banking" class="internet-bank hidden-xs" data-toggle="modal">Интернет-банк</a>
          <a href="tel:88005555603" class="phone">
            <span>Звоните бесплатно:</span>
            <strong>8 (800) 5555-603</strong>
          </a>
        </div> <!-- //.wrap -->
        <!-- <a href="https://www.asv.org.ru/insurance/banks_list/281365/" class="insurance" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/insurance.png" alt="система страхования вкладов"></a> -->
      </div> <!-- //.container -->
    </div> <!-- //.main-header -->
    <nav class="navbar navbar-default main-menu">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu"></button>
          <div class="btn-wrap visible-xs">
            <a href="#banking" class="internet-bank" data-toggle="modal"></a>
            <a href="#search_form" class="nav-search" data-toggle="collapse"></a>
          </div> <!-- //.btn-wrap -->
        </div>
        <div class="mob-form-wrap" id="search_form" class="collapse">
          <form class="navbar-form navbar-right" role="search">
            <div class="form-group">
              <input type="search" class="form-control" placeholder="Поиск по сайту" required>
              <button type="submit"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon_search.png" alt="Найти"></button>
            </div>
          </form>
        </div> <!-- //.mob-form-wrap -->
        <div class="collapse navbar-collapse" id="main-menu">

          <?php wp_nav_menu( array(
            'theme_location'  => 'primary_buisness',
            'depth'           => 2, 
            'container_id'    => 'main-menu',
            'menu_class'      => 'nav navbar-nav',
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker(),
          ) );

          ?>

          <?php get_search_form(); ?>
          
        </div><!-- //.navbar-collapse -->
      </div><!-- //.container -->
    </nav>
  </header>