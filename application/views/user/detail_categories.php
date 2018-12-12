<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><?php echo $details->title ?></h4>
        <p class="float-right">
          <i class="mdi mdi-thumb-up text-danger"></i> <?php echo $details->like ?>
        </p>
        <p class="card-description">
          <?php echo date('d F Y H:i', strtotime($details->date_realease)) ?>
        </p>
        <p>
          <?php echo $details->description ?>
        </p>
        <p>
          <i class="mdi mdi-compass icon-sm text-danger"></i>
          <?php echo $details->category_name ?>
          <button type="button" title="Unlike" class="mx-2 btn btn-outline-secondary btn-rounded btn-icon float-right">
            <i class="mdi mdi-thumb-down text-dark"></i>
          </button>
          <button type="button" title="Like" class="mx-2 btn btn-outline-secondary btn-rounded btn-icon float-right">
            <i class="mdi mdi-thumb-up text-danger"></i>
          </button>
        </p>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p class="text-muted float-right"><i class="mdi mdi-wechat icon-sm text-info"></i> 20 Comments</p>
        <h4 class="card-title">Reply</h4>
        <hr>
        <div class="media d-block">
          <form action="" method="POST" role="form">
            <div class="row">
              <div class="col-11 mr-0">
                <div class="form-group">
                  <textarea class="form-control" name="description" id="description" required="" placeholder="Isikan komentar Anda"></textarea>
                </div>
              </div>
              <div class="form-group mt-2">
                <button class="btn btn-primary btn-sm float-right">Reply</button>
              </div>
            </div>
          </form>
        </div>
        <?php

          $comments = $this->comment_model->detail($details->thread_id);
          
          if (!empty($comments)) {

          foreach ($comments as $comment) {

        ?>
        <div class="media">
            <img style="width: 50px; height: 50px" src="<?= base_url() ?>public/images/faces/face4.jpg" alt="image" class="icon-md text-info d-flex align-self-center mx-3 rounded">
            <div class="media-body">
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
             tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
             quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
             consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
             cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
             proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
        <hr>
        <?php 
            }
          } else {
        ?>
          <div class="media">
              <div class="media-body">
                <p class="card-text text-center text-muted">There is no comment in this thread.</p>
              </div>
          </div>        
        <?php   
          }
        ?>
        <hr>
      </div>
    </div>
  </div>
</div>