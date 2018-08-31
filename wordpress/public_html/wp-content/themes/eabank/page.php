<?php
/*
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
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

        <?php if(get_field('eab_insurance')){ ?>
          <a href="https://www.asv.org.ru/insurance/banks_list/281365/" class="insurance" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/insurance.png" alt="система страхования вкладов"></a>
        <?php } ?>

      	<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>

        <h1><?php the_title(); ?></h1>

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