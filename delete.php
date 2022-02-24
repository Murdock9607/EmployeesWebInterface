<?php
    include("conexion_db.php");

    if(isset($_GET['emp_no'])){
        $emp_no = $_GET['emp_no'];
        $query = "DELETE FROM employees WHERE emp_no = $emp_no";
        $result = mysqli_query($conn, $query);
        if(!$result)
        {
            die("failed");
        }
        $_SESSION['message'] = 'empleado eliminado';
        $_SESSION['message_type'] = 'danger';
        header("Location: index.php");
    }
    if(isset($_GET['dept_no'])){
        $dept_no = $_GET['dept_no'];
        $query = "DELETE FROM departments WHERE dept_no = '$dept_no'";
        $result = mysqli_query($conn, $query);
        if(!$result)
        {
            echo $query;
        }

        $_SESSION['message'] = 'Departamento eliminado';
        $_SESSION['message_type'] = 'danger';
        header("Location: departments.php");
    }
    if(isset($_GET['emp_no'])){
        $emp_no = $_GET['emp_no'];
        $query = "DELETE FROM salaries WHERE emp_no = '$emp_no'";
        echo $query;
        $result = mysqli_query($conn, $query);
        if(!$result)
        {
            echo $query;
        }

        $_SESSION['message'] = 'Salario eliminado';
        $_SESSION['message_type'] = 'danger';
        header("Location: salaries.php");
    }
    
?>