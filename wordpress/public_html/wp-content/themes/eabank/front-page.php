<?php
/*
Template Name: Главная
*/
?>

<?php get_header(); ?>

	<?php 
		if (get_field('add_slider')) {
			the_field('add_slider');
		}
	?>

  <section class="main">
    <div class="container">
      <h2>Выгодные предложения</h2>
      <div class="order-slider-wrap">
        <div class="order-slider">
					
					<?php 
          $args = array(
            'sort_order'   => 'ASC',
            'sort_column'  => 'menu_order',
            'hierarchical' => 1,
            'child_of'     => 999956193,
            'parent'       => -1,
            'post_type'    => 'page',
            'post_status'  => 'publish',
          ); 
          $pages = get_pages( $args );
          foreach( $pages as $post ){
            setup_postdata( $post );
            // формат вывода
        ?>

          <div class="item">
            <div class="wrap">
            	<img src="<?php the_field('vygoda_photo'); ?>" alt="<?php the_title(); ?>" class="img-responsive">
              <div class="box">
                <h3><?php the_title(); ?></h3>
                <p><?php the_content(); ?></p>
                <a href="<?php the_field('vygoda_link'); ?>" class="btn"><?php the_field('vygoda_btn'); ?></a>
              </div> <!-- //.box -->
            </div> <!-- //.wrap -->
          </div> <!-- //.item -->
          <?php 
	          }  
	          wp_reset_postdata();
	        ?>
        </div> <!-- //.order-slider -->
      </div> <!-- //.order-slider-wrap -->
      <h2>Курсы валют</h2>
      <?php 
        $eab_cur_date = get_field('eab_date', false, false);
        $eab_cur_date = new DateTime($eab_cur_date);
       ?>
      <div class="row">
        <div class="col-md-4">
          <?php get_sidebar( 'widget-frontpage' ); ?>
        </div> <!-- //.col-md-4 -->
        <div class="col-md-8">
          <h5>Курс обмена наличной валюты c <?php echo $eab_cur_date->format('d.m.Y'); ?></h5>
          <div class="row">
            <div class="col-md-6">
              <h5 class="sky">Московский регион</h5>
              <div class="widget-fronf">
                <table border="0" cellpadding="4" cellspacing="0">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Покупка</th>
                      <th>Продажа</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td> USD</td>
                      <td><?php the_field('msk_usd_pokupka'); ?></td>
                      <td><?php the_field('msk_usd_prodazha'); ?></td>
                    </tr>
                    <tr>
                      <td> EUR</td>
                      <td><?php the_field('msk_eur_pokupka'); ?></td>
                      <td><?php the_field('msk_eur_prodazha'); ?></td>
                    </tr>
                  </tbody>
                </table>
              </div> <!-- //.widget-fronf -->
            </div> <!-- //.col-md-6 -->
            <div class="col-md-6">
              <h5 class="sky">Тульский филиал</h5>
              <div class="widget-fronf">
                <table border="0" cellpadding="4" cellspacing="0">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Покупка</th>
                      <th>Продажа</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td> USD</td>
                      <td><?php the_field('tula_usd_pokupka'); ?></td>
                      <td><?php the_field('tula_usd_prodazha'); ?></td>
                    </tr>
                    <tr>
                      <td> EUR</td>
                      <td><?php the_field('tula_eur_pokupka'); ?></td>
                      <td><?php the_field('tula_eur_prodazha'); ?></td>
                    </tr>
                  </tbody>
                </table>
              </div> <!-- //.widget-fronf -->
            </div> <!-- //.col-md-6 -->
          </div> <!-- //.row -->
        </div> <!-- //.col-md-8 -->
      </div> <!-- //.row -->
    </div> <!-- //.container -->
  </section> <!-- //.main -->

  <section class="apply">
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-md-offset-1 col-xs-12">
          <div class="img-slider">
            <div class="item">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img.png" alt="">
            </div> <!-- //.item -->
            <div class="item">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img.png" alt="">
            </div> <!-- //.item -->
            <div class="item">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img.png" alt="">
            </div> <!-- //.item -->
            <div class="item">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/img.png" alt="">
            </div> <!-- //.item -->
          </div> <!-- //.img-slider -->
        </div> <!-- //.col -->
        <div class="col-md-5 col-xs-12">
          <div class="wrap">
            <h2>Вклады и карты прямо в приложении</h2>
            <div class="description-slider">
              <div class="item">
                <p>Удобное мобильное приложение. Вклады, счета, карты в режиме Online.</p>
              </div> <!-- //.item -->
              <div class="item">
                <p>Оплата услуг и денежные переводы. Контроль расходов. Быстро, качественно, безопасно.</p>
              </div> <!-- //.item -->
              <div class="item">
                <p>Приложение всегда под рукой. Бесплатно для Apple IOS и Andriod.</p>
              </div> <!-- //.item -->
            </div> <!-- //.description-slider -->
            <a href="#mobbank" class="btn" data-toggle="modal">Скачать</a>
          </div> <!-- //.wrap -->
        </div> <!-- //.col -->
      </div> <!-- //.row -->
    </div> <!-- //.container -->
  </section> <!-- //.apply -->

  <section class="services">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-6">
          <strong>Денежные переводы</strong>
          <a href="/perevody/" class="service-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/service1.png" alt="" class="img-responsive">
          </a> <!-- //.service-item -->
        </div> <!-- //.col -->
        <div class="col-md-3 col-md-push-3 col-sm-6 col-xs-6">
          <strong class="transparent-xs">Денежные переводы</strong>
          <a href="/perevody/" class="service-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/service3.png" alt="" class="img-responsive">
          </a> <!-- //.service-item -->
        </div> <!-- //.col -->
        <div class="col-md-3 col-md-pull-3 col-sm-6 col-xs-6">
          <strong>Интернет-банкинг</strong>
          <a href="https://eab.handybank.ru/" target="_blank" class="service-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/service2.png" alt="" class="img-responsive">
          </a> <!-- //.service-item -->
        </div> <!-- //.col -->
        <div class="col-md-3 col-sm-6 col-xs-6">
          <strong>Банковские карты VISA</strong>
          <a href="/scheta-i-karty/" class="service-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/service4.png" alt="" class="img-responsive">
          </a> <!-- //.service-item -->
        </div> <!-- //.col -->
      </div> <!-- //.row -->
    </div> <!-- //.container -->
  </section> <!-- //.services -->

<?php get_footer(); ?>