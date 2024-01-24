<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Uplon</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Data Tables</li>
                    </ol>
                </div>
                <h4 class="page-title">Data Tables</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title">Buttons example</h4>
                <p class="sub-header">
                    The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                </p>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Menu</th>
                            <th>Controlador</th>
                            <th>Función</th>
                            <th>Orden</th>
                            <th>Icono</th>
                            <th>Última modif.</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($menus as $item) : ?>
                            <tr class="align-middle">
                                <td><?= str_pad($item->id, 5, '0', STR_PAD_LEFT); ?></td>
                                <td><?= $item->menu ?></td>
                                <td><?= $item->controller ?></td>
                                <td class="text-center"><?= $item->action ?></td>
                                <td><?= $item->orden ?></td>
                                <td class="text-center"><?= $item->icono ?></td>
                                <td><?= $item->updated_at ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <?php
                                        if ($item->lock == 1) {
                                        } else {
                                            if ($item->status) {
                                                echo form_open('admincontroller/enviaPassword');
                                                echo '<input type="hidden" id="id" name="id" value="' . $item->id . '">';
                                                echo '<button type="submit" name="submit" class="btn btn-outline-info btn-sm display-inline" data-toggle="tooltip" data-placement="bottom" title="Enviar contraseña"><i class="fa fa-envelope" style="color:red"></i></button>';
                                                echo form_close();
                                                echo "&nbsp;";

                                                echo form_open('admincontroller/desactivaDocente');
                                                echo '<input type="hidden" id="id" name="id" value="' . $item->id . '">';
                                                echo '<button type="submit" name="submit" class="btn btn-outline-danger btn-sm display-inline" data-toggle="tooltip" data-placement="bottom" title="Desactivar"><i class="fa fa-eye-slash"></i></button>';
                                                echo form_close();
                                            } else {
                                                //echo '<a class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Activar" href="<?= $item->id>"><i class="fa fa fa-eye"></i></a>';
                                                echo form_open('admincontroller/activaDocente');
                                                echo '<input type="hidden" id="id" name="id" value="' . $item->id . '">';
                                                echo '<button type="submit" name="submit" class="btn btn-outline-primary btn-sm display-inline" data-toggle="tooltip" data-placement="bottom" title="Activar"><i class="fa fa-eye"></i></button>';
                                                echo form_close();
                                            }
                                            echo '&nbsp;&nbsp;';
                                            echo '<a class="btn btn-outline-warning btn-sm" data-toggle="tooltip" data-placement="bottom" title="Editar" href="' . base_url('/admin/users/show/' . $item->id) . '"><i class="fa fa-edit"></i></a>';
                                        }
                                        ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end row -->



</div> <!-- end container-fluid -->