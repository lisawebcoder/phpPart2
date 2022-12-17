<?php  
 //action.php  
 if(isset($_POST["action"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "hello", "crud");  
      if($_POST["action"] =="Add")  
      {  
           $first_name = mysqli_real_escape_string($connect, $_POST["firstName"]);  
           $last_name = mysqli_real_escape_string($connect, $_POST["lastName"]);  
           $procedure = "  
                CREATE PROCEDURE insertUser(IN firstName varchar(250), lastName varchar(250))  
                BEGIN  
                INSERT INTO users(first_name, last_name) VALUES (firstName, lastName);   
                END;  
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS insertUser"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL insertUser('".$first_name."', '".$last_name."')";  
                     mysqli_query($connect, $query);  
                     echo 'Data Inserted';  
                }  
           }  
      }  
      if($_POST["action"] == "Edit")  
      {  
           $first_name = mysqli_real_escape_string($connect, $_POST["firstName"]);  
           $last_name = mysqli_real_escape_string($connect, $_POST["lastName"]);  
           $procedure = "  
                CREATE PROCEDURE updateUser(IN user_id int(11), firstName varchar(250), lastName varchar(250))  
                BEGIN   
                UPDATE users SET first_name = firstName, last_name = lastName  
                WHERE id = user_id;  
                END;   
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS updateUser"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL updateUser('".$_POST["id"]."', '".$first_name."', '".$last_name."')";  
                     mysqli_query($connect, $query);  
                     echo 'Data Updated';  
                }  
           }  
      }  
      if($_POST["action"] == "Delete")  
      {  
           $procedure = "  
           CREATE PROCEDURE deleteUser(IN user_id int(11))  
           BEGIN   
           DELETE FROM users WHERE id = user_id;  
           END;  
           ";  
           if(mysqli_query($connect, "DROP PROCEDURE IF EXISTS deleteUser"))  
           {  
                if(mysqli_query($connect, $procedure))  
                {  
                     $query = "CALL deleteUser('".$_POST["id"]."')";  
                     mysqli_query($connect, $query);  
                     echo 'Data Deleted';  
                }  
           }  
      }  
 }  
 ?>  


