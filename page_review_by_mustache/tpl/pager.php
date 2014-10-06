<?php if (!isset($keyword)) {exit;} ?>

    <script type="text/html" id="<?php echo $keyword;?>Template">
        <ul class="pagination">
            {{#renderPrev}}{{/renderPrev}}
            {{#renderPager}}{{/renderPager}}
            {{#renderNext}}{{/renderNext}}
        </ul>
    </script>
    <script type="text/javascript">
        var theTemplateTempKey = '<?php echo $keyword;?>';
    </script>
    <script type="text/javascript" src="tpl/pager.js"></script>
