<?php
 $conn = mysqli_connect("localhost", "root", "", "Registration");
 if($conn -> connect_error){
   die("Connection failed:" . $conn -> connect_error);
 }

 $email = $_POST['c_email'];
 $sql = "SELECT firstname, lastname, email, zipcode FROM Users WHERE c_email='$email'";
 $result = $conn->query($sql);

 if($result -> num_rows >0){
   while($row = $result -> fetch_assoc()){
       echo"<tr><td>". $row["firstname"] . "</td><td>" . $row["lastname"] . "</td><td>" . $row["email"] . "</td><td>". $row["zipcode"] . "</td></tr>";
   }
 }
 else{
   echo "No matching!";
 }
?>
