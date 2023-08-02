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
<!-- Feedback Modal-->
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary-to-secondary p-4">
                <h5 class="modal-title font-alt text-white" id="feedbackModalLabel">Send feedback</h5>
                <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body border-0 p-4">
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                    <!-- Name input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                        <label for="name">Full name</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                    </div>
                    <!-- Email address input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                        <label for="email">Email address</label>
                        <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                    </div>
                    <!-- Phone number input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                        <label for="phone">Phone number</label>
                        <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                    </div>
                    <!-- Message input-->
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                        <label for="message">Message</label>
                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                    </div>
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <!-- Submit Button-->
                    <div class="d-grid"><button class="btn btn-primary rounded-pill btn-lg disabled" id="submitButton" type="submit">Submit</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require('includes/footer.php') ?>       
