

<head>

</head>
<?php
	require('functions/conection.php');
	session_start();
	if(!isset($_SESSION)) 
	{
		header("Location: index.php");
	}
	$user= $_SESSION['id_admin'];
	@$post_id=$_GET['post_id'];
	if(empty ($post_id))
	{
	
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('Invalid post');
    window.location.href='welcome.php';
    </script>");

	}	
	
     if(!empty($_POST))
	{

		$comment= mysqli_real_escape_string($mysqli,$_POST['comment']);
		$action= $_POST['action'];
		@$comment_id= $_POST['comment_id'];
		
		if ($action=="new")
		{
			$sql = "insert into comment (user_id, post_id, comment) VALUES ('$user', '$post_id', '$comment')";
		}
		if ($action=="edit")
		{
			$sql = "update comment set comment='$comment' where comment_id='$comment_id'";
		}
		$mysqli->query($sql);

		
	}


	?>
<!doctype html>
<html lang="en" >
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="http://html5-templates.com/" />
    <title>comments section</title>
    <meta name="description" content="Welcome">
    <link rel="stylesheet" href="style.css">
    
    <style type="text/css">
<!--
.Estilo4 {font-size: 80%}
-->
    </style>
</head>

<body>
<script src="functions/jquery-3.3.1.js"></script>
<script src="functions/scripts.js"></script>

	<header>
		<div id="logo"><img src="http://html5-templates.com/logo.png">Welcome back <?php echo $_SESSION['name']?>! </div>
		<nav>  
			
				<?php include("./header.php");?>
			
		</nav>
	</header>
	<section>
		<strong>Categories section.</strong>	</section>
	<section id="pageContent">
		<main role="main">
		  <?php
		
		$sql = "select post_id, user_id, title, content, category, date_creation, date_update from post where post_id='$post_id'" ;
		$result=$mysqli->query($sql);
		$row = $result->num_rows;
		$rows = $result->fetch_assoc();
		if($row > 0) {
		
			?>
			<article>
				<h2><?php echo $rows['title'];?></h2>
				<p><?php echo $rows['content'];?></p>
				<div align="right"><span class="Estilo4">Category: <?php echo $rows['category'] ;?></span></div>
			   <?php
		}
		$sql = "select a.name, a.lastname, b.comment_id, b.user_id, b.post_id, b.comment, b.creation_date from comment b, admin a where a.id_admin=b.user_id and post_id='$post_id' order by comment_id asc" ;
		$result=$mysqli->query($sql);
		$row = $result->num_rows;
		
		if($row > 0) {
			while($rows = $result->fetch_assoc())
			{
			   ?>
			   <br/>
			    <div align="right"><?php echo $rows['name']." ".$rows['lastname']." wrote"; ?></div>
			    <div align="right"><?php echo $rows['comment'];?></div>
				<div align="right"><?php if ($rows['user_id'] == $user)
											{
												?>
												
												<div id="dropdown-1" class="dropdown dropdown-processed">
												  <a class="dropdown-link" href="#">Edit</a>
												  <div class="dropdown-container" style="display: none;">
													<ul>
													  <form name="edit<?php echo $post_id ;?>" method="post" action="comments.php?post_id=<?php echo $post_id ;?>" >
													<fieldset>
													<input type="hidden" name="comment_id" value="<?php echo $rows['comment_id'];?>">
														<input type="hidden" name="action" value="edit">
														<fieldset>
														<textarea name="comment" cols="30" rows="5" id="comment" ><?php echo $rows['comment'];?></textarea>	</fieldset>	
														<fieldset>
														<input type="submit"  type="submit" value="Submit">
													</fieldset>
												</form>
													</ul>
												  </div>
												</div>
												
												

											<?php } ?></div>
				<br><article> 				</article><br>
			<?php } ?>	
		  </article>
			
			<?php 
		}
		  ?>
		</main>
		<aside>
			<div>
			  <p>&nbsp;</p>
			  <p>Add a new comment </p>
			  <form name="form1" method="post" action="comments.php?post_id=<?php echo $post_id ;?>" style="margin-left:3px">
			    <p>&nbsp;</p>
			    
			    <p>&nbsp;</p>
			    <p>Content</p>
			    <p>
			      <label>
				  <input type="hidden" name="action" value="new">
				  
			      <textarea name="comment" cols="30" rows="10" id="comment" required></textarea>
			      </label>
</p>
			    <p>&nbsp;</p>
			    <p>Category</p>
			    
			    <p>
			      <label>
			      <input type="submit" name="create" value="Create post!">
			      </label>
			    </p>
			  </form>
			  <p>&nbsp;</p>
			</div>
			<div></div>
			<div></div>
		</aside>
	</section>
<footer>
		<p>Contact: <a href="mailto:cris.urrutiavega@gmail.com">Mail me</a>		</p>
</footer>


</body>

</html>