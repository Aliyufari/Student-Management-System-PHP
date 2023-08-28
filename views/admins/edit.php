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
                          <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Edit Admin</h3>

                          <form action=".?action=update_admin" method="POST" enctype="multipart/form-data">

                            <input type="hidden" name="admin_id" value="<?= $data['admin']['id'] ?>">

                            <div class="row">
                              <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                  <label class="form-label" for="name">Full Name</label>
                                  <input 
                                    type="text" 
                                    name="name" 
                                    id="name"
                                    value="<?= $data['admin']['name'] ?>" 
                                    class="form-control" />
                                </div>
                              </div>

                              <div class="col-md-6 mb-4 pb-2">
                                <div class="form-outline">
                                  <label class="form-label" for="username">Username</label>
                                  <input 
                                    type="text" 
                                    name="username" 
                                    id="username" 
                                    value="<?= $data['admin']['username'] ?>" 
                                    class="form-control" />
                                </div>
                              </div>
                            </div>

                            <div class="row"> 

                              <div class="col-md-6 mb-4 pb-2">
                                <div class="form-outline">
                                  <label class="form-label" for="emailAddress">Email Address</label>
                                  <input 
                                    type="email" 
                                    name="email" 
                                    id="emailAddress"
                                    value="<?= $data['admin']['email'] ?>"  
                                    class="form-control" />
                                </div>
                              </div>

                               <div class="col-md-6 mb-4 pb-2">
                                <label class="form-label">Gender:</label>
                                <select name="gender" class="form-control select">
                                  <option disabled selected><?= $data['admin']['gender'] ?></option>
                                  <option disabled>Choose gender</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                  <option value="Other">Other</option>
                                </select>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6 mb-4 d-flex align-items-center">
                                <div class="form-outline datepicker w-100">
                                  <label for="birthdayDate" class="form-label">Date of birth</label>
                                  <input 
                                    type="date" 
                                    class="form-control" 
                                    name="dob" 
                                    value="<?= $data['admin']['dob'] ?>" 
                                    id="birthdayDate" />
                                </div>
                              </div>

                              <div class="col-md-6 mb-4 pb-2">
                                <div class="form-outline">
                                  <label class="form-label" for="phoneNumber">Phone Number</label>
                                  <input 
                                    type="tel" 
                                    name="phone" 
                                    id="phoneNumber"
                                    value="<?= $data['admin']['phone'] ?>"  
                                    class="form-control" />
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12 mb-4 pb-2">
                                <label class="form-label text-muted">Upload profile image</label>
                                <input type="file" name="image" class="form-control" id="formFileLg"  />
                              </div>
                            </div>

                            <div class="row">
                              <div class=" pt-2">
                                <button class="btn btn-success" type="submit">Update</button>
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
