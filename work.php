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
 print ("<h1 style = 'color:blue'> Enter the information related to your work</h2>");	
include "DB_Fonctions.php";
$dbc2=connectServer('localhost','root','',0);
selectDB($dbc2,"DBMain",0);	
if (isset($_POST['submitted']))
{
	if(!empty($_POST['work_type'])&&!empty($_POST['company_name'])&&!empty($_POST['address'])
		 &&!empty($_POST['rank']) &&!empty($_POST['date_start'])&&!empty($_POST['date_end']))
	{   
							$work_type = trim($_REQUEST['work_type']);
							$company_name = trim($_REQUEST['company_name']);
							$address = trim($_POST['address']);
							$email=$_SESSION['emailMain'];
							$date_start=$_REQUEST['date_start'];
							$date_end=$_REQUEST['date_end'];
							$rank=$_REQUEST['rank'];
							$Salary=$_REQUEST['Salary'];
							//print_r($_SESSION);
							 // print_r($_POST);
									
					$query = "INSERT INTO work (idw,work_type,rank,company_name, address,Salary,date_start,email,date_end)
		                      VALUES (0,'$work_type','$rank','$company_name','$address','$Salary','$date_start','$email','$date_end')";
		
							  
					// print_r($query);
					if ($r = mysqli_query($dbc2,$query))
					{					
						 echo"<a href=\"control.php\">finish</a>";						
					}
					else
					{    
						print '<p style="color: red;">Could not update the entry because:<br />' . mysql_error( ) . '.</p><p>The query being run was: ' . $query2 . '</p>';
					}
					   	
	}else{
		  print '<p style="color: red;">Please submit both a type,specialization ,Branch and an Birthdate ...all values---etc.</p>';
		  echo"<a href=\"work.php\">BACk</a>";		  
		}	
				 
}
 
else if (isset($_SESSION['emailMain']))
{					 
?>	
<form action="<?= $_SERVER['PHP_SELF'] ?>"  method="post">
  <fieldset>  
  <legend><b> <h1 style = 'color:blue'> WLECOME TO WORK PAGE</h2> </b></legend>
  <table border=0 cellspacing=8>
  <tr>

    <td>
       <p style = 'color:white'>type of work: &nbsp &nbsp &nbsp<input type="text" name="work_type"  size="20" /> </p>
	</td>
</tr>

<tr>
    <td>	   
	   <p style = 'color:white'>company name: &nbsp <input type="text" name="company_name" size="20"/></p>
	   	</td>
</tr>

<tr>
    <td>
	   
       <p style = 'color:white'>address: &nbsp <input type="text" name="address"    size="50"  /></p>
	   </td>
</tr>

<tr>
    <td>
	   <p style = 'color:white'>Rank: &nbsp &nbsp &nbsp <input type="text" name="rank" size="15"  /></p>
	   	</td>
</tr>
<tr>
    <td>
	   <p style = 'color:white'>Salary:  &nbsp &nbsp <input type="text" name="Salary" size="8"  /><i>in dollars $_$ </i></p>
	   	   	</td>
</tr>
<tr>
    <td>
	   <p style = 'color:white'>date start: &nbsp 	
                    
                    <input type="date" class="form-control" 
                    placeholder="Date" name="date_start" size="15" /></p>
	</td>
</tr>
<tr>
    <td>
	   <p style = 'color:white'>date end: &nbsp <input type="date" name="date_end" class="form-control" placeholder="Date" size="15"  /><i>ignore this box if you are still in this job</i></p>
	</td>
</tr>
<tr>
    <td>
	   <input type="submit" name="submit" value="OK" class="button button1"/>
	</td>
</tr>

	   <input type="hidden" name="submitted" value="true" />
       </form>
	   <?php		
}   
?>











	
	 
	
	 
