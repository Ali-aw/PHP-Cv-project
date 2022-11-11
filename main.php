<?php
session_start();

?>
<html>
 <head>
    <title>Add a Blog Entry</title>
      
		  
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
     <body background="inage5.jpg" style= "background-repeat:no-repeat;background-size:100% 100%">

<?php 

if (isset($_POST['submitted']))
{    include "DB_Fonctions.php";
	if (!empty($_POST['email']) && !empty($_POST['pass']))
	{
		$email = trim($_POST['email']);
		$pass = trim($_POST['pass']);
		$_SESSION['email']=$email;
        $_SESSION['pass']=$pass;
		$dbc=connectServer('localhost','root','',0);
		
		$dbc2=connectServer('localhost','root','',0);	
	
		$query2 = "SELECT * FROM person WHERE email='$email'";
	    selectDB($dbc2,"DBMain",0);	
		
	     if($r2 = mysqli_query($dbc2,$query2))
		 {
		    if(($row = mysqli_fetch_array($r2,MYSQLI_ASSOC))!=0) 
		
		    {       
			   if($row["pass"]	==$pass){
			          
			        print ("<h2 style = 'color: blue'> go to license page </h2>");	
					
					echo'	
					        <form action="licence.php" method="post">
						    <input type="submit" name="go" value="Entry" class="button button1"/>
							<input type="hidden" name="emailMain" value=' .$email.' >
							</form>
									';
											
									$_SESSION['emailMain']=$email;	         	
											
							}else{
								print '<p style="color: red;">password is false</p>';
							 echo"<a href=\"main.php\">BACk</a>";}
                                  
						
			}
			else{	
                  $query = " SELECT * FROM personTemp WHERE email='$email' " ;
	             selectDB($dbc,"DBTemp",0);
                  $r2 = mysqli_query($dbc,$query);	
        	
			  
			if(($row = mysqli_fetch_array($r2,MYSQLI_ASSOC))!=0) //check if the "email" exist or not
			{	if($row["pass"]	==$pass)
				{
					print '<p style="color: red;">You have already registered before ....returned 3 days later</p>';
					echo"<a href=\"main.php\">Exit</a>";
				} else print '<p style="color: red;"> incorrect password </p>';
				
				}else{
						 echo "
					<script>
					alert('welcome in temppage');
					document.location='temppage.php';
					</script>    
					 ";  	
					}
						
			}
			
	
		 }else{
				print '<p style="color: red;">Could not retrieve the blog entry because:<br />' ;
			   
	           mysqli_close($dbc);
	          }
					
	}else
					{
						print '<p style="color: red;">Please submit both  email and password</p>';		
					}
		
		
}

if (empty($_POST['email']) && empty($_POST['pass']))
	{
?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
<fieldset>
<legend><b> <h1 style = 'color:white'> WLECOME TO OUR WEBSITE</h2> </b></legend>
<table border=0 cellspacing=8>
<tr>

    <td>
	  <p style = 'color:white'>Email: &nbsp &nbsp &nbsp <input type="email" name="email" size="20" maxsize="100"/></p><br>
	</td>
</tr>
	
<tr>
	<td>
	  <p style = 'color:white'>Password: <input type="password"  name="pass" cols="20"  ></textarea> </p> <br>
	</td>
</tr>
	
<tr>
	<td>
	  <input type="submit" name="submit" value="Entry" class="button button1"/><br>
	</td>
	
	 <td>
	  <input type="reset"   name="rst" value="Cancel" class="button button1"  />
	 </td>
</tr>

	</table>


	<input type="hidden" name="submitted" value="true" /><br>
</fieldset>

</form>
<?php }   ?>
</body>
</html>

