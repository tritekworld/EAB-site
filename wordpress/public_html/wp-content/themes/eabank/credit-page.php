<?php
/*
 * Template Name: Кредиты
*/
?>

<?php get_header(); ?>

  <div id="credit1" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Разовый кредит</h4>
        </div>
        <div class="modal-body">
          <div class="article">
            <?php 
              $credit_content_1 = get_post(999955935);
              echo $credit_content_1->post_content;
             ?>
          </div> <!-- //.article -->
        </div>
      </div>
    </div>
  </div>

  <div id="credit2" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Овердрафт</h4>
        </div>
        <div class="modal-body">
          <div class="article">
            <?php 
              $credit_content_2 = get_post(999955952);
              echo $credit_content_2->post_content;
             ?>
          </div> <!-- //.article -->
        </div>
      </div>
    </div>
  </div>

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

        <h1>Кредиты для физических лиц</h1>

        <div class="credit-widget">
          <div class="row">
            <div class="col-md-6">
              <div class="wrap bg1">
                <h3>Разовый кредит</h3>
                <ul class="list-checked">
                  <li>Сумма от 10 000 руб.</li>
                  <li>Ставка от 13,5%</li>
                  <li>Срок до 5-ти лет</li>
                </ul>
                <a href="#credit1" class="btn" data-toggle="modal">Подробнее</a>
              </div> <!-- //.wra -->
            </div> <!-- //.col -->
            <div class="col-md-6">
              <div class="wrap bg4">
                <h3>Овердрафт</h3>
                <ul class="list-checked">
                  <li>Сумма от 10 000 руб.</li>
                  <li>Ставка от 13,5%</li>
                  <li>Срок до 5-ти лет</li>
                </ul>
                <a href="#credit2" class="btn" data-toggle="modal">Подробнее</a>
              </div> <!-- //.wra -->
            </div> <!-- //.col -->
          </div> <!-- //.row -->
        </div> <!-- //.credit-widget -->

        <div class="article">
          <?php the_content(); ?>

          <?php if(get_field('more_title') && get_field('more_text')) :?><!-- //.archive-wrap -->
  
            <div class="archive-wrap">
              <a class="collapse-link collapsed" role="button" data-toggle="collapse" href="#moreInfo" aria-expanded="false" aria-controls="moreInfo"><?php the_field('more_title'); ?><span></span></a>
              <div class="collapse collapse-wrap" id="moreInfo">
                <?php the_field('more_text'); ?>
              </div>
            </div> 

          <?php endif; ?><!-- //.archive-wrap -->
          
        </div> <!-- //.article -->

        <?php endwhile; ?>
        <?php endif; ?>
        
      </div> <!-- //.main-content -->
      
    </div> <!-- //.container -->
  </div> <!-- //.page-wrap-->

<?php get_footer(); ?>