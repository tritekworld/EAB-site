(function ($) {
  'use strict';

  $(document).ready(function () {

  	$('input.numeric').number( true, 0, ',', ' ' );

    // scroll to footer

    function go_to_footer(){
      if($(window).width() < 768){
        $("#go_to_footer").on("click", function (event) {
          event.preventDefault();
          var id  = $(this).data('href'),
              top = $(id).offset().top;
          $('body,html').animate({scrollTop: top}, 1500);
        });
      }
    }
    go_to_footer();
    $(window).resize(function() {
      go_to_footer();
    });

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
        },
        {
  				breakpoint: 992,
  				settings: {
		        slidesToShow: 3
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
    'VIP': [
    {'cur': 'rub', 'stavka': function(amnt,time){
        switch (true) {
          case (amnt<this.min):
          return 0;
          break;
          case (amnt>=this.min && amnt<4000000):
            switch (true) {
              case (time<91):
              return 0;
              break;
              case (time>=91 && time<181):
              return 6;
              break;
              case (time>=181 && time<271):
              return 6.2;
              break;
              case (time>=271)://есть пролонгация
              // case (time>=271 && time<365):  - если бы пролонгации не было
              return 6.85;
              break;
              default:
              return 0;
              break;
            }
          break;
          case (amnt>=4000000 && amnt<7000000):
            switch (true) {
              case (time<91):
              return 0;
              break;
              case (time>=91 && time<181):
              return 6.1;
              break;
              case (time>=181 && time<271):
              return 6.3;
              break;
              case (time>=271): //есть пролонгация
              // case (time>=271 && time<365):  - если бы пролонгации не было
              return 6.9;
              break;
              default:
              return 0;
              break;
            }         
          break;
          case (amnt>=7000000):
            switch (true) {
              case (time<91):
              return 0;
              break;
              case (time>=91 && time<181):
              return 6.2;
              break;
              case (time>=181 && time<271):
              return 6.4;
              break;
              case (time>=271): //есть пролонгация
              // case (time>=271 && time<365):  - если бы пролонгации не было
              return 6.95;
              break;
              default:
              return 0;
              break;
            }
          break;  
          
        }
      },
    'min': 1000000,
    'link': '/vklady/vklad-vip/'
    },
  
  
  
    {'cur': 'usd', 'stavka': function(amnt,time){
        switch (true) {
          case (amnt<this.min):
          return 0;
          break;
          case (amnt>=this.min && amnt<120000):
            switch (true) {
              case (time<91):
              return 0;
              break;
              case (time>=91 && time<181):
              return 0.8;
              break;
              case (time>=181 && time<271):
              return 1.4;
              break;
              case (time>=271 ):
              return 1.5;
              break;
              default:
              return 0;
              break;
            }
          break;
          case (amnt>=120000 && amnt<200000):
            switch (true) {
              case (time<91):
              return 0;
              break;
              case (time>=91 && time<181):
              return 0.9;
              break;
              case (time>=181 && time<271):
              return 1.5;
              break;
              case (time>=271):
              return 1.65;
              break;
              default:
              return 0;
              break;
            }         
          break;
          case (amnt>=200000):
            switch (true) {
              case (time<91):
              return 0;
              break;
              case (time>=91 && time<181):
              return 1;
              break;
              case (time>=181 && time<271):
              return 1.7;
              break;
              case (time>=271 ):
              return 1.8;
              break;
              default:
              return 0;
              break;
            }
          break;  
          
        }
      }, 'min': 30000, 'link': '/vklady/vklad-vip/'},
    {'cur': 'euro', 'stavka': function(amnt,time){
        switch (true) {
          case (amnt<this.min):
          return 0;
          break;
          case (amnt>=this.min && amnt<90000):
            switch (true) {
              case (time<91):
              return 0;
              break;
              case (time>=91 && time<181):
              return 0.08;
              break;
              case (time>=181 && time<271):
              return 0.085;
              break;
              case (time>=271):
              return 0.12;
              break;
              default:
              return 0;
              break;
            }
          break;
          case (amnt>=90000 && amnt<150000):
            switch (true) {
              case (time<91):
              return 0;
              break;
              case (time>=91 && time<181):
              return 0.081;
              break;
              case (time>=181 && time<271):
              return 0.088;
              break;
              case (time>=271):
              return 0.14;
              break;
              default:
              return 0;
              break;
            }         
          break;
          case (amnt>=150000):
            switch (true) {
              case (time<91):
              return 0;
              break;
              case (time>=91 && time<181):
              return 0.083;
              break;
              case (time>=181 && time<271):
              return 0.09;
              break;
              case (time>=271):
              return 0.17;
              break;
              default:
              return 0;
              break;
            }
          break;  
          
        }
      }, 'min': 30000, 'link': '/vklady/vklad-vip/'}
  ],

  'Универсал': [
		{'cur': 'rub', 'stavka': function(amnt,time){
				switch (true) {
				  case (amnt<this.min):
					return 0;
					break;
				  case (amnt>=this.min && amnt<100000):
						switch (true) {
							case (time<31):
							return 0;
							break;
							case (time>=31 && time<91):
							return 2.5;
							break;
							case (time>=91 && time<181):
							return 5.0;
							break;
							case (time>=181)://есть пролонгация
							// case (time>=271 && time<365):  - если бы пролонгации не было
							return 6.15;
							break;
							default:
							return 0;
							break;
						}
					break;
				  case (amnt>=100000 && amnt<450000):
						switch (true) {
							case (time<31):
							return 0;
							break;
							case (time>=31 && time<91):
							return 3.0;
							break;
							case (time>=91 && time<181):
							return 5.2;
							break;
							case (time>=181): //есть пролонгация
							// case (time>=271 && time<365):  - если бы пролонгации не было
							return 6.25;
							break;
							default:
							return 0;
							break;
						}					
					break;
				  case (amnt>=450000):
						switch (true) {
							case (time<31):
							return 0;
							break;
							case (time>=31 && time<91):
							return 3.5;
							break;
							case (time>=91 && time<181):
							return 5.35;
							break;
							case (time>=181): //есть пролонгация
							// case (time>=271 && time<365):  - если бы пролонгации не было
							return 6.45;
							break;
							default:
							return 0;
							break;
						}
					break;	
				  
				}
			},
		'min': 10000,
		'link': '/vklady/vklad-universal/'
		},
	
	
	
    {'cur': 'usd', 'stavka': function(amnt,time){
				switch (true) {
				  case (amnt<this.min):
					return 0;
					break;
				  case (amnt>=this.min && amnt<16000):
						switch (true) {
							case (time<31):
							return 0;
							break;
							case (time>=31 && time<91):
							return 0.1;
							break;
							case (time>=91 && time<181):
							return 1.6;
							break;
							case (time>=181 ):
							return 1.35;
							break;
							default:
							return 0;
							break;
						}
					break;
				  case (amnt>=16000 && amnt<32000):
						switch (true) {
							case (time<31):
							return 0;
							break;
							case (time>=31 && time<91):
							return 0.1;
							break;
							case (time>=91 && time<181):
							return 0.7;
							break;
							case (time>=181):
							return 1.45;
							break;
							default:
							return 0;
							break;
						}					
					break;
				  case (amnt>=32000):
						switch (true) {
							case (time<31):
							return 0;
							break;
							case (time>=31 && time<91):
							return 0.1;
							break;
							case (time>=91 && time<181):
							return 0.8;
							break;
							case (time>=181 ):
							return 1.65;
							break;
							default:
							return 0;
							break;
						}
					break;	
				  
				}
			}, 'min': 1000, 'link': '/vklady/vklad-universal/'},
    {'cur': 'euro', 'stavka': function(amnt,time){
				switch (true) {
				  case (amnt<this.min):
					return 0;
					break;
				  case (amnt>=this.min && amnt<12000):
						switch (true) {
							case (time<31):
							return 0;
							break;
							case (time>=31 && time<91):
							return 0.06;
							break;
							case (time>=91 && time<181):
							return 0.055;
							break;
							case (time>=181):
							return 0.08;
							break;
							default:
							return 0;
							break;
						}
					break;
				  case (amnt>=12000 && amnt<23500):
						switch (true) {
							case (time<31):
							return 0;
							break;
							case (time>=31 && time<91):
							return 0.065;
							break;
							case (time>=91 && time<181):
							return 0.06;
							break;
							case (time>=181):
							return 0.09;
							break;
							default:
							return 0;
							break;
						}					
					break;
				  case (amnt>=23500):
						switch (true) {
							case (time<31):
							return 0;
							break;
							case (time>=31 && time<91):
							return 0.07;
							break;
							case (time>=91 && time<181):
							return 0.07;
							break;
							case (time>=181):
							return 0.098;
							break;
							default:
							return 0;
							break;
						}
					break;	
				  
				}
			}, 'min': 750, 'link': '/vklady/vklad-universal/'}
  ],

  'Классика': [
    {'cur': 'rub', 'stavka': function(amnt,time){
        switch (true) {
          case (amnt<this.min):
          return 0;
          break;
          case (amnt>=this.min && amnt<100000):
            switch (true) {
              case (time<31):
              return 0;
              break;
              case (time>=31 && time<91):
              return 2.5;
              break;
              case (time>=91 && time<181):
              return 5.5;
              break;
              case (time>=181 && time<366):
              return 6.45;
              break;
              case (time>=366 && time<541):  // нет пролонгации
              return 5.7;
              break;
              default:
              return 0;
              break;
            }
          break;
          case (amnt>=100000 && amnt<450000):
            switch (true) {
              case (time<31):
              return 0;
              break;
              case (time>=31 && time<91):
              return 3.0;
              break;
              case (time>=91 && time<181):
              return 5.55;
              break;
              case (time>=181 && time<366):
              return 6.55;
              break;
              case (time>=366 && time<541):  // нет пролонгации
              return 5.75;
              break;
              default:
              return 0;
              break;
            }         
          break;
          case (amnt>=450000):
            switch (true) {
              case (time<31):
              return 0;
              break;
              case (time>=31 && time<91):
              return 3.5;
              break;
              case (time>=91 && time<181):
              return 5.75;
              break;
              case (time>=181 && time<366):
              return 6.65;
              break;
              case (time>=366 && time<541):  // нет пролонгации
              return 5.8;
              break;
              default:
              return 0;
              break;
            }
          break;  
          
        }
      },
    'min': 10000,
    'link': '/vklady/vklad-klassika/'
    },
  
  
  
    {'cur': 'usd', 'stavka': function(amnt,time){
        switch (true) {
          case (amnt<this.min):
          return 0;
          break;
          case (amnt>=this.min && amnt<13000):
            switch (true) {
              case (time<31):
              return 0;
              break;
              case (time>=31 && time<91):
              return 0.1;
              break;
              case (time>=91 && time<181):
              return 0.7;
              break;
              case (time>=181 && time<366):
              return 1.35;
              break;
              case (time>=366 && time<541):  // нет пролонгации
              return 1.7;
              break;
              default:
              return 0;
              break;
            }
          break;
          case (amnt>=13000 && amnt<32000):
            switch (true) {
              case (time<31):
              return 0;
              break;
              case (time>=31 && time<91):
              return 0.1;
              break;
              case (time>=91 && time<181):
              return 0.8;
              break;
              case (time>=181 && time<366):
              return 1.5;
              break;
              case (time>=366 && time<541):  // нет пролонгации
              return 1.9;
              break;
              default:
              return 0;
              break;
            }         
          break;
          case (amnt>=32000):
            switch (true) {
              case (time<31):
              return 0;
              break;
              case (time>=31 && time<91):
              return 0.1;
              break;
              case (time>=91 && time<181):
              return 0.9;
              break;
              case (time>=181 && time<366):
              return 1.65;
              break;
              case (time>=366 && time<541):  // нет пролонгации
              return 2.0;
              break;
              default:
              return 0;
              break;
            }
          break;  
          
        }
      }, 'min': 350, 'link': '/vklady/vklad-klassika/'},

    {'cur': 'euro', 'stavka': function(amnt,time){
        switch (true) {
          case (amnt<this.min):
          return 0;
          break;
          case (amnt>=this.min && amnt<9500):
            switch (true) {
              case (time<31):
              return 0;
              break;
              case (time>=31 && time<91):
              return 0.06;
              break;
              case (time>=91 && time<181):
              return 0.07;
              break;
              case (time>=181 && time<366):
              return 0.1;
              break;
              case (time>=366 && time<541):  // нет пролонгации
              return 0.15;
              break;
              default:
              return 0;
              break;
            }
          break;
          case (amnt>=9500 && amnt<23500):
            switch (true) {
              case (time<31):
              return 0;
              break;
              case (time>=31 && time<91):
              return 0.065;
              break;
              case (time>=91 && time<181):
              return 0.08;
              break;
              case (time>=181 && time<366):
              return 0.12;
              break;
              case (time>=366 && time<541):  // нет пролонгации
              return 0.16;
              break;
              default:
              return 0;
              break;
            }         
          break;
          case (amnt>=23500):
            switch (true) {
              case (time<31):
              return 0;
              break;
              case (time>=31 && time<91):
              return 0.07;
              break;
              case (time>=91 && time<181):
              return 0.09;
              break;
              case (time>=181 && time<366):
              return 0.14;
              break;
              case (time>=366 && time<541):  // нет пролонгации
              return 0.17;
              break;
              default:
              return 0;
              break;
            }
          break;  
          
        }
      }, 'min': 250, 'link': '/vklady/vklad-klassika/'}
  ],

	
   'До востребования': [
    {'cur': 'rub', 'stavka': function(amnt,time){return 0.10;}, 'min': 0.00, 'link': '/vklady/vklad-do-vostrebovanija/'},
    {'cur': 'usd', 'stavka': function(amnt,time){return 0.05;}, 'min': 0.00, 'link': '/vklady/vklad-do-vostrebovanija/'},
    {'cur': 'euro', 'stavka': function(amnt,time){return 0.05;}, 'min': 0.00, 'link': '/vklady/vklad-do-vostrebovanija/'}
  ],

  'Высокий доход': [
    {'cur': 'rub', 'stavka': function(amnt,time){
        switch (true) {
          case (amnt<this.min):
          return 0;
          break;
          case (amnt>=this.min && amnt<450000):
            switch (true) {
              case (time<1):
              return 0;
              break;
              case (time>=1 && time<367):
              return 0.1;
              break;
              case (time>=367 && time<732):
              return 5.0;
              break;
              case (time>=732 && time<1095):
              return 3.75;
              break;
              case (time=1096):  // нет пролонгации
              return 5.75;
              break;
              default:
              return 0;
              break;
            }
          break;
          case (amnt>=450000):
            switch (true) {
              case (time<1):
              return 0;
              break;
              case (time>=1 && time<367):
              return 0.1;
              break;
              case (time>=367 && time<732):
              return 5.5;
              break;
              case (time>=732 && time<1095):
              return 4.75;
              break;
              case (time=1096):  // нет пролонгации
              return 5.8;
              break;
              default:
              return 0;
              break;
            }
          break;  
          
        }
      },
    'min': 100000,
    'link': '/vklady/vklad-vysokij-dohod/'
    },
  
    {'cur': 'usd', 'stavka': function(amnt,time){return 0;}, 'min': 0, 'link': '/vklady/vklad-vysokij-dohod/'},

    {'cur': 'euro', 'stavka': function(amnt,time){return 0;}, 'min': 0, 'link': '/vklady/vklad-vysokij-dohod/'}
  ]

  /*
  'Высокий доход': [
    {'cur': 'rub', 'stavka': 5.8, 'min': 100000, 'link': '/vklady/vklad-vysokij-dohod/'},
    {'cur': 'usd', 'stavka': 0.00, 'min': 0, 'link': '/vklady/vklad-vysokij-dohod/'},
    {'cur': 'euro', 'stavka': 0.00, 'min': 0,'link': '/vklady/vklad-vysokij-dohod/'}
  ] */
};


/* $('select').change(function(){
  var valuta = $('#selectCurrency').val();
  var vklad = $('#selectVklad').val();
  var sum = $('#inputSum').val();
      sum = parseInt(sum);
  var term = $('#inputTerm').val();
      term = parseInt(term);


  $.each(deposits,function(key,data) {
    if(key == vklad){
      //console.log('Вклад: ' + key + sum);
        $.each(data, function(index,value) {
          if(value['cur'] == valuta){
            var plus = Math.round(sum*value['stavka']*term/(365*100)).toFixed(2);
                plus = parseInt(plus);
            var result = Math.round(sum + plus).toFixed(2);
            //console.log('Итоговая сумма: ' + result + '; Ваша выгода: = '+ plus);
          }
        });
    }
  });
}); */
  

 /*    $('#depositCalc').click(function(){

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

    }); */

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
      value: 366,
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
    //console.log(key+': '+val);
    });
    $.each(deposits,function(key,data) {
          
            $.each(data, function(index,value) {
              if(index === (+input_data.curr)){
				  if ( input_data.repl===0) {
					  if ( !input_data.monthly) {
					  
                let plus = Math.round(input_data.sum*value.stavka(input_data.sum,input_data.period)*input_data.period/(365*100)).toFixed(0);
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
	                plus = Math.round(s*value.stavka(input_data.sum,input_data.period)*30/(365*100)).toFixed(0);
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
	let result = Math.round(input_data.repl*Math.floor(input_data.period/30)/(0.01*value.stavka(input_data.sum,input_data.period))*(Math.pow((1+(0.01*value.stavka(input_data.sum,input_data.period))/Math.floor(input_data.period/30)), Math.floor(input_data.period/30)*Math.round(input_data.period/365))-1) + input_data.sum*Math.pow((1+(0.01*value.stavka(input_data.sum,input_data.period))/Math.floor(input_data.period/30)), Math.floor(input_data.period/30)*Math.round(input_data.period/365)));
	
	
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
    //console.log('Selected: '+selected+'; Result: '+max);
        $('#sum_now').text($.number(input_data.sum, 0, ',', ' ' ) + curr);
        $('.sum_then').text($.number(max, 0, ',', ' ' ) + curr);
                $('#sum_prcnt').text($.number(mplus, 0, ',', ' ' ) + curr);
                $('#percent').text(deposits[selected][input_data.curr].stavka(input_data.sum,input_data.period) + ' %');
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
/*    const autoNumericRub = {
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
    };*/

    
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


 /*   $('#amount_range').draggable();
    $('#period_range').draggable();
    $('#replenish_range').draggable();
    $('#credit_amount_range').draggable();
    $('#credit_period_range').draggable();*/










  }); //end ready

}(jQuery));