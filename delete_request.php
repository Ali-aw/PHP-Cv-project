<html>
<head>
<title>Reject request</title>
<style>
.button {
 
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none; 
  font-size: 10px;
  margin: 4px 2px;

}

.button1 {background-color: blue;} /* Blue */
.button2 {background-color: blue;}

</style>
</head>
<body  background="inage6-1.jpg" style= "background-repeat:no-repeat;background-size:100% 100%"  >
<?php 
	include "DB_Fonctions.php";
	//connect to server
	$dbc=connectServer('localhost','root','',0);	
	//Select DB 
	selectDB($dbc,"DBTemp",0);

	if (isset($_GET['id']) && is_numeric($_GET['id']) )
	{ // Make the form confirm:
				print '<form action="delete_request.php" method="post">
					<p style = \'color:green\'><b>Are you sure you want to delete this entry?</b></p>
 					<input type="hidden" name="id" value="' . $_GET['id'] . '" />
 					<input type="submit" name="submit" value="Delete this Entry!" class="button button1" /></p>
 					</form>';

			 echo'<form action="admin.php" method="post">
			 <input type="submit" value="Cancel" class="button button2"/>
			 <input type="hidden" name="user" value="admin" />
			 <input type="hidden" name="pass" value="admin" />
			 <input type="hidden" name="submitted" value="true" />
			 </form>
			 ';
			
		}
	elseif (isset($_POST['id']) && is_numeric($_POST['id']) )
	{ 
		$query = "delete FROM personTemp WHERE entry_id={$_POST['id']}";		
		if ($r = mysqli_query($dbc,$query))
		{ // Run the query.
 			print' <p style="color: blue;">The Entry has been deleted/rejected<br />';
			 echo'<form action="admin.php" method="post">
			 <input type="submit" value="previous" class="button button1" />
			 <input type="hidden" name="user" value="admin" />
			 <input type="hidden" name="pass" value="admin" />
			 <input type="hidden" name="submitted" value="true" />
			 </form>
			 ';
			mysqli_close($dbc); // Close the database connection.

			}else{ // Couldn't get the information.
 	 		print '<p style="color: red;">Could not retrieve the blog entry because:<br />' . mysql_error( ) .
 			'.</p><p>The query being run was: ' . $query . '</p>';
		}
		
	}
	print '<p style="color: blue;">-------------finish-------------</p>'
?>
         
</body>
</html>