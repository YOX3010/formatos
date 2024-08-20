<div class="content-wrapper">



  <section class="content-header">



    <h1>



      Administrar clientes



    </h1>



    <ol class="breadcrumb">



      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>



      <li class="active">Administrar clientes</li>



    </ol>



  </section>



  <section class="content">



    <div class="box">



      <div class="box-header with-border">



        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">



          Agregar Cliente



        </button>


        <a href="inicio">

          <button class="btn btn-success">

            <i class="fa-regular fa-circle-left"></i>

          </button>

        </a>


      </div>



      <div class="box-body">



        <table class="table table-bordered table-striped dt-responsive tablas tablaClientes" width="100%">



          <thead>



            <tr>

              <th style="width:10px">#</th>
              <th>Cosignatario</th>
              <th>Firmante</th>
              <th>Posición</th>
              <th>Email</th>
              <th>Dirección</th>
              <th>Teléfono</th>
              <th>Fecha de registro</th>
              <th>Acciones</th>

            </tr>



          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

            foreach ($clientes as $key => $value) {

              echo ' <tr>

              <td>' . ($key + 1) . '</td>

              <td>' . $value["cosignee"] . '</td>

              <td>' . $value["signatory"] . '</td>

              <td>' . $value["position"] . '</td>

              <td>' . $value["email"] . '</td>

              <td>' . $value["direccion"] . '</td>  
              
              <td>' . $value["telefono"] . '</td>

              <td>' . $value["fecha"] . '</td>

              <td>

                <div class="btn-group">
                
                <button class="btn btn-info btnInfoCliente" data-toggle="modal" data-target="#modalInfoCliente" idCliente="' . $value["id"] . '"><i class="fa-solid fa-circle-info"></i></button>';

              if ($_SESSION["perfil"] == "Administrador") {

                echo '<button class="btn btn-warning btnEditarCliente" idCliente="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarCliente"><i class="fa fa-pencil"></i></button>';

                //echo '<button class="btn btn-danger btnEliminarEmpleado" idEmpleado="'.$value["id"].'"><i class="fa fa-times"></i></button>';

              }


              echo '</div>  

        </td>

      </tr>';
            }

            ?>

          </tbody>

        </table>

      </div>



    </div>



  </section>



</div>



<!--=====================================

MODAL AGREGAR CLIENTE

======================================-->



