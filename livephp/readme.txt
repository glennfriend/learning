
使用該工具的方式:
在專案中的 .htaccess 裡面建立以下內容, 並且修改正確的檔案及路徑

############################################
## 注意!! 只限用於開發環境
<Files "index.php">
    php_value auto_append_file "tool/livejs.php"
    php_flag output_buffering on
</Files>

