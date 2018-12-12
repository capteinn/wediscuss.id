<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body"> 
       <form class="forms-sample" action="<?= base_url('index.php/categories/edit/'.$editdata->id) ?>" method="POST" >
          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
          <div class="row">
            <div class="col-8">
              <div class="form-group">
                <label for="title">Categories Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Categories Name" value="<?php echo $editdata->name; ?>" required="">
              </div>
            </div> 
          </div>  
          <input  type="submit" class="btn btn-gradient-primary mr-2" name="submit" value="Submit">
          <a href="<?= base_url('index.php/categories') ?>" class="btn btn-light">Cancel</a> 
          </form>
        </div>
      </div>
    </div>
  </div>