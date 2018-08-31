<?php
/*
 * The template for displaying archive pages
*/
?>

<?php get_header(); ?>


  <div class="page-wrap">
    <div class="container">

      <div class="breadcrumb">
        <?php the_breadcrumb(); ?>
      </div>

      <div class="main-content">

        <h1>Наши новости</h1>

        <div class="row">

        <?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>

          <div class="col-md-4">
            <div class="news-item">
              <div class="date"><?php the_date(); ?></div>
              <a href="<?php the_permalink(); ?>" class="news-title"><?php the_title(); ?></a>
              <!-- <a href="#"><img src="assets/img/news.jpg" alt="" class="img-responsive"></a> -->
              <div><?php the_truncated_post(100); ?></div>
              <a href="<?php the_permalink(); ?>" class="text-link">Читать далее</a>
            </div> <!-- //.news-item -->
          </div> <!-- //.col -->


          <?php endwhile; ?>

        </div> 

        <ul class="pagination">
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
        </ul> <!-- //.pagination -->

        <?php endif; ?>
        
      </div> <!-- //.main-content -->
      
    </div> <!-- //.container -->
  </div> <!-- //.page-wrap-->


  <?php get_footer(); ?>