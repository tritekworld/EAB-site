<?php
/*
 * Template Name: Вопрос-ответ
 *
*/
?>

<?php get_header(); ?>

	<div class="page-wrap">
    <div class="container">

      <div class="breadcrumb">
        <?php the_breadcrumb() ?>
      </div>

      <div class="main-content">

      	<h1><?php the_title(); ?></h1>

          <div class="panel-group faq-wrap" id="accordion" role="tablist" aria-multiselectable="true">

          <?php 
            $args = array(
              'sort_order'   => 'ASC',
              'sort_column'  => 'menu_order',
              'hierarchical' => 1,
              'child_of'     => 999956365,
              'parent'       => -1,
              'post_type'    => 'page',
              'post_status'  => 'publish',
            ); 
            $pages = get_pages( $args );
            $faq_number = 1;
            foreach( $pages as $post ){
              setup_postdata( $post );
              // формат вывода
          ?>

          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading<?php echo $faq_number; ?>">
              <h4 class="panel-title">
                <a class="collapse-link collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $faq_number; ?>" aria-expanded="false" aria-controls="collapse<?php echo $faq_number; ?>">
                  <?php the_title(); ?>
                  <span></span>
                </a>
              </h4>
            </div>
            <div id="collapse<?php echo $faq_number; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $faq_number; ?>">
              <div class="panel-body">
                <?php the_content(); ?>
              </div>
            </div>
          </div>
          
          <?php $faq_number ++; ?>
          <?php 
            }  
            wp_reset_postdata();
          ?>
          </div> <!-- //.panel-group faq-wrap -->

          <?php echo do_shortcode('[contact-form-7 id="999956870" title="Задать вопрос"]'); ?>
        
      </div> <!-- //.main-content -->
      
    </div> <!-- //.container -->
  </div> <!-- //.page-wrap-->


<?php get_footer(); ?>