(function ($) {
  'use strict';

  $(document).ready(function () {
	//$('input.numeric').number( true, 0, ',', ' ' );
    $('.carousel-caption .btn').click(function() {
      $('#modal').modal('show');
    });

  	$('.order-slider').slick({
  		arrows: true,
  		prevArrow: '<button type="button" class="btn-round arrow-prev"></button>',
  		nextArrow: '<button type="button" class="btn-round arrow-next"></button>',
  		slidesToShow: 4,
  		responsive: [
  			{
  				breakpoint: 768,
  				settings: {
		        slidesToShow: 1
		      }
  			}
  		]
  	});

  	$('.description-slider').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  dots: true,
		  prevArrow: '<button type="button" class="btn-round arrow-prev"></button>',
  		nextArrow: '<button type="button" class="btn-round arrow-next"></button>',
		  asNavFor: '.img-slider'
		});
		$('.img-slider').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  fade: true,
		  arrows: false,
		  asNavFor: '.description-slider'
		});

    $('select').styler();

		$(".tabs a").click(function(e){
	    e.preventDefault();
	    $(this).tab('show');
	  });

	  $(document).on('click', '[data-toggle="lightbox"]', function(event) {
		  event.preventDefault();
		  $(this).ekkoLightbox({
		    alwaysShowClose: true
		  });
		});


    // приколы с меню

    $('.dropdown ul').removeClass('dropdown-menu').wrap('<div class="dropdown-menu"></div>');



		// переход по ссылке с классом dropdown

		function menu_dropdown(){
      if($(window).width() > 768){
				$('.dropdown a.dropdown-toggle').click(function() {
			    location.href = $(this).attr('href');
			  });
      }
    }
    menu_dropdown();
    $(window).resize(function() {
      menu_dropdown();
    });


	  // меню в футере

    function menu_collapse(){
      if($(window).width() < 991){
	      $('.footer-menu ul').addClass('collapse');
      }
    }
    menu_collapse();
    $(window).resize(function() {
      menu_collapse();
    });


    // deposit calc

var deposits = {
  'До востребования': [
    {'cur': 'rub', 'stavka': 0.10, 'min': 0.00, 'link': '/vklady/vklad-do-vostrebovanija/'},
    {'cur': 'usd', 'stavka': 0.05, 'min': 0.00, 'link': '/vklady/vklad-do-vostrebovanija/'},
    {'cur': 'euro', 'stavka': 0.05, 'min': 0.00, 'link': '/vklady/vklad-do-vostrebovanija/'}
  ],
  'Классика': [
    {'cur': 'rub', 'stavka': 6.95, 'min': 10000, 'link': '/vklady/vklad-klassika/'},
    {'cur': 'usd', 'stavka': 2.00, 'min': 350, 'link': '/vklady/vklad-klassika/'},
    {'cur': 'euro', 'stavka': 0.17, 'min': 250, 'link': '/vklady/vklad-klassika/'}
  ],
  'Универсал': [
    {'cur': 'rub', 'stavka': 5.70, 'min': 10000, 'link': '/vklady/vklad-universal/'},
    {'cur': 'usd', 'stavka': 1.65, 'min': 1000, 'link': '/vklady/vklad-universal/'},
    {'cur': 'euro', 'stavka': 0.098, 'min': 750, 'link': '/vklady/vklad-universal/'}
  ],
  'VIP': [
    {'cur': 'rub', 'stavka': 7.10, 'min': 1000000, 'link': '/vklady/vklad-vip/'},
    {'cur': 'usd', 'stavka': 1.80, 'min': 30000, 'link': '/vklady/vklad-vip/'},
    {'cur': 'euro', 'stavka': 0.17, 'min': 30000, 'link': '/vklady/vklad-vip/'}
  ],
  'Высокий доход': [
    {'cur': 'rub', 'stavka': 4.75, 'min': 100000, 'link': '/vklady/vklad-vysokij-dohod/'},
    {'cur': 'usd', 'stavka': 0.00, 'min': 0, 'link': '/vklady/vklad-vysokij-dohod/'},
    {'cur': 'euro', 'stavka': 0.00, 'min': 0,'link': '/vklady/vklad-vysokij-dohod/'}
  ]
};


