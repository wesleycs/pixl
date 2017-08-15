
	(function(){
      $('.img-box img')
      .wrap('<div class="img">')
      .each(function(){
        var $this = $(this);
        if ($this.width() > $this.height()) {
        $this.addClass('landscape');
        }
        else{
          $this.addClass('portrait');
        }
      });
      })();
