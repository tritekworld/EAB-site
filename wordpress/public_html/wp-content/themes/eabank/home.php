<?php
/*
 * The template for displaying archive pages
*/
?>

<?php get_header(); ?>


  <div class="page-wrap">
    <div class="container">

      <ul class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li>Новости</li>
      </ul> <!-- //.breadcrumb -->

      <div class="main-content">

        <h1>Наши новости</h1>

        <div class="row">

        <?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>

          <div class="col-md-4">
            <div class="news-item">
              <div class="date"><?php echo get_the_date(); ?></div>
              <a href="<?php the_permalink(); ?>" class="news-title"><?php the_truncated_title(100); ?></a>
              <!-- <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail() ?></a> -->
              <div><?php the_truncated_post(200); ?></div>
              <a href="<?php the_permalink(); ?>" class="text-link">Читать далее</a>
            </div> <!-- //.news-item -->
          </div> <!-- //.col -->


          <?php endwhile; ?>

        </div> 

        <?php wp_pagenavi(); ?>

        <?php endif; ?>
        
      </div> <!-- //.main-content -->
      
    </div> <!-- //.container -->
  </div> <!-- //.page-wrap-->


  <?php get_footer(); ?>