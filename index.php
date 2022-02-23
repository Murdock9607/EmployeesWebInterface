<?php include ("conexion_db.php") ?>
<?php include("includes\header.php") ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-5">
            <!--buttons card-->
            <div class="card card-body">
                <div class="btn-group">
                    <a href="#" class="btn btn-primary active" aria-current="page">Employees</a>
                    <a href="#" class="btn btn-primary">Departments</a>
                    <a href="#" class="btn btn-primary">Salaries</a>
                </div>
            </div>
            <?php if(isset($_SESSION['message'])){?>
                <div class="alert alert-<?=$_SESSION['message_type'] ?> alert-dimissible fade show" 
                role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            <?php } session_unset(); ?> 
            <!--info card-->
            <div class="card card-body">
                <form action="save_info.php" method="POST">
                    <!--numero del empleado-->
                    <div class="form group">
                        <input type="int" name="emp_no" class="form-control" 
                        placeholder="Número del empleado" autofocus>
                    </div>
                    <!--Fecha de nacimiento-->
                    <div class="form group">
                        <p>fecha de nacimiento: </p>
                        <input type="date" name="birth_date" class="form-control">
                    </div>
                    <!--Nombre y apellido-->
                    <div class="input-group">
                        <input type="text" aria-label="first name" name = "first_name" class="form-control"
                        placeholder = "Nombre">
                        <input type="text" aria-label="Last name" name = "last_name" class="form-control"
                        placeholder = "Apellido">
                    </div>
                    <!--Genero-->
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Genero</label>
                        <select class="form-select" name = "gender">
                            <option selected></option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <!--Fecha de contratación-->
                    <div class="form group">
                        <p>fecha de contratación: </p>
                        <input type="date" name="hire_date" class="form-control">
                    </div>
                    <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-outline-primary btn-block"
                    name="save_info" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-7">
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Emp no</th>
                            <th>Birth date</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Gender</th>
                            <th>Hire date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query='SELECT * FROM employees WHERE emp_no > 499950';
                            $result_employee = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($result_employee)){ ?>
                                <tr>
                                    <td><?php echo $row['emp_no'] ?></td>
                                    <td><?php echo $row['birth_date'] ?></td>
                                    <td><?php echo $row['first_name'] ?></td>
                                    <td><?php echo $row['last_name'] ?></td>
                                    <td><?php echo $row['gender'] ?></td>
                                    <td><?php echo $row['hire_date'] ?></td>
                                    <td>
                                        <a href="edit.php?emp_no=<?php echo $row['emp_no']?>"
                                        class = "btn btn-outline-primary">
                                            <i class = "fas fa-marker"></i>
                                        </a>
                                        <a href="delete.php?emp_no=<?php echo $row['emp_no']?>"
                                        class = "btn btn-outline-danger">
                                        <i class = "fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php } ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>
<?php include("includes\hooter.php") ?>

   
