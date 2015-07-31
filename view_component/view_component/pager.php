<?php if (!isset($keyword)) {exit;} ?>

    <script type="text/html" id="vcTemplate<?php echo ucfirst($keyword);?>">
        <ul id="<?php echo $keyword;?>" class="pagination">
            {{if isFirstPage()}}
                <li class="disabled"><a>&laquo;</a></li>
            {{else}}
                <li><a href="javascript:;" class="pagerViewPage" data-page="prev">&laquo;</a></li>
            {{/if}}
            {{range start=getPageStart() end=getPageEnd()}}
                {{if #parent.parent.data.page == #data}}
                    <li class="active"><a href="javascript:;">{{:#data}}</a></li>
                {{else}}
                    <li><a href="javascript:;" class="pagerViewPage" data-page="{{:#data}}">
                        {{:#data}}
                    </a></li>
                {{/if}}
            {{/range}}
            {{if isLastPage()}}
                <li class="disabled"><a>&raquo;</a></li>
            {{else}}
                <li><a href="javascript:;" class="pagerViewPage" data-page="next">&raquo;</a></li>
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
