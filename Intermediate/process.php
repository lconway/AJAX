<?php
	require("connection.php");

	$query =  "SELECT * FROM leads WHERE first_name LIKE '" . $_POST['name'] . "%' OR last_name LIKE '" . $_POST['name'] . "%';";
	//echo $query; die();
	$users = fetch_all($query);

	$html = "
		<table>
			<thead>
				<tr>
					<th>leads_id</th>
					<th>first name</th>
					<th>last name</th>
					<th>registered datetime</th>
					<th>email</th>
				</tr>
			</thead>
			<tbody>
	";

	foreach($users as $user)
	{
		$html .= "
			<tr>
				<td>{$user['leads_id']}</td>
				<td>{$user['first_name']}</td>
				<td>{$user['last_name']}</td>
				<td>{$user['registered_datetime']}</td>
				<td>{$user['email']}</td>
			</tr>
		";
	}

	$html .= "
			<tbody>
		</table>
	";

	echo json_encode($html);

?>

