<?php 


class ClassificationTest extends \PHPUnit\Framework\TestCase{


    public function testgetSortedModules()
    {
        $grade = new \App\functions;
        $inputText = 'software engineering,79newlinedatabases,55newlinecloud computing,99';
        $result = $grade->getSortedModules($inputText);
        $expected = array(array("module"=>"cloud computing", "marks"=>"99"),array("module"=>"software engineering", "marks"=>"79"),array("module"=>"databases", "marks"=>"55"));
        $this->assertEquals($expected,$result);
    }

    public function testgetSortedDoesSomething()
    {
        $grade = new \App\functions;
        $inputText = 'software engineering,79newlinedatabases,55newlinecloud computing,99';
        $result = $grade->getSortedModules($inputText);
        $this->assertNotEquals($inputText,$result);
    }

    public function testgetSortedIncompleteInputs()
    {
        $grade = new \App\functions;
        $inputText = 'software engineering,79';
        $result = $grade->getSortedModules($inputText);
        $expected = array(array("module"=>"software engineering", "marks"=>"79"));
        $this->assertEquals($expected,$result);
    }

    public function testService()
    {
        $grade = new \App\functions;
        $inputText = 'software engineering,79';
        $result = file_get_contents('http://sort.40103299.qpc.hal.davecutting.uk/?input_text=softwareengineering,79');
        $expected = '{"error":false,"string":"softwareengineering,79=softwareengineering, 79newline","answer":"softwareengineering, 79newline"}';
        $this->assertEquals($expected,$result);
    }




}?>