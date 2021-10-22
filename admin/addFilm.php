<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>

    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="asset/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="asset/css/local.css"/>

    <script type="text/javascript" src="asset/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>

    <style>
        img {
            filter: gray;
            /* IE6-9 */
            -webkit-filter: grayscale(1);
            /* Google Chrome, Safari 6+ & Opera 15+ */
            -webkit-box-shadow: 0px 2px 6px 2px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 2px 6px 2px rgba(0, 0, 0, 0.75);
            box-shadow: 0px 2px 6px 2px rgba(0, 0, 0, 0.75);
            margin-bottom: 20px;
        }

        img:hover {
            filter: none;
            /* IE6-9 */
            -webkit-filter: grayscale(0);
            /* Google Chrome, Safari 6+ & Opera 15+ */
        }

        div {
            padding-bottom: 30px;
        }

        .form-control {
            color: black;
        }

        .title {

            /* background-color: #2a9fd6; */
            padding: 10px 30px;
            border-radius: 10px;
            width: 500px;
            margin: auto;
        }

    </style>
</head>

<body>

<?php
require('libs/db.php');
$sql = "SELECT id FROM film ";
$result = mysqli_query($link, $sql);
?>
<div id="wrapper">
    <?php
    //    include("common.php");
    ?>
    <div class="container" id="post_film" style="padding: 0 15%">
        <div class="row text-center" style="margin: 20px 0px;">
            <h2 class="title">Thêm Phim</h2>
        </div>
        <form method="post" id="form-insert-film" name="form-insert-film" class="form-horizontal"
              action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" role="form" enctype="multipart/form-data">

            <div>
                <label for="film-name" class="col-md-2">
                    Tên phim
                </label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="film-name" name="film-name" required>
                </div>
            </div>
            <div>
                <label for="status" class="col-md-2">
                    Trạng thái
                </label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="status" name="status" required>
                </div>
            </div>
            <div>
                <label for="director" class="col-md-2">
                    Đạo diễn
                </label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="director" name="director" required>
                </div>
            </div>
            <div>
                <label for="actor" class="col-md-2">
                    Diễn viên
                </label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="actor" name="actor" required>
                </div>
            </div>
            <div>
                <label for="category" class="col-md-2">
                    Thể loại
                </label>
                <div class="col-md-10">
                    <select id="category" style="color: black" name="category">
                        <?php
                        $sql = "SELECT * FROM category";
                        $result = mysqli_query($link, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <option value="<?php echo $row["id"]; ?>">
                                    <?php echo $row["name"]; ?>
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
            <!--            <div>-->
            <!--                <label for="type" class="col-md-2">-->
            <!--                    Type-movie-->
            <!--                </label>-->
            <!--                <div class="col-md-10">-->
            <!--                    <select id="type" style="color: black" name="type_movie">-->
            <!--                        <option value="1">Phim lẻ</option>-->
            <!--                        <option value="2">Phim bộ</option>-->
            <!--                        <option value="3">Phim chiếu rạp</option>-->
            <!--                        <!- --><?php
            //                        $sql = "SELECT * FROM type_movie";
            //                        $result = mysqli_query($link, $sql);
            //                        if (mysqli_num_rows($result) > 0) {
            //                            while ($row = mysqli_fetch_assoc($result)) { ?>
            <!--                                        <option value="--><?php //echo $row["id"]; ?><!--">-->
            <!--                                            --><?php //echo $row["name"]; ?>
            <!--                                        </option>-->
            <!--                                --><?php
            //                            }
            //                        } else {
            //                            echo "No nation";
            //                        }
            //                        ?><!-- -->
            <!--                    </select>-->
            <!--                </div>-->
            <!--            </div>-->
            <div>
                <label for="nation" class="col-md-2">
                    Quốc gia
                </label>
                <div class="col-md-10">
                    <select id="nation" style="color: black" name="nation">
                        <?php
                        $sql = "SELECT * FROM nation";
                        $result = mysqli_query($link, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <option value="<?php echo $row["id"]; ?>">
                                    <?php echo $row["name"]; ?>
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
                    <input name="year" id="year" type="date" class="form-control">
                </div>
            </div>
            <div>
                <label for="file" class="col-md-2">
                    Link phim
                </label>
                <div class="col-md-9">
                    <input type="file" name="file" id="link_movie" onchange="alertLink()"/>
                    <label for="movie_link"></label><input type="text" class="form-control" id="movie_link" name="file"
                                                           required>
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
                    <input type="file" name="image" id="image_name" onchange="alertName()"/>
                    <label for="image_link"></label><input type="text" class="form-control" id="image_link" name="image"
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
                    <textarea name="decription" id="decription" cols="82" rows="10" required></textarea>
                </div>

            </div>
            <div>
                <label for="duration" class="col-md-2">
                    Thời lượng (phút)
                </label>
                <div class="col-md-9">
                    <input type="number" class="form-control" id="duration" name="duration" required>
                </div>
            </div>
            <div>
                <label for="author" class="col-md-2">
                    Tác giả
                </label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="author" name="author" required>
                </div>
            </div>


            <div class="row">
                <div class="col-md-9"></div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary" id="button_post" name="button_post">Đăng phim</button>
                </div>
            </div>
        </form>

    </div>
</div>

<?php

if (isset($_POST["button_post"])) {

    ///upload video
    $target_dir = "uploads/movies/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Allow certain file formats
if ($imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "mov") { ?>
    <script> alert("Sorry, only MP4,AVI and MOV files are allowed.")</script>
<?php
$uploadOk = 0;
return false;
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

//upload image
$target_dir_image = "uploads/images/";
$target_file_image = $target_dir_image . basename($_FILES["image"]["name"]);
$uploadOk_image = 1;
$imageFileType_image = strtolower(pathinfo($target_file_image, PATHINFO_EXTENSION));

// Allow certain file formats
if ($imageFileType_image != "jpg" && $imageFileType_image != "png" && $imageFileType_image != "jpeg"
&& $imageFileType_image != "gif") {
?>
    <script> alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")</script>
<?php

$uploadOk_image = 0;
return false;
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


$sql = "INSERT INTO film(name,status,director,actor,category_id,nation_id,year,file,description,duration,author,image)            
            VALUES ('$newName','$newStatus','$newDirector','$newActor','$newCategory','$newNation','$newYear','$newMovie','$newDescription','$newDuration','$newAuthor','$newImage')";

$result = mysqli_query($link, $sql);

if ($result) {
?>
    <script>
        alert("Insert film sucessfully!");
    </script>
<?php
} else { ?>
    <script>
        alert("Add film fail!");
    </script>
<?php }
}
?>

</body>

</html>