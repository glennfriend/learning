<?php if (!isset($keyword)) {exit;} ?>

    <script type="text/html" id="vcTemplate<?php echo ucfirst($keyword);?>">
        <ul class="pagination">
            {{if isFirstPage()}}
                <li class="disabled"><a>&laquo;</a></li>
            {{else}}
                <li><a href="javascript:;" class="{{>keyword}}_pagerViewPage" data-page="prev">&laquo;</a></li>
            {{/if}}
            {{range start=getPageStart() end=getPageEnd() ~key=keyword}}
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
        var theAutoSetting = {
            keyword: '<?php echo $keyword;?>',
            templateId: 'vcTemplate<?php echo ucfirst($keyword);?>'
        };
    </script>
    <script type="text/javascript" src="view_component/pager.js"></script>
