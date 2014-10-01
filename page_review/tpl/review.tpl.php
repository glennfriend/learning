<?php
/*
    review view template

    相依:
        none
*/
?>
    <script type="text/html" id="<?php echo $keyword;?>Template">
        <div class="thumbnail">
            <div class="caption">
                <h5>
                    {{name}}, {{date}}
                    <span class="rating-box" style="display:inline-block;">
                        <span class="rating" style="width:{{rating}}%;"></span>
                    </span>
                </h5>
                <p>{{content}}</p>
                <p>Share this review .........</p>
            </div>
        </div>
    </script>

    <script type="text/javascript" charset="utf-8">
    (function(){

        var keyword = '<?php echo $keyword;?>';

        var templateView = {
            renderName: '',
            items: [],
            setObjects: function( objects ) {
                for ( var index in objects ) {
                    this.items[index] = {};
                    this.items[index].id      = objects[index].id;
                    this.items[index].name    = objects[index].name;
                    this.items[index].rating  = objects[index].rating;
                    this.items[index].date    = objects[index].date;
                    this.items[index].content = objects[index].content;
                }
            },
            setRenderName: function( elementName )
            {
                this.renderName = elementName;
            },
            render: function()
            {
                var elementName = '#' + keyword + 'Template';
                var template = jQuery(elementName).html();
                var html = '';
                for ( var index in this.items ) {
                    html += Mustache.render( template, this.items[index] );
                }
                $(this.renderName).html( html );
            }
        };

        this[keyword] = templateView;

    })();
    </script>
