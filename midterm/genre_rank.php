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
    
</body>
</html>