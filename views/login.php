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
                        <div class="col-lg-6 mb-5 mb-lg-0">
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
                            <div class="card-body py-5 px-md-5">
                              <form action="." method="POST">

                                 <input type="hidden" name="action" value="login">
                                <!-- 2 column grid layout with text inputs for the first and last names -->

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
                                <button type="submit" class="btn btn-primary btn-block mb-4">
                                  Login
                                </button>

                                <!-- Register buttons -->
                                <div class="text-center">
                                  <p>Don't have an account? <a href=".?action=signup">Register</a></p>
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

<!-- Footer-->
<footer class="bg-black text-center py-5">
    <div class="container px-5">
        <div class="text-white-50 small">
            <div class="mb-2">&copy; Your Website 2023. All Rights Reserved.</div>
            <a href="#!">Privacy</a>
            <span class="mx-1">&middot;</span>
            <a href="#!">Terms</a>
            <span class="mx-1">&middot;</span>
            <a href="#!">FAQ</a>
        </div>
    </div>
</footer>
<?php require('includes/footer.php') ?>       
