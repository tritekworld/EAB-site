<?php
/*
 * Template Name: Кредит (тип)
*/
?>

<?php get_header(); ?>

  <div id="creditOrder" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Заявка на кредит</h4>
        </div>
        <div class="modal-body">
          <?php echo do_shortcode( '[contact-form-7 id="999958300" title="Заявка (кредит)"]' ); ?>
        </div>
      </div>
    </div>
  </div>

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

        <div class="credit-features">
          <div class="row">
            <div class="col-md-3 col-sm-3">
              <div class="wrap">
                <div>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon_credit1.png" alt="Сумма кредита">
                </div>
                <p>Сумма кредита</p>
                <h4>От 100 000 руб.</h4>
              </div> <!-- //.wrap -->
            </div> <!-- //.col -->
            <div class="col-md-3 col-sm-3">
              <div class="wrap">
                <div>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon_credit2.png" alt="Срок кредита">
                </div>
                <p>Срок кредита</p>
                <h4>До 5-ти лет</h4>
              </div> <!-- //.wrap -->
            </div> <!-- //.col -->
            <div class="col-md-3 col-sm-3">
              <div class="wrap">
                <div>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon_credit3.png" alt="Процент одобрения">
                </div>
                <p>Процент одобрения</p>
                <h4>90% Одобрения</h4>
              </div> <!-- //.wrap -->
            </div> <!-- //.col -->
            <div class="col-md-3 col-sm-3">
              <div class="wrap">
                <div>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon_credit4.png" alt="Решение по кредиту">
                </div>
                <p>Решение по кредиту</p>
                <h4>до 30-ти минут</h4>
              </div> <!-- //.wrap -->
            </div> <!-- //.col -->
          </div> <!-- //.row -->
        </div> <!-- //.credit-features -->

        <a class="collapse-link collapsed" role="button" data-toggle="collapse" href="#moreCredit" aria-expanded="false" aria-controls="collapseExample">Подробнее о кредите<span></span></a>
        <div class="collapse collapse-wrap" id="moreCredit">
          <div class="credit-data">
            <div class="row">
              <div class="col-md-2 col-sm-2">
                <div class="box">
                  <h5>Название кредита</h5>
                  <p><strong>Кредит «Разовый»</strong></p>
                </div> <!-- //.box -->
              </div> <!-- //.col -->
              <div class="col-md-2 col-sm-2">
                <div class="box">
                  <h5>Для кого</h5>
                  <p>Для физических лиц</p>
                </div> <!-- //.box -->
              </div> <!-- //.col -->
              <div class="col-md-2 col-sm-2">
                <div class="box">
                  <h5>Ставка</h5>
                  <p>от 9,5 %</p>
                </div> <!-- //.box -->
              </div> <!-- //.col -->
              <div class="col-md-2 col-sm-2">
                <div class="box">
                  <h5>Срок кредита</h5>
                  <p>до 5-ти лет</p>
                </div> <!-- //.box -->
              </div> <!-- //.col -->
              <div class="col-md-2 col-sm-2">
                <div class="box">
                  <h5>Пакет документов</h5>
                  <p>Паспорт, справка подтверждения дохода (по форме банка), второй документ подвтерждающий личность</p>
                </div> <!-- //.box -->
              </div> <!-- //.col -->
              <div class="col-md-2 col-sm-2">
                <div class="box">
                  <h5>Сумма кредита</h5>
                  <p>от 100 000 до 1 000 000 руб.</p>
                </div> <!-- //.box -->
              </div> <!-- //.col -->
            </div> <!-- //.row -->
          </div> <!-- //.credit-data -->
          <div class="article">
            <h5>Описание кредитной программы</h5>
            <?php the_content(); ?>
            <!-- <a href="#" class="doc-link">Полные условия кредита (3.5 мб.)</a> -->
          </div> <!-- //.article -->
        </div>

        <?php endwhile; ?>
        <?php endif; ?>

        <!-- Credit Calc -->

        <div class="calc-wrap credit-calc form-template">
          <form>
            <div class="row">
              <div class="col-md-8">
                <div class="wrap">
                  <h2>Рассчитать кредит</h2>
                  <div class="form-group">
                     <label for="credit_amount">Сколько денег вам нужно</label>
                     <div class="calc-group">
                       <div id="credit_amount_range"></div>
                       <ul class="range-scale">
                         <li>30 тыс.</li>
                         <li>100 тыс.</li>
                         <li>200 тыс.</li>
                         <li>1 млн.</li>
                       </ul>
                     </div> <!-- //.calc-group -->
                     <input type="text" class="form-control numeric" id="credit_amount" value="150000">
                     <span id="credit_amount_sign"></span>
                  </div> <!-- //.form-group -->
                  <div class="form-group">
                     <label for="credit_period">Срок кредита</label>
                     <div class="calc-group">
                       <div id="credit_period_range"></div>
                       <ul class="range-scale">
                         <li>3 мес.</li>
                         <li>12 мес.</li>
                         <li>36 мес.</li>
                         <li>60 мес.</li>
                       </ul>
                     </div> <!-- //.calc-group -->
                     <input type="text" class="form-control" id="credit_period" value="24">
                     <span id="credit_period_sign"></span>
                  </div> <!-- //.form-group -->
                  <p class="note">Расчет предварительный. Сниженная ставка по кредиту действует до 31 июля 2018 года при подаче заявки. Точная ставка и сумма кредита будут определены при оформлении договора. Банк вправе отказать в выдаче кредита без объяснения причин.</p>
                </div> <!-- //.wrap -->
              </div> <!-- //.col -->
              <div class="col-md-4">
                <div class="credit-output">
                  <dl>
                    <dd>Ежемесячный платеж</dd>
                    <dt id="month_sum"></dt>
                  </dl>
                  <dl>
                    <dd>Ставка</dd>
                    <dt>13,5%</dt>
                  </dl>
                  <dl>
                    <dd>Переплата</dd>
                    <dt id="over_payment"></dt>
                  </dl>
                  <a href="#creditOrder" data-toggle="modal" class="btn">Подать заявку на кредит</a>
                </div> <!-- //.credit-output -->
              </div> <!-- //.col -->
            </div> <!-- //.row -->
          </form> <!-- //.col -->
        </div> <!-- //.calc-wrap -->
        
        <!-- Credit Calc -->
        
      </div> <!-- //.main-content -->
      
    </div> <!-- //.container -->
  </div> <!-- //.page-wrap-->

<?php get_footer(); ?>