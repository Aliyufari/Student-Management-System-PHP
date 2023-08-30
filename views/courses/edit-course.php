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
                          <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Edit Course</h3>

                          <form action=".?action=update_course" method="POST">

                            <input type="hidden" name="course_id" value="<?= $course['id']; ?>">
                            
                            <div class="row">
                              <div class="col-md-12 mb-4">
                                <div class="form-outline">
                                  <label class="form-label" for="title">Course Title</label>
                                  <input 
                                    type="text" 
                                    name="title" 
                                    id="title" 
                                    value="<?= $course['title']; ?>"
                                    class="form-control" 
                                    placeholder="Type title" />
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6 mb-4 pb-2">
                                <div class="form-outline">
                                  <label class="form-label" for="code">Course Code</label>
                                  <input 
                                    type="text" 
                                    name="code" 
                                    id="code" 
                                    value="<?= $course['code']; ?>"
                                    class="form-control" 
                                    placeholder="Enter code" />
                                </div>
                              </div>

                              <div class="col-md-6 mb-4 pb-2">
                                <label class="form-label">Course Unit</label>
                                <select name="unit" class="form-control select">
                                  <option selected><?= $course['unit']; ?></option>
                                  <option disabled>Choose unit</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                </select>
                              </div>
                            </div>

                            <div class="row">
                              <div class=" pt-2">
                                <button class="btn btn-primary" type="submit">Update</button>
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
