<div class="container">

<br>
<?php if($this->session->flashdata('notice')) { ?>
	<div id="message" >
    	<?php echo $this->session->flashdata('notice'); ?>
	</div>
<?php } ?>

<div class="card">
  <div class="card-header">
    <?php echo $page_title; ?>
  </div>
  <div class="card-body">
    <h5 class="card-title">API or Application Programming Interface lets third party systems access Cloudlog</h5>
    <p class="card-text">You will need to generate API keys if you wish to use tools like CloudlogCAT.</p>

		<?php if ($api_keys->num_rows() > 0) { ?>

		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th scope="col">API Key</th>
		      <th scope="col">Rights</th>
		      <th scope="col">Status</th>
		    </tr>
		  </thead>
		  <tbody>
			<?php foreach ($api_keys->result() as $row) { ?>
				<tr>
					<td><?php echo $row->key; ?></td>
					<td>
						<?php
							
							if($row->rights == "rw") {
								echo "Read & Write";
							} elseif($row->rights == "r") {
								echo "Read Only";
							} else {
								echo "Unknown";
							}
			
						?>

					</td>
					<td><span class="btn btn-outline-primary btn-sm"><?php echo ucfirst($row->status); ?></span> <a href="<?php echo site_url('/api/validate/?key='.$row->key); ?>" class="btn btn-success btn-sm">Test</td>
				</tr>

			<?php } ?>

		</table>	

		<?php } else { ?>
			<p>You have no API Keys.</p>
		<?php } ?>

		<p>
			<a href="<?php echo site_url('api/generate/rw'); ?>" class="btn btn-outline-primary btn-sm">Generate Key with Read & Write Access</a>
			<a href="<?php echo site_url('api/generate/r'); ?>" class="btn btn-outline-primary btn-sm">Generate Key with Read Only Access</a>
		</p>

  </div>
</div>

</div>

