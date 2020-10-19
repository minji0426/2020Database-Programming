<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'employees');
    
    if(mysqli_connect_errno()){
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }

    $query = "
        SELECT m.dept_no, d.dept_name, m.emp_no, e.first_name, e.last_name, m.from_date, m.to_date
        FROM dept_manager m
        INNER JOIN employees e on e.emp_no=m.emp_no
        INNER JOIN departments d on d.dept_no=m.dept_no
        ORDER BY dept_no;
    ";
    $result = mysqli_query($link, $query);

    $article = '';
    while($row = mysqli_fetch_array($result)){
        $article .= '<tr><td>';
        $article .= $row['dept_no'];
        $article .= '</td><td>';
        $article .= $row['dept_name'];
        $article .= '</td><td>';
        $article .= $row['emp_no'];
        $article .= '</td><td>';
        $article .= $row['first_name'];
        $article .= '</td><td>';
        $article .= $row['last_name'];
        $article .= '</td><td>';
        $article .= $row['from_date'];
        $article .= '</td><td>';
        $article .= $row['to_date'];
        $article .= '</td></tr>';
    }

    mysqli_free_result($result);
    mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> 부서장 정보 </title>
    <style>
        body{
            font-family: Consolas, monospace;
            font-family: 12px;
        }
        table{
            width: 100%;
        }
        th,td{
            padding: 10px;
            border-bottom: 1px solid #dadada;
        }
    </style>
</head>
<body>
        <h2><a href="index.php">직원 관리 시스템</a> | 부서장 정보</h2>
        <table>
            <tr>
                <th>부서번호</th>
                <th>부서이름</th>
                <th>직원번호</th>
                <th>first_name</th>
                <th>last_name</th>
                <th>from_date</th>
                <th>to_date</th>
            </tr>
            <?= $article ?>
        </table>
</body>
</html>