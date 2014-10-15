<?php include_once 'library.php'; ?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="zh-tw" />
    <link rel="stylesheet" type="text/css" href="dist/bootstrap-3.2.0-dist/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="dist/main.css" />
    <link rel="stylesheet" type="text/css" href="dist/jquery/jquery.fullPage/jquery.fullPage.css" />
    <style type="text/css">
        .section {
            background-size: cover;
        }

        #section1 {
            background-image: url(media/bg1.jpg);
            padding: 0;
        }
        #section2 {
            background-image: url(media/bg2.jpg);
            color: #ffffff;
        }
        #section3 {
            background-image: url(media/bg3.jpg);
            color: #000000;
        }
    </style>
    <script type="text/javascript" src="dist/jquery/jquery-1.11.1.js"></script>
    <script type="text/javascript" src="dist/jquery/jquery.fullPage/jquery.fullPage.js"></script>
    <script type="text/javascript" src="dist/main.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            $('#fullpage').fullpage({
                sectionsColor: ['whitesmoke', '#4BBFC3', '#7BAABE', '#1bbc9b', '#ccddff'],
                anchors: ['page1', 'page2', 'page3', 'page4', 'page5'],
              //menu: '#menu',
                navigation: true,
                navigationPosition: 'right',
                navigationTooltips: ['Homepage', 'Two Page'],
                css3: true
            });
        });

    </script>
    <script type="text/javascript">
        $(function() {
            //
        });
    </script>
