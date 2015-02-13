<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{

    /**
     * @Given 我在 :dir 目錄之中
     */
    public function nanoJuYa($dir)
    {
        if (!file_exists($dir)) {
            mkdir($dir,0664,true);
        }
        chdir($dir);
    }

    /**
     * @Given 有一個檔案 :file
     */
    public function stepDefinition1($file)
    {
        touch($file);
    }

    /**
     * @When 執行指令 :command
     */
    public function dchan($command)
    {
        exec($command, $output);
        $this->output = trim(implode("\n", $output));
    }

    /**
     * @Then 顯示:
     */
    public function langTian(PyStringNode $string)
    {
        if ((string) $string !== $this->output) {
            throw new Exception("Actual output is:\n" . $this->output );
        }
    }

}
