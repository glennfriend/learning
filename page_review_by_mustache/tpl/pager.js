/*
    pager view template

    變數
        keyword         - 幫助產生不同變數的值
        templateView    - mustache.js 在產生樣版所使用的物件
        templateEvent   - 讓 developer 註冊的 events
        templateModel   - 給予外界使用的接口

    相依:
        none
*/
(function(keyword){

    var templateView = {
        init: function( obj )
        {
            this.itemPerPage = obj.limit || 5;
            this.page        = obj.page || 1;
            this.count       = obj.count;
        },
        isFirstPage: function()
        {
            return (this.page == 1);
        },
        isLastPage: function()
        {
            var lastPage = this.getAllPage();
            return (this.page == lastPage);
        },
        getAllPage: function()
        {
            return Math.ceil( this.count / this.itemPerPage );
        },
        renderPrev: function()
        {
            return function(text, render) {
                if ( this.isFirstPage() ) {
                    return '<li class="disabled"><a>&laquo;</a></li>';
                }
                return '<li><a href="javascript:;" class="' + keyword + '_pagerViewPage" data-page="prev">&laquo;</a></li>';
            }
        },
        renderNext: function()
        {
            return function(text, render) {
                if ( this.isLastPage() ) {
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
        }
    };

    var templateEvent = {
        events: {
            pageClick: []
        },
        listen: function( eventName, callback )
        {
            if ( eventName = 'pageClick' ) {
                var len = this.events.pageClick.length;
                this.events.pageClick[len] = callback;
            }
            // etc event ....
        },
        pageClick: function( data )
        {
            for ( fun in this.events.pageClick )
            {
                this.events.pageClick[fun]( data );
            }
        }
    };

    var templateModel = {
        renderName: '',
        importObject: function(pager)
        {
            templateView.init(pager);
        },
        listen: function( eventName, callback )
        {
            templateEvent.listen( eventName, callback );
        },
        setRenderName: function( renderName )
        {
            this.renderName = renderName;
        },
        render: function()
        {
            var templateId = '#' + keyword + 'Template';
            var template = jQuery(templateId).html();
            var html = Mustache.render( template, templateView );
            $(this.renderName).html( html );

            // click page event
            var myself = this;
            var className = "." + keyword + "_pagerViewPage";
            $(className).on("click", function(){
                var page = $(this).attr("data-page");
                if ( page == 'next' ) {
                    templateView.page++;
                }
                else if ( page == 'prev' ) {
                    templateView.page--;
                }
                else {
                    templateView.page = page;
                }

                templateEvent.pageClick({
                    page:        templateView.page,
                    isFirstPage: templateView.isFirstPage(),
                    isLastPage:  templateView.isLastPage()
                });
                myself.render();
            });

        }
    };

    this[keyword] = templateModel;

})(theTemplateTempKey);
