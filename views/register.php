<?php require('includes/header.php') ?>
<?php require('includes/nav.php') ?>       
<!-- Mashead header-->
<header class="masthead">
    <div class="container">
        <div class="row gx-5 align-items-center">
           
            <div class="col-lg-12">
                <!-- Section: Design Block -->
                <section class="">
                  <!-- Jumbotron -->
                  <div class="px-4 py-5 px-md-5 text-center text-lg-start">
                    <div class="container">
                      <div class="row gx-lg-5 align-items-center">
                        <div class="col-lg-6  mb-lg-0">
                          <h1 class="my-5 display-3 fw-bold ls-tight">
                            The best offer <br />
                            <span class="text-primary">for your business</span>
                          </h1>
                          <p style="color: hsl(217, 10%, 50.8%)">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Eveniet, itaque accusantium odio.
                          </p>
                        </div>

                        <div class="col-lg-6 mb-5 mb-lg-0">
                          <div class="card">
                            <div class="card-body py-5 px-md-4">
                              <form action="." method="POST">
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <input type="hidden" name="action" value="register">

                                <div class="row">
                                  <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                      <label class="form-label" for="form3Example1">First name:</label>
                                      <input 
                                        type="text" 
                                        id="form3Example1" 
                                        name="first-name" 
                                        class="form-control" />
                                    </div>
                                  </div>
                                  <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                      <label class="form-label" for="form3Example2">Last name:</label>
                                      <input 
                                        type="text" 
                                        id="form3Example2"
                                        name="last-name"  
                                        class="form-control" />  
                                    </div>
                                  </div>
                                </div>

                                <div class="form-outline mb-4">
                                  <label class="form-label" for="form3Example3">Gender:</label>
                                  <select id="form3Example3" name="gender" class="form-control">
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                  </select> 
                                </div>

                                 <!-- Email input -->
                                <div class="form-outline mb-4">
                                  <label class="form-label" for="form3Example3">Phone number:</label>
                                  <input 
                                    type="number" 
                                    id="form3Example3" 
                                    name="phone-number" 
                                    class="form-control" />
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                  <label class="form-label" for="form3Example3">Email address:</label>
                                  <input 
                                    type="email" 
                                    id="form3Example3"
                                    name="email"  
                                    class="form-control" />
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                  <label class="form-label" for="form3Example4">Password:</label>
                                  <input 
                                    type="password" 
                                    id="form3Example4"
                                    name="password" 
                                    class="form-control" />
                                </div>

                                <!-- Submit button -->
                                <button type="submit" name="register" class="btn btn-primary btn-block mb-6">
                                  Register
                                </button>

                                <!-- Register buttons -->
                                <div class="text-center">
                                  <p>Already registered? <a href=".?action=signin">Login</a></p>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Jumbotron -->
                </section>
                <!-- Section: Design Block -->
            </div>
        </div>
    </div>
</header>
<?php require('includes/footer.php') ?>       
