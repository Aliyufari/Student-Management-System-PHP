<?php require('./views/includes/header.php') ?>
<?php require('./views/includes/nav.php') ?>       
<!-- Mashead header-->
<header class="masthead">
    <?php if (isset($_SESSION['matric_no']) && isset($_SESSION['user_email'])): ?>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">

                <div class="row justify-content-center">
                  
                    <div class="col-12 col-lg-9 col-xl-9">
                      <div class="card shadow-5-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                          <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Edit Teacher</h3>

                          <form action=".?action=update_teacher" method="POST" enctype="multipart/form-data">

                            <input type="hidden" name="teacher_id" value="<?= $teacher['id']; ?>">

                            <div class="row">
                              <div class="col-md-12 mb-4">
                                <div class="form-outline">
                                  <label class="form-label" for="name">Teacher's Name</label>
                                  <input 
                                    type="text" 
                                    name="name" 
                                    id="name"
                                    value="<?= $teacher['name']; ?>" 
                                    class="form-control" 
                                    placeholder="Full Name" />
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6 mb-4 pb-2">
                                <div class="form-outline">
                                  <label class="form-label" for="email">Email Address</label>
                                  <input 
                                    type="text" 
                                    name="email" 
                                    id="email" 
                                    value="<?= $teacher['email']; ?>"
                                    class="form-control" 
                                    placeholder="Email Address" />
                                </div>
                              </div>

                              <div class="col-md-6 mb-4 pb-2">
                                <label class="form-label">Gender:</label>
                                <select name="gender" class="form-control select">
                                  <option selected><?= $teacher['gender']; ?></option>
                                  <option disabled>Choose gender</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                  <option value="Other">Other</option>
                                </select>
                              </div>
                            </div>

                            <div class="row"> 
                              <div class="col-md-6 mb-4 pb-2">
                                <div class="form-outline">
                                  <label class="form-label" for="phoneNumber">Phone Number</label>
                                  <input 
                                    type="tel" 
                                    name="phone" 
                                    id="phoneNumber" 
                                    value="<?= $teacher['phone']; ?>"
                                    class="form-control" 
                                    placeholder="Phone Number" />
                                </div>
                              </div>

                               <div class="col-md-6 mb-4 pb-2">
                                <div class="form-outline">
                                  <label class="form-label">Department</label>
                                  <select name="dept-id" class="form-control select">
                                    <option selected><?= $teacher['dept_id']; ?></option>
                                    <option disabled>Choose Department</option>
                                    <option value="2">Science Education</option>
                                    <option value="3">Vocational Technology</option>
                                    <option value="4">Library Information Science</option>
                                  </select>
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
