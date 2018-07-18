$(function() {
	$('.estrela-1').hover(function() {
	    $('.estrela-1').css('background-position', '-120px');
  	}, function() {
    // on mouseout, reset the background colour
	    $('.estrela-1').css('background-position', '0px');
  	});

  $('.estrela-2').hover(function() {
    $('.estrela-1').css('background-position', '-120px');
    $('.estrela-2').css('background-position', '-120px');
  }, function() {
    // on mouseout, reset the background colour
    $('.estrela-1').css('background-position', '0px');
    $('.estrela-2').css('background-position', '0px');
  });

  $('.estrela-3').hover(function() {
    $('.estrela-1').css('background-position', '-120px');
    $('.estrela-2').css('background-position', '-120px');
    $('.estrela-3').css('background-position', '-120px');

  }, function() {
    // on mouseout, reset the background colour
    $('.estrela-1').css('background-position', '0px');
    $('.estrela-2').css('background-position', '0px');
    $('.estrela-3').css('background-position', '0px');
  });

  $('.estrela-4').hover(function() {
    $('.estrela-1').css('background-position', '-120px');
    $('.estrela-2').css('background-position', '-120px');
    $('.estrela-3').css('background-position', '-120px');
    $('.estrela-4').css('background-position', '-120px');
  }, function() {
    // on mouseout, reset the background colour
    $('.estrela-1').css('background-position', '0px');
    $('.estrela-2').css('background-position', '0px');
    $('.estrela-3').css('background-position', '0px');
    $('.estrela-4').css('background-position', '0px');
  });

  $('.estrela-5').hover(function() {
    $('.estrela-1').css('background-position', '-120px');
    $('.estrela-2').css('background-position', '-120px');
    $('.estrela-3').css('background-position', '-120px');
    $('.estrela-4').css('background-position', '-120px');
    $('.estrela-5').css('background-position', '-120px');
  }, function() {
    // on mouseout, reset the background colour
    $('.estrela-1').css('background-position', '0px');
    $('.estrela-2').css('background-position', '0px');
    $('.estrela-3').css('background-position', '0px');
    $('.estrela-4').css('background-position', '0px');
  	$('.estrela-5').css('background-position', '0px');
  });
});
