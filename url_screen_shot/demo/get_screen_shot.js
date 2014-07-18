
/**
 *  取得指令後面的參數
 *  num=0 代表第一個參數
 *  num=1 代表第二個參數
 *  以此類推
 */
function getArgumentByIndex( num )
{
    if( !num ) {
        var num = 0;
    }

    if (phantom.args.length === 0) {
        return '';
    } else {
        return phantom.args[num];
        /*
        phantom.args.forEach(function (arg, i) {
            console.log(i + ': ' + arg);
        });
        */
    }
}

/**
 *  經由網址分析決定它的 儲存截圖 名稱
 */
function convertUrlToImageName( url )
{
    // escape
    // encodeURI
    if( url.substr(0,7)=='http://' ) {
        url = url.substr(7);
        return 'images/' + encodeURIComponent(url) + '.png';
    }
    else if( url.substr(0,8)=='https://' ) {
        url = url.substr(8);
        return 'images/' + encodeURIComponent(url) + '(https).png';
    }
    return 'images/' + encodeURIComponent(url) + '.png';
}

/**
 *  截圖
 */
function requestUrlResult()
{
    console.log('Load '+requestUrl);
    page.render(requestUrlImage);
    //console.log('render complete');

    /*
    page.next = searchResult;
    // 在編寫 phantomJS 的程式時，需要特別注意，程式是執行在哪個範圍之內
    // 唯有 page.evaluate() 的 callback 函式中你才有機會存取到網頁裡的 DOM 物件
    // 所以你必須透過 evaluate() 的回傳值，來將「網頁」裡頭的執行結果帶出來
    page.evaluate(function() {
        document.querySelector('input[name=q]').value = 'syshen';
        document.querySelector('form[name=f]').submit();
    });
    console.log('search submitted');
    */
}

function endClose()
{
    //console.log('The End');
    phantom.exit(1);
}

/*
page.includeJs("http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js", function() {
    var links = page.evaluate(function() {
        var l = $("h3.r a");
        return Array.prototype.map.call(l, function(e) {
            return e.getAttribute('href');
        });
    });

    for (var i = 0; i < links.length; i++) {
        console.log(links[i]);
    }

    var href = page.evaluate(function() {
        return $("h3.r a")[1].href;
    });
    page.open(href);
});
*/



// --------------------------------------------------------------------------------
// 
// --------------------------------------------------------------------------------
var requestUrl = getArgumentByIndex(0);
if( !requestUrl ) {
    requestUrl = 'http://tw.yahoo.com';
}
var requestUrlImage = convertUrlToImageName(requestUrl);
var page = new WebPage();
//page.settings.userAgent = '';
page.viewportSize = {width: 1024, height:768};
page.open(requestUrl, function(status) {
    //console.log(status);
    if (status === 'success') {
        //console.log('page.open - connect');
        if (!page.hasOwnProperty('next')) {
            requestUrlResult();
        } else {
            console.log('page.next()');
            //page.next();
            endClose();
        }
    } else {
        page.render('open-error.png');
        console.log('page.open - Error!');
        endClose();
    }
    endClose();
});

