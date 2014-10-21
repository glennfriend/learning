/*
    table view template

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
            this.title           = obj.title || '';
            this.items          = obj.items || [];
            this.keyword        = setting.keyword;
            this.templateId     = setting.templateId;
            this.isShowCheckbox = false;
            this.checkboxAll    = this.keyword + '_chooseItemsAll';
            this.checkboxName   = this.keyword + '_chooseItems';
            this.titleAlias     = [];
        },
        getRowTitles: function()
        {
            var firstRow = this.items[0];
            var titles = [];
            var count=0;
            for (var key in firstRow) {
                if (firstRow.hasOwnProperty(key)) {
                    if ( typeof this.titleAlias[key] !== 'undefined' ) {
                        titles[count] = this.titleAlias[key];
                    }
                    else {
                        titles[count] = key;
                    }
                    count++;
                }
            }
            return titles;
        },
        getRowItems: function( index )
        {
            var row = this.items[index];
            var array = $.map(row, function(value, index) {
                return [value];
            });
            return array;
        },
        getRowCount: function()
        {
            var firstRow = this.items[0];
            var count = 0;
            for (var key in firstRow) {
                if (firstRow.hasOwnProperty(key)) {
                   count++;
                }
            }
            return count;
        },
        /**
         *  顯示 table row 的數量, 使用於 <td colspan="?">
         */
        getShowRowCount: function()
        {
            var len = this.getRowCount();
            if ( this.isShowCheckbox ) {
                len++;
            }
            return len;
        },
        /**
         *  取得唯一值
         */
        getUniqueId: function( prefix )
        {
            var microtime = function() {
                var now = new Date().getTime() / 1000;
                var s = parseInt(now, 10);
                return Math.round((now - s) * 1000);
            };
            var s4 = function() {
                return (((1 + Math.random()) * 0x10000) | 0).toString(16).substring(1);
            }
            var prefix = prefix || 'uid_';
            return prefix + s4() + s4() + s4() + microtime();
        },
        getCount: function()
        {
            return (this.items.length);
        },
        //
        // setting
        //
        setTitleAilas: function( key, show )
        {
            this.titleAlias[key] = show.trim();
        }
    };

    var templateEvent = {
        events: {
            checkOne: [],
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
        import: function(data)
        {
            this.view = templateView;
            this.view.init(data);
        },
        on: function( eventName, callback )
        {
            templateEvent.add( eventName, callback );
        },
        render: function(renderName)
        {
            var renderName = renderName || '';
            this.renderName = this.renderName || '';
            if ( renderName ) {
                this.renderName = renderName;
            }

            if ( this.view.getCount() <= 0 ) {
                templateEvent.fire('error', {
                    'key': 'no-any-data'
                });
                return;
            }

            var html = $('#'+setting.templateId).render( this.view );
            $(this.renderName).html( html );

            // checkbox all, no event
            var elementName = "input[name=" + templateView.checkboxAll + "]";
            $(elementName).on("change", function(){
                var elementName = "input[name='" + templateView.checkboxName + "[]']";
                $(elementName).prop('checked', this.checked);
                $(elementName).change();
            });

            // checkbox item line event
            var elementsName = "input[name='" + templateView.checkboxName + "[]']";
            $(elementsName).on("change", function(){

                var yes = 0;
                var no = 0;
                $(elementsName).each(function(){
                    if ( $(this).prop('checked') ) {
                        yes++;
                    }
                    else {
                        no++;
                    }
                });

                templateEvent.fire('checkOne', {
                    'checked': this.checked,
                    'yes': yes,
                    'no':  no,
                    'element': this
                });

            });

        }
    };

    this[setting.keyword] = templateModel;

})(theAutoSetting);
