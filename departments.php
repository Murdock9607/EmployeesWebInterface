<?php include ("conexion_db.php") ?>
<?php include("includes\header.php") ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-5">
        <!--buttons card-->
            <div class="card card-body">
                <div class="btn-group">
                    <a href="index.php" class="btn btn-primary" >Employees</a>
                    <a href="Departments.php" class="btn btn-primary active" aria-current="page">Departments</a>
                    <a href="salaries.php" class="btn btn-primary " aria-current="page">Salaries</a>
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
                    <!--numero del depto-->
                    <div class="form group">
                        <input type="text" name="dept_no" class="form-control" 
                        placeholder="Número del departamento" autofocus>
                    </div>
                    <!--Nombre del depto-->
                    <div class="input-group">
                        <input type="text" aria-label="dept name" name = "dept_name" class="form-control"
                        placeholder = "Nombre del departamento">
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-outline-primary btn-block"
                        name="save_dept" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
        <!--Datos mostrados-->
        <div class="col-md-7">
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>dept no</th>
                            <th>dept name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query='SELECT * FROM departments';
                            $result_employee = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($result_employee)){ ?>
                                <tr>
                                    <td><?php echo $row['dept_no'] ?></td>
                                    <td><?php echo $row['dept_name'] ?></td>
                                    
                                    <td>
                                        <a href="edit.php?dept_no=<?php echo $row['dept_no']?>"
                                        class = "btn btn-outline-primary">
                                            <i class = "fas fa-marker"></i>
                                        </a>
                                        <a href="delete.php?dept_no=<?php echo $row['dept_no']?>"
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