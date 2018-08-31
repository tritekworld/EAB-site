<?php
/*
 * Template Name: Счета и банковские карты
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

        <?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>

        <h1><?php the_title(); ?></h1>

        <div class="article">

          <p>ООО КБ «Евроазиатский Инвестиционный Банк» г. Москва предлагает комплексное расчетно-кассовое обслуживание физических лиц - резидентов и нерезидентов РФ, в валюте РФ и иностранной валюте.</p>
  
          <div class="credit-widget">
            <div class="row">
              <div class="col-md-6">
                <div class="wrap bg5">
                  <h3>Visa Classic</h3>
                  <ul class="list-checked">
                    <li>Экономично</li>
                    <li>Безопасно</li>
                    <li>Удобно</li>
                  </ul>
                  <a href="#modal" data-toggle="modal" class="btn">Подробнее</a>
                </div> <!-- //.wra -->
              </div> <!-- //.col -->
              <div class="col-md-6">
                <div class="wrap bg6">
                  <h3>Visa Gold</h3>
                  <ul class="list-checked">
                    <li>Престижно</li>
                    <li>Гибкие комиссии</li>
                    <li>Специальные предложения</li>
                  </ul>
                  <a href="#modal" data-toggle="modal" class="btn">Подробнее</a>
                </div> <!-- //.wra -->
              </div> <!-- //.col -->
            </div> <!-- //.row -->
          </div> <!-- //.credit-widget -->



          <?php the_content(); ?>
          
          <?php if(get_field('more_title') && get_field('more_text')) :?><!-- //.archive-wrap -->
  
            <div class="archive-wrap">
              <a class="collapse-link collapsed" role="button" data-toggle="collapse" href="#moreInfo" aria-expanded="false" aria-controls="moreInfo"><?php the_field('more_title'); ?><span></span></a>
              <div class="collapse collapse-wrap" id="moreInfo">
                <?php the_field('more_text'); ?>
              </div>
            </div> 

          <?php endif; ?><!-- //.archive-wrap -->

          <h2>Перечень документов</h2>

          <div class="tab-wrap">
            <ul id="docList" class="tabs card-tabs">
              <li class="active"><a href="#resident">Резидентам РФ</a></li>
              <li><a href="#neresident">Нерезидентам РФ</a></li>
              <li><a href="#for_account">Документы, необходимые для открытия счета</a></li>
            </ul>
            <hr>
            <div class="tab-content">
              <div id="resident" class="tab-pane fade in active">
                <?php 
                  $id1 = 999956007;
                  $post1 = get_post($id1);
                  echo apply_filters('the_content', $post1->post_content);
                 ?>
              </div>
              <div id="neresident" class="tab-pane fade">
                <?php 
                  $id2 = 999956009;
                  $post2 = get_post($id2);
                  echo apply_filters('the_content', $post2->post_content);
                 ?>
              </div>
              <div id="for_account" class="tab-pane fade">
                <?php 
                  $id3 = 999958082;
                  $post3 = get_post($id3);
                  echo apply_filters('the_content', $post3->post_content);
                 ?>
              </div>
            </div> <!-- //.tab-content -->
          </div> <!-- //.tab-wrap -->

        </div> <!-- //.article -->
        
        <?php endwhile; ?>
        <?php endif; ?>
        
      </div> <!-- //.main-content -->
      
    </div> <!-- //.container -->
  </div> <!-- //.page-wrap-->



  <?php get_footer(); ?>