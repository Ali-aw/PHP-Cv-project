<?php
session_start();
//print_r($_SESSION);
?>
<html>
<head>

<style>
.button {
 
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button2 {background-color: blue;} /* Blue */
.button1 {background-color: blue;}

</style>




<title>page temporel</title>
</head>
<body background="inage6-1.jpg" style= "background-repeat:no-repeat;background-size:100% 100%">
<?php 

  print ("<h3 style = 'color:blue' > <i>The information that you will enter, will be verified by the admin within 3 days  </i> </h2>");	
if (isset($_POST['submitted']))
      {
		 include "DB_Fonctions.php";
		//connect to server 1	
		$dbc=connectServer('localhost','root','',0);
		selectDB($dbc,"DBTemp",0);
		//connect to server 2
		$dbc2=connectServer('localhost','root','',0);
       
	if (!empty($_POST['Fname']) && !empty($_POST['Lname'])&&!empty($_POST['idFile']) && !empty($_POST['birthD']&& !empty($_POST['fatherName']))&& !empty($_POST['Branch'])&& !empty($_POST['specialization']))
	{   
							$Fname = trim($_POST['Fname']);
							$Lname = trim($_POST['Lname']);
							$idFile = trim($_POST['idFile']);
							$birthD = trim($_POST['birthD']);
							$fatherName = trim($_POST['fatherName']);
							$Branch = trim($_POST['Branch']);
							$email=$_SESSION['email'];
                            $pass=$_SESSION['pass'];
							$specialization = trim($_POST['specialization']);
				$dbc2=connectServer('localhost','root','',0);	
				$query2 = "SELECT * FROM person WHERE idFile='$idFile'";
				selectDB($dbc2,"DBMain",0);	
				$r2 = mysqli_query($dbc2,$query2);
			if(($row = mysqli_fetch_array($r2,MYSQLI_ASSOC))!=0) //check if the "idFile" exist or not
			{
				print '<p style="color: blue;">You can not make registration,because you have registered before </p>';
			}else{
			      echo"not exist in main data base";
				$query = "INSERT INTO personTemp (entry_id,FirstName,fatherName, LastName, idFile,Birthdate,email,pass,Branch,specialization,date_entre)
		        VALUES (0,'$Fname','$fatherName', '$Lname','$idFile','$birthD','$email','$pass','$Branch','$specialization',NOW( ))";	
            	if ($r = mysqli_query($dbc,$query))
		         { 
			      echo"the insertion is done successfully IN DBtemp";
		          echo "<p style=\"color: blue;\">The provisional registration has been waiting until the information is confirmed within 3 days:<br />";
				   echo"<script>
					alert('The provisional registration has been waiting until the information is confirmed within 3 days');
					document.location='main.php';
					</script>
		          ";
			   }else{     
			               print '<p style="color: red;">Could not retrieve the blog entry because:<br />' .
						   '.</p><p>The query2 being run was: ' . $query2 . '</p>';
			   	    }	
		 	}
			}else{
				  print '<p style="color: red;">Please submit both a Fname,Lname ,idFile and an birthD---etc.</p>';		
			}	
	
			 mysqli_close($dbc2);	
			  mysqli_close($dbc);	
 }
 
?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
<fieldset>
<legend><b><h1 style = 'color:blue'> Temporary Registration Page </h2> </b></legend>
<table border=0 cellspacing=8	>
<tr>

    <td>
	  <p style = 'color:blue'>  First Name:&nbsp &nbsp  <input type="text" name="Fname" size="40" maxsize="100"/></p><br>
	</td>
</tr>

<tr>

    <td>
	  <p style = 'color:blue'> Father Name: <input type="text" name="fatherName" size="40" maxsize="100" ></p> <br>
    </td>
</tr>

<tr>

    <td>
	  <p style = 'color:blue'> Last Name: &nbsp &nbsp<input type="text" name="Lname" size="40" maxsize="100"/> </p><br>
</tr>

<tr>

    <td>
	  <p style = 'color:gray'> File No: &nbsp &nbsp &nbsp &nbsp 
	  <input type="text" name="idFile" size="40" maxsize="100"/><i> University file number </i></p><br>
	</td>
</tr>

<tr>

    <td>
	<p style = 'color:gray'>Birth date:
	<input type="date" 
                    class="form-control" 
                    placeholder="Date" 
                    name="birthD">
					</p><br>
	</td>
</tr>

<tr>

    <td>
	<p style = 'color:gray'>Branch: &nbsp &nbsp &nbsp &nbsp &nbsp 
	<input type="text" name="Branch" value="session 5" size="40" maxsize="100"/><i>the branch in the faculty </i></p><br>
	</td>
</tr>

<tr>

    <td>
   <p style = 'color:gray'>specialization:
   <input type="text" name="specialization"  size="40" maxsize="100"/><i>info,math,physics...</i></p><br>
   </td>
 </tr>
 
 <tr>

    <td>
	<input type="submit" name="submit" value="OK" class="button button2" /><br>
	</td>
</tr>

 <tr>

    <td>
	<input type="hidden" name="submitted" value="true" />
	</td>
	
	<td>
	  <input type="reset"   name="rst" value="Cancel" class="button button1"   />
	</td>
</tr>
</table>
	</fieldset>
	
</form>
</body>
</html>




