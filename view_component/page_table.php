<?php include_once 'library.php'; ?><!DOCTYPE html>
<html>
<head>
    <?php include_once 'head.php'; ?>
    <?php getViewComponent('table','table1'); ?>
    <script type="text/javascript">

        $(function() {
            initTable1();
        });

        var initTable1 = function()
        {
            table1.on('checkOne', function(data){
                console.log(data);
                var html = "information ::";
                html += "\n" + "Yes = " + data.yes;
                html += "\n" + "No = " + data.no;
                $("#information").html(html);
            });

            table1.on('error', function(data){
                console.log(data.key);
            });

            var data = <?php echo json_encode(getData()); ?>;
            table1.import( data );
            table1.view.isShowCheckbox = true;
            table1.render("#table1_show");
        };

    </script>
</head>
<body>

    <?php include_once 'navbar.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <h2>
                        ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡ Ⅲ ≡
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row" id="table1_show"></div>
            </div>
            <div class="col-md-6">
                <pre id="information"></pre>
            </div>
        </div>
    </div>

</body>
</html>
<?php

    function getData()
    {
        // return array();
        return array(
            'name' => 'My Table',
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