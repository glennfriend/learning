
    <script type="text/html" id="<?php echo $keyword;?>Template">
        <div class="thumbnail">
            <div class="caption">
                <h5>
                    {{name}}, {{date}}
                    <span class="rating-box" style="display:inline-block;">
                        <span class="rating" style="width:{{rating}}%;"></span>
                    </span>
                </h5>
                <p>{{content}}</p>
                <p>Share this review .........</p>
            </div>
        </div>
    </script>
    <script type="text/javascript">
        var theTemplateTempKey = '<?php echo $keyword;?>';
    </script>
    <script type="text/javascript" src="tpl/review.tpl.js"></script>
