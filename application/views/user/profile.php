<div class="row">
  <div class="col-6 grid-margin">
    <div class="card">
      <div class="card-body">
      	<div class="text-center pb-4">
            <img style="width: 80px; height: 80px" src="<?= base_url() ?>public/images/faces/<?php echo $profile->photo ?>" alt="image" class="icon-md text-info rounded"><br>
              <!-- Button trigger modal -->
						<button type="button" class="mt-2 p-2 btn btn-primary" data-toggle="modal" data-target="#exampleModal">
						  Ganti Photo ?
						</button>
        </div>
        <?php echo form_open('profile/update') ?>
          <div class="form-group">
            <label for="exampleInputName1">Username</label>
            <input type="text" class="form-control" id="exampleInputName1" name="username" placeholder="Username" value="<?php echo $profile->username ?>" required>
            <input type="hidden" value="<?php echo $profile->id ?>" name="id">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword4" name="password" placeholder="Password">
          </div>
          <div class="form-group">
						<input type="hidden" name="photo" value="<?php echo $profile->photo ?>" id="photo">
          </div>
          <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
      </div>
    </div>
  </div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Klik Salah Satu Foto</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="row">
	        	<div class="col-md-12">
	        		<?php 
	        			for ($i=1; $i <= 27 ; $i++) { 
	        		?>
	            <a href="#" onclick="return photo('face<?php echo $i ?>.jpg')"><img style="width: 80px; height: 80px" src="<?= base_url() ?>public/images/faces/face<?php echo $i ?>.jpg" alt="image" class="mx-1 my-2 icon-md text-info rounded"></a>
	        		<?php
	        			}
	        		?>
	        	</div>
	        </div>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

	<script type="text/javascript">
		function photo($str) {
			$('#photo').val($str);
		}
	</script>
</div>