$('select').change(function(){
  var valuta = $('#selectCurrency').val();
  var vklad = $('#selectVklad').val();
  var sum = $('#inputSum').val();
      sum = parseInt(sum);
  var term = $('#inputTerm').val();
      term = parseInt(term);


  $.each(deposits,function(key,data) {
    if(key == vklad){
      console.log('Вклад: ' + key + sum);
        $.each(data, function(index,value) {
          if(value['cur'] == valuta){
            var plus = Math.round(sum*value['stavka']*term/(365*100)).toFixed(2);
                plus = parseInt(plus);
            var result = Math.round(sum + plus).toFixed(2);
            console.log('Итоговая сумма: ' + result + '; Ваша выгода: = '+ plus);
          }
        });
    }
  });
});
  

    $('#depositCalc').click(function(){

      var sum = $('#inputSum').val();
          sum = parseInt(sum);
      var term = $('#inputTerm').val();
          term = parseInt(term);
      var valuta = $('#selectCurrency').val();
      var vklad = $('#selectVklad').val();

    	if(sum){
        $.each(deposits,function(key,data) {
          if(key == vklad){
            $.each(data, function(index,value) {
              if(value['cur'] == valuta){
                var plus = Math.round(sum*value['stavka']*term/(365*100)).toFixed(2);
                    plus = parseInt(plus);
                var result = Math.round(sum + plus).toFixed(2);

                $('.calc-result').fadeIn('slow');
                $('.success').fadeIn('slow');
                $('#resultSum').text(result + ' руб.');
                $('#resultPlus').text(plus + ' руб.');
                $('#resultStavka').text(value['stavka'] + ' руб.');
                $('#resultVklad').text(vklad).attr('href', value['link']);
                $('#error').hide();
              }
            });
          }
        });
    		
    	}
    	else {
    		$('.calc-result').fadeIn('slow');
    		$('#error').fadeIn('slow');
    		$('#error').text('Введите сумму вклада');
    		$('.success').hide();
    	}

    });

    /* end of Calculator */

    $(".n2-ss-layer.btn").click(function() {
      $("#modal").modal('show');
    });


    // mob bank modal

    $('.mobbank-modal a').click(function(){
      $('#mobbank').modal('show');
    });
    $("#mobbankTab a").click(function(e){
      e.preventDefault();
      $(this).tab('show');
    });


    // deposit calc


  $("#input_amount").on('input', function() {
    $('#amount_range').slider("value", $(this).val());
  })
    $('#amount_range').slider({
      range: 'min',
    animate: "fast",
      value: 1500000,
      min: 1000,
      max: 20000000,
      step: 1000,
      slide: function(event, ui) {
        $("#input_amount").val(ui.value);
      },
    change: function (event, ui) {
        calculate();
      }
    });
    $("#input_amount").val($("#amount_range").slider("value"));
  
  $("#input_replenish").on('input', function() {
    $('#replenish_range').slider("value", $(this).val());
  })
    $('#replenish_range').slider({
      range: 'min',
      value: 0,
    animate: "fast",
      min: 0,
      max: 1000000,
      step: 1000,
      slide: function(event, ui) {
        $("#input_replenish").val(ui.value);
      },
    change: function (event, ui) {
        calculate();
      }
    });
    $("#input_replenish").val($("#replenish_range").slider("value"));
  
  $("#select_period").on('change', function() {
    $('#period_range').slider("value", $(this).val());
    $(this).val(get_month($(this).val()));
  })
  $('#period_range').slider({
      range: 'min',
      value: 60,
    animate: "fast",
      min: 31,
      max: 1080,
      step: 1,
      slide: function(event, ui) {
        $("#select_period").val(get_month(ui.value));
      },
    change: function (event, ui) {
        calculate();
    }
    });
    $("#select_period").val(get_month($("#period_range").slider("value")));

  
  function get_month(d) {
    return d + ' дней (' + (Math.round(parseInt(d)/30)) +' мес.)';
  }
  calculate();
