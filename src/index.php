<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json");
require('functions.php');

$output = array(
	"error" => false,
  "string" => "",
	"answer" => 0
);

$input_text = $_REQUEST['input_text'];

$answer=='unchanged';

$result = (new App\functions)->getSortedModules($input_text);


//$result=getSortedModules($input_text);   
foreach ($result as $module_marks) {
		$answer = $answer . $module_marks['module'] . ', ' . $module_marks['marks'] . 'newline';

}

$output['string']=$input_text."=".$answer;
$output['answer']=$answer;

if($answer=='unchanged'){
	$output['error']='true';
	}
	

echo json_encode($output);
exit();
