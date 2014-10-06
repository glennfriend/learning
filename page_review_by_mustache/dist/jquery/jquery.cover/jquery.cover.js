/*!
 *  jQuery Simply Cover (Overlay) Plugin v1.0.0
 *  
 *  create overlay
 *      $('#div_name').addCover()
 *      $('#div_name').addCover({type:'line',position:'left'});
 *
 *  remove overlay
 *      $('#div_name').removeCover();
 *  
 */
(function($){

    /**
     *  該程式使用到 css
     *  options.type     - 使用的圖示
     *  options.position - 圖示在 overlay 上面的位置
     */
    jQuery.fn.addCover = function(options){

        var $this = $(this);
        var id = $this.attr('id');
        var imageId = id + "_jqueryCover";
        var $img = $("#"+imageId);

        if ( $this.length !== 1 ) {
            console.log('jQuery_addCover_error: element not only!');
            return;
        }
        if ( $img.length !== 0 ) {
            // 已經加載了 cover, 就不能再次加載
            // console.log('jQuery_addCover_error: image is exist!');
            return;
        }

        var defaults = {
            type: 'default',
            position: 'center'
        };
        var options = jQuery.extend(defaults, options);


        var className = 'jqueryCover-default';
        switch(options.type)
        {
            case 'line':
                className = 'jqueryCover-'+options.type;
            break;
        }

        $this.addClass("jqueryCoverOverlay");

        $("body").append('<img id="'+ imageId +'" class="'+ className +'"/>');

        var $img = $("#"+imageId);
        var top  = $this.offset().top  + $this.height()/2 - $img.height()/2;
        var left = $this.offset().left + $this.width()/2  - $img.width()/2;

        if ( options.position == 'left') {
            var left = $this.offset().left;
        }

        $img.css("position", "absolute" );
        $img.css("top", top );
        $img.css("left", left );
    }

    /**
     *  remove cover overlay
     */
    jQuery.fn.removeCover = function() {

        var $this = $(this);

        if ( $this.length !== 1 ) {
            console.log('jQuery_removeCover_error: element not only!');
            return;
        }

        var id = $this.attr('id');
        var imageId = id + "_jqueryCover"
        var $img = $("#"+imageId);
        $img.remove();
        $(this).removeClass("jqueryCoverOverlay");
    }

}(jQuery));

