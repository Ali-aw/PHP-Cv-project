<html>
<head>
<title> Search Page</title>

<style>
table, th, td {
 
   border-style: solid;
  border-radius: 20px;
  border-color: white;
}
</style>

</head>

<body  background="inage7-1.jpg" style= "background-repeat:no-repeat;background-size:100% 100%"  >


<?php 
 print ("<h1 style = 'color:BLUE'> Display Page</h2>");	
if (isset($_POST['disp']))
{
	
 print '<p style="color: blue;"size="40">----------WELCOME------------</p>';	
	   include "DB_Fonctions.php";
	   $dbc=connectServer('localhost','root','',0);	
	   selectDB($dbc,"dbmain",0);
		
		   $query = 'SELECT * FROM person ORDER BY date_entre DESC';
		   
	      if ($r = @mysqli_query($dbc,$query))
	       {
		    while ($row = mysqli_fetch_array($r,MYSQLI_ASSOC)) //tableau row avec associative array $row['entry_id']
		   {//affiche les personTemps
			print "
			<table style=width:100%>
				
				
				<tr><td > <p style = 'color:blue'> <b><u>Order NO:</u></b>  {$row['entry_id']}</td></tr> <br> </p>
				<tr><td> <p style = 'color:blue'><b><u>FirstName</u>:</b> {$row['FirstName']} </td></tr> <br> </p>
				<tr><td> <p style = 'color:blue'><b><u>FatherName</u>:</b> {$row['fatherName']} </td></tr><br></p>
				<tr><td> <p style = 'color:blue'><b><u>LastName</u>:</b> {$row['LastName']} </td></tr> <br></p>
				<tr><td> <p style = 'color:blue'><b><u>idFile</u>:</b> {$row['idFile']} </td></tr><br></p>
				<tr><td> <p style = 'color:blue'><b><u>Birthdate</u>:</b> {$row['Birthdate']} </td></tr><br></p>				
				<tr><td> <p style = 'color:blue'><b><u>Branch</u>:</b> {$row['Branch']} </td></tr><br></p>
				<tr><td><p style = 'color:blue'> <b><u>Specialization</u>:</b> {$row['specialization']} </td></tr><br>	</p>			
				<tr><td><p style = 'color:blue'> <b><u>Date Entered</u>:</b> {$row['date_entre']}  </td></tr><br> <br></p>
				 
				
				\n
				
				</table>
				
				<hr><hr><hr>
				
				";
		     }
	         }else{  //selection error
		         print '<p style="color: red;">Cannot retrieve the data <br/>';
	           } 		
		       mysqli_close($dbc);
}
else return;