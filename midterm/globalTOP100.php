<?php
    $link = mysqli_connect("localhost","admin","admin","vgsalesDB");
    if (mysqli_connect_errno()) {
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }

    $query = "SELECT * FROM vgsales ORDER BY Rank LIMIT 100";
    $result = mysqli_query($link,$query);

    $article = '';
    while($row = mysqli_fetch_array($result)){
        $article .= '<tr>';
        $article .= '<td>'.$row['Rank'].'</td>';
        $article .= '<td>'.$row['Name'].'</td>';
        $article .= '<td>'.$row['Platform'].'</td>';
        $article .= '<td>'.$row['Year'].'</td>';
        $article .= '<td>'.$row['Genre'].'</td>';
        $article .= '<td>'.$row['Publisher'].'</td>';
        $article .= '<td>'.$row['Global_Sales'].'</td>';
        $article .= '</tr>';
    }
   
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> 비디오게임 순위 </title>
</head>
<body>
    <h2><a href="index.php">비디오게임 순위</a> | Global TOP100</h2>
    <table border="1">
        <tr>
            <th>순위</th>
            <th>게임이름</th>
            <th>플랫폼</th>
            <th>제작년도</th>
            <th>장르</th>
            <th>회사</th>
            <th>글로벌 판매량</th>
        </tr>
        <?=$article?>
    </table>

</body>
</html>