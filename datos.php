<?php

    include 'db/conexion.php';

    $query = mysqli_query($conexion,"SELECT * FROM usuarios");
    $query2 = mysqli_query($conexion,"SELECT cedula FROM usuarios");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/style_datos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Datos</title>
</head>

<body>
    <a href="index.html#section-respuestas">
        <img class="home" src="img/hogar.png" alt="">
    </a>

    <div class="wrapper">
        <div class="container">
            <div class="filter">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="show-row">
                            <select class="form-control">
                                <option value="5" selected="selected">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <div class="search-row">
                            <input type="text" name="search" class="form-control" placeholder="Enter your keyword">
                        </div>
                    </div>
                </div>
            </div>
            <table id="music" class="table table-responsive table-hover">
                <thead>
                    <tr class="myHead">
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cédula</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
            
            while ($datos = mysqli_fetch_array($query)) {
                $id = $datos['id'];
                $nombre = $datos['nombre'];
                $apellido = $datos['apellido'];
                $cedula = $datos['cedula'];

                echo'
                <tr data-url="FQS7i2z1CoA">
                    <td>'.$id.'</td>
                    <td>'.$nombre.'</td>
                    <td>'.$apellido.'</td>
                    <td>'.$cedula.'</td>
                </tr>
                ';
            }

            ?>




                </tbody>
            </table>
            <div class="text-center controller">
                <ul class="pagination"></ul>
                <ul class="pager">
                    <li><a href="javascript:void(0)" class="prev">Previous</a></li>
                    <li><a href="javascript:void(0)" class="next">Next</a></li>
                </ul>
            </div>

        </div>

    </div>

    <div class="formul_container" style="padding-left: 80px; padding-right: 100px;">
        <h2>Formulario para agregar usuarios</h2><br>
        <form action="back/almacenar_datos.php" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="nombre"
                    placeholder="Digite el nombre">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Apellido</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="apellido"
                    placeholder="Digite el apellido">
            </div>
            <div class="form-group">
                <label for="exampleInputNumber">Cedula</label>
                <input type="number" class="form-control" id="exampleInputNumber" name="cedula"
                    placeholder="Digite la cedula">
            </div>
            <input type="submit" class="btn btn-default" name="almacenar" value="guardar"></input>
        </form>
    </div>

    <div class="formul_container" style="padding-left: 80px; padding-right: 100px;">
        <h2>Formulario para actualizar usuarios</h2><br>
        <form action="" method="POST">
            <select class="form-control" name="id_consulta">
                <?php
            while ($datos2 = mysqli_fetch_array($query2)) {
                $cedula_query = $datos2['cedula'];
                echo'
                <option value="'.$cedula_query.'">'.$cedula_query.'</option>
                ';
            }
            ?>
            </select><br>
            <input type="submit" class="btn btn-default" name="buscar" value="buscar"></input>
        </form>
    </div>

    </div>

    <?php
        
        if (isset($_POST['buscar'])) {
            $id_cc_query = $_POST['id_consulta'];
            echo '
            <div class="formul_container" style="padding-left: 80px; padding-right: 100px;">
            <h4>Ingrese los nuevos datos para la cedula='.$id_cc_query.'</h4>
            <form action="back/actualizar_datos.php" method="POST">
                <div class="form-group">
                <input type="text" class="form-control" name="nombre_act" placeholder="Digite nuevo nombre">
                <input type="hidden" value="'.$id_cc_query.'" name="cc">
                </div>
                <div class="form-group">
                <input type="text" class="form-control" name="apellido_act" placeholder="Digite nuevo apellido"><br>
                <input type="submit" class="btn btn-default" name="act" value="actualizar">
                </div><br>
            </form>
            </div>
            ';
        }

        ?>



    <script src="js/script.js"></script>
    <script type="text/javascript">
    function upperCase() {
        var x = document.getElementById("fname").value
        document.getElementById("fname").value = x.toUpperCase()
    }
    </script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
</body>

</html>