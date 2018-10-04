<?php 
function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );
add_action( 'wp_enqueue_scripts', 'eab_styles' );
add_action( 'wp_enqueue_scripts', 'jquery_lib' );
add_action( 'wp_enqueue_scripts', 'eab_scripts' );

function jquery_lib(){
  wp_enqueue_script( 'jquery' );
}

function eab_styles() {
  wp_enqueue_style( 'main', get_stylesheet_uri() );
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
  wp_enqueue_style( 'ekko-lightbox', get_template_directory_uri() . '/assets/css/ekko-lightbox.css' );
  wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css' );
  wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css' );
  wp_enqueue_style( 'formstyler', get_template_directory_uri() . '/assets/css/jquery.formstyler.css' );
  wp_enqueue_style( 'formstyler-theme', get_template_directory_uri() . '/assets/css/jquery.formstyler.theme.css' );
  wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.min.css' );
  wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css' );
}

function eab_scripts() {
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), null );
  wp_enqueue_script( 'ekko-lightbox', get_template_directory_uri() . '/assets/js/ekko-lightbox.js', array( 'jquery' ), null );
  wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.js', array( 'jquery' ), null );
  wp_enqueue_script( 'formstyler', get_template_directory_uri() . '/assets/js/jquery.formstyler.min.js', array( 'jquery' ), null );
  wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/assets/js/jquery-ui.js', array( 'jquery' ), null );
  wp_enqueue_script( 'jquery-ui-touch-punch', get_template_directory_uri() . '/assets/js/jquery.ui.touch-punch.min.js', array( 'jquery-ui' ), null );
  wp_enqueue_script( 'jquery-number', get_template_directory_uri() . '/assets/js/jquery.number.min.js', array( 'jquery' ), null );
  wp_enqueue_script( 'functions', get_template_directory_uri() . '/assets/js/functions.js', array( 'jquery' ), null );
}

add_theme_support( 'custom-logo' );
add_theme_support('menus');
add_theme_support( 'post-thumbnails', array( 'post' ) );

/* BEGIN OF breadcrumb */

function the_breadcrumb(){
global $post;
if(!is_home()){ 
   echo '<a href="'.site_url().'">Главная</a> <span></span> ';
  if(is_single()){ // записи
  the_category(', ');
  echo " <span></span> ";
  the_title();
  }
  elseif (is_page()) { // страницы
    if ($post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' <span></span> ';
    }
    echo the_title();
  }
  elseif (is_category()) { // категории
    global $wp_query;
    $obj_cat = $wp_query->get_queried_object();
    $current_cat = $obj_cat->term_id;
    $current_cat = get_category($current_cat);
    $parent_cat = get_category($current_cat->parent);
    if ($current_cat->parent != 0) 
      echo(get_category_parents($parent_cat, TRUE, ' <span></span> '));
    single_cat_title();
  }
  elseif (is_search()) { // страницы поиска
    echo 'Результаты поиска для "' . get_search_query() . '"';
  }
  elseif (is_tag()) { // теги (метки)
    echo single_tag_title('', false);
  }
  elseif (is_day()) { // архивы (по дням)
    echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> <span></span> ';
    echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> <span></span> ';
    echo get_the_time('d');
  }
  elseif (is_month()) { // архивы (по месяцам)
    echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> <span></span> ';
    echo get_the_time('F');
  }
  elseif (is_year()) { // архивы (по годам)
    echo get_the_time('Y');
  }
  elseif (is_author()) { // авторы
    global $author;
    $userdata = get_userdata($author);
    echo 'Опубликовал(а) ' . $userdata->display_name;
  } elseif (is_404()) { // если страницы не существует
    echo 'Ошибка 404';
  }
 
  if (get_query_var('paged')) // номер текущей страницы
    echo ' (' . get_query_var('paged').'-я страница)';
 
} else { // главная
   $pageNum=(get_query_var('paged')) ? get_query_var('paged') : 1;
   if($pageNum>1)
      echo '<a href="'.site_url().'">Главная</a> <span></span> '.$pageNum.'-я страница';
   else
      echo 'Вы находитесь на главной странице';
}
}

/* END OF breadcrumb */


// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';


// register nav menus
register_nav_menus( array(
  'primary' => __( 'Primary Menu', 'THEMENAME' ),
  'primary_buisness' => __( 'Primary Buisness Menu', 'THEMENAME' ),
) );


// register Sidebar
function eab_widgets(){
  $args = array(
    'name'          => __( 'Front Page Widgets', 'eabank' ),
    'id'            => 'widget_front',
    'description'   => 'Виджет для главной страницы',
    'class'         => '',
    'before_widget' => '<div class="widget-fronf widget-plugin">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widget_title">',
    'after_title'   => '</h2>',
  );
  
  register_sidebar( $args );
  
}
add_action( 'widgets_init', 'eab_widgets' );

// анонс поста

function the_truncated_post($symbol_amount) {
  $filtered = strip_tags( preg_replace('@<style[^>]*?>.*?</style>@si', '', preg_replace('@<script[^>]*?>.*?</script>@si', '', apply_filters('the_content', get_the_content()))) );
  echo substr($filtered, 0, strrpos(substr($filtered, 0, $symbol_amount), ' ')) . '...';
}
function the_truncated_title($symbol_amount) {
  $filtered = strip_tags( preg_replace('@<style[^>]*?>.*?</style>@si', '', preg_replace('@<script[^>]*?>.*?</script>@si', '', apply_filters('the_content', get_the_title()))) );
  echo substr($filtered, 0, strrpos(substr($filtered, 0, $symbol_amount), ' ')) . '...';
}












 ?>