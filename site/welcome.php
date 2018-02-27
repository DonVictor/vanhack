<?php
	require('functions/conection.php');
	session_start();
	if(!isset($_SESSION['id_admin'])) 
	{
			header("Location:index.php");
			exit();
	}

	
	if(!empty($_POST))
	{
		$title= mysqli_real_escape_string($mysqli,$_POST['title']);
		$content= mysqli_real_escape_string($mysqli,$_POST['content']);
		$category= mysqli_real_escape_string($mysqli,$_POST['category']);
		$id_admin=$_SESSION['id_admin'];

		
		$sql = "insert into post (user_id, title, content, category) VALUES ('$id_admin', '$title', '$content', '$category')";

		if ($mysqli->query($sql) === TRUE) {
			echo '<script language="javascript">alert("Post insert succesfully");</script>'; 
		} else {
			echo '<script language="javascript">alert("Error. '+$mysqli->error+'");</script>';
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
    <title>Welcome</title>
    <meta name="description" content="Welcome">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <style type="text/css">
<!--
.Estilo4 {font-size: 80%}
-->
    </style>
</head>

<body>
	<header>
		<div id="logo"><img src="http://html5-templates.com/logo.png">Welcome back <?php echo $_SESSION['name'];?>! </div>
		<nav>  
			<ul>
				<li><?php include("./header.php");?>
			</ul>
		</nav>
	</header>
	<section>
		<strong>Here you can see all the post in the forum, and can directly edit your own post.</strong>	</section>
	<section id="pageContent">
		<main role="main">
		  <?php
		  	if(!empty($_GET))
		  {
		  $category=$_GET['category'];
		  $sql = "Select post_id, user_id, title, content, category, date_creation, date_update from post where  category='$category' order by post_id desc";
		  }
		  else
		  {
		  $sql = "Select post_id, user_id, title, content, category, date_creation, date_update from post order by post_id desc";
		  }
		$result=$mysqli->query($sql);
		$rows = $result->num_rows;
		
		if($rows > 0) {
			while($row = $result->fetch_assoc())
			{
			$post_id=$row['post_id'];
			//show content 
			?>
			<article>
				<h2><?php echo $row['title'];?></h2>
				<p><?php echo $row['content'];?></p>
				<div align="right"><span class="Estilo4">Category: <?php echo $row['category'] ;?></span></div>
			    <div align="right"><a href="comments.php?post_id=<?php echo $row['post_id'] ?>" ><span class="Estilo4"><?php
				  $sql2 = "Select count(comment_id) from comment where post_id='$post_id' ";
		$result2=$mysqli->query($sql2);
		$rows2 = $result2->num_rows;
		
		if($rows2 > 0) {
		//show comments
		$rows2 = $result2->fetch_assoc();
			echo $rows2['count(comment_id)'] ; 
		}	
		else
		{
		echo "0";
		} 
			 
				?> comments </span></a></div>
				
		  </article>
			<pre><article> 				</article>
			</pre>
			<?php
			}} else {
			?>
			<article>
				<h2>there is no messages</h2>
				<p>It seems that this site is not very popular :(.</p>
			    <div align="right"><span class="Estilo4">0 comments </span></div>
		  </article>
			<pre><article> 				</article>
			</pre>
			<?php 
		}
		  ?>
		</main>
		<aside>
			<div>
			  <p>&nbsp;</p>
			  <h2>Create a new post </h2>
			  <form name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" style="margin-left:3px">
			    <p>&nbsp;</p>
			    <p>Title</p>
			    <p>
			      <label>
			      <input name="title" type="text" size="35" required>
			      </label>
			    </p>
			    <p>&nbsp;</p>
			    <p>Content</p>
			    <p>
			      <label>
			      <textarea name="content" cols="30" rows="10" id="content" required></textarea>
			      </label>
</p>
			    <p>&nbsp;</p>
			    <p>Category</p>
			    <p>
			      <label>
			      <select name="category" required>
			        <option value="">Please select one</option>
					<option value="Hello">Just to say Hi</option>
			        <option value="Help">I need help</option>
			        <option value="Advice">I want to help</option>
		          </select>
			      </label>
			    </p>
			    <p>
			      <label>
			      <input type="submit" name="create" value="Create post!">
			      </label>
			    </p>
			  </form>
			  <p>&nbsp;</p>
			</div>
			<div style="padding-left:3px">
			  <h2>Categories</h2>
			  <p><?php
			  		  $sql = "select distinct(category) from post order by category asc";
					$result=$mysqli->query($sql);
					$rows = $result->num_rows;
					
					if($rows > 0) {
						while($row = $result->fetch_assoc())
						{
						echo "<a href='welcome.php?category=".$row["category"]."'>".$row["category"]."</a>";
						echo "<br/>";
						}
						}
						
						
						?></p>
			  <p><a href="welcome.php">All</a></p>
			</div>
	  </aside>
	</section>
<footer>
		<p>Contact: <a href="mailto:cris.urrutiavega@gmail.com">Mail me</a>		</p>
</footer>


</body>

</html>