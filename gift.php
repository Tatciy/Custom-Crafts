<?php
	$CName = $_POST['CName'];
	$CSurname = $_POST['CSurname'];
	$email = $_POST['email'];
	$phonenum = $_POST['phonenum'];
	$firstType = $_POST['firstType'];
	$secondType = $_POST['secondType'];
	$thirdType = $_POST['thirdType'];
	$fourthType = $_POST['fourthType'];
	$fifthType = $_POST['fifthType'];
	$sixthType = $_POST['sixthType'];
	$products = "$firstType , $secondType , $thirdType, $fourthType, $fifthType, $sixthType";
	

$conn = new mysqli('localhost','root','password','customcrafts');

    if(!$conn){

        die('Connection Failed : '.mysqli_connect_error());

    }else{  

        $stmt = $conn->prepare("insert into `receipt`(`ProductName`, `CName`, `CSurname` , `Date`)
        values(?,?,?,NOW())");
        $stmt->bind_param("sss",$products, $CName, $CSurname);
        $stmt->execute();
        echo "Thank you for ordering, see you for collecton soon";
        $stmt-> close();

		$stmt = $conn->prepare("insert into `customer`(`CName`, `CSurname` , `Phonenum` , `email`)
        values(?,?,?,?)");
        $stmt->bind_param("ssis", $CName, $CSurname, $phonenum, $email);
        $stmt->execute();
        echo "Thank you for ordering, see you for collecton soon";
        $stmt-> close();





        $conn-> close();

}
?>	