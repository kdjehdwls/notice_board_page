<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <style>
    table {
        border-top: 1px solid #444444;
        border-collapse: collapse;
    }

    tr {
        border-bottom: 1px solid #444444;
        padding: 10px;
    }

    td {
        border-bottom: 1px solid #efefef;
        padding: 10px;
    }

    table .even {
        background: #efefef;
    }

    .text {
        text-align: center;
        padding-top: 20px;
        color: #000000
    }

    .text:hover {
        text-decoration: underline;
    }

    a:link {
        color: #57A0EE;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
  </style>
</head>
<body>
  <?php
    require_once("inc/db.php");
    $query = "select * from board order by number desc";    //역순 출력
    $result = db_select($query);
    $total = count($result);  //result set의 총 레코드(행) 수 반환
    ?>
    <p style="font-size:25px; text-align:center"><b>게시판</b></p>
    <table align=center>
        <thead align="center">
            <tr>
                <td width="50" align="center">번호</td>
                <td width="500" align="center">제목</td>
                <td width="100" align="center">작성자</td>
                <td width="200" align="center">날짜</td>
                <td width="50" align="center">조회수</td>
            </tr>
        </thead>

        <tbody>
            <?php
            $index = 0;  //글 번호
            while ($total) { //result set에서 레코드(행)를 1개씩 리턴
                if ($total % 2 == 0) {
            ?>
                    <tr class="even">
                    
                    <?php } 
                    else {
                    ?>
                    <tr>
                    
                    <?php } ?>
                    <td width="50" align="center"><?php echo $total ?></td>
                    <td width="500" align="center">
                        <a href="read.php?number=<?php echo $result[$index]['number'] ?>">
                            <?php echo $result[$index]['title'] ?>
                    </td>
                    <td width="100" align="center"><?php echo $result[$index]['id'] ?></td>
                    <td width="200" align="center"><?php echo $result[$index]['date'] ?></td>
                    <td width="50" align="center"><?php echo $result[$index]['hit'] ?></td>
                    </tr>
                <?php
                $total--;
                $index++; //글번호 증가
            }
                ?>
        </tbody>
    </table>

    <div class=text>
        <font style="cursor: hand" onClick="location.href='./write.php'">글쓰기</font>
    </div>
</body>
</html>