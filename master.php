<?php
session_start();
 //print_r($_SESSION);
?>
<html>
<head>
<title>master page</title>

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
<body   background="inage6-1.jpg" style= "background-repeat:no-repeat;background-size:100% 100%">
<?php  
 print ("<h1 style = 'color:blue'> <i>Enter the information related to your master degree  </i></h2>");	
include "DB_Fonctions.php";
$dbc2=connectServer('localhost','root','',0);
selectDB($dbc2,"DBMain",0);	
if (isset($_POST['submitted']))
{
	if(!empty($_POST['master_type'])&&!empty($_POST['domain'])&&!empty($_POST['supervisor'])
		 &&!empty($_POST['TitleOfproject'])&&!empty($_POST['master_Grad_date'])&&!empty($_POST['Branch']))
	{   
							$_SESSION['domain']=$master_type = trim($_REQUEST['master_type']);
							$domain = trim($_REQUEST['domain']);
							$supervisor = trim($_POST['supervisor']);
							$email=$_SESSION['emailMain'];
							$master_Grad_date=$_REQUEST['master_Grad_date'];
							$Branch=$_REQUEST['Branch'];
							$TitleOfproject=$_REQUEST['TitleOfproject'];
							
							//print_r($_REQUEST);
							 // print_r($_POST);
									
					$query = "INSERT INTO master (idM,master_type,domain, supervisor,TitleOfproject,email,master_Grad_date,Branch)
		                      VALUES (0,'$master_type','$domain', '$supervisor','$TitleOfproject','$email','$master_Grad_date','$Branch')";	
					
					if ($r = mysqli_query($dbc2,$query))//if exist update
					{ print '<p style="color: blue;">update the entry :<br />';
						  echo"<a href=\"control.php\">fin</a>";						
					}
					else
					{
						print '<p style="color: red;">Could not update the entry because:<br />' . mysql_error( ) . '.</p><p>The query being run was: ' . $query2 . '</p>';
					}
					   	
			
	}else{
		  print '<p style="color: red;">Please submit both a type,specialization ,Branch and an Birthdate ...all values---etc.</p>';
		  echo"<a href=\"master.php\">BACk</a>";		  
		}	
	
			
			 
 }
 
else if (isset($_SESSION['emailMain']))
{
						 
?>	
<form action="<?= $_SERVER['PHP_SELF'] ?>"  method="post">
    <fieldset>

<legend><b> <h1 style = 'color:blue'> WLECOME TO MASTER PAGE</h2> </b></legend>

<table border=0 cellspacing=8>
<tr>

    <td>
		<p style = 'color:white'> 
research: </p><input  type="radio" name="master_type" value="recherche"/> 
			</td>
</tr>

<tr>
    <td>
		<p style = 'color:white'> 
professional:</p> <input  type="radio" name="master_type" value="professionnel"/> </p>
			</td>
</tr>

<tr>
    <td>
		
  <p style = 'color:white'> Specialization Domain:&nbsp <input type="text" name="domain"  size="40" maxsize="100"/></p>
  	</td>
</tr>

<tr>
    <td>
	  <p style = 'color:white'>Supervisor: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp
	  <input type="text" name="supervisor" size="40" maxsize="100"/></p>
	  	</td>
</tr>
<tr>
    <td>
	  
     <p style = 'color:white'>Branch:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
	 <input type="text" name="Branch"    size="40" maxsize="100" /> faculty branch?</p>
	 </td>
</tr>
<tr>
    <td>
	 
	 <p style = 'color:white'>TitleOfproject: <textarea cols="40" rows="5" type="text" name="TitleOfproject"  > Project description</textarea></p>
	 	 </td>
</tr>
<tr>
    <td>
		
                    
                     
                    
	 
	<p style = 'color:white'>Master's Graduation date: <input type="date" class="form-control" placeholder="Date" name="master_Grad_date" size="40"  maxsize="100"/></p>
		 	 </td>
</tr>
<tr>
    <td>
	<input type="submit" name="submit" value="OK" class="button button1"/>
	
	<input type="hidden" name="submitted" value="true" />
	</table>
	</fieldset>
	
    </form>
	<?php		

   }         
?>
</body>
</html>


