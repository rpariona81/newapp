<!-- Start Content-->
<div class="container-fluid">

	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box">
				<div class="page-title-right">
					<ol class="m-0 breadcrumb">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Uplon</a></li>
						<li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
						<li class="breadcrumb-item active">Data Tables</li>
					</ol>
				</div>
				<h4 class="page-title">Data Tables &nbsp; <?= $this->session->userdata('user_nickname') . ' ' . $this->session->userdata('user_role'); ?></h4>
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
				<div class="p-0 table-responsive">
					<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
						<thead>
							<tr>
								<th>Id</th>
								<th>Usuario</th>
								<th>Rol</th>
								<th>Celular</th>
								<th>Condición</th>
								<th>Email</th>
								<th>Última modif.</th>
								<th>Opciones</th>
							</tr>
						</thead>

						<tbody>
							<?php foreach ($records as $item) : ?>
								<tr class="align-middle">
									<td><?= str_pad($item->id, 5, '0', STR_PAD_LEFT); ?></td>
									<td><?= $item->username ?></td>
									<td><?= $item->rolename ?></td>
									<td class="text-center"><?= $item->mobile ?></td>
									<td><?= $item->userflag ?></td>
									<td class="text-center"><?= $item->email ?></td>
									<td><?= (($item->updated_at) ? $item->updated_at->diffForHumans() : (($item->updated_at_role) ? $item->updated_at_role->diffForHumans() : NULL)) ?></td>
									<td>
										<?php
										if ($item->status) {
											echo '<span class="text-white border badge bg-info">' . $item->flag . '</span>';
										} else {
											echo '<span class="text-white border badge bg-danger">' . $item->flag . '</span>';
										}
										?>
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
													//echo '<a class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Activar" href="<?= $item->id>"><i class="fa fa-eye"></i></a>';
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
	</div>
	<!-- end row -->



</div> <!-- end container-fluid -->


<script>
	$(document).ready(function() {
		//$.noConflict();
		
		/**https://datatables.net/forums/discussion/43723/how-can-i-remove-default-button-class-of-datatable-btn-default */
		$.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-md btn-dark border-0';
		
		/**https://datatables.net/forums/discussion/61263/how-to-add-class-to-paginate-button*/
		/*$.fn.dataTable.ext.classes.sLengthSelect = 'btn btn-flat btn-sm btn-dark border-0';
		$.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {
			className: 'btn btn-md btn-dark border-0'
		})*/

		$('#datatable-buttons').DataTable({
			pageLength: 10,
			order: [],
			//responsive: true,
			//scrollX: true,
			language: {
				url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json",
				paginate: {
					previous: '<i class="fa fa-chevron-right"></i>', // "<<",
					next: '<i class="fa fa-chevron-right"></i>', // ">>",
					first: "<",
					last: ">"
				},
			},
			dom: 'Bfrtip',
			buttons: ['copy', 'pdf',
				{
					extend: 'excelHtml5',
					text: 'Excel',
					customize: function(xlsx) {
						var sheet = xlsx.xl.worksheets['sheet1.xml'];
						//Para ver los estilos de formato https://datatables.net/reference/button/excelHtml5
						$('row c[r^="B"]', sheet).attr('s', '57');
						//Para que la columna se muestre como texto https://datatables.net/forums/discussion/73814/export-to-excel-with-format-text-for-column-b-c-and-d
						$('row c[r^="C"]', sheet).attr('s', '50');
					}
				}
			]
		});
	});
</script>
