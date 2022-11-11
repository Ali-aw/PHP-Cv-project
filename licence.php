<?php
session_start();
 //print_r($_SESSION);
?>
<html>
<head>
<title>page de licence</title>
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


.button1 {background-color: blue;}

</style>

</head>
<body  background="inage6-1.jpg" style= "background-repeat:no-repeat;background-size:100% 100%"  >
<?php  
 print ("<h1 style = 'color:blue'> <i>Enter the information related to your license degree </i></h2>");	
include "DB_Fonctions.php";
$dbc2=connectServer('localhost','root','',0);
selectDB($dbc2,"DBMain",0);	
if (isset($_POST['submitted']))
{
	if(!empty($_POST['pass'])&&!empty($_POST['TitleOfproject'])&&!empty($_POST['date_Graduation'])&&!empty($_POST['Branch'])
		&&!empty($_POST['email']) &&!empty($_POST['FirstName'])&&!empty($_POST['LastName'])&&!empty($_POST['Birthdate']&&!empty($_POST['fatherName']))
        && !empty($_POST['address'])&& !empty($_POST['genre']) && !empty($_POST['specialization'])            )
	{   
							$FirstName = trim($_REQUEST['FirstName']);
							$LastName = trim($_REQUEST['LastName']);
							$idFile = trim($_POST['idFile']);
							$Birthdate = trim($_REQUEST['Birthdate']);
							$fatherName = trim($_REQUEST['fatherName']);
							$address = trim($_REQUEST['address']);
							$email=$_REQUEST['email'];
                            $pass=$_REQUEST['pass'];
							$genre=$_REQUEST['genre'];
							$TitleOfproject=$_REQUEST['TitleOfproject'];			
							$date_Graduation=$_REQUEST['date_Graduation'];
							$Branch=$_REQUEST['Branch'];
							$specialization=$_REQUEST['specialization'];
							//print_r($_REQUEST);
							 // print_r($_POST);
							
							$query2 = "SELECT * FROM person WHERE idFile='$idFile'";		
							$r2 = mysqli_query($dbc2,$query2);
			if(($row = mysqli_fetch_array($r2,MYSQLI_ASSOC))!=0) //check if the "idFile" exist or not
			{
				//print '<p style="color: red;">update </p>';
				
					$query = "UPDATE person SET 
					Branch='$Branch', FirstName='$FirstName', fatherName='$fatherName', Birthdate='$Birthdate' ,
				    email='$email', address='$address', genre='$genre', date_Graduation='$date_Graduation', 
					 LastName='$LastName', pass='$pass',  TitleOfproject='$TitleOfproject' ,specialization='$specialization' WHERE  idFile='$idFile'  ";
					
					if ($r = mysqli_query($dbc2,$query))//if exist update
					{
						//echo "<p>The query was executed correctly. </p>";
										
						if (mysqli_affected_rows($dbc2) == 1)//check si update ou no
						{ 					
							print '<p style="color:blue;">The blog entry has been updated.</p>';
						}
						else
						{
							print '<p style="color:blue;">You have not made any changes in the blog:</p>';
							//echo '<p>'.$query2.'</p>';
						}
						//go to master or work	
						$_SESSION['emailMain']=$email;	
					  echo"<a href=\"control.php\">option page</a>";	
								
					  					
					}
					else
					{
						print '<p style="color: red;">Could not update the entry because:<br />' . mysql_error( ) . '.</p><p>The query being run was: ' . $query2 . '</p>';
					}
					   	
			}
			else{
			      print '<p style="color: red;">idfile not exit in data base:</p>';
		        }
	}else{
		  print '<p style="color: red;">Please submit both a Fname,LastName ,idFile and an Birthdate ...all values---etc.</p>';
		  echo"<a href=\"licence.php\">BACk</a>";		  
		}	
	
			
		 
 }
 
 //else if (isset($_SESSION['emailMain']))
      {  
			$query4= "SELECT * FROM person WHERE email='$_SESSION[emailMain]'";		
			        $r4 = @mysqli_query($dbc2,$query4);
					while ($row = mysqli_fetch_array($r4,MYSQLI_ASSOC)) //tableau row avec associative array $row['entry_id']
					{	
					
echo'
<table border="1">
<form action="'. $_SERVER['PHP_SELF'].'" method="post">
<tr>
<th align="left">
<ul style="color: white;>
    <li> <p style="color: white;">Email: <input type="text" name="email"  value='.$row['email'].' size="22"  /></p> </li>
	 <li><p style="color: white;">update password: <input type="text" name="pass" value='.$row['pass'].'  size="8" />if you want ^_^</p></li>
	 <li><p style="color: white;">First Name: <input type="text" name="FirstName"value='.$row["FirstName"].' size="22" /></p></li>
	 <li><p style="color: white;">Father Name: <input type="text" name="fatherName" value='.$row['fatherName'].' size="22" /></p></li>
	 <li><p style="color: white;">Last Name: <input type="text" name="LastName" size="22"value='.$row['LastName'].' /></p></li>
	 <li><p style="color: white;">File No:'.$row['idFile'].'</p></li>
	<input type="hidden" name="idFile" value="',$row['idFile'].'" />
	 <li><p style="color: white;">Birthdate:	
	 
	 <input type="date" 
                    class="form-control" 
                    placeholder="Date" 
                   name="Birthdate"   value ='.$row['Birthdate'].' size="12" /></p> </li>
	</ul> 
	</th>
	
	<th align="left">
	<ul style="color: white;> 
	<li><p style="color: white;">Address: <input type="text" name="address" value=" '.$row['address'].'" size="22" />City name</p></li>
	<li><p style="color: white;">Gender: <input type="radio" name="genre" value="female">female
	              <input type="radio" name="genre" value="male">male</p></li>
   <li> <p style="color: white;">Branch: <input type="text" name="Branch"  value="'.$row['Branch'].'" size="10" /> Faculty_Branch?_?</p></li>
    <li><p style="color: white;">Specialization: <input type="text" name="specialization"  value="'.$row['specialization'].'" size="8" /></p></li>
	 <li><p style="color: white;">ProjectTitle: <textarea cols="40" rows="5" type="text" name="TitleOfproject" value= '.$row['TitleOfproject'].' > Project Description</textarea></p></li>
	<li><p style="color: white;"> Graduation date: <input type="date"  class="form-control" 
                    placeholder="Date"  name="date_Graduation" size="10" value="'.$row['date_Graduation'].'" /></p></li>
	</ul> 
	</th>
	
	</tr> 
	
	</table>
	<input type="submit" name="submit" value="OK" class="button button1"/>
	<input type="hidden" name="submitted" value="true" />
	
</form>
';
			}
			 mysqli_close($dbc2);	

			}
	        
	            
?>
				
</body>
</html>
