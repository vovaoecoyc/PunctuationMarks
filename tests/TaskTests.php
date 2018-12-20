<?php
require ('./Task.php');

class TaskTests extends PHPUnit_Framework_TestCase {

    private $task;

    protected function setUp()
    {
        $this->task = new Task();
    }

    protected function tearDown()
    {
        $this->task = null;
    }

    /**
     * @dataProvider providerPunctuationMarks
     */
    public function testPunctuationMarks($inputStr, $outputStr)
    {
        $result = $this->task->revertPunctuationMarks($inputStr);
        $this->assertEquals($outputStr, $result);
    }

    public function providerPunctuationMarks()
    {
        return [
            ['Привет что у тебя нового', 'Привет что у тебя нового'],
            ['Привет, что у тебя нового?', 'Привет? что у тебя нового,'],
            ['Привет что у тебя нового?', 'Привет что у тебя нового?'],
            ['Привет, что у тебя! нового?!', 'Привет! что у тебя? нового!,'],
            ['Hello! I`m your friend!?', 'Hello? I!m your friend`!']
        ];
    }
}