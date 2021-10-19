<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user</title>

    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="asset/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="asset/css/local.css" />

    <script type="text/javascript" src="asset/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>

    <style>
        .notifyerror{
            color: red;
            font-size: 90%;
            font-style: italic;
            font-weight: normal;
            margin-bottom: 0px;
        }
    </style>

</head>
<body>
<div id="wrapper">
    <?php
    include("common.php");
    ?>
    <div id="add-user">
        <div class="row text-center">
            <h2>Thêm User</h2>
        </div>
        <div class="form-update">
            <form method="post" id="form-update" name="form-update" class="form-horizontal" action="" role="form" style="padding: 20px;">

                <div class="form-group">
                    <label class="col-lg-3 control-label">Tài khoản</label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" name="username" id="username" value="">
                        <label class="notifyerror" style="visibility: hidden; height: 0px" id="usernameerror"></label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Mật khẩu</label>
                    <div class="col-lg-7">
                        <input type="password" class="form-control" name="password" id="password1" value="">
                        <label class="notifyerror" style="visibility: hidden; height: 0px" id="password1error"></label>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-3 control-label">Xác nhận mật khẩu</label>
                    <div class="col-lg-7">
                        <input type="password" class="form-control" name="password2" id="password2" value="">
                        <label class="notifyerror" style="visibility: hidden; height: 0px" id="password2error1">Yêu cầu nhập đúng mật khẩu</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Phone</label>
                    <div class="col-lg-7"><input type="text" class="form-control" name="phone" id="phone">
                        <label class="notifyerror" style="visibility: hidden; height: 0px" id="phoneerror"></label>
                    </div>
                </div>

                <div class="col-offset-3 col-lg-10">
                    <button type="submit" class="btn btn-primary" id="button_update" name="button_update">Đăng kí </button>
                </div>

                <div class="clear"></div>
            </form>
        </div>
    </div>
</div>

<?php
require_once("libs/db.php");
if(isset($_POST["button_update"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    echo $username;
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $phone = $_POST["phone"];

    $sql = "INSERT INTO users (username,password,phone)
                        VALUES ('$username','$hash','$phone')";

    //debug
    echo "<pre>";
    print_r($sql);
    echo "</pre>";

    mysqli_query($link,$sql);

}
?>
</body>
</html>
