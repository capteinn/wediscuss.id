<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white mr-2">
        <i class="mdi mdi-home"></i>                 
      </span>
      Discuss
    </h3>
    <nav aria-label="breadcrumb">
      <ul class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <span></span>Overview
          <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
        </li>
      </ul>
    </nav>
  </div>
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
                      David Grey
                    </td>
                    <td>
                      <?= $thread->title ?>
                    </td>
                    <td class="text-muted">
                      <?= date('d F Y H:i', strtotime($thread->created_at)) ?>
                    </td>
                    <td>
                      21
                    </td>
                    <td>
                      <a href="#" class="badge badge-gradient-info" title="detail" ><i class="mdi mdi-eye"></i></a>
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
</div>