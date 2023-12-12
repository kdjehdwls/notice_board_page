<?php
require_once("inc/db.php");

$id = $_POST['name'];                   //작성자
$pw = $_POST['pw'];                     //비밀번호
$title = $_POST['title'];               //제목
$content = $_POST['content'];           //내용
$date = date('Y-m-d H:i:s');            //날짜

$URL = './index.php';                   //return URL


$query = "INSERT INTO board (number, title, content, date, hit, id, password) 
        values(null,'$title', '$content', '$date', 0, '$id', '$pw')";


//$result = $connect->query($query);
$result = db_insert($query);
if ($result) {
?> <script>
        alert("<?php echo "게시글이 등록되었습니다." ?>");
        location.replace("<?php echo $URL ?>");
    </script>
<?php
} else {
    echo "게시글 등록에 실패하였습니다.";
}

mysqli_close($connect);
?>