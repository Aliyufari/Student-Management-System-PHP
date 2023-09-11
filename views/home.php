<?php require('includes/header.php') ?>
<?php require('includes/nav.php') ?>       
<!-- Mashead header-->
<header class="masthead">
    <?php if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])): ?>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">

                <div class="row">

                  <div class="col-xl-3 col-sm-6 col-12 mb-5">
                    <a href=".?action=students" class="card">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="media d-flex justify-content-between">
                            <div class="align-self-center">
                              <i class="icon-user danger font-large-2 float-right"></i>
                            </div>
                            <div class="media-body text-left">
                              <h3 class="danger"><?= count($data['students']); ?></h3>
                              <span>Students</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>

                  <div class="col-xl-3 col-sm-6 col-12 mb-5">
                    <a href=".?action=teachers" class="card">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="media d-flex justify-content-between">
                            <div class="align-self-center">
                              <i class="icon-handbag success font-large-2 float-right"></i>
                            </div>
                            <div class="media-body text-left">
                              <h3 class="success"><?= count($data['teachers']); ?></h3>
                              <span>Teachers</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
              
                  <div class="col-xl-3 col-sm-6 col-12 mb-5">
                    <a href=".?action=courses" class="card">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="media d-flex justify-content-between">
                            <div class="align-self-center">
                              <!-- <i class="icon-wallet warning font-large-2"></i> -->
                              <i class="icon-notebook warning font-large-2 float-right"></i>
                            </div>
                            <div class="media-body text-left">
                              <h3 class="warning"><?= count($data['courses']); ?></h3>
                              <span>Courses</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>

                  <div class="col-xl-3 col-sm-6 col-12 mb-5">
                    <a href=".?action=departments" class="card">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="media d-flex justify-content-between">
                            <div class="align-self-center">
                              <i class="icon-home primary font-large-2 float-left"></i>
                            </div>
                            <div class="media-body text-left">
                              <h3 class="primary"><?= count($data['departments']); ?></h3>
                              <span>Departments</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              
                <div class="row">
                  <div class="col-xl-3 col-sm-6 col-12 mb-5">
                    <a href=".?action=faculties" class="card">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="media d-flex justify-content-between">
                            <div class="align-self-center">
                              <i class="icon-badge primary font-large-2 float-right"></i>
                            </div>
                            <div class="media-body text-left">
                              <h3 class="primary"><?= count($data['faculties']); ?></h3>
                              <span>Faculties</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>

                  <div class="col-xl-3 col-sm-6 col-12 mb-5">
                    <a href=".?action=options" class="card">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="media d-flex justify-content-between">
                            <div class="align-self-center">
                              <i class="icon-bag warning font-large-2 float-right"></i>
                            </div>
                            <div class="media-body text-left">
                              <h3 class="warning"><?= count($data['options']); ?></h3>
                              <span>Option</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
              
                  <div class="col-xl-3 col-sm-6 col-12 mb-5">
                    <a href=".?action=admins" class="card">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="media d-flex justify-content-between">
                            <div class="align-self-center">
                              <i class="icon-lock success font-large-2 float-right"></i>
                            </div>
                            <div class="media-body text-left">
                              <h3 class="success"><?= count($data['admins']) ?></h3>
                              <span>Admins</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>

                  <div class="col-xl-3 col-sm-6 col-12 mb-5">
                    <a href="" class="card">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="media d-flex justify-content-between">
                            <div class="align-self-center">
                              <i class="icon-clock danger font-large-2 float-right"></i>
                            </div>
                            <div class="media-body text-left">
                              <h3 class="danger">25</h3>
                              <span>Examinations</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
            
            </div>
        </div>
    <?php else: ?>
        <div class="container px-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-5 mb-lg-0 text-center text-lg-start">
                        <h1 class="display-3 lh-1 mb-3">Showcase your app beautifully.</h1>
                        <p class="lead fw-normal mb-5">
                          Launch your mobile app landing page faster with this free, open source theme from Start Bootstrap!
                        </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6"> 
                  <img class="" src="./public/images/banner2.jpg" alt="..." />    
                </div>
            </div>
            </div>
        </div>
    <?php endif; ?>
</header>
<?php require('includes/footer.php') ?>       
