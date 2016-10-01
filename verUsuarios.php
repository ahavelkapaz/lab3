<?php

 require_once 'db_config.php';



   // Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

   
$sql="SELECT * FROM users";
$result = mysqli_query($conn,$sql);

if ($result) {
	echo '<table border=1>';
    while ($row = mysqli_fetch_array( $result )) {
		echo '<tr> <td>Nombre=' . $row['name'] . '</td><td> Email=' . $row['email'] . '</td><td> Phone= ' . $row['phone'] . '</td><td> Fecha Reg=' . $row['date'] . '</td><td> Especialidad==' . $row['speciality'] . ''; /* <img src="data:image/jpeg;base64,<?php echo base64_encode($image); ?>" /> */
		echo '<td><img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" /></td></tr>';

	}
	echo '</table>';
}
else{
	echo "Vacio";
}

mysqli_close($conn);



?>