<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - Dark Admin</title>

    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="asset/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="asset/css/local.css"/>

    <script type="text/javascript" src="asset/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>

    <style>
        div {
            padding-bottom: 20px;
        }

        .form-control {
            color: black;
        }

        .notifyerror {
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

if (isset($_GET["id"])) {
    $filmID = $_GET['id'];
}
$sql = "SELECT * FROM film WHERE id = $filmID";
$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) == 0) {
    echo "No required user";
} else {
    $row = mysqli_fetch_assoc($result);
    ?>

    <div id="wrapper">
        <?php
        //        include("common.php");
        ?>
        <div id="edit-film">
            <div class="row text-center">
                <h2>Chỉnh sửa film</h2>
            </div>
            <form method="post" id="form-insert-film" name="form-insert-film" class="form-horizontal"
                  enctype="multipart/form-data" action=""
                  role="form">
                <div>
                    <label for="ID-film" class="col-md-2">
                        ID phim
                    </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="ID-film" value="<?php echo $row["id"]; ?>" readonly>
                    </div>
                </div>
                <div>
                    <label for="film-name" class="col-md-2">
                        Tên phim
                    </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="film-name" name="film-name"
                               value="<?php echo $row["name"]; ?>" required>
                    </div>
                </div>
                <div>
                    <label for="status" class="col-md-2">
                        Trạng thái
                    </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="status" name="status"
                               value="<?php echo $row["status"]; ?>" required>
                    </div>
                </div>
                <div>
                    <label for="director" class="col-md-2">
                        Đạo diễn
                    </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="director" name="director"
                               value="<?php echo $row["director"]; ?>" required>
                    </div>
                </div>
                <div>
                    <label for="actor" class="col-md-2">
                        Diễn viên
                    </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="actor" name="actor"
                               value="<?php echo $row["actor"]; ?>" required>
                    </div>
                </div>
                <div>
                    <label for="category" class="col-md-2">
                        Thể loại
                    </label>
                    <div class="col-md-10">
                        <select id="category" style="color: black" name="category">
                            <?php
                            $sql1 = "SELECT * FROM category";
                            $result1 = mysqli_query($link, $sql1);

                            if (mysqli_num_rows($result1) > 0) {
                                while ($row1 = mysqli_fetch_assoc($result1)) { ?>
                                    <option value="<?php echo $row1["id"]; ?>" <?php echo ($row1["id"] == $row["category_id"]) ? "selected" : "" ?> >
                                        <?php echo $row1["name"]; ?>
                                    </option>
                                    <?php
                                }

                            } else {
                                echo "No catagory";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <!--                <div>-->
                <!--                    <label for="type" class="col-md-2">-->
                <!--                        Type-movie-->
                <!--                    </label>-->
                <!--                    <div class="col-md-10">-->
                <!--                        <select id="type" style="color: black" name="type_movie">-->
                <!--                            <option value="1" -->
                <?php //echo ($row["category_id"] == 1) ? "selected" : "" ?><!--Phim lẻ-->
                <!--                            </option>-->
                <!--                            <option value="2" -->
                <?php //echo ($row["category_id"] == 2) ? "selected" : "" ?><!--Phim bộ-->
                <!--                            </option>-->
                <!--                            <option value="3" -->
                <?php //echo ($row["category_id"] == 3) ? "selected" : "" ?><!--Phim rạp-->
                <!--                            </option>-->
                <!---->
                <!--                            <!- --><?php
                //                            $sql = "SELECT * FROM type_movie";
                //                            $result = mysqli_query($link, $sql);
                //
                //                            if (mysqli_num_rows($result) > 0) {
                //                                while ($row55 = mysqli_fetch_assoc($result)) { ?>
                <!--                                    <option value="--><?php //echo $row55["id"]; ?><!--">-->
                <!--                                        --><?php //echo $row55["name"]; ?>
                <!--                                    </option>-->
                <!--                            --><?php
                //                                }
                //                            } else {
                //                                echo "No nation";
                //                            }
                //                            ?><!-- -->-->
                <!--                        </select>-->
                <!--                    </div>-->
                <!--                </div>-->
                <div>
                    <label for="nation" class="col-md-2">
                        Quốc gia
                    </label>
                    <div class="col-md-10">
                        <select id="nation" style="color: black" name="nation">
                            <?php
                            $sql1 = "SELECT * FROM nation";
                            $result1 = mysqli_query($link, $sql1);

                            if (mysqli_num_rows($result1) > 0) {
                                while ($row1 = mysqli_fetch_assoc($result1)) { ?>
                                    <option value="<?php echo $row1["id"]; ?>" <?php echo ($row["nation_id"] == $row1["id"]) ? "selected" : "" ?>>
                                        <?php echo $row1["name"]; ?>
                                    </option>
                                    <?php
                                }
                            } else {
                                echo "No nation";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div>
                    <label for="year" class="col-md-2">
                        Năm phát hành
                    </label>
                    <div class="col-md-9">
                        <input type="date" name="year" id="year" style="color: black"
                               value="<?php echo $row['year'] ?>">
                    </div>
                </div>

                <div>
                    <label for="file" class="col-md-2">
                        Link phim
                    </label>
                    <div class="col-md-9">
                        <input type="file" name="file" id="link_movie" value="<?php echo $row['file'] ?>" onchange="alertLink()"/><span name="old" value="<?=$row['file']?>" style="color: #0e76a8">File cũ:  <?php echo $row['file']?></span>
                        <label for="movie_link"></label><input type="text" class="form-control" id="movie_link"
                                                               name="file" value="<?php echo $row['file'] ?>" required>
                        <p class="help-block">
                            Ví dụ: cuoc-chien-vo-cuc.mp4
                        </p>
                        <script>
                            function alertLink() {
                                var link = document.getElementById("link_movie").value;
                                var n = link.lastIndexOf('\\');
                                var result_link = link.substring(n + 1);
                                document.getElementById("movie_link").value = result_link;
                            }
                        </script>
                    </div>
                </div>
                <div>
                    <label for="image" class="col-md-2">
                        Link ảnh
                    </label>
                    <div class="col-md-9">
                        <input type="file" name="image" id="image_name" value="<?php echo $row['image'] ?>" onchange="alertName()"/><span name="old_image" value="<?=$row['image']?>" style="color: #0e76a8">File cũ: <?php echo $row['image']?></span>
                        <label for="image_link"></label><input type="text" class="form-control" id="image_link"
                                                               name="image" value="<?php echo $row['image'] ?>"
                                                               required>
                        <p class="help-block">
                            Ví dụ: cuoc-chien-vo-cuc.jpg
                        </p>
                        <script>
                            function alertName() {
                                var name = document.getElementById("image_name").value;
                                var n = name.lastIndexOf('\\');
                                var result = name.substring(n + 1);
                                document.getElementById("image_link").value = result;
                            }
                        </script>
                    </div>
                </div>

                <div>
                    <label for="decription" class="col-md-2">
                        Mô tả phim
                    </label>
                    <div class="col-md-9" style="color: black">
                        <textarea name="decription" id="decription" cols="82" required
                                  rows="10"><?php echo $row["description"]; ?></textarea>
                    </div>

                </div>
                <div>
                    <label for="duration" class="col-md-2">
                        Thời lượng (phút)
                    </label>
                    <div class="col-md-9">
                        <input type="number" class="form-control" id="duration" name="duration"
                               value="<?php echo $row["duration"]; ?>" required>
                    </div>
                </div>
                <div>
                    <label for="author" class="col-md-2">
                        Tác giả
                    </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="author" name="author"
                               value="<?php echo $row["author"]; ?>" required>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary" id="button_update" name="button_update">Lưu lại
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>


<?php

require_once("libs/db.php");

if (isset($_POST["button_update"])){

$oldfile = $_POST['old'];
$file = $_FILES['file']['name'];
if ($file != "") {
///upload video
$target_dir = "uploads/movies/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Allow certain file formats
if (isset($imageFileType)){
if ($imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "mov") { ?>
    <script> alert("Sorry, only MP4,AVI and MOV files are allowed.")</script>
<?php
$uploadOk = 0;
return false;
}
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

//delete video from directory
if (basename($row['file']) != basename($_FILES["file"]["name"])) {
    $path = "uploads/movies/" . basename($row['file']);
    if (unlink($path)) {
        echo 'The file ' . $path . ' was deleted successfully!';
    } else {
        echo 'There was a error deleting the file ' . $path;
    }
}
} else {
    $file = $oldfile;
}




$oldfile_image = $_POST['old_image'];
$file_image = $_FILES['image']['name'];
if($file_image != "") {

//upload image
$target_dir_image = "uploads/images/";
$target_file_image = $target_dir_image . basename($_FILES["image"]["name"]);
$uploadOk_image = 1;
$imageFileType_image = strtolower(pathinfo($target_file_image, PATHINFO_EXTENSION));

// Allow certain file formats
if (isset($imageFileType_image)){
if ($imageFileType_image != "jpg" && $imageFileType_image != "png" && $imageFileType_image != "jpeg"
&& $imageFileType_image != "gif") { ?>
    <script> alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")</script>
<?php
$uploadOk_image = 0;
return false;
}
}

if ($uploadOk_image == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file_image)) {
        echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

//delete image from directory
if (basename($row['image'] != basename($_FILES["image"]["name"]))) {
    $fileName = "uploads/images/" . basename($row['image']);
    if (unlink($fileName)) {
        echo 'The file ' . $fileName . ' was deleted successfully!';
    } else {
        echo 'There was a error deleting the file ' . $fileName;
    }
}
} else {
    $file_image = $oldfile_image;
}


$name = $_POST["film-name"];
$status = $_POST["status"];
$director = $_POST["director"];
$actor = $_POST["actor"];
$category = $_POST["category"];
//$type_movie = $_POST["type_movie"];
$nation = $_POST["nation"];
$year = $_POST["year"];
$link_movie = $_POST["file"];
$description = $_POST["decription"];
$duration = $_POST["duration"];
$author = $_POST["author"];
$link_image = $_POST["image"];

//xóa tất cả các thẻ HTML khỏi một chuỗi
$newName = filter_var($name, FILTER_SANITIZE_STRING);
$newStatus = filter_var($status, FILTER_SANITIZE_STRING);
$newDirector = filter_var($director, FILTER_SANITIZE_STRING);
$newActor = filter_var($actor, FILTER_SANITIZE_STRING);
$newCategory = filter_var($category, FILTER_SANITIZE_STRING);
//$newType = filter_var($type_movie, FILTER_SANITIZE_STRING);
$newNation = filter_var($nation, FILTER_SANITIZE_STRING);
$newYear = filter_var($year, FILTER_SANITIZE_STRING);
$newMovie = filter_var($link_movie, FILTER_SANITIZE_STRING);
$newDescription = filter_var($description, FILTER_SANITIZE_STRING);
$newDuration = filter_var($duration, FILTER_SANITIZE_STRING);
$newAuthor = filter_var($author, FILTER_SANITIZE_STRING);
$newImage = filter_var($link_image, FILTER_SANITIZE_STRING);

//thực hiện việc lưu trữ dữ liệu vào db
$sql = "SELECT * FROM film WHERE ID = '$filmID'";
$check = mysqli_query($link, $sql);
if (mysqli_num_rows($check) <= 0){ ?>
    <script>
        alert('Phim với ID <?php echo $userID;?> không tồn tại');
    </script>";
<?php
}
else{

$sql = "UPDATE film SET 
                    name='$newName',
                    status='$newStatus', 
                    director='$newDirector', 
                    actor='$newActor', 
                    category_id='$newCategory',
                    nation_id='$newNation',
                   year ='$newYear',
                    file='$newMovie',
                    description='$newDescription',
                    duration='$newDuration',
                    author='$newAuthor',
                    image='$newImage'
                WHERE id = $filmID";
$result = mysqli_query($link, $sql);

if ($result){
?>
    <script>
        alert("Edit film successfully!");
        location.href = window.location.href; //reload page
    </script>
<?php
} else{
?>
    <script>
        alert("Edit film fail!");
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





