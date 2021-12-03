<?php
session_start();
?>

<?php
require_once("libs/db.php");
if(isset($_POST["btn_login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);
    if ($username == "" | $password == "") {?>
        <script>
        window.alert("username và password bạn không được để trống!");
        history.back();
        </script>
        <?php

    }
    else{
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($link,$sql);
        if(!$result || (mysqli_num_rows($result) < 1)){?>
            <script>
                window.alert("Username hoặc Passwork không đúng");
                history.back();
            </script>

            <?php
        }
        $dbarray = mysqli_fetch_array($result);

        if(password_verify($password,$dbarray["password"])){
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;

            header('Location:admin/manageFilm.php');
//            ?>
<!--                <script>-->
<!--                    window.alert('Login Success !!!');-->
<!--                </script>-->
<!--            --><?php

            if($dbarray['usertype'] == 68){
                header('Location:admin/manageFilm.php');
            }
            else{
                //member
                header('Location:index.php');
            }


        }
        else{ ?>
            <script>
                window.alert("Username hoặc Passwork không đúng");
                history.back();
            </script>
            <?php
        }
    }
}
?>