<?php 

session_start();
        if(isset($_POST['username'])){
                  include("connect.php");
                  $username = $_POST['username'];
                  $password = $_POST['password'];

                  $sql="SELECT * FROM gate_user
                  WHERE  USER_ID='$username' 
                  AND  USER_PW='$password' ";
                  $result = mysqli_query($con,$sql);
                
                  if(mysqli_num_rows($result)>0){
                    echo "Yes";
                    $row = mysqli_fetch_array($result);

                    $_SESSION["UserID"] = $row["USER_NAME"];
                  
                    
                    

                    
            
                     

                   //$row = mysqli_fetch_array($result);
                    
                    //print_r($_SESSION);*/
                   
                      
                 
                      }else{
                      
                    echo "<script>";
                    echo "alert(\" User หรือ Password ไม่ถูกต้อง\");";
                        echo "window.history.back()";
                    echo "</script>";
 
                  }
                  exit();

}
        
?>
