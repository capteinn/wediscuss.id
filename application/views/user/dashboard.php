<div class="row">
  <div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-danger card-img-holder text-white">
      <div class="card-body">
        <img src="../public/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
        <h4 class="font-weight-normal mb-3">Joined Discussion
          <i class="mdi mdi-chart-line mdi-24px float-right"></i>
        </h4>
        <h2 class="mb-5"><?php echo $students ?></h2>
        <h6 class="card-text">Student joined in discussion</h6>
      </div>
    </div>
  </div>
  <div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-info card-img-holder text-white">
      <div class="card-body">
        <img src="../public/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>                  
        <h4 class="font-weight-normal mb-3">Thread
          <i class="mdi mdi-book mdi-24px float-right"></i>
        </h4>
        <h2 class="mb-5"><?php echo $threads ?></h2>
        <h6 class="card-text">Thread posted</h6>
      </div>
    </div>
  </div>
  <div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-success card-img-holder text-white">
      <div class="card-body">
        <img src="../public/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>                                    
        <h4 class="font-weight-normal mb-3">Most Popular Thread
          <i class="mdi mdi-thumb-up mdi-24px float-right"></i>
        </h4>
        <h2><?php echo $mostlike->like ?> like</h2>
        <p class="mb-3"><?php echo $mostlike->title ?> like</p>
        <h6 class="card-text">Most likely thread</h6>
      </div>
    </div>
  </div>
</div>