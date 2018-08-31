<?php
/*
 * Template Name: Контакты
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

        <div class="article">
          <div class="row">

        <?php 
          $args = array(
            'sort_order'   => 'ASC',
            'sort_column'  => 'menu_order',
            'hierarchical' => 1,
            'child_of'     => 999955767,
            'parent'       => -1,
            'post_type'    => 'page',
            'post_status'  => 'publish',
          ); 
          $pages = get_pages( $args );
          foreach( $pages as $post ){
            setup_postdata( $post );
            // формат вывода
        ?>
            <div class="col-md-6">
              <div class="contact">
                <h4><?php the_title(); ?></h4>
                <ul>
                  <?php if (get_field('contact_boss')) { ?>
                    <li class="boss"><?php the_field('contact_boss'); ?></li>
                  <?php } ?>
                  <?php if (get_field('contact_adress')) { ?>
                    <li class="adress"><?php the_field('contact_adress'); ?><?php if (get_field('contact_map')) { ?><a href="<?php the_field('contact_map'); ?>" data-toggle="lightbox" data-title="Схема проезда">Схема проезда</a><?php } ?></li>
                  <?php } ?>
                  <?php if (get_field('contact_phone')) { ?>
                    <li class="phone"><?php the_field('contact_phone'); ?></li>
                  <?php } ?>
                  <?php if (get_field('contact_mail')) { ?>
                    <li class="mail"><a href="mailto:<?php the_field('contact_mail'); ?>"><?php the_field('contact_mail'); ?></a></li>
                  <?php } ?>
                  <?php if (get_field('contact_time')) { ?>
                    <li class="time"><?php the_field('contact_time'); ?></li>
                  <?php } ?>
                </ul>
              </div> <!-- //.contact -->
            </div> <!-- //.col -->
        <?php 
          }  
          wp_reset_postdata();
        ?>
          </div> <!-- //.row -->
        </div> <!-- //.article -->
        
      </div> <!-- //.main-content -->
      
    </div> <!-- //.container -->
  </div> <!-- //.page-wrap-->



  <?php get_footer(); ?>