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
