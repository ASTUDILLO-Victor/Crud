<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/validar.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/bootstrap.bundle.js"></script>



    <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet" /> <!-- llamar archivos -->
    <script src="js/jquery.dataTables.min.js"> </script>
    <script src="js/dataTables.bootstrap4.min.js"> </script>
    <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css
" rel="stylesheet">

    <style>
        /* Estilo personalizado para centrar el card */
        .center-card {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60vh;
            /* Ajustar la altura al 100% del viewport */
        }
    </style>

</head>

<body>
<?php
    // Mostrar la alerta si está presente en la sesión
    if (isset($_SESSION['alert'])) {
        echo $_SESSION['alert'];
        // Eliminar la alerta de la sesión para que no se muestre nuevamente
        unset($_SESSION['alert']);
    }
    ?>
    <section>
        <div class="row">
            <div class="center-card">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header bg-dark text-center">
                            <h1 class="text-white"><strong>Formulario con POO</strong></h1>
                        </div>
                        <div class="card-body">
                            <form id="miFormulario" method="post" action="php/php.php">
                                <div class="mb-3">
                                    <label for="" class="form-label">cedula</label>
                                    <input onkeypress="return SoloNumeros(event)" type="text" class="form-control"
                                        id="cedu" name="cedu" required>
                                    <div id="emailHelp" class="form-text">We'll never share your cedula with anyone
                                        else.
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Nombre</label>
                                    <input onkeypress="return SoloLetras(event);" type="text" class="form-control"
                                        id="nom" name="nom" required />
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Apellido</label>
                                    <input onkeypress="return SoloLetras(event);" type="text" class="form-control"
                                        id="ape" name="ape" required />
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <button id="submitButton" type="submit" class="btn btn-primary" disabled><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-send-arrow-up-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M15.854.146a.5.5 0 0 1 .11.54L13.026 8.03A4.5 4.5 0 0 0 8 12.5c0 .5 0 1.5-.773.36l-1.59-2.498L.644 7.184l-.002-.001-.41-.261a.5.5 0 0 1 .083-.886l.452-.18.001-.001L15.314.035a.5.5 0 0 1 .54.111M6.637 10.07l7.494-7.494.471-1.178-1.178.471L5.93 9.363l.338.215a.5.5 0 0 1 .154.154z" />
                                        <path fill-rule="evenodd"
                                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-5.354a.5.5 0 0 0-.722.016l-1.149 1.25a.5.5 0 1 0 .737.676l.28-.305V14a.5.5 0 0 0 1 0v-1.793l.396.397a.5.5 0 0 0 .708-.708z" />
                                    </svg> &nbsp; <strong>ENVIAR</strong></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <center>
                            <div class="col-md-8">
                                <table border=1 class="table table-striped table-bordered table-hover" id="tablita">
                                    <thead class="bg-dark text-white text-center">
                                        <th>cedula</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Actualizar</th>
                                        <th>Eliminar</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include "models/mostrar.php";
                                        ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- modal -->
    <div id="mimodal" class="modal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">EDITAR REGISTROS</div>
                </div>
                <div class="modal-body">
                    <form id="formix" method="post" action="models/Actualizar.php">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-9">
                                    <input type="hidden" id="Ecedu" name="Ecedu" onchange="obtenernombredelinput();"
                                    onkeypress="return SoloNumeros(event)" maxlength="10"
                                        placeholder=""
                                        class="form-control border-success text-uppercase" >
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3 text-right">
                                    <label>Nombre :</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" onkeypress="return SoloLetras(event);" class="form-control" id="Enom" name="Enom" />
                                </div>
                            </div> <br>
                            <div class="row">
                                <div class="col-md-3 text-right">
                                    <label>Apellido:</label>
                                </div>
                                <div class="col-md-9">
                                    <input onkeypress="return SoloLetras(event);" type="text" id="Eape" name="Eape"  class="form-control" />
                                </div>
                            </div>
                            
                        </div><br>
                        <div class="row text-center">
                        
                            <div class="col-md-4"><button type="reset" class="btn btn-dark">LIMPIAR CAMPOS</button>
                            </div>
                            <div class="col-md-4"><input class="btn btn-danger" type="submit"
                                    value="Enviar formulario" /></div>
                                    
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="cerrarModal()" class="btn btn-danger">CERRAR</button>
                </div>
            </div>
        </div>


    </div>
</body>

</html>
<script>
    
</script>