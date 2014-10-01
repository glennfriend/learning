<?php
/*
    pager view template

    相依:
        none
*/
?>
    <script type="text/html" id="<?php echo $keyword;?>Template">
        <ul class="pagination">
            {{#renderPrev}}{{/renderPrev}}
            {{#renderPager}}{{/renderPager}}
            {{#renderNext}}{{/renderNext}}
        </ul>
    </script>

    <script type="text/javascript">
    (function(){

        var keyword = '<?php echo $keyword;?>';

        var TemplateEvent = {
            listenEvents: {
                pageClick: []
            },
            listen: function( eventName, callback )
            {
                // 只需要 page 一個 event 即可
                if ( eventName = 'pageClick' ) {
                    var len = this.listenEvents.pageClick.length;
                    this.listenEvents.pageClick[len] = callback;
                }
            },
            pageClick: function( page )
            {
                for ( fun in this.listenEvents.pageClick )
                {
                    this.listenEvents.pageClick[fun]( page );
                }
            }
        };

        var templateView = {
            renderName: '',
            itemPerPage: 3,
            isShowPrev: true,
            isShowNext: true,
            setObject: function(pager)
            {
                this.page  = pager.page;
                this.count = pager.count;
            },
            listen: function( eventName, callback )
            {
                TemplateEvent.listen( eventName, callback );
            },
            getAllPage: function()
            {
                return this.count / this.itemPerPage;
            },
            setPage: function(page)
            {
                console.log(page);
                if ( page == 'next' ) {
                    this.page++;
                }
                else if ( page == 'prev' ) {
                    this.page--;
                }
                else {
                    this.page = page;
                }
                console.log(this.page);
                this.render();
            }, 
            renderPrev: function()
            {
                return function(text, render) {
                    if ( !this.isShowPrev ) {
                        return '';
                    }
                    if ( this.page == 1 ) {
                        return '<li class="disabled"><a>&laquo;</a></li>';
                    }
                    return '<li><a class="' + keyword + '_pagerViewPage" data-page="prev">&laquo;</a></li>';
                }
            },
            renderNext: function()
            {
                return function(text, render) {
                    if ( !this.isShowNext ) {
                        return '';
                    }
                    var lastPage = this.getAllPage();
                    if ( this.page == lastPage ) {
                        return '<li class="disabled"><a>&raquo;</a></li>';
                    }
                    return '<li><a href="javascript:;" class="' + keyword + '_pagerViewPage" data-page="next">&raquo;</a></li>';
                }
            },
            renderPager: function()
            {
                return function(text, render) {
                    var content = '';
                    var allPage = this.getAllPage();
                    for ( var i=0; i<allPage; i++ ) {
                        var page = i+1;
                        if ( page == this.page ) {
                            content += '<li class="active"><a href="javascript:;">'+ page +'</a></li>';
                        }
                        else {
                            content += '<li><a href="javascript:;" class="' + keyword + '_pagerViewPage" data-page="'+ page +'">'+ page +'</a></li>';
                        }
                    }
                    return content;
                }
            },
            setRenderName: function( elementName )
            {
                this.renderName = elementName;
            },
            render: function()
            {
                var myself = this;
                var elementName = '#' + keyword + 'Template';
                var template = jQuery(elementName).html();
                var html = Mustache.render( template, this );
                $(this.renderName).html( html );

                $("." + keyword + "_pagerViewPage").on("click", function(){
                    var page = $(this).attr("data-page");
                    if ( page == 'next' ) {
                        myself.page++;
                    }
                    else if ( page == 'prev' ) {
                        myself.page--;
                    }
                    else {
                        myself.page = page;
                    }
                    TemplateEvent.pageClick( myself.page );
                    myself.render();
                });

            }
        };

        this[keyword] = templateView;

    })();
    </script>
