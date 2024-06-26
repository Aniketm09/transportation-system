<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User_Login</title>
    <?php require_once("Connection.php")?>  
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(../Assates/01\ Transport.jpg);
            font-family: Arial, sans-serif;
            /* background-color: #f4f4f4; */
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            width: 100vw;
            /* background-image: url(IMG/coffee3bg.jpg); */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .login-container {
            background-color: #fff;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 400px;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            text-align: center;
            font-size:35px;
            font-family: 'Times New Roman', Times, serif;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .input-group {
            margin-bottom: 15px;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .input-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 50px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .login-button {
            background-color:rgb(0, 140, 255);
            color: white;
            padding: 10px ;
            border: none;
            border-radius: 3px;
            width: 180px;
            cursor: pointer;
        }
        .login-button:hover {
            background-color: #6e45a0;
        }
        
    </style>
</head>
<body>
    <div class="login-container">
        <h2>User Login</h2>
        <?php
                    if(isset($_GET['Loginerror'])){
                        $Loginerror=$_GET['Loginerror'];
                    }
                    if(!empty($Loginerror)){
                        echo '<script>alert("Invaild Login credentials...please Try Again")</script>';
                    }
                    ?>
        <form action="Home_Page.html" method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text"  name="login_var" values="<?php if(!empty($Loginerror)){echo $Loginerror;}?>" placeholder="Enter  Username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter Password" required>
            </div>
            <button class="login-button" type="submit" name="Login"><a >Login</a</button>
        </form>
    </div>
<?php
session_start();
if(isset($_POST['Login']))
{
    $login=$_POST['login_var'];
    $Password=$_POST['password'];
    $query="SELECT * FROM `register` WHERE Username='$login' ";
    $res=mysqli_query($connection,$query);
    $numrows=mysqli_num_rows($res);
    if($numrows == 1)
    {
        $row=mysqli_fetch_assoc($res);
        $hashedPasswordFromDatabase = $row['Password'];
        $userSubmittedPassword = $_POST['password'];
        if ($userSubmittedPassword === $hashedPasswordFromDatabase) 
        {
            $_SESSION["login_sess"]="1";
            $_SESSION["login_Username"]=$row['Username'];
            header("location: Home_Page.html");
        }
        else
        {
            header("location:User_login.php?Loginerror=@".$login);
        }
    }   
    else
    {
            header("location:User_login.php?Loginerror=$".$login);
    }
    
}
?>
</body>
</html>
