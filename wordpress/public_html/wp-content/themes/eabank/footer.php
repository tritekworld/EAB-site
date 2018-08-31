  <footer>
    <div class="footer-menu">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h4 data-toggle="collapse" data-target="#list1" class="collapsed">О Банке</h4>
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
            <h4 data-toggle="collapse" data-target="#list2" class="collapsed">Физическим лицам</h4>
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
            <h4 data-toggle="collapse" data-target="#list3" class="collapsed">Бизнесу</h4>
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
            <h4 data-toggle="collapse" data-target="#list4" class="collapsed">Информационные материалы</h4>
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
              Лицензия №2897, выданная Банком России 26.11.2012г.<br>
              119021, г. Москва, Зубовский бульвар, д. 22/39
            </p>
          </div> <!-- //.widget -->
        </div> <!-- //.col-md-5 -->
      </div> <!-- //.container -->
    </div> <!-- //.footer-widgets -->
  </footer>

  <?php wp_footer(); ?>

</body>
</html>