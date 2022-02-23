<?php
    include("conexion_db.php");
    if(isset($_GET['emp_no'])){
        $emp_no = $_GET['emp_no'];
        $query="SELECT * FROM employees WHERE emp_no = $emp_no";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1){
            $row=mysqli_fetch_array($result);
            $birth_date=$row['birth_date'];
            $first_name=$row['first_name'];
            $last_name=$row['last_name'];
            $gender=$row['gender'];
            $hire_date=$row['hire_date'];

        }
    }
    if (isset($_POST['update'])){
        $emp_no = $_GET['emp_no'];
        $birth_date=$_POST['birth_date'];
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $gender=$_POST['gender'];
        $hire_date=$_POST['hire_date'];
        $query = "UPDATE employees SET emp_no = '$emp_no', birth_date = '$birth_date',
        first_name = '$first_name', last_name = '$last_name', gender = '$gender', hire_date = '$hire_date'
        WHERE emp_no = $emp_no";
        mysqli_query($conn, $query);
        $_SESSION['message']='Datos actualizados';
        $_SESSION['message_type']='success';
        header("Location:index.php");
    }
?>
<?php include("includes\header.php") ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?emp_no=<?php echo $_GET['emp_no']?>"method="POST">
                    <!--numero del empleado-->
                    <div class="form group">
                        <input type="int" name="emp_no" value = "<?php echo $emp_no?>" 
                        class="form-control" 
                        placeholder="Número del empleado" autofocus>
                    </div>
                    <!--Fecha de nacimiento-->
                    <div class="form group">
                        <p>fecha de nacimiento: </p>
                        <input type="date" name="birth_date" value = "<?php echo $birth_date?>" 
                        class="form-control">
                    </div>
                    <!--Nombre y apellido-->
                    <div class="input-group">
                        <input type="text" aria-label="first name" name = "first_name" 
                        value = "<?php echo $first_name?>" class="form-control"
                        placeholder = "Nombre">
                        <input type="text" aria-label="Last name" name = "last_name"
                        value = "<?php echo $last_name?>" class="form-control"
                        placeholder = "Apellido">
                    </div>
                    <!--Genero-->
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Genero</label>
                        <select class="form-select" name = "gender" value = "<?php echo $gender?>">
                            <option selected></option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <!--Fecha de contratación-->
                    <div class="form group">
                        <p>fecha de contratación: </p>
                        <input type="date" name="hire_date" value = "<?php echo $hire_date?>"class="form-control">
                    </div>
                    <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-outline-secondary btn-block"
                    name="update" value="Actualizar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("includes\hooter.php") ?>