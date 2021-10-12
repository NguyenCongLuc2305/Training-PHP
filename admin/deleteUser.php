<?php
require('libs/db.php');

if(isset($_GET["id"])){
    $userId = $_GET['id'];
}
$sql = "DELETE FROM users  WHERE id = $userId";

if (mysqli_query($link, $sql)) {?>
    <script>
        alert("Xóa User thành công");
        location.href = "manageUser.php";
    </script>

    <?php
} else {
    echo "Lỗi xóa user: " . mysqli_error($link);
}
mysqli_close($link);

?>