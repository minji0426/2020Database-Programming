<?php  
    $link = mysqli_connect("localhost","admin","admin","vgsalesDB");
    if (mysqli_connect_errno()) {
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }
    
    if(isset($_GET['platform'])){
            $Platform = $_GET['platform'];
    } else {
        $Platform = $_POST['platform'];
    }
    if(isset($_GET['genre'])){
        $genre = $_GET['genre'];
    } else {
        $genre = $_POST['genre'];
    }

    if($Platform == "모든" && $genre == "모든"){
        $query = "
            SELECT * FROM vgsales 
            where Publisher='Nintendo' 
            ORDER BY Rank";
    } else if($Platform == "모든"){
        $query = "
            SELECT * FROM vgsales 
            where Publisher='Nintendo' && Genre='{$genre}'
            ORDER BY Rank";
    } else if($genre == "모든"){
        $query = "
            SELECT * FROM vgsales 
            where Publisher='Nintendo' && platform='{$Platform}'
            ORDER BY Rank";
    } else {
        $query = "
            SELECT * FROM vgsales 
            where Publisher='Nintendo' && platform='{$Platform}' && Genre='{$genre}'
            ORDER BY Rank";
    }

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
    <h2><a href="index.php">비디오게임 순위</a> | 닌텐도 게임의 순위</h2>
    <p>닌텐도 플랫폼과 장르를 선택해주세요(미선택시 전체선택)</p>
    <form action="nintendo_rank_process.php" method="GET">
        <select name="platform">
            <option value="모든"> 닌텐도 플랫폼을 선택해주세요</option>
            <option value="모든">전체선택</option>
            <option value="3DS">3DS</option>
            <option value="DS">DS</option>
            <option value="GB">GB</option>
            <option value="GBA">GBA</option>
            <option value="GC">GC</option>
            <option value="N64">N64</option>
            <option value="NES">NES</option>
            <option value="SNES">SNES</option>
            <option value="Wii">Wii</option>
            <option value="WiiU">WiiU</option>
        </select>
    
        <select name="genre">
            <option value="모든">게임장르를 선택해주세요</option>
            <option value="모든">전체선택</option>
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
        <p>닌텐도 <?=$Platform?> 플랫폼의 <?=$genre?> 장르 게임순위입니다. </p>
        <?=$article?>
    </table>
</body>
</html>