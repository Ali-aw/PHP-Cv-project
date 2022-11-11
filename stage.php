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


.button1 {background-color: blue;}

</style>

</head>
<body  background="inage6-1.jpg" style= "background-repeat:no-repeat;background-size:100% 100%">
<?php  
 print ("<h1 style = 'color:blue'> <i>Enter the information related to your Stage  </i></h2>");	
include "DB_Fonctions.php";
$dbc2=connectServer('localhost','root','',0);
selectDB($dbc2,"DBMain",0);	
if (isset($_POST['submitted']))
{
	if(!empty($_POST['stage_title'])&&!empty($_POST['company_name'])&&!empty($_POST['address'])
		 &&!empty($_POST['date_start'])&&!empty($_POST['date_end']))
	{   
							$stage_title = trim($_REQUEST['stage_title']);
							$company_name = trim($_REQUEST['company_name']);
							$address = trim($_POST['address']);
							$email=$_SESSION['emailMain'];
							$date_start=$_REQUEST['date_start'];
							$date_end=$_REQUEST['date_end'];
							
							//print_r($_REQUEST);
							 // print_r($_POST);
									
					$query = "INSERT INTO stage (idS,stage_title,company_name, address,date_start,email,date_end)
		                      VALUES (0,'$stage_title','$company_name','$address','$date_start','$email','$date_end' )";	
					 //print_r($query);
					if ($r = mysqli_query($dbc2,$query))
					{					
						 echo"<a href=\"control.php\">-------finish-------</a>";						
					}
					else
					{    
						print '<p style="color: red;">Could not update the entry because:<br />' . mysql_error( ) . '.</p><p>The query being run was: ' . $query2 . '</p>';
					}
					   	
			
	}else{
		  print '<p style="color: red;">Please submit both a type,specialization ,Branch and an Birthdate ...all values---etc.</p>';
		  echo"<a href=\"licence.php\">BACk</a>";		  
		}	
	
			
			 
}
 
else if (isset($_SESSION['emailMain']))
{					 
?>	
<form action="<?= $_SERVER['PHP_SELF'] ?>"  method="post">
<fieldset>
<legend><b> <h1 style = 'color:white'> WLECOME TO ADMIN PAGE</h2> </b></legend>
    
    <p style = 'color:white'>Stage Title: <input type="text" name="stage_title"  size="20" maxsize="50"/> </p>
	  <p style = 'color:white'>Company Name: <input type="text" name="company_name" size="40" maxsize="100"/></p>
     <p style = 'color:white'>Address: <input type="text" name="address"    size="40" maxsize="100" /></p>
	<p style = 'color:white'> Start Date: <input type="date" name="date_start" placeholder="Date"
	class="form-control" size="40"  maxsize="100"/></p>
	<p style = 'color:white'> End  Date:<input type="date"class="form-control" 
                    placeholder="Date" name="date_end" size="40"  maxsize="100"/></p>
		
                     
                  
	<input type="submit" name="submit" value="OK" class="button button1"/>
	<input type="hidden" name="submitted" value="true" />
	</fieldset>
    </form>
	<?php		
}   
?>
</body>
</html>
