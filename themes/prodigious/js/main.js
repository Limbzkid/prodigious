(function ($, Drupal) {

  var baseURL = drupalSettings.path.baseUrl + tPath ;
  var winWidth;

  $(window).ready(function() {





      // header Fixed

      if ($(window).width() > 1023) {

          $(window).scroll(function() {

              if ($(window).scrollTop() >= 150) {

                  $('header').addClass('sticky');

              } else {

                  $('header').removeClass('sticky');

              }

          });

      } else {

          $('header .navbar-toggler').click(function() {

              $('html').toggleClass('stickyHidden');

              $(this).parents('header').toggleClass('openMenu');

          })

          $('header .closebtn').click(function() {

              $('.navbar-toggler').trigger('click');

          })

      }









      $(".searchBtn ").click(function() {

          $(this).parents('div').toggleClass('searchOpen');

      });



      $('[data-lightbox=true]').click(function() {

          var _this = $(this);

          var getpath = "";

          $('.lightbox-container').html('');

          if (_this.attr('data-videoUrl') != "") {

              getpath = _this.attr('data-videoUrl');

              $('.lightbox-container').append('<video controls preload> <source src="' + getpath + '" type="video/mp4"></video>');

              $('.lightbox-container').find('video').get(0).play();

          } else {

              getpath = _this.attr('data-video');

              $('.lightbox-container').append('<iframe src="' + getpath + '?wmode=transparent" frameborder="0" allowfullscreen></iframe>');

          }

          $('.lightbox-custom, .lightbox-overlay').addClass('active');

      });



      $('.lightbox-custom .closebtn').click(function() {

          $('.lightbox-custom, .lightbox-overlay').removeClass('active');

          $('.lightbox-container').html('');

      })





      $('.filter-box .filter-btn').click(function() {

          $(this).parents('.filter-sec').addClass('openFilter');

          if ($(window).width() < 767) {

              $('html').addClass('stickyHidden');

          }

      });

      $('.filter-box .closebtn').click(function() {

          $(this).parents('.filter-sec').removeClass('openFilter');

          $('html').removeClass('stickyHidden');

      });







      $(document).on('mouseenter', '.product-card', function() {

          if (!$(this).parents('.load-more').length) {

              $(this).addClass('animate');

          }

      });

      $(document).on('mouseleave', '.product-card', function() {

          $(this).removeClass('animate');

      });



      $(document).on('mouseenter', '.box-card', function() {

          $(this).find('.readmore-link').text('View Projects').show();

      });

      $(document).on('mouseleave', '.box-card', function() {

          $(this).find('.readmore-link').text('Read more').hide();

      });









      var getloadCard = 0;

      var disablecard = 0;







      if ($('.loadmore-sect').length) {





          if ($('.portfolio-Wrap').length) {

              if ($(window).width() > 1025) {

                  getloadCard = 6;

                  disablecard = 3;

              } else if ($(window).width() > 767) {

                  getloadCard = 6;

                  disablecard = 2;

              } else {

                  getloadCard = 2;

                  disablecard = 1;

              }

          } else {

              if ($(window).width() > 1023) {

                  getloadCard = 3;

                  disablecard = 3;

              } else if ($(window).width() > 767) {

                  getloadCard = 2;

                  disablecard = 2;

              } else {

                  getloadCard = 1;

                  disablecard = 1;

              }

          }



          for (i = getloadCard; i < $('.loadmore-sect >div').length; i++) {

              $('.loadmore-sect >div').eq(i).addClass('load-more');

              if (i < getloadCard + disablecard) {

                  $('.loadmore-sect >div').eq(i).addClass('visible');

              }

              if (i % disablecard === 0) {

                  $('.loadmore-sect >div').eq(i).append('<a href="javascript:;" class="load-btn"><img src="'+ baseURL +'/images/icons/load-more.png" alt="Load More" title="Load More"/></a>');

              }

          }



          $(document).on('click', '.load-more .load-btn', function() {

              var getindex = $(this).parents('.load-more').index();

              var lastChildIndex = $('.loadmore-sect >div.visible').index() + disablecard;



              for (k = getindex; k < $('.loadmore-sect >div').length; k++) {

                  if (k < getindex + disablecard) {

                      $('.loadmore-sect >div').eq(k).removeClass('visible load-more');

                  }





                  for (m = lastChildIndex; m < $('.loadmore-sect >div').length; m++) {

                      if (m < lastChildIndex + disablecard) {

                          $('.loadmore-sect >div').eq(m).addClass('visible');

                      }

                  }

              }

          })



      }









      // Dropdown

      $('.dropdown-list .dropdown-toggle').click(function() {

          $(this).toggleClass('open');

          $(this).next('.dropdown-menu').slideToggle();

      });



      $('.custom-dropdown .dropdown-item').click(function() {

          var getValue = $(this).text();

          $(this).parents('.custom-dropdown').find('.dropdown-toggle').text(getValue).trigger('click');

      });



      // Document Click Event

      $(document).click(function(e) {



          if ($(e.target).closest(".dropdown-list").length == 0) {

              $('.dropdown-list .dropdown-toggle').removeClass('open');

              $('.dropdown-list .dropdown-menu').slideUp();

          }

      });



      // Anchor Tag Animate

      $(".animate-scroll").click(function() {

          var getid = $(this).attr('data-animate');

          var getheight = 0;

          if ($(window).width() > 1023) {

              getheight = $('header').outerHeight(true);

          }

          if ($('.home-page').length) {

              $('html, body').animate({

                  scrollTop: $(getid).offset().top - getheight

              }, 1000);

              $(this).parents('.nav-item').addClass('active').siblings().removeClass('active');

          }

      });



      // Clock Function

      if ($('.clock-section').length) {

          var tz = timezonefunc.determine();

          var timezone = tz.name();

          console.log(tz, timezone)

          $('.inside-details .time-clock[data-selectedZone= "' + timezone + '"]').addClass('active');

          if ($(window).width() < 1023) {

              setTimeout(function() {

                  var getcarouselIndex = $('.clock-carousel-center .items[data-selectedZone= "' + timezone + '"]').parent('div').index();

                  $('.clock-carousel-center .owl-dots .owl-dot').eq(getcarouselIndex).trigger('click');

              }, 50)

          } else {

              var getActiveElement = $('.inside-details .time-clock[data-selectedZone= "' + timezone + '"]').find('.row >div:first-child  li:first-child .country-name');


              getActiveElement.addClass('active');

              var getheading = getActiveElement.text();

              var getHtml = "<h3 class='heading-3 font-bold'>" + getheading + "</h3>" + getActiveElement.next('.country-info').html();

              $('.inside-details .clock-detail-center').html(getHtml);

              $('.clock-info li .country-name').click(function() {

                alert(1)

                  $(this).parents('.col-6').siblings().find('.country-name').removeClass('active');

                  $(this).parents('li').siblings().find('.country-name').removeClass('active');

                  $(this).addClass('active').parents('.time-clock').siblings().find('.country-name').removeClass('active');

                  getheading = $(this).text();

                  getHtml = "<h3 class='heading-3 font-bold'>" + getheading + "</h3>" + $(this).next('.country-info').html();

                  $('.inside-details .clock-detail-center').html('');

                  $('.inside-details .clock-detail-center').html(getHtml);

              })

          }

          setTimeout(function() {

              var splitTime = $('.inside-details .time-clock.active').find('.country-time span').text().split(":");

              var splitDay = $('.inside-details .time-clock.active').find('.country-time span').text().split(" ");

              var getHour = splitTime[0];

              var getDay = splitDay[1];

              if (getHour > 5 && getDay == "AM" || getHour < 5 && getDay == "PM") {

                  $('.moon-show').removeClass('active');

                  $('.sun-show').addClass('active');

              } else {

                  $('.sun-show').removeClass('active');

                  $('.moon-show').addClass('active');

              }

          }, 500)

      }



      // Tabs



      $('.tabs-Wrap .tabs li').click(function() {

          var getTabindex = $(this).index();

          $(this).addClass('active').siblings().removeClass('active');

          $(this).parents('.tabs-Wrap').find('.tab-contentWrap .tab-content').eq(getTabindex).addClass('active').siblings().removeClass('active');

      });



      // Product Img



      $('.product-card .top-img > img').each(function() {

          var getimgpath = $(this).attr('src');

          var newDiv = '<div class="bg-img"></div>';

          $(newDiv).insertBefore($(this));

          $(this).parents('.top-img').find('.bg-img').css({ "background": "url('" + getimgpath + "') no-repeat", "background-position": "center", "background-size": "cover" });

      });



      $('.project-thumbs img').each(function() {

          var getimgpath = $(this).attr('src');

          var getimglink = $(this).parents('a').attr('href');

          if (getimglink == undefined) {

              getimglink = "javascript:;"

          }

          var newDiv = '<a href="' + getimglink + '"><span class="bg-img"></span></a>';

          $(newDiv).insertBefore($(this));

          $(this).parents('.project-thumbs').find('.bg-img').css({ "background": "url('" + getimgpath + "') no-repeat", "background-position": "center", "background-size": "cover" });

      });





      // Carousel Bg Img



      $('.custom-carousel .img-slide img').each(function() {

          var getimgpath = $(this).attr('src');

          $(this).parents('.img-slide').css({ "background": "url('" + getimgpath + "') no-repeat", "background-position": "center", "background-size": "cover" });

      });



      winWidth = $(window).width();

      clockFunc();

      Containeroffset();

      doResize();

      owlCarousel();



  });









  function owlCarousel() {

      $('.stagging-carousel').owlCarousel({

          items: 2,

          loop: true,

          dots: false,

          nav: true,

          navText: ["<img src='"+ baseURL+"/images/icons/prev-arrow-white.png' alt='Previous' title='Previous'>", "<img src='"+ baseURL+"/images/icons/next-arrow-white.png' alt='Next' title='Next'>"],

          navContainer: '#customNav',

          responsive: {

              0: {

                  items: 1,

                  margin: 10,



              },

              768: {

                  items: 2,

                  margin: 20

              },

              1024: {

                  items: 2,

                  loop: false,

                  margin: 80,

                  stagePadding: 0,

                  autoWidth: true,

                  navText: ["<img src='"+ baseURL+"/images/icons/prev-arrow.png' alt='Previous' title='Previous'>", "<img src='"+ baseURL+"/images/icons/next-arrow.png' alt='Next' title='Next'>"]

              }

          }

      });





      $('.custom-carousel').owlCarousel({

          items: 3,

          dots: false,

          loop: true,

          nav: true,

          navText: ["<img src='"+baseURL+"/images/icons/circle-prev-arrow.png' alt='Previous' title='Previous'>", "<img src='"+baseURL+"/images/icons/circle-next-arrow.png' alt='Next' title='Next'>"],

          responsive: {

              0: {

                  items: 2,

                  stagePadding: 40,

                  margin: 20

              },

              1200: {

                  stagePadding: 100,

                  margin: 25

              }

          }

      });







      if ($(window).width() < 1023) {



          $('.clock-carousel-center').owlCarousel({

              nav: false,

              items: 2,

              dots: true,

              loop: false,

              center: true,

              autoWidth: false,

              margin: 0

          });



          $('.clock-carousel-details').owlCarousel({

              nav: false,

              items: 1,

              dots: true,

              loop: false,

              center: true,

              touchDrag: false,

              mouseDrag: false

          });

          var getdotWidth = $('.clock-carousel-center').outerWidth() / $('.clock-carousel-center').find('.owl-dot').length;

          $('.clock-carousel-center').find('.owl-dot span').css('width', getdotWidth);



          $('.clock-carousel-center .items').click(function() {

              var getindex = $(this).parent('div').index();

              $('.clock-carousel-center .owl-dots .owl-dot').eq(getindex).trigger('click');

          })



          var lastIndex = 0;

          var fTout;

          $('.clock-carousel-center').on('translated.owl.carousel', function(event) {

              clearTimeout(fTout);

              var cIndex = event.item.index - (event.relatedTarget._clones.length / 2);

              if (lastIndex != cIndex) {

                  var getattr = $('.clock-carousel-center').find('.owl-item.center .items').attr('data-timezone');

                  $('.clock-carousel-details .owl-dots .owl-dot').eq(cIndex).trigger('click');

                  $('.inside-details .time-clock[data-timezone= "' + getattr + '"]').addClass('active').siblings().removeClass('active');

                  lastIndex = cIndex;

              }

          });

      }







  }



  function doResize() {

      // FONT SIZE

      if ($(window).width() > 1023) {

          var ww = $('body').width();

          var maxW = 1920;

          ww = Math.min(ww, maxW);

          var fw = ww * (10 / maxW);

          var fpc = fw * 100 / 15.75;

          var fpc = Math.round(fpc * 100) / 100;

          $('html').css('font-size', fpc + '%');

      }

  }



  function Containeroffset() {



      // Container  Fluid Layout

      if ($(window).width() > 1023) {

          $('.hero-banner').css({ 'margin-right': $('.container-fluid').offset().left });

          if ($('.container').length) {

              $('.hero-banner .hero-container').css({ 'padding-left': $('.container').offset().left + 15 });

              $('.hero-banner .video-wrap').css({ 'width': $('.container').offset().left + 15 });

              $('.leftoffset').css({ 'padding-left': $('.container').offset().left });

          }

      }

  }



  window.onresize = function() {

      Containeroffset();



      var reWinWidth = $(window).width();







      if (reWinWidth !== winWidth) {

          clockFunc();

      }

      doResize();

  }





  function clockFunc() {

      destroyClock();



      console.log($(window).width())

      if ($(window).width() < 1023) {

          $('.inside-details').css('height', $('.inside-details').outerWidth(true));

      }



      var radians, radius;

      radius = $('.inside-details').outerWidth() / 4;

      var totalItems = $('.inside-details .time-clock').length

      var item = 0;



      $('.inside-details .clock-inner').css({ 'left': radius })



      function positionTarget() {

          var x, y, angle = 0,

              step = (2 * Math.PI) / totalItems;

          var degR = 0;

          var width = $('.inside-details').outerWidth() / 2;

          var height = $('.inside-details').outerHeight() / 2;

          var itemW = $('.inside-details .time-clock').outerWidth(true) / 2,

              itemH = $('.inside-details .time-clock').outerHeight(true);

          var deg = 5;



          while (item < totalItems) {



              x = Math.round(width + radius * Math.cos(angle) - itemW);

              y = Math.round(height + radius * Math.sin(angle) - itemH);

              $('.inside-details .time-clock').eq(item).attr('id', item).css('position', 'absolute')

                  .css('width', itemW + 'px')

                  .css('left', x + 'px').css('top', y + 'px')

                  .css('transform-origin', x + 'px' - y + 'px');







              if (deg <= 90) {

                  $('.inside-details .time-clock').eq(item).attr('id', item)

                      .css('transform', 'rotate(' + deg + 'deg)').css('transform-origin', x + 'px' - y + 'px');

                  $('.inside-details .time-clock').eq(item).find('.clock-info').css('transform', 'rotate(' + -deg + 'deg)');



              } else if (deg >= 276) {

                  $('.inside-details .time-clock').eq(item).attr('id', item)

                      .css('transform', 'rotate(' + deg + 'deg)');

                  $('.inside-details .time-clock').eq(item).find('.clock-info').css('transform', 'rotate(' + -deg + 'deg)');

              } else if (deg >= 90) {

                  degR = deg + 180;

                  $('.inside-details .time-clock').eq(item).attr('id', item).addClass('rotate')

                      .css('transform', 'rotate(' + degR + 'deg)');

                  $('.inside-details .time-clock').eq(item).find('.clock-info').css('transform', 'rotate(' + -degR + 'deg)');

              }







              angle += step;

              ++item;

              deg += 360 / totalItems;



          }

      }



      function showTime() {

          var date = new Date();

          var getTimeZone = "";

          $('.inside-details .time-clock').each(function() {

              getTimeZone = $(this).attr('data-timezone');



              var strTime = date.toLocaleTimeString("en-US", { timeZone: getTimeZone, timeStyle: 'short' });

              $(this).find('.country-time>span').text(strTime);

              //updateTime();

          });

      }



      function updateTime() {

          var refresh = 1000;

          mytime = setTimeout('showTime()', refresh)

      }



      function destroyClock() {

          $('.inside-details').removeAttr('style');

          $('.inside-details .time-clock').each(function() {

              $(this).removeAttr('style');

          })

      }





      positionTarget();

      showTime();





  }
})(jQuery, Drupal);
