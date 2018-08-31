<?php
/*
 * Template Name: Отчетность
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


        <div class="article">

          <h2>Бухгалтерская отчетность</h2>
          
          <ul class="tabs years-tabs">
            <li class="active"><a href="#tab_2018">2018</a></li>
            <li><a href="#tab_2017">2017</a></li>
            <li><a href="#tab_2016">2016</a></li>
            <li><a href="#tab_2015">2015</a></li>
            <li><a href="#tab_2014">2014</a></li>
          </ul> 
          <hr>
          <div class="tab-content">
            <div id="tab_2018" class="tab-pane fade in active">
              <?php 
                $id1 = 999958283;
                $post1 = get_post($id1);
                echo apply_filters('the_content', $post1->post_content);
               ?>
            </div>
            <div id="tab_2017" class="tab-pane fade">
              <?php 
                $id2 = 999958285;
                $post2 = get_post($id2);
                echo apply_filters('the_content', $post2->post_content);
               ?>
            </div>
            <div id="tab_2016" class="tab-pane fade">
              <?php 
                $id3 = 999958287;
                $post3 = get_post($id3);
                echo apply_filters('the_content', $post3->post_content);
               ?>
            </div>
            <div id="tab_2015" class="tab-pane fade">
              <?php 
                $id4 = 999958289;
                $post4 = get_post($id4);
                echo apply_filters('the_content', $post4->post_content);
               ?>
            </div>
            <div id="tab_2014" class="tab-pane fade">
              <?php 
                $id5 = 999958291;
                $post5 = get_post($id5);
                echo apply_filters('the_content', $post5->post_content);
               ?>
            </div>
          </div> <!-- //.tab-content -->


          <?php the_content(); ?>
          <?php endwhile; ?>
        <?php endif; ?>
        </div> <!-- //.article -->
        
      </div> <!-- //.main-content -->
      
    </div> <!-- //.container -->
  </div> <!-- //.page-wrap-->



  <?php get_footer(); ?>