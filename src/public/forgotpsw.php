<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password | Techtails</title>
    <meta encoding="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/ttlogo.png" type="image/x-icon">
</head>

<body>
    <?php
    $psw = $_POST['psw'];
    $cpsw = $_POST['cpsw'];
    $fromEmail = "desk@techtails.in";
    $toEmail = $_POST['email'];
    if ($psw == $cpsw) {
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
            $sql = "SELECT * FROM `user_info` WHERE email = '$toEmail' ; ";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $insertSQL = "UPDATE user_info SET passwd = '$psw' WHERE email = '$toEmail' ;";
                if (mysqli_query($conn, $insertSQL)) {

                    $subjectName = "Password Reset Request";
                    $message = "Password Has Been Reset.";

                    $to = $toEmail;
                    $subject = $subjectName;
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= 'From: ' . $fromEmail . '<' . $fromEmail . '>' . "\r\n" . 'Reply-To: ' . $fromEmail . "\r\n" . 'X-Mailer: PHP/' . phpversion();
                    $message = '<!doctype html>
                 <html lang="en">
                 <head>
                     <meta charset="UTF-8">
                     <meta name="viewport"
                           content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                     <meta http-equiv="X-UA-Compatible" content="ie=edge">
                     <title>Document</title>
                 </head>
                 <body>
                 <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">' . $message . '</span>
                     <div class="container">
                      ' . $message . '<br/>
                         Regards<br/>
                       ' . $fromEmail . '
                     </div>
                 </body>
                 </html>';
                    $result = @mail($to, $subject, $message, $headers);

                    echo '<script>alert("Reset Successful!")</script>';
                    echo '<script>window.location.href="https://www.techtails.in";</script>';
                } else {

                    echo "<script>setTimeout(function ()
            {    
                window.location.href = 'https://www.techtails.in'; 
                alert('Server Error, Please Try Again.');
            },100);
            </script>";
                }
            } else {
                echo "<script>setTimeout(function ()
            {    
                window.location.href = 'https://www.techtails.in'; 
                alert('Server Error, Please Try Again.');
            },100);
            </script>";
            }
        }
    } else {
        echo '<script>alert("Password didn\'t match !")</script>';
        echo '<script>window.location.href="https://www.techtails.in/forgotpsw.html";</script>';
    }
    ?>
</body>
</html>