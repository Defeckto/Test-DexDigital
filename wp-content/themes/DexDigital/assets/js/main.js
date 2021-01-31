jQuery(function($) {
  $(window).scroll(function fix_element() {
    $('#pay-form').css(
      $(window).scrollTop() > 200
        ? { 'position': 'fixed', 'center': '10px' }
        : { 'position': 'absolute'}
    );
    return fix_element;
  }());
});