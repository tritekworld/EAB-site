<?php
/*
 * The template for displaying posts
 *
 * This is the template that displays all posts by default.
*/
?>

<?php get_header(); ?>

	<div class="page-wrap">
    
    <?php 
      // Start the loop.
      while ( have_posts() ) :
        the_post();
     ?>

    <div class="container">

      <ul class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li><a href="/novosti/">Новости</a></li>
        <li><?php the_title(); ?></li>
      </ul> <!-- //.breadcrumb -->

      <div class="main-content">

        <h1><?php the_title(); ?></h1>

        <div class="article">
          <?php the_content(); ?>
        </div> <!-- //.article -->

        <ul class="post-nav row list-unstyled list-inline">
          <li class="col-md-4"><?php previous_post_link(); ?></li>
          <li class="col-md-4 col-md-4 pull-right"><?php next_post_link(); ?></li>
        </ul>
        
      </div> <!-- //.main-content -->
      
    </div> <!-- //.container -->

    <?php 
      // End the loop.
      endwhile;
     ?>

  </div> <!-- //.page-wrap-->
 <?php get_footer(); ?>