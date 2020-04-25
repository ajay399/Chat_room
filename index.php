<?php

$address=$_SERVER['REMOTE_ADDR'];
date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
$time=date('H:i');
require 'db.php';

if (isset($_POST['del'])) {

    $sql = "DELETE FROM chatroom";

if ($mysqli->query($sql) === TRUE) {
   // echo "Record deleted successfully";
} else {
   // echo "Error deleting record: " . $conn->error;
}
    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ajay Rabari | Chatroom</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<style>
body {
  margin: 0 auto;
 /* max-width: 800px;
  padding: 0 20px;*/
}

.carousel-inner img {
      width: 100%;
      height: auto;
  }

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin-bottom: 15px;
 /* margin: 10px 0;*/
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

/*.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}*/

/*.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}*/

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}

.heading
{
	display: inline-block;
	margin-left:15px;
}

.image_wrapper
{
	text-align:center;
}

.says
{
	font-size: 15px;
	font-style: italic;
}

.form_wrapper
{
	
	
	 margin-bottom:15px;
     margin-left:auto;
     margin-right:auto;
}


#ajaydev {
    width: 100vw;
    text-align: center;
    background-color: #070A20;
    color: #fff;
    display: table-cell;
    vertical-align: middle;
    font-size: 14px;
   
    
}

#ajaydev a {
    text-decoration: none;
    color: #fff;
    font-size: 20px;
}

.form_wrapper

{
	width:768px;
}

.delbtn
{
    text-align:center!important;
    margin-bottom: 9%;
}


  @media only screen and (max-width: 768px) {
  .form_wrapper

{
	width:540px;
}
}


 @media only screen and (max-width: 540px) {
  .form_wrapper

{
	width:460px;
}
}

@media only screen and (max-width: 460px) {
  .form_wrapper

{
	width:320px;
}
}










</style>
</head>
<body>



	<script>

		$(document).ready(function(){

			function isEmptyOrSpaces(str){
    return str === null || str.match(/^ *$/) !== null;
}
			
			$('#chatmsg').val('');
		//	$('.btn-primary').prop('disabled', true);

			$(document).on('keypress', '#chatmsg', function(){

				$val=$(this).val();
				//   $('.btn-primary').prop('disabled', false); 
	
				


			});
  $(document).on('click', '.btn-primary', function(){


//console.log("click");

$val= $('#chatmsg').val();
$name="<?php echo $address ?>";
$time="<?php echo $time ?>";

$.ajax({
       url: 'message.php',
       data:
       {
       	val:$val,
       	name:$name,
       	time:$time

       },
      
       success: function(response) {
           $('#chatmsg').val('');
       //	console.log();

       	var Output=JSON.parse(response)

       	$html='<div class="container"><span class="says">'+Output.name+' Says</span><p>'+Output.val+'</p><span class="time-right">'+Output.time+' </span></div>';
//console.log($html);


       	$('.main_wrapper .container:last').after($html);


       	}


       });



//$('.container').after($html);







  	






  });
});

	</script>

<div class="main_wrapper">	

<div class="image_wrapper"><img class="logo_image" src="php.png"/><h4 class="heading"> Share this link with people & do live chat!<h4></div>

<div class="container">
 <span class="says">Ajay Rabari says</span>
  <p>Hello, I am Ajay. How is it going on for you ?</br>Note : This chat message can not be deleted.</p>
  <span class="time-right"><?php echo $time ?> </span>
</div>
<?php 


$sql = "SELECT * FROM chatroom";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        ?>
        
        <div class="container">
 <span class="says"> <?php echo $address ?> says</span>
  <p><?php echo $row["message"]; ?></p>
  <span class="time-right"><?php echo $time ?> </span>
</div>

<?php
    }
}

 ?>



	<div class="form_wrapper">
	<div class="input-group">
  <input type="text" id="chatmsg" class="form-control">
  <span class="input-group-btn">
    <button type="button" class="btn btn-primary">Send</button>
  </span>
</div>
</div>
<div class="form_wrapper delbtn ">
<form action="index.php" method="post">
<button type="submit" name="del" class="btn btn-danger delbtn">Delete Chat</button>
</form>







</div>

<div id="ajaydev">An Effort By <a href="https://in.linkedin.com/in/ajayrabari">Ajay Rabari</a></div>

</body>
</html>
