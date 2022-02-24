<?php include ("conexion_db.php") ?>
<?php include("includes\header.php") ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-5">
            <!--buttons card-->
            <div class="card card-body">
                <div class="btn-group">
                    <a href="index.php" class="btn btn-primary" >Employees</a>
                    <a href="Departments.php" class="btn btn-primary">Departments</a>
                    <a href="salaries.php" class="btn btn-primary active" aria-current="page">Salaries</a>
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
                    <!--salario-->
                    <div class="form group">
                        <input type="int" name="salary" class="form-control" 
                        placeholder="Salario" autofocus>
                    </div>
                    <!--Inicio de contrato-->
                    <div class="form group">
                        <p>inicio del contrato: </p>
                        <input type="date" name="from_date" class="form-control">
                    </div>
                    <div class="form group">
                        <p>finalización del contrato: </p>
                        <input type="date" name="to_date" class="form-control">
                    </div>
                    <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-outline-primary btn-block"
                        name="save_salary" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
        <!--Datos mostrados-->
        <div class="col-md-7">
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Emp no</th>
                            <th>Salary</th>
                            <th>from date</th>
                            <th>to date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query='SELECT * FROM salaries WHERE emp_no > 499950 ORDER BY emp_no DESC' ;
                            $result_employee = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($result_employee)){ ?>
                                <tr>
                                    <td><?php echo $row['emp_no'] ?></td>
                                    <td><?php echo $row['salary'] ?></td>
                                    <td><?php echo $row['from_date'] ?></td>
                                    <td><?php echo $row['to_date'] ?></td>
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