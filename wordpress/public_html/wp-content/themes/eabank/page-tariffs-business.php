<?php
/*
 * Template Name: Тарифы Юр. лицам
*/
?>

<?php get_header('buisness'); ?>

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

        <div class="tariffs row">
          <div class="col-md-6 text-center">
            <div class="box">
              <div class="box-title">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/kremlin.png" alt="">
                <span>Тарифы для г. Москва</span>
              </div> <!-- //.box-title -->
              <div class="hover-box">
                <a href="/juridicheskim-licam/tarify/tarify-moskva/" class="btn">Перейти</a>
              </div> <!-- //.hover-box -->
            </div> <!-- //.box -->
          </div>
          <div class="col-md-6 text-center">
            <div class="box">
              <div class="box-title">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/tula.png" alt="">
              <span>Тарифы для г. Тула</span>
              </div> <!-- //.box-title -->
              <div class="hover-box">
                <a href="/juridicheskim-licam/tarify/tarify-tulskogo-filiala/" class="btn">Перейти</a>
              </div> <!-- //.hover-box -->
            </div> <!-- //.box -->
          </div>
        </div>

      	<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>

        <div class="article">
          <?php the_content(); ?>

          <?php if(get_field('more_title') && get_field('more_text')) :?>
  
            <div class="archive-wrap">
              <a class="collapse-link collapsed" role="button" data-toggle="collapse" href="#moreInfo" aria-expanded="false" aria-controls="collapseExample"><?php the_field('more_title'); ?><span></span></a>
              <div class="collapse collapse-wrap" id="moreInfo">
                <?php the_field('more_text'); ?>
              </div>
            </div> <!-- //.archive-wrap -->

          <?php endif; ?>

        </div> <!-- //.article -->

        <?php endwhile; ?>
				<?php endif; ?>
        
      </div> <!-- //.main-content -->
      
    </div> <!-- //.container -->
  </div> <!-- //.page-wrap-->


<?php get_footer(); ?>