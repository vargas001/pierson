<?php include_once "includes/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <?php
                include "../conexion.php";
                $query = mysqli_query($conexion, "SELECT * FROM cliente");
                mysqli_close($conexion);
                $resultado = mysqli_num_rows($query);
                if ($resultado > 0) {
                    $data = mysqli_fetch_array($query);
                }
                ?>
                <h4 class="text-center">VALUACI&Oacute;N</h4>
                <?php
                            if(isset($_SESSION['success'])){
                                ?>
                                <div class="alert alert-success fade in">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong>¡CORRECTO!</strong> <?php echo $_SESSION['success']; ?>
                                </div>
                                <?php
                            }
                            unset($_SESSION['success']);
                            if(isset($_SESSION['error'])){
                                ?>
                                <div class="alert alert-danger fade in">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong>¡ERROR!</strong> <?php echo $_SESSION['error']; ?>
                                </div>
                                <?php
                            }
                            unset($_SESSION['error']);
                            ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label><i class="fas fa-user"></i> USUARIO</label>
                            <p style="font-size: 16px; text-transform: uppercase; color: blue;"><?php echo $_SESSION['nombre']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center">Datos del Contacto y Unidad</h4>
                    <form action="orden_servicio.php" method="post" name="form_new_os" id="form_new_os" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name="nom_cliente" id="nom_cliente" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Número</label>
                                    <input type="number" name="tel_cliente" id="tel_cliente" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Correo</label>
                                    <input type="text" name="cor_cliente" id="cor_cliente" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Seguro/Particular</label>
                                    <select name="seg_part" class="form-control" required>
                                        <option value="Qualitas">Qu&aacute;litas</option>
                                        <option value="Banorte">Banorte</option>
                                        <option value="Afirme">Afirme</option>
                                        <option value="General de Seguros">General de Seguros</option>
                                        <option value="Map-Fre">Map-Fre</option>
                                        <option value="ADI">ADI</option>
                                        <option value="Inbursa">Inbursa</option>
                                        <option value="SURA">SURA</option>
                                        <option value="Particular">Particular</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Orden de Servicio</label>
                                    <input type="text" name="OS" id="OS" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Daños del Siniestro</label><br>
                                    <a href="#" class="btn btn-primary btn_new_os"><i class="fas fa-car-crash"></i> &Aacute;reas Dañadas</a>
                                </div>
                            </div>
                            <table style="width:100%">
                              <tr>
                                <th>
                                    <div class="form-group" id="div_registro_areas" style="display: none;">
                                        <input type="checkbox" id="checkbox" value="defensa" name="checkbox[]"> <label for="defensa">DEFENSA</label><br>
                                        <input type="checkbox" id="checkbox" value="cofre" name="checkbox[]"> <label for="cofre">COFRE</label><br>
                                        <input type="checkbox" id="checkbox" value="cabina" name="checkbox[]"> <label for="cabina">CABINA</label><br>
                                        <input type="checkbox" id="checkbox" value="dormitorio" name="checkbox[]"> <label for="dormitorio">DORMITORIO</label>
                                    </div>
                                </th>
                                <th>
                                    <div class="form-group" id="div_registro_areas2" style="display: none;">
                                        <input type="checkbox" id="checkbox" value="radiador" name="checkbox[]"> <label for="radiador">RADIADOR</label><br>
                                        <input type="checkbox" id="checkbox" value="escape" name="checkbox[]"> <label for="escape">SISTEMA DE ESCAPE</label><br>
                                        <input type="checkbox" id="checkbox" value="tanq_comb" name="checkbox[]"> <label for="tanq_comb">TANQUE DE COMB.</label><br>
                                        <input type="checkbox" id="checkbox" value="va_chasis" name="checkbox[]"> <label for="va_chasis">VARAS CHAS&Iacute;S</label>
                                    </div>
                                </th>
                                <th>
                                    <div class="form-group" id="div_registro_areas3" style="display: none;">
                                        <input type="checkbox" id="checkbox" value="eje_del" name="checkbox[]"> <label for="eje_del">EJES DELANTEROS</label><br>
                                        <input type="checkbox" id="checkbox" value="sus_del" name="checkbox[]"> <label for="sus_del">SUSPENSI&Oacute;N DELANTERA</label><br>
                                        <input type="checkbox" id="checkbox" value="motor" name="checkbox[]"> <label for="motor">MOTOR</label><br>
                                        <input type="checkbox" id="checkbox" value="sis_direc" name="checkbox[]"> <label for="sis_direc">SIST. DE DIRRECC.</label>
                                    </div>
                                </th>
                                <th>
                                    <div class="form-group" id="div_registro_areas4" style="display: none;">
                                        <input type="checkbox" id="checkbox" value="eje_tras" name="checkbox[]"> <label for="eje_tras">EJES TRASEROS</label><br>
                                        <input type="checkbox" id="checkbox" value="sus_tras" name="checkbox[]"> <label for="sus_tras">SUSPENSI&Oacute;N TRASERA</label><br>
                                        <input type="checkbox" id="checkbox" value="deflectores" name="checkbox[]"> <label for="deflectores">DEFLECTORES</label><br>
                                        <input type="checkbox" id="checkbox" value="quin_rued" name="checkbox[]"> <label for="quin_rued">QUINTA RUEDA</label>
                                    </div>
                                </th>
                            </tr>
                        </table>
                        <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Fotos de la Unidad</label><br>
                                    <input type="file" class="btn btn-primary btn_new_fotos" name="imagen[]" id="imagen[]" multiple accept="image/*">
                                </div>
                            </div>
                    </div>
                    <h4 class="text-center"><button type="submit" class="btn btn-primary">Guardar</button></h4>
                </form>
            </div>

        </div>
    </div>
            <!-- <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th width="100px">Código</th>
                            <th>Des.</th>
                            <th>Stock</th>
                            <th width="100px">Cantidad</th>
                            <th class="textright">Precio</th>
                            <th class="textright">Precio Total</th>
                            <th>Acciones</th>
                        </tr>
                        <tr>
                            <td><input type="number" name="txt_cod_producto" id="txt_cod_producto"></td>
                            <td id="txt_descripcion">-</td>
                            <td id="txt_existencia">-</td>
                            <td><input type="text" name="txt_cant_producto" id="txt_cant_producto"value="0" min="1" disabled></td>
                            <td id="txt_precio" class="textright">0.00</td>
                            <td id="txt_precio_total" class="txtright">0.00</td>
                            <td><a href="#" id="add_product_venta" class="btn btn-dark" style="display: none;">Agregar</a></td>
                        </tr>
                        <tr>
                            <th>Código</th>
                            <th colspan="2">Descripción</th>
                            <th>Cantidad</th>
                            <th class="textright">Precio</th>
                            <th class="textright">Precio Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="detalle_venta">
                        Contenido ajax 

                    </tbody>

                    <tfoot id="detalle_totales">
                        Contenido ajax
                    </tfoot>
                </table>
            </div>-->

        </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include_once "includes/footer.php"; ?>
