//function to create hover like functionaliy on mobile (click instead of hover)

$(".container").click(function(){
	if($(".overlay").css("opacity") == "0"){
	$(".overlay").css("opacity", "1");
}
	
});

$(".dismiss").click(function(){
	$(".overlay").css("opacity", "0");
});


//function to display picture in portrait or landscape accordingly 

$(window).on("load", function(){
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



