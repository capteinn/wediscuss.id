<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <form class="forms-sample">
          <div class="row">
            <div class="col-8">
              <div class="form-group">
                <label for="exampleInputName1">Title</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="exampleSelectGender">Categories</label>
                <select class="form-control" id="exampleSelectGender">
                  <option>Select Category</option>
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
            <label for="exampleTextarea1">Textarea</label>
            <textarea class="form-control wysiwyg" id="exampleTextarea1" rows="8"></textarea>
          </div>
          <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>