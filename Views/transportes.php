<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transportes</title>
    <link rel="stylesheet" href="../Public/Assets/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Public/Assets/DataTables/datatables.min.css">
    <link rel="stylesheet" href="../Public/Assets/Icons/font-awasome/all.min.css">
</head>

<body>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="../index.php">
                <img src="../Public/Assets/images/logo.png" alt="Logo" width="70" class="d-inline-block">
                <p class="m-0 ms-2 fs-4">Centro de datos</p>
            </a>
        </div>
    </nav>

    <main>
        <form action="../Controllers/seleccionar.php" method="post" class="d-flex mt-2 mb-2" style="width: 360px">
            <select class="form-select me-1" name="tabla" aria-label="Default select example">
                <option selected>Seleccione la tabla que desea ver</option>
                <option value="puestos">Tabla Puestos</option>
                <option value="categoria">Tabla Categoria</option>
                <option value="proveedores">Tabla Proveedores</option>
                <option value="trabajadores">Tabla Trabajadores</option>
                <option value="clientes">Tabla Clientes</option>
                <option value="insumos">Tabla Insumos</option>
                <option value="rutas">Tabla Rutas</option>
                <option value="transportes">Tabla Transportes</option>
                <option value="maquinarias">Tabla Maquinarias</option>
                <option value="productos">Tabla Productos</option>
                <option value="ventas">Tabla Ventas</option>
                <option value="historial">Tabla Historial</option>
            </select>
            <button type="submit" class="btn btn-outline-success">Buscar</button>
        </form>


        <h1>TABLA TRANSPORTES</h1>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Matricula</th>
                    <th>Tipo de transporte</th>
                    <th>Capacidad maxima (Kg)</th>
                    <th>Estado</th>
                    <th>Fecha de adquisicion</th>
                    <th>Ruta asignada</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row): ?>

                    <tr>

                        <td>
                            <?php echo $row["transporte_id"] ?>
                        </td>
                        <td>
                            <?php echo $row["tipo_transporte"] ?>
                        </td>
                        <td>
                            <?php echo $row["capacidad_maxima"] ?>
                        </td>
                        <td>
                            <?php echo $row["estado"] ?>
                        </td>
                        <td>
                            <?php echo $row["fecha_adquisicion"] ?>
                        </td>
                        <td>
                            <?php echo $row["ruta_id"] ?>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="transporte_id" value="<?php echo $row["transporte_id"] ?>">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop<?php echo $row["transporte_id"] ?>" name="edit"><i
                                        class="fa-solid fa-pen-to-square me-1"></i>Editar</button>
                                <button type="submit" class="btn btn-danger" name="delete"><i
                                        class="fa-solid fa-trash me-1"></i>Eliminar</button>
                            </form>

                        </td>
                    </tr>

                    <div class="modal fade" id="staticBackdrop<?php echo $row["transporte_id"] ?>" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar información del
                                            transporte
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="transporte_id"
                                            value="<?php echo $row["transporte_id"] ?>">
                                        <input type="hidden" name="tipo_transporte"
                                            value="<?php echo $row["tipo_transporte"] ?>">
                                        <div class="mb-3">
                                            <label for="capacidad_maxima" class="form-label">capacidad_maxima (Kg):</label>
                                            <input type="number" class="form-control" id="capacidad_maxima"
                                                name="capacidad_maxima" value="<?php echo $row["capacidad_maxima"] ?>"
                                                required>
                                            <label for="estado" class="form-label">Estado:</label>
                                            <input type="text" class="form-control" id="estado" name="estado"
                                                value="<?php echo $row["estado"] ?>" required>
                                            <label for="fecha_adquisicion" class="form-label">Fecha de adquisicion:</label>
                                            <input type="date" class="form-control" id="fecha_adquisicion" name="fecha_adquisicion"
                                                value="<?php echo $row["fecha_adquisicion"] ?>" required>
                                            <label for="ruta_id" class="form-label">Ruta asignada:</label>
                                            <input type="text" class="form-control" id="ruta_id" name="ruta_id"
                                                value="<?php echo $row["ruta_id"] ?>" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" name="edit"><i
                                                class="fa-solid fa-cloud-arrow-up me-1"></i>Guardar
                                            cambios</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                <?php endforeach; ?>
            </tbody>
        </table>

        <form class="mt-3" style="width: 400px" method="post">
            <h3>Agregar ruta</h3>
            <div class="mb-3">
                <label for="transporte_id" class="form-label">Matricula del transporte:</label>
                <input type="text" class="form-control" id="transporte_id" name="transporte_id" required>
                <label for="tipo_transporte" class="form-label">Tipo de transporte:</label>
                <input type="text" class="form-control" id="tipo_transporte" name="tipo_transporte" required>
                <label for="capacidad_maxima" class="form-label">Capacidad maxima (Kg):</label>
                <input type="number" class="form-control" id="capacidad_maxima" name="capacidad_maxima" required>
                <label for="estado" class="form-label">Estado:</label>
                <input type="text" class="form-control" id="estado" name="estado" required>
                <label for="fecha_adquisicion" class="form-label">Fecha de adquisicion:</label>
                <input type="date" class="form-control" id="fecha_adquisicion" name="fecha_adquisicion" required>
                <label for="ruta_id" class="form-label">Ruta:</label>
                <input type="text" class="form-control" id="ruta_id" name="ruta_id" required>
            </div>
            <button type="submit" class="btn btn-primary" name="create"><i class="fa-solid fa-plus me-1"></i>Agregar
                transporte</button>
        </form>



        <?php $connection = null; ?>

    </main>


    <footer>
        <div class="container-fluid bg-secondary sticky-bottom text-center text-white">
            Copyright © 2023 PANADERÍA NUEVA YORK
        </div>
    </footer>

    <script src="../Public/Assets/js/jquery-3.7.0.min.js"></script>
    <script src="../Public/Assets/Bootstrap/js/bootstrap.min.js"></script>
    <script src="../Public/Assets/DataTables/datatables.min.js"></script>
    <script src="../Public/Assets/js/script.js"></script>
</body>

</html>