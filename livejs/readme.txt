
在 header or foooter 插入以下程式碼

    <script src="/learning/livejs/live.js"></script>


如果希望 *.php 在儲存時也可以更新, 請再建立以下的方式

    建立 _livejs.php

        $length = ob_get_length();
        $last_modified = date ("F d Y H:i:s", getlastmod());
        header("Content-Length: $length");
        header("Last-Modified: $last_modified GMT time");

    建立 .htaccess

        php_value auto_append_file "_livejs.php"
        php_flag output_buffering on

