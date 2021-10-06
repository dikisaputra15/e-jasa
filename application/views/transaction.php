<div class="container">
	<div class="row">
		<div class="col-md-5">
			<div class="card shadow">
				<div class="card-header">
					<h5>Transaction action</h5>
				</div>
				<div class="card-body">
					<form action="<?php echo site_url() ?>/transaction/process" method="POST">
						<p>
							<label>Order id</label>
							<input autofocus class="form-control form-control-sm" value="" size="20" type="text" name="order_id" autocomplete="off" required/>
						</p>
						<p>
							<label>Action</label><br />
							<input type="radio" name="action" value="status" required> Get Status<br>
							<!-- <input type="radio" name="action" value="approve"> Approve<br>
							<input type="radio" name="action" value="cancel"> Cancel<br>
							<input type="radio" name="action" value="expire"> Expire<br> -->
						</p>
						<button class="btn btn-sm btn-danger submit-button" type="submit">Submit Payment</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>