<?php 
include ('conexion_db.php');
    if(isset($_POST['save_info'])){
        $emp_no = $_POST['emp_no'];
        $birth_date = $_POST['birth_date'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $hire_date = $_POST['hire_date'];

        $query = 'INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date) 
        VALUES (\''.$emp_no.'\', \''.$birth_date.'\', \''.$first_name.'\', \''.$last_name.'\', 
        \''.$gender.'\', \''.$hire_date.'\')';
        $result = mysqli_query($conn, $query);
        if(!$result){
            die ($query);
        }
        echo 'saved';
    }
    $_SESSION['message']='información guardada';
    $_SESSION['message_type']='success';
    header("location: index.php")

?>