<div id="modalAgregarCliente" class="modal fade" role="dialog">



  <div class="modal-dialog">



    <div class="modal-content">



      <form role="form" method="post" enctype="multipart/form-data">



        <!--=====================================

        CABEZA DEL MODAL

        ======================================-->



        <div class="modal-header" style="background:#3c8dbc; color:white">



          <button type="button" class="close" data-dismiss="modal">&times;</button>



          <h4 class="modal-title">Agregar Cliente</h4>



        </div>



        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group">

              <div class="input-group">

                <h5><b>INFORMACIÓN GENERAL:</b></h5>

              </div>

            </div>

            <!-- ENTRADA COSIGNEE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCosignee" placeholder="Ingresar Nombre del Cosignatario" required>

                <input type="hidden" name="nuevoClientes" id="nuevoClientes" required>

              </div>

              <small>Este campo es requerido (*)</small>

            </div>

            <!-- ENTRADA PARA EL SIGNATORY -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoSignatory" placeholder="Ingresar Firmante">

              </div>

            </div>

            <!-- ENTRADA PARA POSICION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-briefcase"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPosition" placeholder="Ingresar Posición">

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email">

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección">

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono">

              </div>

            </div>

            <!-- ENTRADA PARA EL CRN-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hashtag"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCRN" placeholder="Ingresar Company Registration Number (CRN)">

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <h5><b>INFORMACIÓN BANCARÍA:</b></h5>

              </div>

            </div>

            <!-- ENTRADA PARA EL BANK NAME -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-columns"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoBankName" placeholder="Ingresar Nombre del banco">

              </div>

            </div>

            <!-- ENTRADA PARA EL BANK ADDRESS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-map-location"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoBankAddress" placeholder="Ingresar Dirección del Banco">

              </div>

            </div>

            <!-- ENTRADA PARA EL SWIFT -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hashtag"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoSwift" placeholder="Ingresar Swift">

              </div>

            </div>

            <!-- ENTRADA PARA EL NOMBRE DEL OFICIAL DEL BANCO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-user-tie"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoOfficerName" placeholder="Nombre del oficial del banco" require>

              </div>

            </div>

            <!-- ENTRADA PARA EL POSITION DEL OFICIAL DEL BANCO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-briefcase"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoOfficerPosition" placeholder="Posición del oficial del banco" require>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELEFONO DEL OFICIAL DEL BANCO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-square-phone"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoOfficerPhone" placeholder="Ingresar Teléfono del oficial del banco" require>

              </div>

            </div>

            <!-- ENTRADA PARA EL E-MAIL DEL OFICIAL DEL BANCO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-regular fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="nuevoOfficerEmail" placeholder="Ingresar E-mail del oficial del banco" require>

              </div>

            </div>

            <!-- ENTRADA PARA ACCOUNT NUMBER -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-id-card"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoAccountNumber" placeholder="Ingresar Número de Cuenta">

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <h5><b>INFORMACIÓN DE LOCACIÓN:</b></h5>

              </div>

            </div>

            <!-- ENTRADA PARA COUNTRY -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-flag-usa"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCountry" placeholder="Ingresar País de origen">

              </div>

            </div>

            <!-- ENTRADA PARA PASSPORT NUMBER -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPassportNumber" placeholder="Ingresar Número del pasaporte">

              </div>

            </div>

            <!-- ENTRADA PARA PASSPORT ISSUE DATE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPassportIssueDate" placeholder="Ingresar Fecha de emición del pasaporte">

              </div>

            </div>

            <!-- ENTRADA PARA EL PASSPORT EXPIRATION DATE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPassportExpirationDate" placeholder="Ingresar Fecha de vencimiendo del passaporte">

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

            <div class="form-group">

              <div class="panel">SUBIR FOTO DEL PASAPORTE</div>

              <input type="file" class="nuevaImagen" name="nuevaImagen" accept="image/*">

              <p class="help-block">Peso máximo de la foto 2MB. Subir en formato de imagen PNG o JPG</p>

              <img src="vistas/img/clientes/default/cliente.png" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Cliente</button>

        </div>

        <?php

        $crearCliente = new ControladorClientes();
        $crearCliente->ctrCrearCliente();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

