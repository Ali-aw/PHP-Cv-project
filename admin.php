<html>
<head>
<title>admin page</title>

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

.button2 {background-color: blue;} /* Blue */
.button1 {background-color: blue;}
.button3 {background-color: blue;}
.button4 {background-color: blue;}

</style>

</head>

<body  background="inage6-1.jpg" style= "background-repeat:no-repeat;background-size:100% 100%"  >


<?php 
 print ("<h1 style = 'color:BLUE'> Admin Page</h2>");	
if (isset($_POST['submitted']))
{
	

  if (!empty($_POST['user']) && !empty($_POST['pass']))
  {
		$user = trim($_POST['user']);
		$pass = trim($_POST['pass']);
     if (($user=='admin')&&($pass=='admin'))
	 {
       print '<p style="color: blue;"size="40">----WELCOME----</p>';	
	   include "DB_Fonctions.php";
	   $dbc=connectServer('localhost','root','',0);	
	   selectDB($dbc,"DBTemp",0);
		
		   $query = 'SELECT * FROM personTemp ORDER BY date_entre DESC';
		   
	      if ($r = @mysqli_query($dbc,$query))
	       {
		    while ($row = mysqli_fetch_array($r,MYSQLI_ASSOC)) //tableau row avec associative array $row['entry_id']
		   {//affiche les personTemps
			print "
				<p style = 'color:white'>
				<b><u>order NO:</u></b> {$row['entry_id']} <br>
				<b><u>FirstName</u>:</b> {$row['FirstName']}<br>
				<b><u>fatherName</u>:</b> {$row['fatherName']}<br>
				<b><u>LastName</u>:</b> {$row['LastName']} <br>
				<b><u>idFile</u>:</b> {$row['idFile']}<br>
				<b><u>Birthdate</u>:</b> {$row['Birthdate']}<br>				
				<b><u>Branch</u>:</b> {$row['Branch']}<br>
				<b><u>specialization</u>:</b> {$row['specialization']}<br>				
				<b><u>Date Entered</u>:</b> {$row['date_entre']} <br> <br>
				
				<a href=\"verify_request.php?id={$row['entry_id']}\">Done</a>
				<a href=\"delete_request.php?id={$row['entry_id']}\">Delete</a>
				<hr /> 
				</p>\n";
		     }
	         }else{  //selection error
		         print '<p style="color: red;">Cannot retrieve the data <br/>';
	           } 		
		       mysqli_close($dbc);	
	    }else{//when the user is not the admin
		        print '<p style="color: red;">incorrect username or password</p>';
		       echo "<form action=\"admin.php\"><input type=submit value='previous' class=\"button button4\"  /></form>";
	        }
    }else{//if the username and passord is empty
		print '<p style="color: red;">Please submit both name and password.</p>';
     echo "<form action=\"admin.php\"><input type=submit value='previous' class=\"button button3\" /></form>";		
	}
 }
	 if (empty($_POST['user']) && empty($_POST['pass']))
	{
?>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
<fieldset>

<legend><b> <h1 style = 'color:white'> WLECOME TO ADMIN PAGE</h2> </b></legend>
<table border=0 cellspacing=8>
<tr>

    <td>
	   <p style = 'color:white' >Email: &nbsp &nbsp &nbsp  <input type="text" name="user"  size="20" maxsize="100"/></p>
	</td>
</tr>

<tr>
    <td>
	  <p style = 'color:white' >password: <input type="passord" name="pass" size="20"  maxsize="100"/></p>
	</td>
</tr>

<tr>
    <td>
	  <input type="submit" name="submit" value="Verify"  class="button button1"/>
	 
	</td>
</tr>

<tr>
    <td>
	  <input type="reset" name="Cncl" value="Cancel" class="button button2"/>
	</td>
</tr>
</table>

	<input type="hidden" name="submitted" value="true" />
	
	</fieldset>
</form>
<?php
	}
	?>
</body>
</html>

  

