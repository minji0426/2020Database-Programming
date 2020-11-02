<?php  
    $link = mysqli_connect("localhost","admin","admin","vgsalesDB");
    if (mysqli_connect_errno()) {
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }
    
    if(isset($_GET['genre'])){
            $Genre = $_GET['genre'];
    } else {
        $Genre = $_POST['genre'];
    }

    $query = "
        SELECT * FROM vgsales 
        where Genre='{$Genre}'
        ORDER BY Rank";
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
    <h2><a href="index.php">비디오게임 순위</a> | 장르별 게임 순위</h2>
    <p>게임장르를 선택해주세요</p>
    <form action="genre_rank_process.php" method="GET">
        <select name="genre">
            <option>게임장르를 선택해주세요</option>
            <option value="Action">Action</option>
            <option value="Adventure">Adventure</option>
            <option value="Fighting">Fighting</option>
            <option value="Misc">Misc</option>
            <option value="Platform">Platform</option>
            <option value="Puzzle">Puzzle</option>
            <option value="Racing">Racing</option>
            <option value="Role-Playing">Role-Playing</option>
            <option value="Shooter">Shooter</option>
            <option value="Simulation">Simulation</option>
            <option value="Sports">Sports</option>
            <option value="Strategy">Strategy</option>
        </select>
        <input type="submit" value="검색"/>
    </form>
    <br>
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
        <p><?=$Genre?> 게임순위입니다. </p>
        <?=$article?>
    </table>
</body>
</html>