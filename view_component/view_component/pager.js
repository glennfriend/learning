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
(function(setting){

    var templateView = {
        init: function( obj )
        {
            this.itemPerPage = obj.limit || 5;
            this.page        = obj.page  || 1;
            this.count       = obj.count || 0;
            this.pageScope   = 3;
            this.keyword     = setting.keyword;
            this.templateId  = setting.templateId;
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
            pageClick: [],
            error: []
        },
        add: function( eventName, callback )
        {
            if ( typeof this.events[eventName] == 'undefined' ) {
                console.log('view_componnent error, event name not found.');
                return;
            }
            var len = this.events[eventName].length;
            this.events[eventName][len] = callback;
        },
        // fire all events
        fire: function(eventName, data)
        {
            for ( index in this.events[eventName] ) {
                this.events[eventName][index](data);
            }
        }
    };

    var templateModel = {
        view: {},
        renderName: '',
        import: function(pager)
        {
            this.view = templateView;
            this.view.init(pager);
        },
        on: function( eventName, callback )
        {
            templateEvent.add( eventName, callback );
        },
        setRenderName: function( renderName )
        {
            this.renderName = renderName;
        },
        render: function()
        {
            if ( this.view.count <= 0 ) {
                templateEvent.fire('error');
                return;
            }

            var html = $('#'+setting.templateId).render( this.view );
            $(this.renderName).html( html );

            // click page event
            var myself = this;
            var element = "#" + setting.keyword + " .pagerViewPage";
            $(element).on("click", function(){
                var page = $(this).attr("data-page");
                var currentPage = myself.view.page;
                if ( page == 'next' ) {
                    myself.view.page++;
                }
                else if ( page == 'prev' ) {
                    myself.view.page--;
                }
                else {
                    myself.view.page = Number(page);
                }
                templateEvent.fire('pageClick', {
                    page:        myself.view.page,
                    originPage:  currentPage,
                    isFirstPage: myself.view.isFirstPage(),
                    isLastPage:  myself.view.isLastPage()
                });
                myself.render();
            });

        }
    };

    this[setting.keyword] = templateModel;

})(theAutoSetting);
