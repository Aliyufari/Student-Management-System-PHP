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
                          <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Add Student</h3>

                          <form action=".?action=add_student" method="POST" enctype="multipart/form-data">

                            <div class="row">
                              <div class="col-md-6 mb-4">

                                <div class="form-outline">
                                  <label class="form-label" for="firstName">First Name</label>
                                  <input type="text" name="first-name" id="firstName" class="form-control" />
                                </div>

                              </div>
                              <div class="col-md-6 mb-4">

                                <div class="form-outline">
                                  <label class="form-label" for="lastName">Last Name</label>
                                  <input type="text" name="last-name" id="lastName" class="form-control" /> 
                                </div>

                              </div>
                            </div>

                            <div class="row"> 

                              <div class="col-md-6 mb-4 pb-2">
                                <label class="form-label">Gender:</label>
                                <select name="gender" class="form-control select">
                                  <option disabled>Choose gender</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                  <option value="Other">Other</option>
                                </select>
                              </div>
                              
                              <div class="col-md-6 mb-4 d-flex align-items-center">

                                <div class="form-outline datepicker w-100">
                                  <label for="birthdayDate" class="form-label">Date of birth</label>
                                  <input type="date" class="form-control" name="dob" id="birthdayDate" />
                                </div>

                              </div>
                             
                            </div>

                            <div class="row">
                              <div class="col-md-6 mb-4 pb-2">

                                <div class="form-outline">
                                  <label class="form-label" for="emailAddress">Email</label>
                                  <input type="email" name="email" id="emailAddress" class="form-control" />
                                </div>

                              </div>
                              <div class="col-md-6 mb-4 pb-2">

                                <div class="form-outline">
                                  <label class="form-label" for="phoneNumber">Phone Number</label>
                                  <input type="tel" name="phone" id="phoneNumber" class="form-control" />
                                </div>

                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6 mb-4 pb-2">
                                <div class="form-outline">
                                  <label class="form-label">Faculty</label>
                                  <select name="faculty" class="form-control select">
                                    <option value="1" disabled>Choose faculty</option>
                                    <?php foreach ($data['faculties'] as $faculty): ?>
                                      <option value="<?= $faculty['id'] ?>"><?= $faculty['name'] ?></option>
                                    <?php endforeach ?>
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-6 mb-4 pb-2">
                                <div class="form-outline">
                                  <label class="form-label">Department</label>
                                  <select name="department" class="form-control select">
                                    <option value="1" disabled>Choose department</option>
                                    <?php foreach ($data['departments'] as $department): ?>
                                      <option value="<?= $department['id'] ?>"><?= $department['name'] ?></option>
                                    <?php endforeach ?>
                                  </select>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6 mb-4 pb-2">
                                <div class="form-outline">
                                  <label class="form-label">Option</label>
                                  <select name="option" class="form-control select">
                                    <option value="1" disabled>Choose option</option>
                                    <?php foreach ($data['options'] as $option): ?>
                                      <option value="<?= $option['id'] ?>"><?= $option['name'] ?></option>
                                    <?php endforeach ?>
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-6 mb-4 pb-2">
                                <label class="form-label text-muted">Upload profile image</label>
                                <input type="file" name="profile-image" class="form-control" id="formFileLg"  />
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
