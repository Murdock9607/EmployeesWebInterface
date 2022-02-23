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
    
?>