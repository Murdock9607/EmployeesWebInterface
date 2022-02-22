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
                    <!--Genero
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Genero</label>
                        <select class="form-select" name = "gender">
                            <option selected></option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>-->
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
    </div>
</div>
<?php include("includes\hooter.php") ?>