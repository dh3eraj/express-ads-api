<!DOCTYPE html>
<html>

<body>
    <?php
    //user
    $uName = $_POST['uname'];
    $psw = $_POST['psw'];
    //database
    $servername = "localhost";
    $username = "u845107997_dheeraj";
    $password = "1234@#Qwer";
    $dbname = "u845107997_users";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if ($conn === false) {
        echo "<script>setTimeout(function ()
                    {    
                        window.location.href = 'https://www.techtails.in'; 
                        alert('Server Error, Please Try Again.');
                    },100);
                    </script>";
    } else {
        $sql = "SELECT * FROM `user_info` WHERE uname = '$uName' ; ";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $row = mysqli_fetch_array($result);
            if ($psw == $row['passwd']) {
                $cookie_name = "username";
                $cookie_value = $uName;
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
                echo "<script>setTimeout(function ()
                        {    
                            window.location.href = 'http://www.techtails.in'; 
                        },100);</script>";
            } else {
                echo "<script>setTimeout(function ()
                    {    
                        window.location.href = 'https://www.techtails.in/login.html'; 
                        alert('Wrong Username Or Password');
                    },100);
                    </script>";
            }
        } else {
            echo "<script>setTimeout(function ()
                    {    
                        window.location.href = 'http://www.techtails.in'; 
                        alert('User Doesn\'t exist'');
                    },100);
                    </script>";
        }
    }
    ?>
</body>

</html>