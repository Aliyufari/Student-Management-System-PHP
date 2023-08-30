<?php require('./views/includes/header.php') ?>
<?php require('./views/includes/nav.php') ?>       
<!-- Mashead header-->
<header class="masthead">
    <?php if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])): ?>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">

                <div class="row justify-content-center">
                  
                    <div class="col-12 col-lg-9 col-xl-9">
                      <div class="card shadow-5-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                          <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Add Option</h3>

                          <form action=".?action=add_option" method="POST">
                            
                            <div class="row">
                              <div class="col-md-12 mb-4">
                                <div class="form-outline">
                                  <label class="form-label" for="name">Option Name</label>
                                  <input 
                                    type="text" 
                                    name="name" 
                                    id="name" 
                                    class="form-control" 
                                    placeholder="Enter option" />
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class=" pt-2">
                                <button class="btn btn-primary" type="submit">Submit</button>
                              </div>
                            </div>

                            

                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
            
            </div>
        </div>
    <?php else: ?>
        
    <?php endif; ?>
</header>
<?php require('./views/includes/footer.php') ?>       
