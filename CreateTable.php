<html >
<head>
<title>Create a Table</title>
</head>
<body>
<?php
	include "DB_Fonctions.php";
	//connect to server
	$dbc=connectServer('localhost','root','',1);	
	//$dbc2=connectServer('localhost','root','',1);
	//Select DB 
    selectDB($dbc,"DBTemp",1);
     // selectDB($dbc2,"DBMain",1);
	
	$query = ' 
	          Create table personTemp
	         (entry_id INT UNSIGNED NOT NULL AUTO_INCREMENT ,
				FirstName VARCHAR(10) NULL,
				LastName VARCHAR(10)  NULL,
				idFile INT UNSIGNED UNIQUE null,
				Birthdate date null ,
				fatherName VARCHAR(10),
				email VARCHAR(50) ,
			    pass VARCHAR(10) NOT NULL ,
				Branch VARCHAR(10) NULL,
				specialization VARCHAR(10) NULL,
				date_entre DATETIME NOT NULL,
				PRIMARY KEY(entry_id,Email)
				);	      	
			';
			
			
			
			//Create table DBMain
	// $query1 = 
	         // 'CREATE TABLE person 
	         // (  id INT UNSIGNED ,
				// FirstName VARCHAR(10) NULL,
				// fatherName VARCHAR(10)NULL,
				// LastName VARCHAR(10) NULL,
				// idFile INT UNSIGNED UNIQUE null,
				// Birthdate date NULL,
				// genre VARCHAR(10) NULL,
				// address VARCHAR(256) null,
				// email   VARCHAR(50) NOT NULL,
				// pass VARCHAR(8) UNIQUE ,
				// Branch VARCHAR(20) NULL,
				// specialization VARCHAR(10) NULL,
				// date_Graduation date NULL,
				// TitleOfproject  VARCHAR(256) NULL,
				// date_entre DATETIME NOT NULL,
                 // PRIMARY KEY(id,Email)
			  // )
			  // ';
			  
		// $query2 = '	     
		        // CREATE TABLE master 
	         // ( idM INT UNSIGNED NOT NULL AUTO_INCREMENT ,
				// master_type VARCHAR(20) NULL,
				// domain VARCHAR(20)  NULL,
				// supervisor VARCHAR(10),
				// email VARCHAR(50) ,
			    // TitleOfproject VARCHAR(10) NULL ,
				// Branch VARCHAR(10) NULL,
				// master_Grad_date DATETIME NOT NULL,
				// date_creation DATETIME NOT NULL,
				// PRIMARY KEY(idM,Email)
				// )';
				
			// $query3 = '	   	  
			// CREATE TABLE stage
	         // ( idS INT UNSIGNED NOT NULL AUTO_INCREMENT ,
				// stage_title VARCHAR(20) NULL,
				// company_name VARCHAR(20)  NULL,
				// address VARCHAR(256),
				// email VARCHAR(50) ,
				// date_start DATETIME NOT NULL,
				// date_end DATETIME NOT NULL,
				// PRIMARY KEY(ids,Email)
				// )';
			$query4 = '	 
			    CREATE TABLE work
	         (  idw INT UNSIGNED NOT NULL AUTO_INCREMENT ,
				work_type VARCHAR(20) NULL,
				company_name VARCHAR(20)  NULL,
				address VARCHAR(256)null,
				email VARCHAR(50) ,
				rank VARCHAR(20)null,
				date_start DATETIME NOT NULL,
				Salary  VARCHAR(20)  NULL,
				date_end DATETIME NULL,
				PRIMARY KEY(idw,email)
				)';
				
				 /* $query5 = '
	             CREATE TABLE PHD
	          (  id_phd INT UNSIGNED NOT NULL AUTO_INCREMENT ,
				 title_phd VARCHAR(20) NULL,
				 Domain VARCHAR(10)NULL,
                 TypePhd VARCHAR(10) NULL,
				 Nam_Uni VARCHAR(20) null,
				 dateStart date NULL,
				 dateEnd date NULL,
                 email VARCHAR(50),
				 administrator VARCHAR(20) NULL,
				 Codirector VARCHAR(20) NULL,
		         amount float NULL,
				 donor  VARCHAR(20) NULL,
				 Name_Pays VARCHAR(20)  NULL,
				 Name_ville  VARCHAR(50) NULL,
				 date_creation DATETIME NOT NULL,
                 PRIMARY KEY(id_phd,Email)
			   ))'; */
	/* createTable($dbc2,$query1);
	createTable($dbc2,$query2);
	createTable($dbc2,$query3); */
	//createTable($dbc2,$query4);
	//createTable($dbc2,$query5);
	//mysqli_close($dbc2); // Close the connection.
	createTable($dbc,$query);
	mysqli_close($dbc); // Close the connection.
?>
 </body>
 </html>
