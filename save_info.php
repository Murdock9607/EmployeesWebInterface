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
        header("location: index.php");
    }
    if(isset($_POST['save_dept'])){
        $dept_no = $_POST['dept_no'];
        $dept_name = $_POST['dept_name'];
        $query = 'INSERT INTO departments (dept_no, dept_name) 
        VALUES (\''.$dept_no.'\', \''.$dept_name.'\')';
        $result = mysqli_query($conn, $query);
        if(!$result){
            die ($query);
        }
        header("location: departments.php");
    }
    if(isset($_POST['save_salary'])){
        $emp_no = $_POST['emp_no'];
        $salary = $_POST['salary'];
        $from_date = $_POST['from_date'];
        $to_date = $_POST['to_date'];
        $query = 'INSERT INTO salaries (emp_no, salary, from_date, to_date) 
        VALUES (\''.$emp_no.'\', \''.$salary.'\', \''.$from_date.'\', \''.$to_date.'\')';
        $result = mysqli_query($conn, $query);
        if(!$result){
            die ($query);
        }
        header("location: salaries.php");
    }
    $_SESSION['message']="información guardada";
    $_SESSION['message_type']='success';

?>