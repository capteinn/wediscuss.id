<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <form class="forms-sample" action="<?= base_url('index.php/discuss/store') ?>" method="POST" >
          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
          <div class="row">
            <div class="col-8">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Name" required="">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="category">Categories</label>
                <select class="form-control" id="category" name="category" required="">
                  <option value="">Select Category</option>
                  <?php 
                    foreach ($categories as $category) { 
                      echo "<option value='".$category->id."' >".$category->name."</option>";
                    }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="description">Textarea</label>
            <textarea class="form-control wysiwyg" name="description" id="description" required=""></textarea>
          </div>
          <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
          <a href="<?= base_url('index.php/discuss') ?>" class="btn btn-light">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>