<?php
/*
 * Template Name: Депозиты
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

        <div class="deposit-calc calc-wrap form-template">
          <div class="row">
            <div class="col-md-7">
              <form id="calc">
                <div class="calc-group currency">
                  <p>Валюта</p>
                  <div class="switcher-wrap">
                    <label class="radio-inline" for="currency1">
                      <input type="radio" name="currency_switcher" id="currency1" value="0" checked>
                      <span>Рубли</span>
                    </label>
                    <label class="radio-inline" for="currency2">
                      <input type="radio" name="currency_switcher" id="currency2" value="1">
                      <span>Доллары США</span>
                    </label>
                    <label class="radio-inline" for="currency3">
                      <input type="radio" name="currency_switcher" id="currency3" value="2">
                      <span>Евро</span>
                    </label>
                  </div> <!-- //.switcher -->
                </div> <!-- //.calc-group currency -->
                <div class="calc-group amount">
                  <div class="form-group">
                    <label for="input_amount">Сумма вклада</label>
                    <input type="text" id="input_amount" class="form-control numeric" value="1500000">
                  </div> <!-- //.form-group -->
                  <div id="amount_range"></div>
                  <ul class="range-scale">
                    <li>1 т.</li>
                    <li>3 млн.</li>
          					<li>7 млн.</li>
                    <li>10 млн.</li>
                    <li>15 млн.</li>
                    <li>20 млн.</li>
                  </ul>
                </div> <!-- //.calc-group amount -->
                <div class="calc-group period">
                  <div class="form-group">
                    <label for="select_period">На срок</label>
					<input type="text" id="select_period" class="form-control " value="366 дней (12 мес.)">
                  </div> <!-- //.form-group -->
                  <div id="period_range"></div>
                  <ul class="range-scale">
                    <li>1</li>
                    <li>6</li>
                    <li>12</li>
                    <li>18</li>
                    <li>24</li>
                    <li>30</li>
					<li>36</li>
                  </ul>
                </div> <!-- //.calc-group period -->
                <div class="calc-group replenish">
                  <div class="form-group">
                    <label for="input_replenish">Ежемесячное пополнение</label>
                    <input type="text" id="input_replenish" class="form-control numeric" value="0">
                  </div> <!-- //.form-group -->
                  <div id="replenish_range"></div>
                  <ul class="range-scale">
                    <li>0</li>
                    <li>10 т.</li>
                    <li>100 т.</li>
                    <li>500 т.</li>
                    <li>1 млн.</li>
                  </ul>
                </div> <!-- //.calc-group replenish -->
                <div class="calc-group check-wrap">
                  <div class="checkbox">
                    <label for="capitalization">
                      <input type="checkbox" id="capitalization"> 
                      <span class="check-custom"></span>
                      Ежемесячная капитализация
                    </label>
                  </div> <!-- //.checkbox -->
                  <div class="checkbox">
                    <label for="partout">
                      <input type="checkbox" id="partout"> 
                      <span class="check-custom"></span>
                      Частичное снятие
                    </label>
                  </div> <!-- //.checkbox -->
                </div> <!-- //.calc-group check-wrap -->
              </form>
            </div> <!-- //.col -->
            <div class="col-md-5">
              <div class="deposit-output">
                <div class="wrap">
                  <h3 id="vklad">VIP</h3>
                  <dl class="stavka">
                    <dd>Ставка</dd>
                    <dt id="percent">6.85 %</dt>
                  </dl>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="graph">
                        <dl>
                          <dd>Есть сейчас</dd>
                          <dt id="sum_now">1 500 000  руб.</dt>
                        </dl>
                        <div class="graph-body">
                          <div class="graph-amount"></div>
                        </div> <!-- //.graph-body -->
                      </div> <!-- //.graph -->
                    </div> <!-- //.col-md-6 -->
                    <div class="col-md-6">
                      <div class="graph">
                        <dl>
                          <dd>Будет</dd>
                          <dt id="sum_then" class="sum_then">1 603 032  руб.</dt>
                        </dl>
                        <div class="graph-body">
                          <div class="graph-earned"></div>
                          <div class="graph-amount"></div>
                        </div> <!-- //.graph-body -->
                      </div> <!-- //.graph -->
                    </div> <!-- //.col-md-6 -->
                  </div> <!-- //.row -->
                  <dl class="result">
                    <dd>Начислено %</dd>
                    <dt id="sum_prcnt">103 032 руб.</dt>
                    <dd id="replnt_period">Пополнение за 12 мес.</dd>
                    <dt id="sum_replnt">0 руб.</dt>
                  </dl>
                </div> <!-- //.wrap -->
                <div class="wrap bottom">
                  <div class="result-period">
                    К снятию через <span id="result_period">12 мес.</span>
                  </div> <!-- //.result-period -->
                  <div class="result-sum sum_then" id="result_sum">
                    1 603 032 руб.
                  </div> <!-- //.result-sum -->
                  <a href="#modal_calc" class="btn" data-toggle="modal">Заполнить заявку на вклад</a>
                </div> <!-- //.wrap bottom -->
              </div> <!-- //.deposit-output -->
            </div> <!-- //.col -->
          </div> <!-- //.row -->
        </div> <!-- //.deposit-calc -->

        <div class="article">
          <?php the_content(); ?>

          <?php if(get_field('more_title') && get_field('more_text')) :?><!-- //.archive-wrap -->
  
            <div class="archive-wrap">
              <a class="collapse-link collapsed" role="button" data-toggle="collapse" href="#moreInfo" aria-expanded="false" aria-controls="collapseExample"><?php the_field('more_title'); ?><span></span></a>
              <div class="collapse collapse-wrap" id="moreInfo">
                <?php the_field('more_text'); ?>
              </div>
            </div> 

          <?php endif; ?><!-- //.archive-wrap -->
          
        </div> <!-- //.article -->

        <?php endwhile; ?>
        <?php endif; ?>
        
      </div> <!-- //.main-content -->
      
    </div> <!-- //.container -->
  </div> <!-- //.page-wrap-->


<?php get_footer(); ?>