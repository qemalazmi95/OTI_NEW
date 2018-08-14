<?php
include('connection.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		$statement = $conn->prepare("
			INSERT INTO staff (name, ic,email,role,phone,address,password,last_login, image) 
			VALUES (:name, :ic,:email,:role,:phone,:address,:password,NOW(), :image)
		");
		$result = $statement->execute(
			array(
				':name'	=>	$_POST["name"],
				':ic'	=>	$_POST["ic"],
                ':email'=>	$_POST["email"],
                ':role'=>	$_POST["role"],
                ':phone'=>	$_POST["phone"],
                ':address'=>$_POST["address"],
                ':password'=>$_POST["password"],
				':image'=>	$image
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_user_image"];
		}
		$statement = $conn->prepare(
			"UPDATE staff
			SET name = :name, ic = :ic,email=:email,role=:role,phone=:phone,address=:address,password=:password,last_login = NOW(), image = :image  
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':name'	=>	$_POST["name"],
				':ic'	=>	$_POST["ic"],
                ':email'=>	$_POST["email"],
                ':role'=>	$_POST["role"],
                ':phone'=>	$_POST["phone"],
                ':address'=>	$_POST["address"],
                ':password'=>	$_POST["password"],
				':image'=>	$image,
				':id'   =>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>