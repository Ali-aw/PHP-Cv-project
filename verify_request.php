<html>
<head>


<title>Approval of the entry request </title>
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
<body  background="inage6-1.jpg" style= "background-repeat:no-repeat;background-size:100% 100%" >

<?php 
	include "DB_Fonctions.php";
	//connect to server
	$dbc=connectServer('localhost','root','',0);	
	//Select DB 
	selectDB($dbc,"DBTemp",0);
	//connect to server2
	$dbc2=connectServer('localhost','root','',0);	
	//Select DB2 
	selectDB($dbc2,"DBMain",0);

	if (isset($_GET['id']) && is_numeric($_GET['id']) )
	{ 
		
		// Make the form confirm:
		print '<form action="verify_request.php" method="post">
		<p size="45" style="color: blue;">Are you sure do you want to approve the request number=' . $_GET['id'] . '?</p>
 		<input type="hidden" name="id" value="' . $_GET['id'] . '" />
 		<input type="submit" name="submit" value="YES" class="button button1" /></p>
 		</form>';

		echo'<form action="admin.php" method="post">
			 <input type="submit" value="NO" class="button button1"  />
			 <input type="hidden" name="user" value="admin" />
			 <input type="hidden" name="pass" value="admin" />
			 <input type="hidden" name="submitted" value="true" />
			 </form>
			 ';
			
		}
	elseif (isset($_POST['id']) && is_numeric($_POST['id']) )//if submit yes
	{             $entry_id= "null";                 
	               $Fname = "null"; 
		           $Lname = "null"; 
		           $birthD = "null"; 
	               $fatherName = "null"; 
				   $idFile = "null";
			       $email = "null";
				   $pass = "null";
        $query3 = "select * FROM personTemp WHERE entry_id={$_POST['id']}"; 
	    if ($r = mysqli_query($dbc,$query3))
		{
		 while ($row = mysqli_fetch_array($r,MYSQLI_ASSOC)) //tableau row avec associative array $row['entry_id']
		   {//affiche les personTemps
		        echo "$row[entry_id]";
		           $entry_id= $row['entry_id'];                 
	               $Fname = $row['FirstName'];
		           $Lname = ($row['LastName']);
		           $birthD = ($row['Birthdate']);
	               $fatherName = ($row['fatherName']);
		           $idFile = ($row['idFile']);
			       $email = ($row['email']);
					$pass = ($row['pass']);
					$Branch = ($row['Branch']);
					$specialization = ($row['specialization']);
		   }
	         }else{  //selection error
		         print '<p style="color: red;">Could not retrieve the data because:<br/>'.mysql_error().
			 '.</p><p>The query3 being run was: '.$query3.'</p>';}

	$query2 = "insert INTO person (id,idFile,FirstName,fatherName, LastName,Birthdate,email,pass,Branch,specialization,date_entre)
				      VALUES ('$entry_id','$idFile','$Fname','$fatherName', '$Lname','$birthD','$email','$pass','$Branch','$specialization',NOW( ))";	
	
       	if ($r2 = mysqli_query($dbc2,$query2))
			
		  { print '<p style="color: blue;">approve the request a number=</p>'.$entry_id;
		
	     }else{
 	 		print '<p style="color: red;">Could not retrieve the blog entry because:<br />' . mysql_error( ) .
		 '.</p><p>The query2 being run was: ' . $query2 . '</p>';
		       }
	  mysqli_close($dbc2);
		
   		$query = "delete FROM personTemp WHERE entry_id={$_POST['id']}";	
		if ($r = mysqli_query($dbc,$query))
		{ // Run the query.
 			print' <p style="color: blue;">successfully deleted from tempdb<br />';
			 echo'<form action="admin.php" method="post">
			 <input type="submit" value="previous" class="button button1"  />
			 <input type="hidden" name="user" value="admin" />
			 <input type="hidden" name="pass" value="admin" />
			 <input type="hidden" name="submitted" value="true" />
			 </form>
			 ';
			mysqli_close($dbc); 

			}else{ // Couldn't get the information.
 	 		print '<p style="color: red;">Could not retrieve the blog entry because:<br />' . mysql_error( ) .
 			'.</p><p>The query being run was: ' . $query . '</p>';
		}
		
	}
	print '<p style="color: blue;">-------------finish-------------</p>'
?>
         
</body>
</html>