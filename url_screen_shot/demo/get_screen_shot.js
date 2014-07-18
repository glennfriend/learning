
/**
 *  ���o���O�᭱���Ѽ�
 *  num=0 �N��Ĥ@�ӰѼ�
 *  num=1 �N��ĤG�ӰѼ�
 *  �H������
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
 *  �g�Ѻ��}���R�M�w���� �x�s�I�� �W��
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
 *  �I��
 */
function requestUrlResult()
{
    console.log('Load '+requestUrl);
    page.render(requestUrlImage);
    //console.log('render complete');

    /*
    page.next = searchResult;
    // �b�s�g phantomJS ���{���ɡA�ݭn�S�O�`�N�A�{���O����b���ӽd�򤧤�
    // �ߦ� page.evaluate() �� callback �禡���A�~�����|�s��������̪� DOM ����
    // �ҥH�A�����z�L evaluate() ���^�ǭȡA�ӱN�u�����v���Y�����浲�G�a�X��
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

