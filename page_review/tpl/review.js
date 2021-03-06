/*
    review view template

    變數
        keyword             - 幫助產生不同變數的值
        templateView        - jsrender.js 在產生樣版所使用的物件
        templateCollections - 該 template 是列出多筆資料
                              為了不讓資料放置在 model 中 (避免資料污染 & 資料應該屬於 view )
                              所以由 collections 做 暫存 的地方
        templateModel       - 給予外界使用的接口

    相依
        jQuery
*/
(function(keyword){

    var templateView = {
        init: function( obj )
        {
            this.id      = obj.id;
            this.name    = obj.name;
            this.rating  = obj.rating;
            this.date    = obj.date;
            this.content = obj.content;
        }
    };

    var templateCollections = [];

    var templateModel = {
        renderName: '',
        items: [],
        importObjects: function( objects ) {
            templateCollections = objects;
        },
        setRenderName: function( renderName )
        {
            this.renderName = renderName;
        },
        render: function()
        {
            var templateId = '#' + keyword + 'Template';
            var html = '';
            for ( var index in templateCollections ) {
                templateView.init( templateCollections[index] );
                html += $(templateId).render( templateView );
            }
            $(this.renderName).html( html );
        }
    };

    this[keyword] = templateModel;

})(theTemplateTempKey);
