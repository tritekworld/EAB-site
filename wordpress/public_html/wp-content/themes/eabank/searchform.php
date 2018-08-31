<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>" class="navbar-form navbar-right hidden-xs">
  <div class="form-group">
    <input type="search" class="form-control" placeholder="Поиск по сайту" value="<?php echo get_search_query(); ?>" name="s" id="s" required>
    <button type="submit"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon_search.png" alt="Найти"></button>
  </div>
</form>