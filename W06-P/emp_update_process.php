<?php
    $link= mysqli_connect("localhost", "admin", "admin","employees");
    $filtered =array(
        'emp_no' => mysqli_real_escape_string($link, $_POST['emp_no']),
        'birth_date' => mysqli_real_escape_string($link, $_POST['birth_date']),
        'first_name' => mysqli_real_escape_string($link, $_POST['first_name']),
        'last_name' => mysqli_real_escape_string($link, $_POST['last_name']),
        'gender' => mysqli_real_escape_string($link, $_POST['gender']),
        'hire_date' => mysqli_real_escape_string($link, $_POST['hire_date'])
    );
    
    $query = "
        UPDATE employees 
        SET
            birth_date = '{$filtered['birth_date']}',
            first_name = '{$filtered['first_name']}',
            last_name = '{$filtered['last_name']}',
            gender = '{$filtered['gender']}',
            hire_date = '{$filtered['hire_date']}'
        WHERE
            emp_no = '{$filtered['emp_no']}' 
    ";
    //print_r($query);
    $result = mysqli_query($link, $query);
    if($result == false){
        echo '수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
        error_log(mysqli_error($link));
    } else {
        echo '성공하였습니다. <a href="index.php">돌아가기</a>';
    }

    $query = "SELECT * FROM employees ORDER BY emp_no DESC LIMIT 1";
   
    $result = mysqli_query($link, $query);

    $emp_info = '';
    while($row2 = mysqli_fetch_array($result)) {
        $emp_info .= '<tr>';
        $emp_info .= '<td>'.$row2['emp_no'].'</td>';
        $emp_info .= '<td>'.$row2['birth_date'].'</td>';
        $emp_info .= '<td>'.$row2['first_name'].'</td>';
        $emp_info .= '<td>'.$row2['last_name'].'</td>';
        $emp_info .= '<td>'.$row2['gender'].'</td>';
        $emp_info .= '<td>'.$row2['hire_date'].'</td>';
        $emp_info .= '<td><a href="emp_update.php?emp_no='.$row2['emp_no'].'">update</a></td>';
        $emp_info .= '<td><a href="emp_delete.php?emp_no='.$row2['emp_no'].'">delete</a></td>';
        $emp_info .= '</tr>';
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> 직원 관리 시스템 </title>
</head>

<body>
    <h2><a href="index.php">직원 관리 시스템</a> | 수정 사항 확인</h2>
    <br><br>
    <table border="1">
        <tr>
            <th>emp_no</th>
            <th>birth_date</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>gender</th>
            <th>hire_date</th>
            <th>update</th>
            <th>delete</th>
        </tr>
        <?=$emp_info?>
    </table>

</body>

</html>
