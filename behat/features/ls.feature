Feature: ls
  在 linux 平台中
  列出檔案的目錄結構

Scenario: 顯示2個檔案在目錄中
  Given 我在 "tmp/test" 目錄之中
  And 有一個檔案 "foo"
  And 有一個檔案 "bar"
  When 執行指令 "ls"
  Then 顯示:
    """
    bar
    foo
    """
