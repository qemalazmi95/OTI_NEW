<?php
include('connection.php');
include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $conn->prepare(
		"SELECT * FROM staff 
		WHERE id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["name"] = $row["name"];
		$output["ic"] = $row["ic"];
        $output["email"] = $row["email"];
        $output["role"] = $row["role"];
        $output["phone"] = $row["phone"];
        $output["address"] = $row["address"];
        $output["password"] = $row["password"];
        $output["last_login"] = $row["last_login"];
		if($row["image"] != '')
		{
			$output['user_image'] = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
		}
		else
		{
			$output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
		}
	}
	echo json_encode($output);
}
?>