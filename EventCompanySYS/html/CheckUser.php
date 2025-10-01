<?php
require_once("pdo-conn.php");
if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['uUsername']) && isset($_POST['uPassword'])))
{
        $uUsername = $_POST['uUsername'];
        $uPassword = $_POST['uPassword'];

        $sql = "SELECT * FROM users WHERE Username = :uUsername";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':uUsername', $_POST['uUsername']);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$user)
    {
        echo "No such user in database!";

    }
    else
    {
        if($uPassword == $user['Password'])
        {
            $_SESSION['username'] = $user['Username'];
            $_SESSION['password'] = $user['Password'];
            $_SESSION['userType'] = $user['Type'];
            $_SESSION['userEmail'] = $user['Email'];
            
            if($user['Type'] == 'Client'){
                ?>
                    <script>
                        window.location.href = "guest/MyBookings.php";
                    </script>
                <?php

            }
            else if ($user['Type'] == 'Admin' || $user['Type'] == 'Staff')
            {
                ?>
                    <script>
                        window.location.href = "admin/ManageClient/deleteAndViewClients/ListOfClients.php";
                    </script>
                <?php
            }
            else
            {
                echo "The account was not specifyed!";
            }
        }
        else
        {
            echo "The username or password is incorect!";
        }
    }
}
?>