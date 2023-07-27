<?php
echo "Hi...";
						
$name=$_POST['name'];
$mobile_no=$_POST['mobile'];
$email=$_POST['email'];
$message=$_POST['message'];
echo"Hello";
echo"<br>".$name;
echo"<br>".$mobile_no;
echo"<br>".$email;
echo"<br>".$message;
	$cn=mysql_connect("localhost","root","");
	$db=mysql_select_db("news_portal",$cn);
echo"Connected";
	$query=mysql_query("insert into mail values('".$name."','".$mobile_no."','".$email."','".$message."')");
	if($query)
		//echo "Inserted";
		header("location:index.php?akw=Message sent.");
	else
		echo "Not Inserted";
?>