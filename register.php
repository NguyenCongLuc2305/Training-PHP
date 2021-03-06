<?php
require_once("libs/db.php");
if (isset($_POST["button_update"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    echo $username;
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $phone = $_POST["phone"];

    //thực hiện việc lưu trữ dữ liệu vào db
    $sql = "SELECT* FROM users WHERE username = '$username'";
    $check = mysqli_query($link, $sql);
    if (mysqli_num_rows($check) > 0) {
        echo "<script>
             alert('Tài khoản $username đã tồn tại');
         </script>";
    } else {
        $sql_result = "INSERT INTO users (username,password,phone)
                        VALUES ('$username','$hash','$phone')";

        $result = mysqli_query($link, $sql_result);
        if ($result) {
            ?>
            <script>
                alert("Insert user success !!!");
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Insert user fail !!!");
            </script>
            <?php
        }

        mysqli_query($link, $sql);
        echo "Signup successful";
        header('Location:Index.php');
    }
}
?>

<!DOCTYPE html>
<!-- saved from url=(0018)javascript:void(); -->
<html lang="vi" itemscope="itemscope" itemtype="https://schema.org/WebPage">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Index</title>
    <link href="css/owl.carousel.css" type="text/css" rel="stylesheet">
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/owl.carousel.js" type="text/javascript"></script>
    <script src="js/jwplayer.js"></script>

    <link href="css/style-info_account.css" type="text/css" rel="stylesheet">
    <link href="css/style.min.css" type="text/css" rel="stylesheet">

</head>
<style type="text/css" media="screen">
    .owl-theme .owl-controls .owl-page {
        display: inline-block;
    }

    .owl-theme .owl-controls .owl-page span {
        background: none repeat scroll 0 0 #869791;
        border-radius: 20px;
        display: block;
        height: 12px;
        margin: 5px 7px;
        opacity: 0.5;
        width: 12px;
    }
</style>
<style media="screen" type="text/css">
    .owl-theme .owl-controls .owl-page {
        display: inline-block;
    }

    .owl-theme .owl-controls .owl-page span {
        background: none repeat scroll 0 0 #869791;
        border-radius: 20px;
        display: block;
        height: 12px;
        margin: 5px 7px;
        opacity: 0.5;
        width: 12px;
    }

    .owl-theme .owl-controls .active span {
        background-color: white !important;
    }

    .owl-theme .owl-pagination {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    #wrapper {
        background-color: black;
        width: 100%;
    }
</style>
<body style="position: relative;">
<div id="wrapper" style="background: black">
    <?php
    include("header.php");
    ?>
    <style type="text/css">
        .checkbox-inline {
            padding: 7px 0px 0px !important;
        }

        .form-register {
            padding: 10px;
            margin-bottom: 50px;
        }

        .form-control {
            background-color: #333 !important;
            border: 1px solid #111 !important;
            color: #b8b8b8 !important;
        }

        .col-lg-3,
        .col-lg-7,
        .col-lg-10 {
            position: relative;
            min-height: 1px;
            padding-left: 10px;
            padding-right: 10px;
        }

        .form-control {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        @media (min-width: 992px) {

            .col-lg-3,
            .col-lg-7,
            .col-lg-10 {
                float: left;
            }

            .col-lg-3 {
                width: 25%;
            }

            .col-lg-7 {
                width: 58.333333333333336%;
            }

            .col-lg-10 {
                width: 30%;
            }

            .col-offset-3 {
                margin-left: 25%;
            }
        }

        .form-control:-moz-placeholder {
            color: #999999;
        }

        .form-control::-moz-placeholder {
            color: #999999;
        }

        .form-control:-ms-input-placeholder {
            color: #999999;
        }

        .form-control::-webkit-input-placeholder {
            color: #999999;
        }

        .form-control {
            display: block;
            width: 100%;
            height: 38px;
            padding: 8px 12px;
            font-size: 14px;
            line-height: 1.428571429;
            color: #555555;
            vertical-align: middle;
            background-color: #ffffff;
            border: 1px solid #cccccc;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            -webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
            transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
        }

        .form-control:focus {
            border-color: rgba(82, 168, 236, 0.8);
            outline: none;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .radio,
        .checkbox {
            display: block;
            min-height: 20px;
            padding-left: 20px;
            margin-top: 10px;
            margin-bottom: 10px;
            vertical-align: middle;
        }

        .radio label,
        .checkbox label {
            display: inline;
            margin-bottom: 0;
            font-weight: normal;
            cursor: pointer;
        }

        .radio input[type="radio"],
        .radio-inline input[type="radio"],
        .checkbox input[type="checkbox"],
        .checkbox-inline input[type="checkbox"] {
            float: left;
            margin-left: -20px;
        }

        .radio + .radio,
        .checkbox + .checkbox {
            margin-top: -5px;
        }

        .radio-inline,
        .checkbox-inline {
            display: inline-block;
            padding-left: 20px;
            margin-bottom: 0;
            font-weight: normal;
            vertical-align: middle;
            cursor: pointer;
        }

        .radio-inline + .radio-inline,
        .checkbox-inline + .checkbox-inline {
            margin-top: 0;
            margin-left: 10px;
        }


        .btn {
            display: inline-block;
            padding: 8px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 500;
            line-height: 1.428571429;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            border-radius: 4px;
            margin-left: 10px;
        }


        .btn-primary {
            color: #ffffff;
            background-color: #428bca;
            border-color: #428bca;
        }

        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active,
        .btn-primary.active {
            background-color: #357ebd;
            border-color: #3071a9;
        }

        .btn-primary.disabled,
        .btn-primary[disabled],
        fieldset[disabled] .btn-primary,
        .btn-primary.disabled:hover,
        .btn-primary[disabled]:hover,
        fieldset[disabled] .btn-primary:hover,
        .btn-primary.disabled:focus,
        .btn-primary[disabled]:focus,
        fieldset[disabled] .btn-primary:focus,
        .btn-primary.disabled:active,
        .btn-primary[disabled]:active,
        fieldset[disabled] .btn-primary:active,
        .btn-primary.disabled.active,
        .btn-primary[disabled].active,
        fieldset[disabled] .btn-primary.active {
            background-color: #428bca;
            border-color: #428bca;
        }


        .form-inline .form-control,
        .form-inline .radio,
        .form-inline .checkbox {
            display: inline-block;
        }

        .form-inline .radio,
        .form-inline .checkbox {
            margin-top: 0;
            margin-bottom: 0;
        }

        .form-horizontal .control-label {
            padding-top: 9px;
        }

        .form-horizontal .form-group:before,
        .form-horizontal .form-group:after {
            display: table;
            content: " ";
        }


        .form-horizontal .form-group:after {
            clear: both;
        }

        .form-horizontal .form-group:before,
        .form-horizontal .form-group:after {
            display: table;
            content: " ";
        }

        .form-horizontal .form-group:after {
            clear: both;
        }

        @media (min-width: 768px) {
            .form-horizontal .form-group {

                margin-left: -15px;
            }
        }

        .form-horizontal .form-group .row {

            margin-left: -10px;
        }

        @media (min-width: 768px) {
            .form-horizontal .control-label {
                text-align: right;
            }
        }

        .notifyerror {
            color: red;
            font-size: 90%;
            font-style: italic;
            font-weight: normal;
            margin-bottom: 0px;
        }

    </style>

    <h3 style="font-size:30px;text-align:center; background-color: black;margin-bottom:0px;margin-top:0px;">Đăng kí
        thành viên</h3>

    <div class="form-update" style="background: black">
        <form method="post" id="form-update" name="form-update" class="form-horizontal" action="" role="form" style="
    padding: 20px;">

            <div class="form-group">
                <label class="col-lg-3 control-label">Tài khoản</label>
                <div class="col-lg-7">
                    <input type="text" class="form-control" name="username" id="username" value="">
                    <label class="notifyerror" style="visibility: hidden; height: 0px" id="usernameerror">Tên tài khoản
                        chỉ bao gồm ký tự a-z, A-Z và số</label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Mật khẩu</label>
                <div class="col-lg-7">
                    <input type="password" class="form-control" name="password" id="password1" value="">
                    <label class="notifyerror" style="visibility: hidden; height: 0px" id="password1error">Mật khẩu phải
                        bao gồm chữ thường, chữ hoa và số, độ dài tối thiểu 8 ký tự</label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Xác nhận mật khẩu</label>
                <div class="col-lg-7">
                    <input type="password" class="form-control" name="password2" id="password2" value="">
                    <label class="notifyerror" style="visibility: hidden; height: 0px" id="password2error1">Mật khẩu
                        phải bao gồm chữ thường, chữ hoa và số, độ dài tối thiểu 8 ký tự</label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Phone</label>
                <div class="col-lg-7">
                    <input type="number" class="form-control" name="phone" id="phone">
                    <label class="notifyerror" style="visibility: hidden;height: 0px" id="phoneError">Phone chỉ bao gồm
                        các chữ số</label>
                </div>
            </div>

            <div class="col-offset-3 col-lg-10">
                <button type="submit" class="btn btn-primary" id="button_update" name="button_update">Đăng kí</button>
            </div>

            <div class="clear"></div>
        </form>
    </div>
    <?php
    include("footer.php");
    ?>
</div>

<script language="javascript">
    var username = document.getElementById("username");
    var password1 = document.getElementById("password1");
    var password2 = document.getElementById("password2");
    var phone = document.getElementById("phone");
    var button_update = document.getElementById("button_update");

    var usernameerror = document.getElementById("usernameerror");
    var password1error = document.getElementById("password1error");
    var password2error1 = document.getElementById("password2error1");
    var phoneError = document.getElementById("phoneError");

    var regUsername = /^[A-Za-z0-9]+$/;
    // var regEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0/-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var regPhone = /^\d{10}$/;
    var regPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/

    username.onchange = function () {
        checkname();
    }

    password1.onchange = function () {
        checkNewpassword();
    }

    password2.onchange = function () {
        checkNewpassword2();
    }
    phone.onchange = function () {
        checkPhone();
    }

    button_update.onclick = function () {
        if (username.value.toString().length <= 0) {
            alert("Bạn chưa nhập tên tài khoản");
            checkname();
            return false;
        }

        if (phone.value.toString().length <= 0) {
            alert("Bạn chưa nhập phone");
            checkPhone();
            return false;
        }

        var validName = checkname();

        var validNewPass1 = true;
        var validNewPass2 = true;

        if (password1.value.toString().length > 0 || password2.value.toString().length > 0) {
            validNewPass1 = checkNewpassword();
            validNewPass2 = checkNewpassword2();
        }
        var validPhone = checkPhone();

        if (validName && validNewPass1 && validNewPass2 && validPhone) {
            return true;
        }
        return false;
    }

    function checkname() {
        if (!regUsername.test(username.value)) {
            usernameerror.style.visibility = 'visible';
            usernameerror.style.height = 'auto';
            return false;
        } else {
            usernameerror.style.visibility = 'hidden';
            usernameerror.style.height = 'auto';
            return true;
        }
    }

    function checkNewpassword() {
        if (!regPassword.test(password1.value)) {
            password1error.style.visibility = 'visible';
            password1error.style.height = 'auto';
            return false;
        } else {
            password1error.style.visibility = 'hidden';
            password1error.style.height = '0px';

            if (password2.value.toString().length > 0) {
                if (password2.value.localeCompare(password1.value) === 0) {
                    password2error1.style.visibility = 'hidden';
                    password2error1.style.height = '0px';
                    return true;
                } else {
                    password2error1.innerHTML = "Mật khẩu không khớp";
                    password2error1.style.visibility = 'visible';
                    password2error1.style.height = 'auto';
                    return false;
                }
            }
            return true;
        }
    }

    function checkNewpassword2() {
        if (!regPassword.test(password2.value)) {
            password2error1.style.visibility = 'visible';
            password2error1.style.height = 'auto';
            return false;
        } else {
            if (password1.value.toString().length > 0) {
                if (password2.value.localeCompare(password1.value) === 0) {
                    password2error1.style.visibility = 'hidden';
                    password2error1.style.height = '0px';
                    return true;
                } else {
                    password2error1.innerHTML = "Mật khẩu không khớp";
                    password2error1.style.visibility = 'visible';
                    password2error1.style.height = 'auto';
                    return false;
                }
            } else {
                password2error1.style.visibility = 'hidden';
                password2error1.style.height = '0px';
                return true;
            }
        }
    }

    function checkPhone() {
        if (!regPhone.test(phone.value)) {
            phoneError.style.visibility = 'visible';
            phoneError.style.height = 'auto';
            return false;
        } else {
            phoneError.style.visibility = 'hidden';
            phoneError.style.height = '0px';
            return true;
        }
    }
</script>
</body>
</html>