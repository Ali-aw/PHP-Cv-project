<?php 
session_start();

 print ("<h2 style = 'color: blue'> <b>PLEASE CHOOSE THE DEGREE YOU COMPLETED</b></h2>");	
		?>	
		
<html>
<head>
<title>control</title>


</head>
<body  background="inage6-1.jpg" style= "background-repeat:no-repeat;background-size:100% 100%"  >

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

.button2 {background-color: red;} /* Blue */
.button1 {background-color: red;}
.button3 {background-color: green;}
.button4 {background-color: red;}
.button5 {background-color: red;}

</style>

<table border="0"  >
<tr>
<th >
	 <form action="licence.php" method="post">
	<input type="submit" name="go1" value="licence"  class="button button1"/>
	<input type="hidden" name="emailMain" >
	</form>
	</th>
	
	
	
	
	<th >
	 <form action="search.php" method="post">
	<input type="submit" name="disp" value="Dispaly Members"  class="button button1"/>
	<input type="hidden" name="disp1" >
	</form>
	</th>
	
	
	
	
	
	
	
	
	<th>
	<form action="stage.php" method="post">
	<input type="submit" name="go2" value="stage" class="button button2"/>
	<input type="hidden" name="emailMain" >
	</form>
		</th>
<th>								 
	 <form action="PHD.php" method="post">
	<input type="submit" name="go3" value="phd" class="button button3"/>
	<input type="hidden" name="emailMain" >
	</form>
	</th>
	<th>
	<form action="master.php" method="post">
	<input type="submit" name="go4" value="master" class="button button4"/>
	<input type="hidden" name="emailMain" >
	</form>	
</th>
<th >
	<form action="work.php" method="post">
	<input type="submit" name="go5" value="work" class="button button5"/>
	<input type="hidden" name="emailMain"  >
	</form>	
	
</th>	
	</tr>
	<tr>
	<th>
	<a href="main.php"><i>go to main page</i></a>
	</th>
	</tr>
	</table >
	</body>
</html>