<div id="modalEditarCliente" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group">

              <div class="input-group">

                <h5><b>INFORMACIÓN GENERAL:</b></h5>

              </div>

            </div>

            <!-- ENTRADA PARA EDITAR COSIGNEE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarCosignee" id="editarCosignee" placeholder="Cosignatario" required>

                <input type="hidden" name="idCliente" id="idCliente" required>

                <input type="hidden" name="editarClientes" id="editarClientes" required>

              </div>

            </div>

            <!-- ENTRADA PARA SIGNATORY-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarSignatory" id="editarSignatory" placeholder="Firmante">

              </div>

            </div>

            <!-- ENTRADA PARA POSICIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-briefcase"></i></span>

                <input type="text" class="form-control input-lg" name="editarPosition" id="editarPosition" placeholder="Posición">

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" placeholder="Correo electrónico">

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion" placeholder="Dirección">

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" placeholder="Teléfono">

              </div>

            </div>

            <!-- ENTRADA PARA CRN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hashtag"></i></span>

                <input type="text" class="form-control input-lg" name="editarCRN" id="editarCRN" placeholder="CRN">

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <h5><b>INFORMACIÓN BANCARÍA:</b></h5>

              </div>

            </div>

            <!-- ENTRADA PARA BANK NAME -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-columns"></i></span>

                <input type="text" class="form-control input-lg" name="editarBankName" id="editarBankName" placeholder="Nombre del Banco">

              </div>

            </div>

            <!-- ENTRADA PARA BANK ADDRESS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-map-location"></i></span>

                <input type="text" class="form-control input-lg" name="editarBankAddress" id="editarBankAddress" placeholder="Dirección del Banco">

              </div>

            </div>

            <!-- ENTRADA PARA SWIFT -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hashtag"></i></span>

                <input type="text" class="form-control input-lg" name="editarSwift" id="editarSwift" placeholder="Swift">

              </div>

            </div>

            <!-- ENTRADA PARA NOMBRE DEL OFICIAL DEL BANCO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-user-tie"></i></span>

                <input type="text" class="form-control input-lg" name="editarOfficerName" id="editarOfficerName" placeholder="Nombre del Oficial">

              </div>

            </div>

            <!-- ENTRADA PARA POSITION DEL OFICIAL DEL BANCO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-briefcase"></i></span>

                <input type="text" class="form-control input-lg" name="editarOfficerPosition" id="editarOfficerPosition" placeholder="Posición del Oficial">

              </div>

            </div>

            <!-- ENTRADA PARA TELEFONO DEL OFICIAL DEL BANCO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-square-phone"></i></span>

                <input type="text" class="form-control input-lg" name="editarOfficerPhone" id="editarOfficerPhone" placeholder="Teléfono del Oficial">

              </div>

            </div>

            <!-- ENTRADA PARA E-MAIL DEL OFICIAL DEL BANCO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-regular fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="editarOfficerEmail" id="editarOfficerEmail" placeholder="Correo electrónico del Oficial">

              </div>

            </div>

            <!-- ENTRADA PARA ACCOUNT NUMBER -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-id-card"></i></span>

                <input type="text" class="form-control input-lg" name="editarAccountNumber" id="editarAccountNumber" placeholder="Número de cuenta">

              </div>

            </div>

            <div class="form-group">

              <div class="input-group">

                <h5><b>INFORMACIÓN DE LOCACIÓN:</b></h5>

              </div>

            </div>

            <!-- ENTRADA PARA COUNTRY -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-flag-usa"></i></span>

                <input type="text" class="form-control input-lg" name="editarCountry" id="editarCountry" placeholder="País">

              </div>

            </div>

            <!-- ENTRADA PARA PASSPORT NUMBER -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i></span>

                <input type="text" class="form-control input-lg" name="editarPassportNumber" id="editarPassportNumber" placeholder="Número de pasaporte">

              </div>

            </div>

            <!-- ENTRADA PARA PASSPORT ISSUE DATE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i></span>

                <input type="text" class="form-control input-lg" name="editarPassportIssueDate" id="editarPassportIssueDate" placeholder="Fecha de emisión">

              </div>

            </div>

            <!-- ENTRADA PARA PASSPORT EXPIRATION DATE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i></span>

                <input type="text" class="form-control input-lg" name="editarPassportExpirationDate" id="editarPassportExpirationDate" placeholder="Fecha de expiración">

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

            <div class="form-group">

              <div class="panel">SUBIR FOTO DEL PASAPORTE</div>

              <input type="file" class="nuevaImagen" name="editarImagen" accept="image/*">

              <p class="help-block">Peso máximo de la foto 2MB. Subir en formato de imagen PNG o JPG</p>

              <img src="vistas/img/clientes/default/cliente.png" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="imagenActual" id="imagenActual">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

        <?php

        $editarCliente = new ControladorClientes();
        $editarCliente->ctrEditarCliente();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL INFORMACIÓN DEL CLIENTE
======================================-->

