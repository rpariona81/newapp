<div class="container-fluid">

	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box">
				<div class="page-title-right">
					<ol class="m-0 breadcrumb">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Uplon</a></li>
						<li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
						<li class="breadcrumb-item active">General Elements</li>
					</ol>
				</div>
				<h4 class="page-title">General Elements</h4>
			</div>
		</div>
	</div>
	<!-- end page title -->

	<div class="row">
		<div class="col-12">
			<div class="card-box">

				<h4 class="mb-4 header-title">Input Types</h4>

				<div class="row">
					<div class="col-xl-6">
						<?= form_open('admin/users/create', array('id' => 'form_add')); ?>

						<div class="form-group">
							<label>Usuario</label>
							<?= form_input(array('type' => 'text', 'name' => 'username', 'id' => 'username', 'maxlength' => '30', 'onkeyup' => 'this.value=this.value.toLowerCase()', 'size' => '100', 'value' => set_value('username'), 'class' => 'form-control')); ?>
						</div>

						<div class="form-group">
							<label>Nombres</label>
							<?= form_input(array('type' => 'text', 'name' => 'display_name', 'id' => 'display_name', 'maxlength' => '30', 'size' => '100', 'value' => set_value('display_name'), 'class' => 'form-control')); ?>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input type="email" class="form-control" value="<?= set_value('email') ?>" name="email" id="email" placeholder="Enter email">
							<small class="text-muted">We'll never share your email with anyone
								else.
							</small>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Telf. celular</label>
							<input type="text" class="form-control" value="<?= set_value('mobile') ?>" name="mobile" id="mobile" placeholder="Enter mobile">
						</div>
						<div class="form-group">
							<label for="clave_create" class="form-label">Clave Actual</label>
							<input type="password" id="clave_create" class="form-control" name="clave_create" placeholder="Contraseña actual" required>
						</div>
						<div class="form-group">
							<label for="clave_rep" class="form-label">Repita Nueva</label>
							<input type="password" id="clave_rep" class="form-control" name="clave_rep" placeholder="Repita nueva contraseña" required>
						</div>
						<div class="form-group">
							<label for="exampleSelect1">Rol</label>
							<?= form_dropdown('role_id', $roles, set_value('role_id'), array('class' => 'form-control input-sm', 'id' => 'role_id')); ?>
						</div>
						<div class="form-group">
							<?php if ($this->session->flashdata('error')) : ?>
								<p class='alert alert-danger'> <?= $this->session->flashdata('error') ?> </p>
							<?php endif ?>
							<?php if ($this->session->flashdata('message')) : ?>
								<p class='alert alert-success'> <?= $this->session->flashdata('message') ?> </p>
							<?php endif ?>
						</div>
						<div class="mx-auto text-center col-12">
							<button type="submit" class="btn btn-primary">Actualizar</button>
							<a type="button" class="btn btn-warning" href="<?= base_url('admin/users') ?>"><i class="fa fa-undo" aria-hidden="true"></i>
								Volver</a>
						</div>

						<?= form_close() ?>
					</div><!-- end col -->

				</div><!-- end row -->
			</div>
		</div><!-- end col -->
	</div>
	<!-- end row -->
</div>