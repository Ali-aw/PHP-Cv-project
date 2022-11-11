<?php
session_start();
 //print_r($_SESSION);
?>
<html>
<head>
<title>stage page</title>
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


.button1 {background-color: red;}

</style>

</head>
<body  background="inage6-1.jpg" style= "background-repeat:no-repeat;background-size:100% 100%">
<?php  
 print ("<h1 style = 'color:blue'><i>Enter the information related to your Stage  </i></h2>");	
include "DB_Fonctions.php";
$dbc2=connectServer('localhost','root','',0);
selectDB($dbc2,"DBMain",0);	
if (isset($_POST['submitted']))
{$Codirector=null;
   
	if(!empty($_POST['title_phd'])&&!empty($_POST['Domain'])&&!empty($_POST['TypePhd'])
	 &&!empty($_POST['dateStart']) &&!empty($_POST['dateEnd'])&&!empty($_POST['Nam_Uni'])
	 &&!empty($_POST['administrator'])&&!empty($_POST['Name_Pays'])&&!empty($_POST['Name_ville']))
	{   
							$title_phd = trim($_REQUEST['title_phd']);
							$Domain = trim($_REQUEST['Domain']);
							$TypePhd = trim($_POST['TypePhd']);
							$email=$_SESSION['emailMain'];
							$dateStart=$_REQUEST['dateStart'];
							$dateEnd=$_REQUEST['dateEnd'];
							$Nam_Uni=$_REQUEST['Nam_Uni'];
							$administrator=$_REQUEST['administrator'];
							$Codirector=$_REQUEST['Codirector'];
							
							$Name_Pays=$_REQUEST['Name_Pays'];
							$Name_ville=$_REQUEST['Name_ville'];
						
							
							//print_r($_SESSION);
							// print_r($_POST);
							if(isset($_POST['Bourseir'])){
								$Bourseir=$_POST['Bourseir'];
                             if ($Bourseir==true){
							echo' 
							<form action="PHD.php"  method="GET">
							<p style = color:white>PHD donor: <input type="text" name="donor" size="15"  /></p>
	                         <p style = color:white>amount per month: <input type="text" name="amount" size="15"  /></p>
							  <input type="submit" name="submit2" value="OK" class="button button1"/>
							  <input type="hidden" name="submitted2" value="true" />
							  </form>';
							}
							}
                       							
					$query = "INSERT INTO PHD (id_phd,title_phd,Domain,TypePhd,email, dateStart,dateEnd,Nam_Uni,administrator,Codirector,Name_Pays,Name_ville,date_creation)
		            VALUES (0,'$title_phd','$Domain','$TypePhd','$email','$dateStart','$dateEnd','$Nam_Uni','$administrator','$Codirector','$Name_Pays','$Name_ville',NOW())";				  
					// print_r($query);
					if ($r = mysqli_query($dbc2,$query)){
                         print'<p style="color: red;">insert succefull</p>';
						   echo"<a href=\"PHD.php\">back</a>";	
						 echo"<a href=\"control.php\">fin</a>";						
					}
					else
					{    
						print '<p style="color: red;">Could not update the entry because:<br />' . mysqli_error( $dbc2) . '.</p><p>The query being run was: ' . $query . '</p>';
					}
							 	
	}else{
		  print '<p style="color: red;">Please submit both a type,specialization ,Branch and an Birthdate ...all values---etc.</p>';
		  echo"<a href=\"PHD.php\">BACk</a>";		  
		}
		
				 
}
	else if (isset($_GET['submitted2'])){
		//echo$_GET['submitted2'];
	if(!empty($_GET['amount'])&&!empty($_GET['donor'])){
		echo"scholarship---------------<br>";
			$amount=$_REQUEST['amount'];
			$donor=$_REQUEST['donor'];
			    							
			
	 if ($r = mysqli_query($dbc2,"update PHD set amount=$amount,donor='$donor' where email='$_SESSION[emailMain]' ")){
	echo"end of remplir PHD";
	echo"<a href=\"control.php\">go to control</a>";	 
	}
	else
	{    
		print '<p style="color: red;">Could not update the entry because:<br />' . mysqli_error($dbc2 ) . '.</p><p>The query being run was: ' . $query2 . '</p>';
	}
		}
	
	
}
else if (isset($_SESSION['emailMain']))
{					 
?>	
<form action="<?= $_SERVER['PHP_SELF'] ?>"  method="post">
<fieldset>
<legend><b> <h1 style = 'color:white'> WLECOME TO ADMIN PAGE</h2> </b></legend>
<table border=0 cellspacing=8>
<tr>

    <td>
    
       <p style = 'color:white'> phd Title:<input type="text" name="title_phd"  size="20" /> </p>
	   	</td>
</tr>

	<tr>

    <td>   
	   <p style = 'color:white'>Domain: <input type="text" name="Domain" size="20"/></p>
	   	   	</td>
</tr>
<tr>

    <td> 

	   
       <p style = 'color:white'>phd Type: <input type="text" name="TypePhd" size="50"  /></p>
	   	   	   	</td>
</tr>
	   <tr>

    <td> 
	   <p style = 'color:white'>university name: <input type="text" name="Nam_Uni" size="15"  /></p>
	   	   	   	   	</td>
</tr>
	   <tr>

    <td> 
	   
	   <p style = 'color:white'>date start :<input type="date" placeholder="Date"  class="form-control" name="dateStart" size="15" /></p>
	</td>
</tr>
	   <tr>

    <td> 

	   
	   <p style = 'color:white'>End Date: <input type="date" placeholder="Date"  class="form-control" name="dateEnd" size="15"  /></p>
	   	</td>
</tr>
	   <tr>

    <td> 
	   
	   <p style = 'color:white'>Administrator:<input type="text" name="administrator"  size="20" /> </p>
	   	   	</td>
</tr>
	   <tr>

    <td> 
	   
	   <p style = 'color:white'>Co director: <input type="text" name="Codirector" size="20"/></p>
	   	   	   	</td>
</tr>
	   	   <tr>

    <td> 
	   
	   <p style = 'color:white'>Name_Pays:<input type="text" name="Name_Pays" size="20"  /></p>
	   	   	   	   	</td>
</tr>
	   	   <tr>

    <td> 
	   
	   <p style = 'color:white'>Name_city:<input type="text" name="Name_ville" size="15" /></p>
	   	   	   	   	   	</td>
</tr>
	   	   <tr>

    <td> 
	   
	   
	   <p style = 'color:white'>stock Exchange:<input type="checkbox" name="Bourseir"    size="50"  /></p>
	</td>
</tr>
<tr>

    <td> 
	   <input type="submit" name="submit" value="OK" class="button button1"/>
	</td>
	
</tr>

	   <input type="hidden" name="submitted" value="true" />
	   </table>
	   </fieldset>
	   
       </form>
	   <?php		
}   
?>




