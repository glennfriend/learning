"use strict";

/*
    example:

        var html = viewHelper.getHtmlByObject('#pagerView', pagerView, pagerObject );
        if ( viewHelper.getError() ) {
            console.log('is fail');
            return false;
        }
        console.log('success');

*/
(function(viewHelperName) {

    var valueObject = {
        /** 
         *  debug
         *  boolean
         */
        debug: true,
        /** 
         *  storage error message
         *  string or false
         */
        error: false
    };

    var helper = {
        val: valueObject,
        /** 
         *  error message (string) or false (boolean)
         *  @return string/false
         */
        getError: function()
        {
            return this.val.error;
        },
        setError: function( message )
        {
            this.val.error = message;
            if ( this.val.debug ) {
                console.log(message);
            }
        },
        clearError: function()
        {
            this.val.error = false;
        },
        getHtmlByObject: function( elementName, view, obj )
        {
            this.clearError();

            if ( typeof(elementName)==="undefined") {
                this.setError('elementName undefined');
                return '';
            }
            if ( !elementName ) {
                this.setError('elementName empty');
                return '';
            }
            if ( typeof(jQuery(elementName)[0])==='undefined' ) {
                this.setError('elementName not exist');
                return '';
            }
            if ( typeof(view)==="undefined" ) {
                this.setError( 'view undefined');
                return '';
            }
            if ( !view ) {
                this.setError( 'view empty');
                return '';
            }
            if ( typeof(obj)==="undefined" ) {
                this.setError('object undefined');
                return '';
            }
            if (  !obj ) {
                this.setError('object empty');
                return '';
            }

            view.setAll( obj );
            var template = jQuery(elementName).html();
            return Mustache.render( template, view );
        }
    };

    window[viewHelperName] = helper;

})('viewHelper');
