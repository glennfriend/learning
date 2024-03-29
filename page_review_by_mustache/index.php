<?php include_once 'library.php'; ?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="zh-tw" />
    <link rel="stylesheet" type="text/css" href="dist/bootstrap-3.2.0-dist/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="dist/main.css" />
    <link rel="stylesheet" type="text/css" href="dist/jquery/jquery.cover/jquery.cover.css" />
    <script type="text/javascript" src="dist/jquery/jquery-1.11.1.js"></script>
    <script type="text/javascript" src="dist/jquery/jquery.cover/jquery.cover.js"></script>
    <script type="text/javascript" src="dist/mustache/mustache.js"></script>
    <script type="text/javascript" src="dist/main.js"></script>
    <script type="text/javascript">
        var reviews = <?php echo json_encode(getReviews()); ?>;
        var pager = {
            count: <?php echo getAllReviewCount(); ?>,
            page: 1
        };

        $(function() {
            initReview();
            initPager();
            writeReivewEffect();
        });

        var initReview = function()
        {
            reviewView1.importObjects( reviews );
            reviewView1.setRenderName("#reviews_show");
            reviewView1.render();
        };

        var initPager = function()
        {
            var reviewCallback = function(data)
            {
                if( Object.prototype.toString.call( data ) !== '[object Array]' ) {
                    console.log('callback error');
                    return;
                }
                reviews = data;
                initReview();

                $("#reviews_show").removeCover();
                $("#pager_show").removeCover();
            }

            var changePagerEvent = function(data)
            {
                //
                // console.log('page is ' + data.page );

                // effect
                $("#reviews_show").addCover();
                $("#pager_show").addCover({type:"line"});

                //
                $.ajax({
                    dataType: 'jsonp',
                    data: {
                        page: data.page
                    },
                    url: 'review_ajax.php',
                    success: reviewCallback
                });
            };

            pagerView1.listen('pageClick',changePagerEvent);
            pagerView1.importObject( pager );
            pagerView1.setRenderName("#pager_show");
            pagerView1.render();
        };

        var writeReivewEffect = function()
        {
            $("#writeReviewButton").on('click',function(){
                $("#writeReview").toggle("slow");
            });
        };

    </script>
</head>
<body>

    <!--
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand">Review Demo</a>
            </div>
        </div>
    </div>
    -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <h1>Product View</h1>
                    <h2>
                        ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div>
                        <h4 style="float:left;">
                            Avg Rating 
                            <span class="rating-box" style="display:inline-block;">
                                <span class="rating" style="width:90%;"></span>
                            </span>
                        </h4>
                        <h4 style="float:right;"><a id="writeReviewButton" href="javascript:;">Write a review</a></h4>
                    </div>
                    <br style="clear:both;"/>
                    <div id="writeReview" style="display:none;">
                        <div class="thumbnail">
                            <div class="caption">
                                <form role="form">
                                    <fieldset>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Full Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Review</label>
                                            <textarea type="text" name="review" class="form-control" rows="3"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

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

    <?php getTpl('review','reviewView1'); ?>
    <?php getTpl('pager','pagerView1'); ?>

</body>
</html>