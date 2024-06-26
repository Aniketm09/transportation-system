
<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <style>
            body {
            font-family: Arial, sans-serif;
            background-image: url(https://source.unsplash.com/1500x800/?coffee);
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
            background-color: #4caf50;
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
            <h2>Register</h2>
            <form action="" method="POST" id="adminLoginForm">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" name="Username" placeholder="Enter  Username" required>
                    <br><br>
                    <label for="Email">Email Id</label>
                    <input type="text" name="Email"  placeholder="Enter Email">
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password"  name="Password" placeholder="Enter Password" required>
                </div>
                <br>
                <button class="login-button" type="submit" name="Register">Register</button>
            </form>
        </div>
        <?php
            require_once("Connection.php");
            date_default_timezone_set('Asia/Kolkata');
            $registrationDate = date("y-m-d");
            $registrationTime = date("h:i:s:A");
            
            if(isset($_POST['Register']))
            {
                $Username=$_POST['Username'];
                $Email=$_POST['Email'];
                $Password=$_POST['Password'];

                $sql="INSERT INTO `register`(`Username`, `Email`, `Password`, `acoount_created_date`, `account_created_time`) VALUES ('$Username','$Email','$Password','$registrationDate','$registrationTime')";

                $result = mysqli_query($Connection, $sql);
                if($result)
                {
                  echo '<script>alert("Sign_Up Successful")</script>';
                  header("location:User_Login.php");
                }
                else
                {
                   die("Query Incorrect........") ;
                }
            }
        ?>
</body>
</html>