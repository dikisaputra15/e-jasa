<div class="container mt-4">
	<?php if($this->session->flashdata('pesandata')): ?>
        <div id="pesandata" data-pesandata="<?= $this->session->flashdata('pesandata') ?>"></div>
     <?php endif; ?>

     <?php if($this->session->flashdata('pesanberhasil')): ?>
        <div id="pesanberhasil" data-pesanberhasil="<?= $this->session->flashdata('pesanberhasil') ?>"></div>
     <?php endif; ?>
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="card shadow">
				<div class="card-body">
					<div class="row justify-content-center">
						<div class="col-md">
							<form method="post">
				                <div class="form-group">
				                    <label for="current_password">Password sekarang</label>
				                    <input type="password" class="form-control" id="current_password" name="current_password">
				                    <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
				                </div>
				                <div class="form-group">
				                    <label for="new_password1">Password baru</label>
				                    <input type="password" class="form-control" id="new_password1" name="new_password1">
				                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
				                </div>
				                <div class="form-group">
				                    <label for="new_password2">Ulangi password</label>
				                    <input type="password" class="form-control" id="new_password2" name="new_password2">
				                    <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
				                </div>
				                <div class="form-group">
				                    <button type="submit" class="btn btn-danger">Ubah Password</button>
				                </div>
				            </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

