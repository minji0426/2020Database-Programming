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
            <option value="모든">닌텐도 플랫폼을 선택해주세요</option>
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
    
</body>
</html>