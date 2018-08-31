<?php
/*
 * Template Name: Партнеры
*/
?>

<?php get_header(); ?>

  <?php 
    if (get_field('add_slider')) {
      the_field('add_slider');
    }
  ?>

	<div class="page-wrap">
    <div class="container">

      <div class="breadcrumb">
        <?php the_breadcrumb() ?>
      </div>

      <div class="main-content">

        <h1><?php the_title(); ?></h1>

        <div class="tariffs partners row">
          <div class="col-md-4 text-center">
            <div class="box">
              <div class="box-title">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/stroyprogress.png" alt="">
                <span>ООО фирма «Стройпрогресс»</span>
              </div> <!-- //.box-title -->
              <div class="hover-box">
                <p>одно из крупных и надежных предприятий государственного значения на строительном рынке России</p>
                <a href="http://www.stroyprogress.su/" class="btn" target="_blank">Перейти</a>
              </div> <!-- //.hover-box -->
            </div> <!-- //.box -->
          </div>
          <div class="col-md-4 text-center">
            <div class="box">
              <div class="box-title">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/artlogistic.png" alt="">
                <span>ООО «Арт-Лоджистик»</span>
              </div> <!-- //.box-title -->
              <div class="hover-box">
                <p>логистика, один из крупнейших складских специализированных комплексов класса «А» на юге Московской области для хранения продуктов питания</p>
                <a href="http://www.artlogistic.su/" class="btn" target="_blank">Перейти</a>
              </div> <!-- //.hover-box -->
            </div> <!-- //.box -->
          </div>
          <div class="col-md-4 text-center">
            <div class="box">
              <div class="box-title">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/zubovskievorota.png" alt="">
                <span>ООО «Зубовские ворота»</span>
              </div> <!-- //.box-title -->
              <div class="hover-box">
                <p>сдача в аренду нежилых помещений</p>
                <a href="http://zubovskie-vorota.forrent.ru/" class="btn" target="_blank">Перейти</a>
              </div> <!-- //.hover-box -->
            </div> <!-- //.box -->
          </div>
          <div class="col-md-4 text-center">
            <div class="box">
              <div class="box-title">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/zolotoygorod.png" alt="">
                <span>ООО УК «ЗОЛОТОЙ ГОРОД»</span>
              </div> <!-- //.box-title -->
              <div class="hover-box">
                <p>расположен в Веневском районе Тульской области, предоставляет спортивные, оздоровительные и развлекательные услуги</p>
                <a href="http://www.zolotoygorod.com/" class="btn" target="_blank">Перейти</a>
              </div> <!-- //.hover-box -->
            </div> <!-- //.box -->
          </div>
          <div class="col-md-4 text-center">
            <div class="box">
              <div class="box-title">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/wallpaper.png" alt="">
                <span>ЗАО «Московская обойная фабрика»</span>
              </div> <!-- //.box-title -->
              <div class="hover-box">
                <p>производство обоев уже больше 150 лет</p>
                <a href="http://www.wallpaper.ru/" class="btn" target="_blank">Перейти</a>
              </div> <!-- //.hover-box -->
            </div> <!-- //.box -->
          </div>
          <div class="col-md-4 text-center">
            <div class="box">
              <div class="box-title">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/wallpaper.png" alt="">
                <span>ООО «Стройобои»</span>
              </div> <!-- //.box-title -->
              <div class="hover-box">
                <p class="font-size-16">один из крупнейших поставщиков обоев высокого качества на российском рынке. Занимается розничной и оптовой продажей экологичных флизелиновых и бумажных обоев производства Московской Обойной Фабрики, продажей высококачественных виниловых обоев</p>
                <a href="http://www.wallpaper.ru/" class="btn" target="_blank">Перейти</a>
              </div> <!-- //.hover-box -->
            </div> <!-- //.box -->
          </div>
          <div class="col-md-4 text-center">
            <div class="box">
              <div class="box-title">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/oboitd.png" alt="">
                <span>ООО «Дом обоев на Красносельской»</span>
              </div> <!-- //.box-title -->
              <div class="hover-box">
                <p>оптовая торговля обоями</p>
                <a href="http://oboitd.ru/" class="btn" target="_blank">Перейти</a>
              </div> <!-- //.hover-box -->
            </div> <!-- //.box -->
          </div>
          <div class="col-md-4 text-center">
            <div class="box">
              <div class="box-title">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/vegagroupp.png" alt="">
                <span>ООО «ВегаГрупп»</span>
              </div> <!-- //.box-title -->
              <div class="hover-box">
                <p>уличное игровое и спортивно-развивающее оборудование</p>
                <a href="https://www.vegagroupp.ru/" class="btn" target="_blank">Перейти</a>
              </div> <!-- //.hover-box -->
            </div> <!-- //.box -->
          </div>
          <div class="col-md-4 text-center">
            <div class="box">
              <div class="box-title">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/oaomzk.png" alt="">
                <span>ООО «Механический завод «Калязинский»</span>
              </div> <!-- //.box-title -->
              <div class="hover-box">
                <p>производство бурового и нефтепромыслового оборудования</p>
                <a href="http://www.oaomzk.ru//" class="btn" target="_blank">Перейти</a>
              </div> <!-- //.hover-box -->
            </div> <!-- //.box -->
          </div>
          <div class="col-md-4 text-center">
            <div class="box">
              <div class="box-title">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/stroyprogress.png" alt="">
                <span>ЗАО «Скуратовский завод «Стройтехника»</span>
              </div> <!-- //.box-title -->
              <div class="hover-box">
                <p class="font-size-16">производство и продажа строительного оборудования, предприятие выполняет федеральные заказы правительства РФ в сотрудничестве с ОАО «Газпром»</p>
                <a href="http://www.spstt.ru/" class="btn" target="_blank">Перейти</a>
              </div> <!-- //.hover-box -->
            </div> <!-- //.box -->
          </div>
          <div class="col-md-4 text-center">
            <div class="box">
              <div class="box-title">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/panatest.png" alt="">
                <span>ООО «ПАНАТЕСТ»</span>
              </div> <!-- //.box-title -->
              <div class="hover-box">
                <p class="font-size-16">официальный представитель ведущих фирм производителей современного оборудования для контроля трубопроводов, сварных соединений, бетонных объектов, линий электропередач</p>
                <a href="http://www.panatest.ru/" class="btn" target="_blank">Перейти</a>
              </div> <!-- //.hover-box -->
            </div> <!-- //.box -->
          </div>
          <div class="col-md-4 text-center">
            <div class="box">
              <div class="box-title">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/partner.png" alt="">
                <span>ООО «Южно-Охтеурское»</span>
              </div> <!-- //.box-title -->
              <div class="hover-box">
                <p>добыча нефти в Томской области, за последние два года объем добычи нефти на Южно-Охтеурском месторождении увеличился в 10 раз</p>
              </div> <!-- //.hover-box -->
            </div> <!-- //.box -->
          </div>
          <div class="col-md-4 text-center">
            <div class="box">
              <div class="box-title">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/partner.png" alt="">
                <span>АО «Руснефтегаз»</span>
              </div> <!-- //.box-title -->
              <div class="hover-box">
                <p>Управляющая компания в нефтяном бизнесе</p>
              </div> <!-- //.hover-box -->
            </div> <!-- //.box -->
          </div>
        </div>

        <h2>Партнеры в Тульском регионе</h2>

        <div class="tariffs partners row">
          <div class="col-md-6 text-center">
            <div class="box">
              <div class="box-title">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/partner.png" alt="">
                <span>АО Птицефабрика «Тульская»</span>
              </div> <!-- //.box-title -->
              <div class="hover-box">
                <p>является крупнейшим предприятием по разведению домашней птицы и реализации куриного яйца в Тульской области</p>
              </div> <!-- //.hover-box -->
            </div> <!-- //.box -->
          </div>
          <div class="col-md-6 text-center">
            <div class="box">
              <div class="box-title">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/partner.png" alt="">
                <span>ООО «Родина»</span>
              </div> <!-- //.box-title -->
              <div class="hover-box">
                <p>специализируется на выращивании зерновых культур и молочном животноводстве. Является одним из ведущих сельхозтоваропроизводителей Тульской области</p>
              </div> <!-- //.hover-box -->
            </div> <!-- //.box -->
          </div>
        </div>

       
      </div> <!-- //.main-content -->
      
    </div> <!-- //.container -->
  </div> <!-- //.page-wrap-->


<?php get_footer(); ?>