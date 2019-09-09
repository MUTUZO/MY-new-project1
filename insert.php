<?php
$ username = $ POST['username'];
$ Password = $ POST['Password'];
$ gender = $ POST['gender'];
$ Email $ POST['Email'];
$ PhoneCode $ = $ POST['PhoneCode'];
$ Phone = POST['Phone'];

 if (empty($ username) || !empty(Password) || !empty(gender) || !empty(Email) || !empty(PhoneCode) || !empty(Phone)) {
 	$ host = "localhost";
 	$ dbUsername = "root";
 	$ dbPassword = "";
 	$ dbname= "serubungo";
 	

 	//create connection
 	$ conn = new mysqli($ host,$ dbUsername,$ dbPassword,$ dbname);

 	if (mysqli_connect_error()) {
 		die('connect Error('.mysqli_connect_errno().')'.mysqli_connect());
 	}else {
$ SELECT = "SELECT Email From Register where Email =? Limit 1";
$ INSERT = "INSERT Into Register (username,Password,gender,Email,PhoneCode,Phone) values(?,?,?,?,?,?)";
  //prepare statement
  $ stmt = $ conn->prepare($ SELECT);
  $ stmt->bind_param("s", $ Email);
  $ stmt->execute();
  $ stmt->bind_result($ Email);
  $ stmt->store_result();
  $ rnum = $ stmt-> num_rows;

  if ($ rnum==0){
  	$ stmt->close();

  	$ stmt = $ conn->prepare($ INSERT);
  	$ stmt->bind_param("ssssii",$ username, $ Password, $ gender, $ Email, $ PhoneCode, $ Phone);
  	$ stmt->execute();
  	echo "New record inserted sucessfully";
  }else{
  	echo "Someone already Register using this Email
  	  }
  	$stmt->close();
  	$conn->close();
}
 }else {
 	echo "All fiel are required";
 	die();
 }
?>