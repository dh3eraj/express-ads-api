<!DOCTYPE html>
<html>

<head>
    <title>Sign Up | Techtails</title>
    <meta encoding="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/ttlogo.png" type="image/x-icon">
</head>

<body>
    <?php

    $servername = "localhost";
    $username = "u845107997_dheeraj";
    $password = "1234@#Qwer";
    $dbname = "u845107997_users";

    $fName = $_POST['fname'];
    $lName = $_POST['lname'];
    $uName = $_POST['uname'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $passwd = $_POST['psw'];
    $cpasswd = $_POST['cpsw'];
    $age = $_POST['age'];
    if ($passwd == $cpasswd) {
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if ($conn === false) {
            echo "<script>setTimeout(function ()
    {    
        window.location.href = 'https://www.techtails.in/'; 
        alert('Oops! Please Try Again Later.');
    },100);
    </script>";
        } else {
            $sql = "INSERT INTO user_info (first_name, last_name,age, contact, email, passwd,uname)
            VALUES ('$fName', '$lName','$age', '$contact','$email','$passwd','$uName')";
            if (mysqli_query($conn, $sql)) {
                $cookie_name = "username";
                $cookie_value = $uName;
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

                echo "<script>setTimeout(function ()
            {    
                window.location.href = 'https://www.techtails.in/'; 
                alert('Welcome To Techtails');
            },100);
            </script>";
            } else {
                echo "<script>setTimeout(function ()
            {    
                window.location.href = 'https://www.techtails.in/signup.html'; 
                alert('Username Is Taken');
            },100);
            </script>";
            }
        }
    } else {
        echo "<script>setTimeout(function ()
        {    
            window.location.href = 'https://www.techtails.in/signup.html'; 
            alert('Password didn\'t match.');
        },1000);
        </script>";
    }
    ?>
</body>

</html>