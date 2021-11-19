<?php
if (isset($_GET['film_id'])) $film_id = $_GET['film_id'];
$sql = "select * from `film` where `id` = '$film_id'";
$query= mysqli_query($link, $sql);
$r=mysqli_fetch_assoc($query);
?>
<div id="content">
    <div  id="movie-display">
        <div class="row cur-location">
            <nav id="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="?mod=home">Xem phim</a>
                    </li>
                    /
                    <li class="breadcrumb-item">
                        <?php
                        if (isset($_GET['film_id'])) $film_id = $_GET['film_id'];
                        $sql = "select * from `film` where `id` = '$film_id'";
                        $query= mysqli_query($link, $sql);
                        $r1=mysqli_fetch_assoc($query);
                        $type_movie = $r1['type_id'];
                        $sql2 = "select * from `type_movie` where `id` = '$type_movie'";
                        $query = mysqli_query($link, $sql2);
                        $r2=mysqli_fetch_assoc($query);
                        ?>
<!--                        <a href="?mod=list&type=--><?php //echo $r2['handle'] ?><!--"--><?php //echo $r2['name']?><!--</a>-->
                    </li>
                    /
                    <?php
                    $sql = "select * from `film` where `id` = '$film_id'";
                    $query= mysqli_query($link, $sql);
                    $r3=mysqli_fetch_assoc($query);
                    ?>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $r3['name'] ?></li>
                </ol>
            </nav>
        </div>
        <div class="row body_video">
            <div class="col-sm-12">
                <video width="670px" height="350px" controls>
                    <source src="admin/uploads/movies/<?php echo $r['file'] ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="share">
                <div class="row">
                    <button type="button" class="btn btn-secondary">
                        <img src="images/icons/plus.png" alt="Share" width="20px"> Thêm vào hộp
                    </button>
                    <button type="button" class="btn btn-primary share_fb">
                        <img src="images/icons/facebook_square_lightblue-512.png" alt="Share" width="20px"> Share
                    </button>
                    <button type="button" class="btn btn-secondary">AutoNext: On</button>
                    <button type="button" class="btn btn-secondary">Phóng to</button>
                    <button type="button" class="btn btn-secondary">
                        <img src="images/icons/lamp.png" alt="Share" width="20px"> Tắt đèn
                    </button>
                </div>

            </div>
        </div>
    </div>
    <div  id="detail">
        <div class="row">
            <p>Bạn đang xem phim
                <a href="#"><?php echo $r3['name'] ?></a> online chất lượng cao miễn phí tại server phim GD 1.</p>
            <fieldset>
                <legend>Hướng khắc phục lỗi xem phim</legend>
                <ul>
                    <li>Sử dụng DNS 8.8.8.8, 8.8.4.4 hoặc 208.67.222.222, 208.67.220.220 để xem phim nhanh
                        hơn.
                    </li>
                    <li>Chất lượng phim mặc định chiếu là 360. Để xem phim chất lượng cao hơn xin vui lòng
                        chọn trên player.</li>
                    <li>Xem phim nhanh hơn với trình duyệt Google Chrome, Cốc Cốc</li>
                    <li>Nếu bạn không xem được phim vui lòng nhấn CTRL + F5 hoặc CMD + R trên MAC vài lần.</li>
                </ul>
            </fieldset>
        </div>

    </div>
    <div  id="server-list">
        <div class="row">
            <div class="col-sm-1">
                Mô tả phim :
            </div>
            <div class="col-sm-11">
                <div class="row">
                    <?php
                    $query = mysqli_query($link, "select * from `film` where `id` = '$film_id'");
                    while($r4 = mysqli_fetch_assoc($query)){
                        ?>
                       <?php echo $r4['description'] ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
