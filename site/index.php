<?php
	require('functions/conection.php');
	
	session_start();

	if(isset($_SESSION["id_admin"])){
		header("Location: welcome.php");
	}
	
	if(!empty($_POST))
	{
		$user= mysqli_real_escape_string($mysqli,$_POST['user']);
		$pass= mysqli_real_escape_string($mysqli,$_POST['pass']);
		$error = '';
		
		
		$md5_pass=md5($pass);
		
		$sql = "SELECT id_admin, name, lastname FROM admin WHERE user = '$user' AND pass = '$md5_pass'";
		$result=$mysqli->query($sql);
		$rows = $result->num_rows;
		
		if($rows > 0) {
			$row = $result->fetch_assoc();
			$_SESSION['id_admin'] = $row['id_admin'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['lastname'] = $row['lastname'];
			
			header("location: welcome.php");
			} else {
			$error = "User or pass incorrect";
		}
	}
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="http://html5-templates.com/" />
    <title>Index</title>
    <meta name="description" content="index page, please enter your password">
    <link rel="stylesheet" href="style.css">
    
</head>

<body>
	<header>
		<div id="logo"><img src="http://html5-templates.com/logo.png">Welcome</div>

	</header>
	<section>
		<strong>Please enter yout User and Password</strong>
	</section>
	<section id="pageContent">
		<main role="main">
		  <article>
			
				<form name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			      <table width="200" border="0">
                    <tr>
                      <td width="48">User</td>
                      <td width="142"><input type="text" name="user"></td>
                    </tr>
                    <tr>
                      <td height="32">Pass</td>
                      <td><input type="password" name="pass"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><input type="submit" name="Submit" value="GO"></td>
                    </tr>
                  </table>
			      <p><label></label>
</p>
				</form>
				<div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div
			></article>
		</main>
	</section>
	<footer>
		<p>Contact: <a href="mailto:cris.urrutiavega@gmail.com">Mail me</a>		</p>
</footer>


</body>

</html>