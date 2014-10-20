<?php if (!isset($keyword)) {exit;} ?>

    <script type="text/html" id="vcTemplate<?php echo ucfirst($keyword);?>">
        <table class="table table-striped table-condensed table-bordered">
            <tbody>
                {{if name}}
                    <tr style="text-align: center;">
                        <td colspan="{{:getShowRowCount()}}">{{>name}}</td>
                    </tr>
                {{/if}}
                <tr>
                    {{if isShowCheckbox}}
                        <th style="width: 15px;"><input class="checkbox" type="checkbox" name="{{>checkboxAll}}"></th>
                    {{/if}}
                    {{for getRowTitles()}}
                        <td>{{:#data}}</td>
                    {{/for}}
                </tr>
                {{for items}}
                    <tr id="{{:~root.getUniqueId()}}">
                        {{if ~root.isShowCheckbox}}
                            <th>
                                <input class="checkbox" type="checkbox" name="{{>~root.checkboxName}}[]" value="{{:#data.id}}">
                            </th>
                        {{/if}}
                        {{for ~root.getRowItems(#index)}}
                            <td>{{:#data}}</td>
                        {{/for}}
                    </tr>
                {{/for}}
            </tbody>
        </table>
    </script>
    <script type="text/javascript">
        var theAutoSetting = {
            keyword: '<?php echo $keyword;?>',
            templateId: 'vcTemplate<?php echo ucfirst($keyword);?>'
        };
    </script>
    <script type="text/javascript" src="view_component/table.js"></script>
