    <!-- pagerView template -->

    <script type="text/html" id="pagerView">
        <ul class="pagination">
            {{#renderPrev}}{{/renderPrev}}
            {{#renderPager}}{{/renderPager}}
            {{#renderNext}}{{/renderNext}}
        </ul>
    </script>

    <script type="text/javascript" charset="utf-8">
        var pagerView = {
            setAll: function(pager)
            {
                this.page  = pager.page;
                this.count = pager.count;
                this.itemPerPage = 3;
                this.isShowPrev = true;
                this.isShowNext = true;
            },
            event: {
                page: function( page ) {
                    
                }
            },
            listen: function()
            {
                
            },
            getAllPage: function()
            {
                return this.count / this.itemPerPage ;
            },
            renderPrev: function()
            {
                return function(text, render) {
                    if ( !this.isShowPrev ) {
                        return '';
                    }
                    if ( this.page === 1) {
                        return '<li class="disabled"><a>&laquo;</a></li>';
                    }
                    return '<li><a href="#page'+ (this.page-1) +'">&laquo;</a></li>';
                }
            },
            renderNext: function()
            {
                return function(text, render) {
                    if ( !this.isShowNext ) {
                        return '';
                    }
                    var lastPage = this.getAllPage();
                    if ( this.page == lastPage) {
                        return '<li class="disabled"><a>&raquo;</a></li>';
                    }
                    return '<li><a href="#page'+ (this.page+1) +'">&raquo;</a></li>';
                }
            },
            renderPager: function()
            {
                return function(text, render) {
                    var content = '';
                    var allPage = this.getAllPage();
                    for ( var i=0; i<allPage; i++ ) {
                        if ( (i+1)===this.page ) {
                            content += '<li class="active"><a href="#page'+ (i+1) +'">'+ (i+1) +'</a></li>';
                        }
                        else {
                            content += '<li><a href="#page'+ (i+1) +'">'+ (i+1) +'</a></li>';
                        }
                        
                    }
                    return content;
                }
            }
        };
    </script>
