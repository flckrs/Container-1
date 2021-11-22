<!DOCTYPE html>
<html>
<head>
	<title>Membuat Login Dengan PHP dan MySQL</title>	
</head>

<body>
  <?php

  // Variable Assignment
  $host = 'db';
  // Database use name
  $user = 'MYSQL_USER';
  //database user password
  $pass = 'MYSQL_PASSWORD';
  // database name
  $mydatabase= 'MYSQL_DATABASE';
  // database connection
  $conn= new mysqli($host, $user, $pass, $mydatabase);


  // Condition
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $uname=$_POST['username'];
    $password=$_POST['password'];

    $sql2=mysqli_query($conn, "SELECT * FROM users WHERE username='$uname' AND password= '$password'");

    if(mysqli_num_rows($sql2)==1){
      echo "You Have Successfully Logged In As"." $uname"."<br>"."<br>";
      echo '<a class="btn" href="index.php">Go Back</a>';
      exit();
    }
    else{
      echo "You Have Entered Incorrect UserName or Password"."<br>"."<br>";
      echo '<a class="btn" href="index.php">Go Back</a>';
      exit();
    }
  }
  
  ?>

<!--Visual Page Login -->
	<h1>Login Page</h1>
	<form action="#" method="POST">		
		<table>
			<tr>
				<td>Username</td>
        <td><input type="text" name="username" placeholder="Enter Your Username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" placeholder="Enter Your Password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="login" value="Log In"></td>
			</tr>
		</table>

  <!-- Info User Dari Database -->
  <?php
    $sql ='SELECT * FROM users';
    if ($result = $conn->query($sql)) {
      while ($data = $result->fetch_object()) {
          $users[] = $data;
      }
    }

    echo "<br>";
    echo "<b> <h3>Berikut adalah list username dan password yang bisa dimasukkan.</h3>"."</b>";
    foreach ($users as $user) {
      echo "<br>";
      echo "<b>UserName= </b>" . $user->username . ", <b>Password= </b>" . $user->password;
      echo "<br>";
    

    }
  ?>

</body>
</html>