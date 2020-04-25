 <?php
$servername = "sql311.epizy.com";
$username = "epiz_25453816";
$password = "c0ymmpxtfyZ9cb";
$dbname="epiz_25453816_ajay";


$mysqli = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
else
{
   // echo 'connected';
}
?>