</head>
<body>

    <div class="navbar navbar-inverse navbar-fixed-top header">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">Demo</a>
                <a href="#page1" class="navbar-brand">Top</a>
            </div>
        </div>
    </div>

    <div id="fullpage">
        
            <div class="section" id="section1">
                <div class="container">
                    <div class="row">
                        <h1>Hello World</h1>
                        <h2>
                            ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡
                        </h2>
                    </div>
                </div>
            </div>

            <div class="section" id="section2">
                <div class="container">
                    <div class="row">
                        <p>Based in Los Angeles, California, SimplyBridal is about making your wedding process easy and accessible. When our founder Lawrence Ng began researching the bridal space he was surprised by how expensive it was. Many of its aspects seemed overpriced. After watching an episode of Say Yes to the Dress, he realized how important the dress was to the bride and how the bride had to stretch beyond her budget to buy the dress she wanted. This was not right.</p>
                        <p>Lawrence decided to start his own bridal company because he felt that women should be able to have not only the dress but also the wedding of their dreams at an accessible price.</p>
                        <p>His previous business experience includes Oversee, a company that he co-founded at 21. It ranked the third fastest growing private business in Los Angeles by the Los Angeles Business Journal in 2007. He was also named a winner of the Ernst & Young Entrepreneur of the Year award for the Greater Los Angeles program in the technology category the same year.</p>
                        <p>SimplyBridal started off with the simple idea of creating beautiful weddings at reasonable prices. Beginning with wedding dresses, we’ve since added more products and strive to provide outstanding quality without the inconvenience and costs of traditional bridal boutiques and retailers. Our products are always things that we would want our family members and friends to buy, wear, and love.</p>
                        <p>That means that we only partner with quality designers that share these values such as Los Angeles-based jewelry designer May Yeung. Our design team includes graduates from the Fashion Institute of Technology in New York and Fashion Institute of Design & Merchandising in Los Angeles. They have designed for BCBGMAXAZRIA and Suzi Chin for Maggy. They source only the finest fabrics and embellishments for SimplyBridal, and sets the same high quality standards that are demanded by the New York fashion scene.</p>
                    </div>
                </div>
            </div>

            <div class="section" id="section3">
                <div class="container">
                    <div class="row">
                        <p>Based in Los Angeles, California, SimplyBridal is about making your wedding process easy and accessible. When our founder Lawrence Ng began researching the bridal space he was surprised by how expensive it was. Many of its aspects seemed overpriced. After watching an episode of Say Yes to the Dress, he realized how important the dress was to the bride and how the bride had to stretch beyond her budget to buy the dress she wanted. This was not right.</p>
                        <p>Lawrence decided to start his own bridal company because he felt that women should be able to have not only the dress but also the wedding of their dreams at an accessible price.</p>
                        <p>His previous business experience includes Oversee, a company that he co-founded at 21. It ranked the third fastest growing private business in Los Angeles by the Los Angeles Business Journal in 2007. He was also named a winner of the Ernst & Young Entrepreneur of the Year award for the Greater Los Angeles program in the technology category the same year.</p>
                        <p>SimplyBridal started off with the simple idea of creating beautiful weddings at reasonable prices. Beginning with wedding dresses, we’ve since added more products and strive to provide outstanding quality without the inconvenience and costs of traditional bridal boutiques and retailers. Our products are always things that we would want our family members and friends to buy, wear, and love.</p>
                        <p>That means that we only partner with quality designers that share these values such as Los Angeles-based jewelry designer May Yeung. Our design team includes graduates from the Fashion Institute of Technology in New York and Fashion Institute of Design & Merchandising in Los Angeles. They have designed for BCBGMAXAZRIA and Suzi Chin for Maggy. They source only the finest fabrics and embellishments for SimplyBridal, and sets the same high quality standards that are demanded by the New York fashion scene.</p>
                    </div>
                </div>
            </div>

            <div class="section" id="section4">
                <div class="container">
                    <div class="row">
                        <p>Based in Los Angeles, California, SimplyBridal is about making your wedding process easy and accessible. When our founder Lawrence Ng began researching the bridal space he was surprised by how expensive it was. Many of its aspects seemed overpriced. After watching an episode of Say Yes to the Dress, he realized how important the dress was to the bride and how the bride had to stretch beyond her budget to buy the dress she wanted. This was not right.</p>
                        <p>Lawrence decided to start his own bridal company because he felt that women should be able to have not only the dress but also the wedding of their dreams at an accessible price.</p>
                        <p>His previous business experience includes Oversee, a company that he co-founded at 21. It ranked the third fastest growing private business in Los Angeles by the Los Angeles Business Journal in 2007. He was also named a winner of the Ernst & Young Entrepreneur of the Year award for the Greater Los Angeles program in the technology category the same year.</p>
                        <p>SimplyBridal started off with the simple idea of creating beautiful weddings at reasonable prices. Beginning with wedding dresses, we’ve since added more products and strive to provide outstanding quality without the inconvenience and costs of traditional bridal boutiques and retailers. Our products are always things that we would want our family members and friends to buy, wear, and love.</p>
                        <p>That means that we only partner with quality designers that share these values such as Los Angeles-based jewelry designer May Yeung. Our design team includes graduates from the Fashion Institute of Technology in New York and Fashion Institute of Design & Merchandising in Los Angeles. They have designed for BCBGMAXAZRIA and Suzi Chin for Maggy. They source only the finest fabrics and embellishments for SimplyBridal, and sets the same high quality standards that are demanded by the New York fashion scene.</p>
                    </div>
                </div>
            </div>

            <div class="section" id="section5">
                <div class="container">
                    <div class="row">
                        <p>Based in Los Angeles, California, SimplyBridal is about making your wedding process easy and accessible. When our founder Lawrence Ng began researching the bridal space he was surprised by how expensive it was. Many of its aspects seemed overpriced. After watching an episode of Say Yes to the Dress, he realized how important the dress was to the bride and how the bride had to stretch beyond her budget to buy the dress she wanted. This was not right.</p>
                        <p>Lawrence decided to start his own bridal company because he felt that women should be able to have not only the dress but also the wedding of their dreams at an accessible price.</p>
                        <p>His previous business experience includes Oversee, a company that he co-founded at 21. It ranked the third fastest growing private business in Los Angeles by the Los Angeles Business Journal in 2007. He was also named a winner of the Ernst & Young Entrepreneur of the Year award for the Greater Los Angeles program in the technology category the same year.</p>
                        <p>SimplyBridal started off with the simple idea of creating beautiful weddings at reasonable prices. Beginning with wedding dresses, we’ve since added more products and strive to provide outstanding quality without the inconvenience and costs of traditional bridal boutiques and retailers. Our products are always things that we would want our family members and friends to buy, wear, and love.</p>
                        <p>That means that we only partner with quality designers that share these values such as Los Angeles-based jewelry designer May Yeung. Our design team includes graduates from the Fashion Institute of Technology in New York and Fashion Institute of Design & Merchandising in Los Angeles. They have designed for BCBGMAXAZRIA and Suzi Chin for Maggy. They source only the finest fabrics and embellishments for SimplyBridal, and sets the same high quality standards that are demanded by the New York fashion scene.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>