<?php
    session_start();
    require_once('dbconnect.php');
    
        if(isset($_POST['login']))
        {
            if(empty($_POST['username']) || empty($_POST['password']) )
            {
                header("location:logindesign.php?empty");
                exit();
            }
            else
            {
                $Username = mysqli_real_escape_string($con,$_POST['username']);
                $Password = mysqli_real_escape_string($con,$_POST['password']);
    
                $sql= "Select * FROM users where username ='".$Username."' or email='".$Username."'and password ='".$Hash."'";
                //$sql = "SELECT * FROM `users` WHERE username='$Username'and password='".Hash."'";
                //$sql=" select * from userlogin where UserName='".$UserName."' or Email='".$UserName."'";
                $result = mysqli_query($con,$sql);
    
                if($row=mysqli_fetch_assoc($result))
                {
                    //$HashPass = password_verify($Password,$row['Password']);
                    $HashPass = password_hash($password, PASSWORD_DEFAULT);
                    
    
                            if($HashPass==false)
                            {
                                header("location:logindesign.php?P_Invalid");
                                exit();
                            }
                            elseif($HashPass==true)
                        {
                            $_SESSION['U_D']=$row['id'];
                            $_SESSION['Username']=$row['Username'];
                            $_SESSION['Email']=$row['email'];
                            $_SESSION['Password']=$row['password'];
        
                            header("location:admindash.php?Wellcome");
                            exit();
        
                        }
 
                    }
                    else
                    {
                        header("location:logindesign.php?U_Invalid");
                        exit();
                
                    } 
                 }
            }
            else
    {
        header("location:logindesign.php");
        exit();
    }


?>          