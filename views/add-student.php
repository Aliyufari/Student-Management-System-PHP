<?php require('includes/header.php') ?>
<?php require('includes/nav.php') ?>       
<!-- Mashead header-->
<header class="masthead">
    <?php if (isset($_SESSION['matric_no']) && isset($_SESSION['user_email'])): ?>
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

                              <div class="col-md-6 mb-4">

                                <h6 class="mb-2 pb-1">Gender: </h6>

                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="gender" id="femaleGender" />
                                  <label class="form-check-label" for="femaleGender">Female</label>
                                </div>

                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="gender" id="maleGender" />
                                  <label class="form-check-label" for="maleGender">Male</label>
                                </div>

                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="gender" id="otherGender" />
                                  <label class="form-check-label" for="otherGender">Other</label>
                                </div>

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
                                    <option value="2">Faculty of Science</option>
                                    <option value="3">Faculty of Education</option>
                                    <option value="4">Faculty of Agriculture</option>
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-6 mb-4 pb-2">
                                <div class="form-outline">
                                  <label class="form-label">Department</label>
                                  <select name="department" class="form-control select">
                                    <option value="1" disabled>Choose Department</option>
                                    <option value="2">Science Education</option>
                                    <option value="3">Vocational Technology</option>
                                    <option value="4">Library Information Science</option>
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
                                    <option value="2">Computer Science Education</option>
                                    <option value="3">Business Education</option>
                                    <option value="4">Crop Production</option>
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
<?php require('includes/footer.php') ?>       
