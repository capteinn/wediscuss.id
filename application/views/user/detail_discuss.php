<?php 
  $comments = $this->comment_model->detail($details->thread_id);
?>
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"><?php echo $details->title ?></h4>
        <p class="float-right">
          <i class="mdi mdi-thumb-down text-danger"></i> <?php echo $details->dislike ?>
        </p>
        <p class="float-right mr-3">
          <i class="mdi mdi-thumb-up text-success"></i> <?php echo $details->like ?>
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
          <?php 
            if (!empty($getLike)) {
              if ($getLike->like) {
                // like
                ?>
                <button type="button" onclick="location.href='<?php echo site_url('discuss/dislike/'.$details->id.'/'.$getLike->id) ?>'" title="Unlike" class="mx-2 btn btn-outline-secondary btn-rounded btn-icon float-right">
                  <i class="mdi mdi-thumb-down text-danger"></i>
                </button>
                <?php
              } else {
                // dislike
                ?>
                  <button type="button" title="Like" onclick="location.href='<?php echo site_url('discuss/like/'.$details->id.'/'.$getLike->id) ?>'" class="mx-2 btn btn-outline-secondary btn-rounded btn-icon float-right">
                    <i class="mdi mdi-thumb-up text-success"></i>
                  </button>
                <?php
              }
            } else {
            ?>
              <button type="button" onclick="location.href='<?php echo site_url('discuss/dislike/'.$details->id) ?>'" title="Unlike" class="mx-2 btn btn-outline-secondary btn-rounded btn-icon float-right">
                <i class="mdi mdi-thumb-down text-danger"></i>
              </button>
              <button type="button" title="Like" onclick="location.href='<?php echo site_url('discuss/like/'.$details->id) ?>'" class="mx-2 btn btn-outline-secondary btn-rounded btn-icon float-right">
                <i class="mdi mdi-thumb-up text-success"></i>
              </button>
            <?php
            }
          ?>
        </p>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <p class="text-muted float-right" id="count_comment"><i class="mdi mdi-wechat icon-sm text-info"></i> <?php echo count($comments) ?> Comments</p>
        <h4 class="card-title">Reply</h4>
        <hr>
        <div class="media d-block">
          <?php echo form_open('discuss/comment') ?>
            <div class="row">
              <div class="col-11 mr-0">
                <div class="form-group">
                  <input type="hidden" name="id" value="<?php echo $details->id ?>" required>
                  <textarea class="form-control" name="description" id="description" required="" placeholder="Isikan komentar Anda"></textarea>
                </div>
              </div>
              <div class="form-group mt-2">
                <button class="btn btn-primary btn-sm float-right">Reply</button>
              </div>
            </div>
        </div>
        <?php
          
          if (!empty($comments)) {

          foreach ($comments as $comment) {

        ?>
        <div class="media">
            <img style="width: 50px; height: 50px" src="<?= base_url() ?>public/images/faces/face4.jpg" alt="image" class="icon-md text-info d-flex align-self-center mx-3 rounded">
            <div class="media-body">
              <p class="card-text"><?php echo '<b>' . ucwords($comment->username) . '</b> <span class="pl-2 small text-muted">'. date('d-m-Y H:i', strtotime($comment->created_at)) .'</span><br>' . $comment->description ?></p>
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