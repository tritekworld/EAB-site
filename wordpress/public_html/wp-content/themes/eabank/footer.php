  <footer id="footer">
    <div class="footer-menu">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h4 class="visible-md visible-lg">О Банке</h4>
            <h4 class="hidden-md hidden-lg"><a href="#list1" data-toggle="collapse" class="collapsed">О Банке</a></h4>
            <?php wp_nav_menu( array(
              'menu'            => 'footer_menu_about',
              'menu_class'      => 'list1',
              'menu_id'         => 'list1',
              'echo'            => true,
              'fallback_cb'     => 'wp_page_menu',
              'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
              'depth'           => 0,
            ) ); ?>
          </div> <!-- //.col -->
          <div class="col-md-3">
            <h4 class="visible-md visible-lg">Физическим лицам</h4>
            <h4 class="hidden-md hidden-lg"><a href="#list2" data-toggle="collapse" class="collapsed">Физическим лицам</a></h4>
            <?php wp_nav_menu( array(
              'menu'            => 'footer_menu_fiz',
              'menu_class'      => 'list2',
              'menu_id'         => 'list2',
              'echo'            => true,
              'fallback_cb'     => 'wp_page_menu',
              'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
              'depth'           => 0,
            ) ); ?>
          </div> <!-- //.col-->
          <div class="col-md-3">
            <h4 class="visible-md visible-lg">Бизнесу</h4>
            <h4 class="hidden-md hidden-lg"><a href="#list3" data-toggle="collapse" class="collapsed">Бизнесу</a></h4>
            <?php wp_nav_menu( array(
              'menu'            => 'footer_menu_buisness',
              'menu_class'      => 'list3',
              'menu_id'         => 'list3',
              'echo'            => true,
              'fallback_cb'     => 'wp_page_menu',
              'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
              'depth'           => 0,
            ) ); ?>
          </div> <!-- //.col -->
          <div class="col-md-12">
            <h4 class="visible-md visible-lg">Информационные материалы</h4>
            <h4 class="hidden-md hidden-lg"><a href="#list4" data-toggle="collapse" class="collapsed">Информационные материалы</a></h4>
            <?php wp_nav_menu( array(
              'menu'            => 'footer_menu_info',
              'menu_class'      => 'list4',
              'menu_id'         => 'list4',
              'echo'            => true,
              'fallback_cb'     => 'wp_page_menu',
              'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
              'depth'           => 0,
            ) ); ?>
          </div> <!-- //.col -->
        </div> <!-- //.row -->
      </div> <!-- //.container -->
    </div> <!-- //.footer-menu -->
    <div class="footer-widgets">
      <div class="container">
        <div class="col-md-3 col-md-push-5">
          <div class="widget">
            <a href="tel:88005555603" class="phone">
              <span>Звоните бесплатно:</span>
              <strong>8 (800) 5555-603</strong>
            </a>
          </div> <!-- //.widget -->
        </div> <!-- //.col-md-3 -->
        <div class="col-md-2 col-md-push-5">
          <div class="widget">
            <ul class="list-unstyled list-inline">
              <li><a href="facebook.com"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon_fb.png" alt="fb"></a></li>
              <li><a href="vk.com"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon_vk.png" alt="vk"></a></li>
              <li><a href="instagram.com"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon_inst.png" alt="instagram"></a></li>
            </ul>
          </div> <!-- //.widget -->
        </div> <!-- //.col-md-2 -->
        <div class="col-md-2 col-md-push-5">
          <a href="https://www.asv.org.ru/insurance/banks_list/281365/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/insurance.png" alt="система страхования вкладов"></a>
        </div> <!-- //.col-md-2 -->
        <div class="col-md-5 col-md-pull-7">
          <div class="widget">
            <p>
              © 2014-<?php echo date('Y'); ?><br>
              ООО КБ «Евроазиатский Инвестиционный Банк»<br>
              Регистрационный №2897 от 10.06.1994г.<br>
              119021, г. Москва, Зубовский бульвар, д. 22/39
            </p>
          </div> <!-- //.widget -->
        </div> <!-- //.col-md-5 -->
      </div> <!-- //.container -->
    </div> <!-- //.footer-widgets -->
    <div class="footer-dev">
      <div class="container">
        <p>Сайт разработан <a href="http://tritek.su/" target="_blank">TRITEK</a> & <a href="http://helengroup.ru/" target="_blank">HELEN GROUP</a></p>
      </div> <!-- //.container -->
    </div> <!-- //.footer-dev -->
  </footer>

  <?php wp_footer(); ?>

</body>
</html>