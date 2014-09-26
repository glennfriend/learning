<?php
    $fonts = array(
        'FuturaStdBook',
        'FuturaStdLight',
        'FuturaStdMedium',
        'HelveticaNeueBold',
        'NarzissProCyRegularDrops',
        'VanityBold',
    );

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="zh-tw" />
    <link rel="stylesheet" type="text/css" href="dist/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="dist/main.css" />
    <link rel="stylesheet" type="text/css" href="dist/font.css" />
</head>
<body>

    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand">Simbly Bridal Fonts</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row-fluid">
        <?php
        foreach ( $fonts as $font ) {
            echo <<<EOD
                <div class="col-md-4" style="font-family: '{$font}';">
                    <h1 style="text-transform: Uppercase;">Simply Bridal Wedding Dress</h1>
                    <h2>{$font} Font</h2>
                    <p>Based in Los Angeles, California, SimplyBridal is about making your wedding process easy and accessible. When our founder Lawrence Ng began researching the bridal space he was surprised by how expensive it was. Many of its aspects seemed overpriced. After watching an episode of Say Yes to the Dress, he realized how important the dress was to the bride and how the bride had to stretch beyond her budget to buy the dress she wanted. This was not right.</p>
                    <p>Lawrence decided to start his own bridal company because he felt that women should be able to have not only the dress but also the wedding of their dreams at an accessible price.</p>
                </div>
EOD;
        }
        ?>
        </div>
    </div>

</body>
</html>