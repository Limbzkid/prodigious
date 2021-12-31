(function ($, Drupal) {

  var fidArr = [];

  var capArr = [];
  var market = '';
  var indArr = [];

  $(window).on('load', function() {
    $.ajax({
      url: drupalSettings.path.baseUrl + "get-path",  //Server script to process data
      type: 'POST',
      data: {},
      success: function (resp) {
        if(resp != '') {
          var bid = '#'+ resp;
          setTimeout(function(){
            $('html, body').animate({
                scrollTop: $(bid).offset().top - 80
            }, 1000);
          }, 500);
        }
      }
    });
  });

  $(document).on('click', '.capability span', function() {
    var _this = $(this);
    if(_this.hasClass('active')) {
      _this.removeClass('active');
      capArr.splice(capArr.indexOf(_this.text()), 1);
    } else {
      _this.addClass('active');
      capArr.push(_this.text())
    }
    //console.log(capArr);
  });

  $(document).on('click', '.market a', function() {
    market = $(this).text();
  });

  $(document).on('click', '.inds div', function() {
    var _this = $(this);
    if(_this.hasClass('active')) {
      _this.removeClass('active');
      var index = indArr.indexOf(_this.text());
      indArr.splice(index,1);
    } else {
      _this.addClass('active');
      indArr.push(_this.text())
    }
    //console.log(indArr);
  });

  $(document).on('click', '.filter-box .closebtn', function() {
    $.ajax({
      url: drupalSettings.path.baseUrl + "our-work/get-projects",  //Server script to process data
      type: 'POST',
      data: {
        'capability': capArr,
        'market': market,
        'industry': indArr,
      },
      success: function (resp) {
        if(resp.output != '') {
          $('.portfolio-Wrap').html(resp.output);
          setTimeout(function(){
            $('html, body').animate({
                scrollTop: $('.portfolio-Wrap').offset().top -180
            }, 2000);
          }, 500);
        }
      }
    });
  });


  $(document).on('change', '#careerFile', function () {
    $('.uploadError').remove();
    $('.fidErr').html('');
    _this = $(this);

    var file = this.files[0];
    var formData = new FormData();
    formData.append('file', file);
    formData.append('source', 'contact');

    $.ajax({
      url: drupalSettings.path.baseUrl + "upload-file",  //Server script to process data
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      //Ajax events
      success: function (resp) {
        if (resp.err == 0) {
          _this.attr('data-fid', resp.fid);
          _this.val('');
          //var rmBtn = drupalSettings.path.baseUrl + 'themes/jsw/images/delbtn.png';

          $('.attachments ul').append('<li class="item doc-filename">'+ resp.name+'</li>');
          if ($('.item').length == 3) {
            $('#careerFile').prop('disabled', true);
          }
          if($('.custFids').val() == '0') {
            $('.custFids').val('');
          }
          fidArr.push(resp.fid);
          $('.custFids').val(fidArr);
        } else {
          $('.custFids').val('0');
          $('.fidErr').text('');
          $('#careerFile').closest('div').after('<div class="uploadError invalid-feedback" style="display:block;">' + resp.msg + '</div>');
        }

      }
    });
  });

  $(document).on('click', '.tabs li', function() {
    if($('body').hasClass('contact-us')) {
      $('.feedback, .invalid-feedback').html('');
      $('.form-text, .form-textarea').val('');
      $('.attachments li').remove();
    }
  });

  $(document).on('click', '.nav-item', function() {
    var _this = $(this);
    var item = _this.find('a').text();
    if($('body').hasClass('solutions') || $('body').hasClass('our-work') || $('body').hasClass('contact-us') || $('body').hasClass('work') || $('body').hasClass('privacy-policy')) {
      $.ajax({
        url: drupalSettings.path.baseUrl + "set-path",  //Server script to process data
        type: 'POST',
        data: {
          'block': item
        },
        success: function (resp) {
          if(_this.find('a').attr('href') == 'javascript:;') {
            window.location = drupalSettings.path.baseUrl;
          }
        }
      });
    }
  });

})(jQuery, Drupal);
