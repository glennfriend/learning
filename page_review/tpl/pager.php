<?php if (!isset($keyword)) {exit;} ?>

    <script type="text/html" id="<?php echo $keyword;?>Template">
        <ul class="pagination">
            {{if isFirstPage()}}
                <li class="disabled"><a>&laquo;</a></li>
            {{else}}
                <li><a href="javascript:;" class="{{>keyword}}_pagerViewPage" data-page="prev">&laquo;</a></li>
            {{/if}}
            {{range start=1 end=getAllPage() ~key=keyword}}
                {{if #parent.parent.data.page == #data}}
                    <li class="active"><a href="javascript:;">{{:#data}}</a></li>
                {{else}}
                    <li><a href="javascript:;" class="{{>~key}}_pagerViewPage" data-page="{{:#data}}">
                        {{:#data}}
                    </a></li>
                {{/if}}
            {{/range}}
            {{if isLastPage()}}
                <li class="disabled"><a>&raquo;</a></li>
            {{else}}
                <li><a href="javascript:;" class="{{>keyword}}_pagerViewPage" data-page="next">&raquo;</a></li>
            {{/if}}
        </ul>
    </script>
    <script type="text/javascript">
        var theTemplateTempKey = '<?php echo $keyword;?>';
    </script>
    <script type="text/javascript" src="tpl/pager.js"></script>
