<?php include_once 'library.php'; ?><!DOCTYPE html>
<html>
<head>
    <?php include_once 'head.php'; ?>
    <?php getViewComponent('table','table1'); ?>
    <?php getViewComponent('table','table2'); ?>
    <script type="text/javascript">

        $(function() {
            initTable1();
            initTable2();
        });

        var initTable1 = function()
        {
            var data = <?php echo json_encode(getData()); ?>;
            table1.import( data );
            table1.render("#table1_show");
        };

        var initTable2 = function()
        {
            table2.on('checkOne', function(data){
                console.log(data);
                var html = "information ::";
                html += "\n" + "Yes = " + data.yes;
                html += "\n" + "No = " + data.no;
                $("#information2").html(html);
            });

            table2.on('error', function(data){
                $("#table2_show").html(
                    "Error Keyword: " + data.key
                );
            });

            var data = <?php echo json_encode(getData2()); ?>;
            table2.import( data );
            table2.view.isShowCheckbox = true;
            table2.view.setTitleAilas('name','姓名');
            table2.view.setTitleAilas('desc','說明');
            table2.render("#table2_show");
        };

    </script>
</head>
<body>

    <?php include_once 'navbar.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div id="table1_show"></div>
            </div>
            <div class="col-md-6">
                <div id="table2_show"></div>
                <pre id="information2"></pre>
            </div>
        </div>
    </div>

</body>
</html>
<?php

    function getData()
    {
        return array(
            'title' => 'My Table',
            'items' => array(
                array('id'=>4,  'name'=>'kevin', 'age'=>33,    'desc'=>'hello' ),
                array('id'=>5,  'name'=>'john',  'age'=>12,    'desc'=>'today is good day' ),
                array('id'=>16, 'name'=>'june',  'age'=>18,    'desc'=>'hi~ !!' ),
                array('id'=>22, 'name'=>'bb',    'age'=>88,    'desc'=>'hi bb' ),
            ),
        );
    }

    function getData2()
    {
        //return array();
        return array(
            'title' => 'My Table',
            'items' => array(
                array('id'=>51, 'name'=>'kevin', 'age'=>33,    'desc'=>'hello' ),
                array('id'=>52, 'name'=>'john',  'age'=>12,    'desc'=>'today is good day' ),
                array('id'=>53, 'name'=>'june',  'age'=>18,    'desc'=>'hi~ !!' ),
                array('id'=>54, 'name'=>'aa',    'age'=>20,    'desc'=>'hi aa' ),
                array('id'=>55, 'name'=>'bb',    'age'=>88,    'desc'=>'hi bb' ),
            ),
        );
    }


?>