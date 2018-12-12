<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-header no-border" style="background-color: white">
        <a href="<?= base_url('index.php/categories/add') ?>" class="btn btn-gradient-info float-right">Add Categories</a>
      </div>
      <div class="card-body">
        <h4 class="card-title">Categories</h4>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Categories Name</th> 
                <th>Option</th> 
              </tr>
            </thead>
            <tbody>
              <?php foreach ($threads as $categories) { ?>
                <tr>
                  <td> 
                    <?= $categories->id ?>
                  </td>
                  <td>
                    <?= $categories->name ?>
                  </td> 
                  <td>
                    <a href="<?= base_url('index.php/categories/edit/'.$categories->id) ?>" class="badge badge-gradient-info" title="edit" ><i class="mdi mdi-pencil"></i></a>
                    <a href="<?= base_url('index.php/categories/delete/'.$categories->id) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus?');" class="badge badge-gradient-danger" title="hapus" ><i class="mdi mdi-delete"></i></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
