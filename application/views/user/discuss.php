<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-header no-border" style="background-color: white">
        <a href="<?= base_url('index.php/discuss/add') ?>" class="btn btn-gradient-info float-right">Create Discussion</a>
      </div>
      <div class="card-body">
        <h4 class="card-title">All Discussion</h4>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Assignee</th>
                <th>Title</th>
                <th>Created At</th>
                <th>Review</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($threads as $thread) { ?>
                <tr>
                  <td>
                    <img src="../public/images/faces/<?= $thread->photo ?>" class="mr-2" onerror="this.src='../public/images/faces/face1.jpg'" alt="image">
                    <?= $thread->username ?>
                  </td>
                  <td>
                    <?= $thread->title ?>
                  </td>
                  <td class="text-muted ">
                    <?= date('F Y - H:i', strtotime($thread->date_realease)); ?>
                  </td>
                  <td>
                    <i class="mdi mdi-thumb-up text-success"></i> <?php echo $thread->like ?>
                    <i class="mdi mdi-thumb-down text-danger ml-3"></i> <?php echo $thread->dislike ?>
                  </td>
                  <td>
                    <a href="<?php echo site_url('discuss/detail/'.$thread->id) ?>" class="badge badge-gradient-info" title="detail" ><i class="mdi mdi-eye"></i></a>
                    <a onclick="return confirm('Apakah Anda yakin ingin menghapus thread ini? :(')" href="<?php echo site_url('discuss/delete/'.$thread->id) ?>" class="badge badge-gradient-danger" title="detail" ><i class="mdi mdi-delete"></i></a>
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