<div id="modalInfoCliente" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Información del Cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL COSIGNEE -->

            <div class="form-group">

              <label for="infoCosignee">Cosignatario</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-industry"></i></span>

                <input type="text" class="form-control input-lg" name="infoCosignee" id="infoCosignee" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA SIGNATORY-->

            <div class="form-group">

              <label for="infoSignatory">Firmante</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-user"></i></span>

                <input type="text" class="form-control input-lg" name="infoSignatory" id="infoSignatory" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA POSICIÓN -->

            <div class="form-group">

              <label for="infoPosition">Posición</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-briefcase"></i></span>

                <input type="text" class="form-control input-lg" name="infoPosition" id="infoPosition" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <label for="infoEmail">Email</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="infoEmail" id="infoEmail" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <label for="infoDireccion">Dirección</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="infoDireccion" id="infoDireccion" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->

            <div class="form-group">

              <label for="infoTelefono">Teléfono</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" name="infoTelefono" id="infoTelefono" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA CRN -->

            <div class="form-group">

              <label for="infoCRN">CRN</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hashtag"></i></span>

                <input type="text" class="form-control input-lg" name="infoCRN" id="infoCRN" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA BANK NAME -->

            <div class="form-group">

              <label for="infoBankName">Nombre del Banco</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-building-columns"></i></span>

                <input type="text" class="form-control input-lg" name="infoBankName" id="infoBankName" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA BANK ADDRESS -->

            <div class="form-group">

              <label for="infoBankAddress">Dirección del Banco</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-map-location"></i></span>

                <input type="text" class="form-control input-lg" name="infoBankAddress" id="infoBankAddress" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA SWIFT -->

            <div class="form-group">

              <label for="infoSwift">Código Swift</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-hashtag"></i></span>

                <input type="text" class="form-control input-lg" name="infoSwift" id="infoSwift" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA NOMBRE DEL OFICIAL DEL BANCO -->

            <div class="form-group">

              <label for="infoOfficerName">Nombre del oficial del banco</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-user-tie"></i></span>

                <input type="text" class="form-control input-lg" name="infoOfficerName" id="infoOfficerName" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA POSITION DEL OFICIAL DEL BANCO -->

            <div class="form-group">

              <label for="infoOfficerPosition">Posición del oficial del banco</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-briefcase"></i></span>

                <input type="text" class="form-control input-lg" name="infoOfficerPosition" id="infoOfficerPosition" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA TELEFONO DEL OFICIAL DEL BANCO -->

            <div class="form-group">

              <label for="infoOfficerPhone">Teléfono del oficial del banco</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-square-phone"></i></span>

                <input type="text" class="form-control input-lg" name="infoOfficerPhone" id="infoOfficerPhone" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA E-MAIL DEL OFICIAL DEL BANCO -->

            <div class="form-group">

              <label for="infoOfficerEmail">Email del oficial del banco</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-regular fa-envelope"></i></span>

                <input type="text" class="form-control input-lg" name="infoOfficerEmail" id="infoOfficerEmail" readonly>

              </div>

            </div>


            <!-- ENTRADA PARA ACCOUNT NUMBER -->

            <div class="form-group">

              <label for="infoAccountNumber">Número de Cuenta</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-id-card"></i></span>

                <input type="text" class="form-control input-lg" name="infoAccountNumber" id="infoAccountNumber" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA COUNTRY -->

            <div class="form-group">

              <label for="infoCountr">País de origen</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-flag-usa"></i></span>

                <input type="text" class="form-control input-lg" name="infoCountry" id="infoCountry" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA PASSPORT NUMBER -->

            <div class="form-group">

              <label for="infopassportNumber">Número del Pasaporte</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i></span>

                <input type="text" class="form-control input-lg" name="infoPassportNumber" id="infoPassportNumber" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA PASSPORT ISSUE DATE -->

            <div class="form-group">

              <label for="infoPassportIssueDate">Fecha de emición del Pasaporte</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i></span>

                <input type="text" class="form-control input-lg" name="infoPassportIssueDate" id="infoPassportIssueDate" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA PASSPORT EXPIRATION DATE -->

            <div class="form-group">

              <label for="infoPassportExpirationDate">Fecha de Vencimiento del Pasaporte</label>

              <div class="input-group">

                <span class="input-group-addon"><i class="fa-solid fa-passport"></i></span>

                <input type="text" class="form-control input-lg" name="infoPassportExpirationDate" id="infoPassportExpirationDate" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

            <div class="form-group">

              <img src="vistas/img/clientes/default/cliente.png" class="img-thumbnail previsualizar" width="200px">

              <input type="hidden" name="imagenActual" id="imagenActual">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        </div>

      </form>

    </div>

  </div>

</div>