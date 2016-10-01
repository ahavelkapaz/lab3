<?php

 require_once 'db_config.php';


  $user_name = $_POST['nombre'];
  $user_email = trim($_POST['email']);
  $user_pass = trim($_POST['password']);//SHA1
  $user_phone = trim($_POST['telefono']);
  $user_speciality = htmlspecialchars($_POST['selectoptions']);

  if($user_speciality=='Otros'){
	$user_speciality = htmlspecialchars($_POST['hideotros']);
	}

  
  $user_tech= htmlspecialchars($_POST['tech']);
  
  
  
   // Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
	$image="";
    //Añadir imagen
	if($_FILES['image']['size']>0)
		$image= mysqli_real_escape_string($conn, file_get_contents($_FILES['image']['tmp_name']));

	$time=date("Y-m-d H:i:s");
	//echo $time;
	//echo $user_name . $user_email.$user_pass.$user_phone.$user_speciality.$user_tech.$user_name . '<br>';
	// $sql="INSERT INTO users VALUES($user_name,$user_email,$user_pass,$user_phone,$user_speciality,$user_tech,'" . $image . "',$time)";
 $sql="INSERT INTO users(id,name,email,password,phone,speciality,tech,image,date) VALUES(0,'$user_name','$user_email','$user_pass','$user_phone','$user_speciality','$user_tech','$image','$time')";


if(!mysqli_query($conn,$sql)){
	die('Error' . mysqli_error($conn));
}
else{
	echo "<h3>Usuario Registrado con exito</h3>";
}

mysqli_close($conn);



?>