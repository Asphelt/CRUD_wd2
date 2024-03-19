<?php
// include database connection file
include "config.php";

//Fungsi untuk mencegah inputan karakter yang tidak sesuai
function input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	if($_POST['accion']==1){
		$id = $_POST['id'];
		$name = input($_POST["name"]);
		$username = input($_POST["username"]);
		$email = input($_POST["email"]);
		$phone = input($_POST["phone"]);
		$jobs = input($_POST["jobs"]);
		$result = mysqli_query($conn, "UPDATE users SET name='$name',username='$username',email='$email',phone='$phone',jobs='$jobs' WHERE id=$id");
	}
	if($_POST['accion']==2){
		$id = $_POST['id'];
		$car_model= input($_POST["car_model"]);
		$car_brand = input($_POST["car_brand"]);
		$car_year = input($_POST["car_year "]);
		
		$result = mysqli_query($conn, "UPDATE cars SET model='$car_model',brand='$car_brand',year='$car_year' WHERE id=$id");
	}
	header("Location: index.php");

}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
	$name = $user_data['name'];
	$email = $user_data['email'];
	$mobile = $user_data['mobile'];
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM cars WHERE id=$id");
 
while($car_data = mysqli_fetch_array($result))
{
	$car_model = $car_data['model'];
	$car_brand = $car_data['brand'];
	$car_year = $car_data['year'];
}
?>