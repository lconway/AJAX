<?php
//var_dump($_POST);
$data = array('answer' => NULL, 'process' => NULL);
if(isset($_POST['x']) && isset($_POST['y']) && isset($_POST['desired_op']))
{
	if ($_POST['desired_op'] == "Add")
	{
		$data['answer'] = intval($_POST['x']) + intval($_POST['y']);
		$data['process'] = "Addition";
	} else if ($_POST['desired_op'] == "Multiply")
	{
		$data['answer'] = intval($_POST['x']) * intval($_POST['y']);
		$data['process'] = "Multiplication";
	} else if ($_POST['desired_op'] == "Less_Than")
	{
		$data['answer'] = intval($_POST['x']) < intval($_POST['y']);
		$data['process'] = "Less than";
	} else if ($_POST['desired_op'] == "Greater_Than")
	{
		$data['answer'] = intval($_POST['x']) > intval($_POST['y']);
		$data['process'] = "Greater than";
	}
}

	 //echo "Sum = " . $data['sum'];
echo json_encode($data);

?>

