<?php
/*
 * Template Name: Переводы
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
          <?php //the_content(); ?>

          <ul class="tabs img-tabs">
            <li class="active"><a href="#korona"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/korona.jpg" alt="корона"></a></li>
            <li><a href="#contact"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/contact.jpg" alt="контакт"></a></li>
          </ul> 
          <hr>
          <div class="tab-content">
            <div id="korona" class="tab-pane fade in active">
              <?php 
                $id1 = 999955962;
                $post1 = get_post($id1);
                echo apply_filters('the_content', $post1->post_content);
               ?>
               <a href="https://koronapay.com/transfers/Pages/default.aspx" class="btn" target="_blank">Сделать перевод</a> <a href="https://koronapay.com/transfers/Pages/Transfer.aspx" class="text-link" target="_blank">Узнать тарифы</a>
            </div>
            <div id="contact" class="tab-pane fade">
               <?php 
                $id2 = 999955969;
                $post2 = get_post($id2);
                echo apply_filters('the_content', $post2->post_content);
               ?>
               <a href="https://www.contact-sys.com/" class="btn" target="_blank">Сделать перевод</a> <a href="https://www.contact-sys.com/tariffs" class="text-link" target="_blank">Узнать тарифы</a>
            </div>
          </div> <!-- //.tab-content -->
        </div> <!-- //.article -->
          
        <?php endwhile; ?>
        <?php endif; ?>
        
      </div> <!-- //.main-content -->
      
    </div> <!-- //.container -->
  </div> <!-- //.page-wrap-->



  <?php get_footer(); ?>