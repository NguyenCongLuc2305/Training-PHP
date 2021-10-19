
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - Dark Admin</title>

    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="asset/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="asset/css/local.css" />

    <script type="text/javascript" src="asset/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>

    <style>
        /* div {
            padding-bottom:20px;
        } */
        .form-control{
            color: black;
        }
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
<?php
require('libs/db.php');

if(isset($_GET["id"])){
    $userID = $_GET['id'];
}
$sql = "SELECT * FROM users WHERE id = $userID";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) == 0) {
    echo "No required user";
} else {
    $row = mysqli_fetch_assoc($result);?>

    <div id="wrapper">
        <?php
        include("common.php");
        ?>
        <div id="add-user">
            <div class="row text-center">
                <h2>Chỉnh sửa User</h2>
            </div>
            <form method="post" id="form-update" name="form-update" class="form-horizontal" action="" role="form" style="padding: 20px;">
                <div class="form-group">
                    <label class="col-lg-3 control-label">ID</label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" name="id" id="id" value="<?php echo $row["id"];?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Tài khoản</label>
                    <div class="col-lg-7">
                        <input type="text" class="form-control" name="username" id="username" value="<?php echo $row["username"]?>">
                        <label class="notifyerror" style="visibility: hidden; height: 0px" id="usernameerror"></label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Mật khẩu</label>
                    <div class="col-lg-7">
                        <input type="password" class="form-control" name="password" id="password1" value="<?php echo $row["password"]?>">
                        <label class="notifyerror" style="visibility: hidden; height: 0px" id="password1error"></label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Xác nhận mật khẩu</label>
                    <div class="col-lg-7">
                        <input type="password" class="form-control" name="password2" id="password2" value="<?php echo $row["password"]?>">
                        <label class="notifyerror" style="visibility: hidden; height: 0px" id="password2error1">Yêu cầu nhập
                            đúng mật khẩu</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Phone</label>
                    <div class="col-lg-7"><input type="text" class="form-control" name="phone" id="phone" value="<?php echo $row["phone"]?>">
                        <label class="notifyerror" style="visibility: hidden; height: 0px" id="phoneerror"></label>
                    </div>
                </div>

                <div class="col-offset-3 col-lg-10">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-7">
                        <button type="submit" class="btn btn-primary" id="button_update" name="button_update">Lưu lại </button>
                        <button type="submit" class="btn btn-primary" id="button_previous" name="button_previous" onclick="goToPrePage()">Về trang trước </button>
                    </div>
                </div>

                <div class="clear"></div>
            </form>

        </div>
    </div>

<?php
require_once("libs/db.php");
if(isset($_POST["button_update"])){
$username = $_POST["username"];
$password = $_POST["password"];
$hash = password_hash($password, PASSWORD_BCRYPT);
$phone = $_POST["phone"];

//thực hiện việc lưu trữ dữ liệu vào db
// edit != insert
$sql = "SELECT * FROM users WHERE ID = '$userID'";
$check = mysqli_query($link,$sql);
print_r(mysqli_num_rows($check));
if(mysqli_num_rows($check) <= 0){ ?>
    <script>
        alert('Tài khoản với ID <?php echo $userID;?> chưa có');
    </script>";
<?php
}
else{
$sql = "UPDATE users SET username='$username', password='$hash',phone = '$phone' WHERE id = $userID";

echo "<pre>";
print_r($sql);
echo "</pre>";

$result = mysqli_query($link,$sql);

if ($result){?>
    <script>
        alert("Edit user successfully!");
        location.href= window.location.href; //reload page
    </script>
<?php
} else{
?>
    <script>
        alert("Edit user fail!");
    </script>
    <?php
}
}
}
    ?>
<?php }
mysqli_close($link);
?>

</body>
</html>

        
    


