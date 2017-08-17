(function(){
      $('.container')
      .wrap('<div class="container">')
      .each(function(){
        var $this = $('.test img');
        var $frame = $('.container')
        if ($this.width() > $this.height()) {
        $frame.addClass('landscape');
        }
        else{
         $frame.addClass('portrait');
        }
      });
      })();

$(".container").click(function(){
	if($(".overlay").css("opacity") == "0"){
	$(".overlay").css("opacity", "1");
}
	
});

$(".dismiss").click(function(){
	$(".overlay").css("opacity", "0");
});

$(document).ready(function(){
 	
	$(".menu_item").css('display','none');
	$("hr").css('display','none');
	$(".menuu").click(function(){
	if($(".menu_item").is(':visible')){
	$(".menu_item").slideUp();
	$("hr").hide();
	}
	else{
	$(".menu_item").slideDown();
	$("hr").show();
	}
  });
});