$("#calc input:not([type=text])").on('change', function(){
  calculate();
});
  function get_curr(a) {
    switch (a) {
      case '0':
      return ' руб.'
      
      case '1':
      return ' $'
      
      case '2':
      return ' €'
      
    }
  }
  function calculate(){
    //console.log((++cntr)+' Changed!');
    let input_data = {sum:parseInt($("#input_amount").val()),
    repl:parseInt($("#input_replenish").val()),
    period:parseInt($("#select_period").val()),
    curr:$("input[name=currency_switcher]:checked").val(),
    monthly:$("#capitalization").prop('checked'),
    part:$("#partout").prop('checked')}, max=0, selected='',mplus='0',curr;
    $.each(input_data,function(key,val) {
    console.log(key+': '+val);
    });
    $.each(deposits,function(key,data) {
          
            $.each(data, function(index,value) {
              if(index === (+input_data.curr)){
				  if ( input_data.repl===0) {
					  if ( !input_data.monthly) {
					  
                let plus = Math.round(input_data.sum*value['stavka']*input_data.period/(365*100)).toFixed(0);
                    plus = parseInt(plus);
                let result = Math.round(input_data.sum + plus).toFixed(0);
        if (result>max && value['min']<input_data.sum) {
          max=result;
          selected=key;
          mplus=plus;
                }		
				  }
				  else {
					if (key==='Классика' || key==='Универсал' || key==='VIP' ) { 
					let s=input_data.sum,i,plus;
 
					for (i = 0; i < Math.floor(input_data.period/30); i++) {
	                plus = Math.round(s*value['stavka']*30/(365*100)).toFixed(0);
                    plus = parseInt(plus);
					s = Math.round(+s + +plus).toFixed(0);
					}
					let result=s; plus = s-input_data.sum;
        if (result>max && value['min']<input_data.sum) {
          max=result;
          selected=key;
          mplus=plus;
                }	
					}
	
				  }
				
				
			  } else {   //S = P доп.*M / I*((1+I / M) M*n-1)+P*(1+ I / M) M*n;
	let result = Math.round(input_data.repl*Math.floor(input_data.period/30)/(0.01*value['stavka'])*(Math.pow((1+(0.01*value['stavka'])/Math.floor(input_data.period/30)), Math.floor(input_data.period/30)*Math.round(input_data.period/365))-1) + input_data.sum*Math.pow((1+(0.01*value['stavka'])/Math.floor(input_data.period/30)), Math.floor(input_data.period/30)*Math.round(input_data.period/365)));
	
	
                    result = parseInt(result);
                let plus = Math.round(result-input_data.sum ).toFixed(0);
        if (result>max && value['min']<input_data.sum) {
          max=result;
          selected=key;
          mplus=plus;}  
				  
				  
			  }
                
              }
            });
          
        });
    curr= get_curr(input_data.curr);
    console.log('Selected: '+selected+'; Result: '+max);
        $('#sum_now').text($.number(input_data.sum, 0, ',', ' ' ) + curr);
        $('.sum_then').text($.number(max, 0, ',', ' ' ) + curr);
                $('#sum_prcnt').text($.number(mplus, 0, ',', ' ' ) + curr);
                $('#percent').text(deposits[selected][input_data.curr]['stavka'] + ' %');
                $('#vklad').text(selected);
         $('#result_period').text(Math.round(input_data.period/30) +' мес.');
		         $('#sum_replnt').text($.number((input_data.period*input_data.repl/30), 0, ',', ' ' ) + curr);
				$('#replnt_period').text('Пополнение за '+Math.round(input_data.period/30) +' мес.');
		 
		 
           		 $('#curr_ts').val(curr);
				 $('#sum_ts').val($.number(input_data.sum, 0, ',', ' ' ));
				 $('#period_ts').val(input_data.period + ' дней');
				 $('#repl_ts').val($.number(input_data.repl, 0, ',', ' ' ));
				 $('#partout_ts').val(input_data.part?'Да':'Нет');
				 $('#vklad_ts').val(selected);     
  }



