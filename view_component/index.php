<?php include_once 'library.php'; ?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="zh-tw" />
    <link rel="stylesheet" type="text/css" href="dist/bootstrap-3.2.0-dist/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="dist/main.css" />
    <script type="text/javascript" src="dist/jquery/jquery-1.11.1.js"></script>
    <script type="text/javascript" src="dist/jquery/jsrender/jsrender.js"></script>
    <script type="text/javascript" src="dist/jquery/jsrender/range.js"></script>
    <script type="text/javascript" src="dist/main.js"></script>
    <?php getViewComponent('pager','pager1'); ?>
    <script type="text/javascript">
        var pager = {
            count: 100,
            page: 3
        };

        $(function() {
            initPager();
        });

        var initPager = function()
        {
            var changePagerEvent = function(data)
            {
                console.log(data);
            };

            pager1.register('pageClick', changePagerEvent);
            pager1.import( pager );
            pager1.setRenderName("#pager_show");
            pager1.render();
        };

    </script>
</head>
<body>

    <?php include_once 'navbar.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <h2>
                        ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row" id="reviews_show"></div>
                <div class="row" id="pager_show"></div>
            </div>
            <div class="col-md-6">
                <p>Based in Los Angeles, California, SimplyBridal is about making your wedding process easy and accessible. When our founder Lawrence Ng began researching the bridal space he was surprised by how expensive it was. Many of its aspects seemed overpriced. After watching an episode of Say Yes to the Dress, he realized how important the dress was to the bride and how the bride had to stretch beyond her budget to buy the dress she wanted. This was not right.</p>
                <p>Lawrence decided to start his own bridal company because he felt that women should be able to have not only the dress but also the wedding of their dreams at an accessible price.</p>
                <p>His previous business experience includes Oversee, a company that he co-founded at 21. It ranked the third fastest growing private business in Los Angeles by the Los Angeles Business Journal in 2007. He was also named a winner of the Ernst & Young Entrepreneur of the Year award for the Greater Los Angeles program in the technology category the same year.</p>
                <p>SimplyBridal started off with the simple idea of creating beautiful weddings at reasonable prices. Beginning with wedding dresses, we’ve since added more products and strive to provide outstanding quality without the inconvenience and costs of traditional bridal boutiques and retailers. Our products are always things that we would want our family members and friends to buy, wear, and love.</p>
                <p>That means that we only partner with quality designers that share these values such as Los Angeles-based jewelry designer May Yeung. Our design team includes graduates from the Fashion Institute of Technology in New York and Fashion Institute of Design & Merchandising in Los Angeles. They have designed for BCBGMAXAZRIA and Suzi Chin for Maggy. They source only the finest fabrics and embellishments for SimplyBridal, and sets the same high quality standards that are demanded by the New York fashion scene.</p>
            </div>
        </div>
    </div>

</body>
</html>