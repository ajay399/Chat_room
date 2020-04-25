<?php

		$val=$_REQUEST['val'];
		$name=$_REQUEST['name'];
		$time=$_REQUEST['time'];


		$array=array("val"=>$val,"name"=>$name,"time"=>$time);

        require 'db.php';

       

        $sql = "INSERT INTO chatroom (message)
        VALUES ('$val')";
         

if ($mysqli->query($sql) === TRUE) {
  //  echo "New record created successfully";
} else {
   // echo "Error: " . $sql . "<br>" . $conn->error;
}



       	echo json_encode($array);

?>