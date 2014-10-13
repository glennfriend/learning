/*
    pager view template

    變數
        keyword         - 幫助產生不同變數的值
        templateView    - jsrender.js 在產生樣版所使用的物件
        templateEvent   - 讓 developer 註冊的 events
        templateModel   - 給予外界使用的接口

    相依
        jQuery
*/
(function(keyword){

    var templateView = {
        init: function( obj )
        {
            this.itemPerPage = obj.limit || 5;
            this.page        = obj.page  || 1;
            this.count       = obj.count;
            this.pageScope   = 3;
            this.keyword     = keyword;
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
        // 計算顯示的 page number 從多少開始
        getPageStart: function()
        {
            var start = this.page - this.pageScope;
            if ( start<=0 ) {
                start = 1;
            }
            return start;
        },
        // 計算顯示的 page number 到多少結束
        getPageEnd: function()
        {
            var end = this.page + this.pageScope;
            if ( end>this.getAllPage() ) {
                end = this.getAllPage();
            }
            return end;
        }
    };

    var templateEvent = {
        events: {
            pageClick: []
        },
        register: function( eventName, callback )
        {
            if ( eventName = 'pageClick' ) {
                var len = this.events.pageClick.length;
                this.events.pageClick[len] = callback;
            }
            // etc event ....
        },
        pageClick: function( data )
        {
            for ( index in this.events.pageClick ) {
                this.events.pageClick[index]( data );
            }
        }
    };

    var templateModel = {
        renderName: '',
        import: function(pager)
        {
            templateView.init(pager);
        },
        register: function( eventName, callback )
        {
            templateEvent.register( eventName, callback );
        },
        setRenderName: function( renderName )
        {
            this.renderName = renderName;
        },
        render: function()
        {
            var templateId = '#vcTemplate' + keyword;
            var html = $(templateId).render( templateView );
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
                    templateView.page = Number(page);
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