/*    $(function(){
      var select = $("#select_period");
      var slider = $('#period_range').slider({
        range: 'min',
        min: 3,
        max: 24,
        value: select[ 0 ].selectedIndex + 1,
        slide: function( event, ui ) {
          select[ 0 ].selectedIndex = ui.value - 1;
        }
      });
      $( "#select_period" ).change(function() {
        slider.slider( "value", this.selectedIndex + 1 );
      });
    });*/

    // AutoNumeric for Credit Calc

    // The options are...optional :)
    const autoNumericRub = {
        digitGroupSeparator        : ' ',
        decimalCharacter           : ',',
        decimalCharacterAlternative: '.',
        currencySymbol             : ' руб.',
        currencySymbolPlacement    : AutoNumeric.options.currencySymbolPlacement.suffix,
        roundingMethod             : AutoNumeric.options.roundingMethod.halfUpSymmetric,
    };

    const autoNumericMonth = {
        digitGroupSeparator        : ' ',
        decimalCharacter           : ',',
        decimalCharacterAlternative: '.',
        currencySymbol             : ' мес.',
        currencySymbolPlacement    : AutoNumeric.options.currencySymbolPlacement.suffix,
        roundingMethod             : AutoNumeric.options.roundingMethod.halfUpSymmetric,
    };

    
    // credit calc

    var stavka_val = 13.5;
    var a = 1 + stavka_val/1200;
    var a_n = Math.pow(a, $('#credit_period').val());
    var k = a_n*(a-1)/(a_n-1);

    var month_sum_val = parseInt(k * $('#credit_amount').val());
    $('#month_sum').text(month_sum_val + ' руб.');

    var over_payment_val = month_sum_val * $('#credit_period').val() - $('#credit_amount').val();
    $('#over_payment').text(over_payment_val + ' руб.');

    /* кредитная сумма */

    $('#credit_amount_range').slider({
      range: 'min',
      value: 150000,
      min: 30000,
      max: 1000000,
      slide: function(event, ui) {
        $("#credit_amount").val(ui.value);
      }
    });
    $("#credit_amount").val($("#credit_amount_range").slider("value"));

    $('#credit_amount').change(function(){
      var amount_val = $('#credit_amount').val();
      $('#credit_amount_range').slider('value', amount_val);
      var a_n = Math.pow(a, $('#credit_period').val());
      var k = a_n*(a-1)/(a_n-1);
      var month_sum_val = parseInt(k * amount_val);
      $('#month_sum').text(month_sum_val + ' руб.');
      var over_payment_val = month_sum_val * $('#credit_period').val() - $('#credit_amount').val();
      $('#over_payment').text(over_payment_val + ' руб.');
    });

    $("#credit_amount_range").slider({
      change: function(event, ui){
        var amount_val = $("#credit_amount_range").slider("value");
        var a_n = Math.pow(a, $('#credit_period').val());
        var k = a_n*(a-1)/(a_n-1);
        var month_sum_val = parseInt(k * amount_val);
        $('#month_sum').text(month_sum_val + ' руб.');
        var over_payment_val = month_sum_val * $('#credit_period').val() - $('#credit_amount').val();
        $('#over_payment').text(over_payment_val + ' руб.');
      }
    });

    /* кредитный период */

    $('#credit_period_range').slider({
      range: 'min',
      value: 24,
      min: 3,
      max: 60,
      slide: function(event, ui) {
        $("#credit_period").val(ui.value);
      }
    });

    $("#credit_period").val($("#credit_period_range").slider("value"));

    $('#credit_period').change(function(){
      var period_val = $('#credit_period').val();
      $('#credit_period_range').slider('value', period_val);
      var a_n = Math.pow(a, period_val);
      var k = a_n*(a-1)/(a_n-1);
      var month_sum_val = parseInt(k * $('#credit_amount').val());
      $('#month_sum').text(month_sum_val + ' руб.');
      var over_payment_val = month_sum_val * period_val - $('#credit_amount').val();
      $('#over_payment').text(over_payment_val + ' руб.');
    });

    $("#credit_period_range").slider({
      change: function(event, ui){
        var period_val = $("#credit_period_range").slider("value");
        var a_n = Math.pow(a, period_val);
        var k = a_n*(a-1)/(a_n-1);
        var month_sum_val = parseInt(k * $('#credit_amount').val());
        $('#month_sum').text(month_sum_val + ' руб.');
        var over_payment_val = month_sum_val * period_val - $('#credit_amount').val();
        $('#over_payment').text(over_payment_val + ' руб.');
      }
    });










  }); //end ready

}(jQuery));