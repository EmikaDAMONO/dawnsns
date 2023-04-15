$(function () {
  $('.menu-trigger').click(function () { //ハンバーガーボタン(.menu-trigger)をクリック
    $(this).toggleClass('active'); //ハンバーガーボタンに(.active)を追加・削除
    if ($(this).hasClass('active')) { //もしハンバーガーボタンに(.active)があれば
      $('.g-navi').addClass('active'); //(.g-navi)にも(.active)を追加
    } else { //それ以外の場合は、
      $('.g-navi').removeClass('active'); //(.g-navi)にある(.active)を削除
    }
  });
  $('.g-navi ul li a').click(function () { //各メニュー(.nav-wrapper ul li a)をタップする
    $('.menu-trigger').removeClass('active'); //ハンバーガーボタンにある(.active)を削除
    $('.g-navi').removeClass('active'); //(.g-navi)にある(.active)も削除
  });
});

$(function () {
  $('.menu-name-btn').click(function () { //ハンバーガーボタン(.menu-trigger)をクリック
    $('.menu-trigger').toggleClass('active'); //ハンバーガーボタンに(.active)を追加・削除
    if ($('.menu-trigger').hasClass('active')) { //もしハンバーガーボタンに(.active)があれば
      $('.g-navi').addClass('active'); //(.g-navi)にも(.active)を追加
    } else { //それ以外の場合は、
      $('.g-navi').removeClass('active'); //(.g-navi)にある(.active)を削除
    }
  });
  $('.g-navi ul li a').click(function () { //各メニュー(.nav-wrapper ul li a)をタップする
    $('.menu-name-btn').removeClass('active'); //ハンバーガーボタンにある(.active)を削除
    $('.g-navi').removeClass('active'); //(.g-navi)にある(.active)も削除
  });
});

// モーダル部分
$(function () {
  $('.modalopen').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      console.log(modal);
      $(modal).fadeIn();
      return false;
    });
  });

  $('.modal-inner').on('click', function (e) {
    if (!$(e.target).closest('.modal-content').length) {
      console.log(1 + 1);
      $('.js-modal').fadeOut();
      return false;
    }
  });

});
