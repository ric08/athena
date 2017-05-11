<!Doctype html>

<html>
    <head>
    
    
    
    
    
    </head>
    
    <body>
        <?php
            $username=$_POST['username']; //get the username input value from the form
            $password=$_POST['password']; //get the password input value from the form
        
            $servername="localhost"; //store server name into the var servername
            $conn_user="root"; //store user name access into the var username
            $conn_pw="leap17"; //store password access into the var password
            $dbname="athena"; //sstore database name into the var dbname
        
            //connect to db using Php's PDO-Php Data Objects
            try {
                $conn=new PDO("mysql:host=$servername;$dbname",$conn_user,$conn_pw);
            //set the PDO error mode exception
                $conn->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Successfully connected...";
            
            
            $query_selectDB="USE ATHENA;";
            //store mysql query into a variable
            $query_username="SELECT user_name FROM USER_PROFILE WHERE user_name="."'".$username."'"." AND password="."'".$password."'".";";
            
            //execute query using exec command
            $query1=$conn->prepare($query_selectDB);
            $query2=$conn->prepare($query_username);
            $query1->execute();
            $query2->execute();
                
            $username_result = $query2->fetch();
            //if exec is true this code will execute
				echo "Welcome back:".$username_result;
						
			}
			 //catch if error is encountered
            catch(PDOException $error)
                {
                    echo "Failed connection:". $error->getMessage();
                }
            $conn=null;
        ?>
    
    
    
    </body>





</html>