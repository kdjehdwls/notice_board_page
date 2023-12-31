<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>읽기</title>
  <style>
        .read_table {
            border: 1px solid #444444;
            margin-top: 30px;
        }

        .read_title {
            height: 45px;
            font-size: 23.5px;
            text-align: center;
            background-color: #3C3C3C;
            color: white;
            width: 1000px;
        }

        .read_id {
            text-align: center;
            background-color: #EEEEEE;
            width: 30px;
            height: 33px;
        }

        .read_id2 {
            background-color: white;
            width: 60px;
            height: 33px;
            padding-left: 10px;
        }

        .read_hit {
            background-color: #EEEEEE;
            width: 30px;
            text-align: center;
            height: 33px;
        }

        .read_hit2 {
            background-color: white;
            width: 60px;
            height: 33px;
            padding-left: 10px;
        }

        .read_content {
            padding: 20px;
            border-top: 1px solid #444444;
            height: 500px;
        }

        .read_btn {
            width: 700px;
            height: 200px;
            text-align: center;
            margin: auto;
            margin-top: 50px;
        }

        .read_btn1 {
            height: 50px;
            width: 100px;
            font-size: 20px;
            text-align: center;
            background-color: white;
            border: 2px solid black;
            border-radius: 10px;
        }

        .read_comment_input {
            width: 700px;
            height: 500px;
            text-align: center;
            margin: auto;
        }

        .read_text3 {
            font-weight: bold;
            float: left;
            margin-left: 20px;
        }

        .read_com_id {
            width: 100px;
        }

        .read_comment {
            width: 500px;
        }
    </style>
</head>
<body>
<?php
    require_once("inc/db.php");
    $number = $_GET['number']; 
    $query = "select title, content, date, hit, id from board where number = ?";
    db_insert("update board set hit = board.hit + 1 where number = ?",array($number)); //조회수 증가를 위한 update
    $result = db_select($query, array($number));
    ?>

    <table class="read_table" align=center>
        <tr>
            <td colspan="4" class="read_title"><?php echo $result[0]['title'] ?></td>
        </tr>
        <tr>
            <td class="read_id">작성자</td>
            <td class="read_id2"><?php echo $result[0]['id'] ?></td>
            <td class="read_hit">조회수</td>
            <td class="read_hit2"><?php echo $result[0]['hit'] ?></td>
        </tr>


        <tr>
            <td colspan="4" class="read_content" valign="top">
                <?php echo $result[0]['content'] ?></td>
        </tr>
    </table>

    <div class="read_btn">
        <button class="read_btn1" onclick="location.href='./index.php'">목록</button>
    </div>
</body>
</html>