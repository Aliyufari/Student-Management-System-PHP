<?php require('includes/header.php') ?>
<?php require('includes/nav.php') ?>       
<!-- Mashead header-->
<header class="masthead">
    <div class="container">
      <div class="row gx-5 align-items-center">

        <div class="row justify-content-center">
          <div class="col-xl-5 col-md-8">
            <form action=".?action=login" method="POST" class="bg-white rounded shadow-2-strong p-5">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form1Example1">Email address</label>
                <input 
                  type="email" 
                  id="form1Example1"
                  name="email" 
                  class="form-control" />
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form1Example2">Password</label>
                <input 
                  type="password" 
                  id="form1Example2"
                  name="password" 
                  class="form-control" />
              </div>

              <!-- 2 column grid layout for inline styling -->
              <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form1Example3"/>
                    <label class="form-check-label" for="form1Example3">
                      Remember me
                    </label>
                  </div>
                </div>

                <div class="col text-center">
                  <a href="#!">Forgot password?</a>
                </div>
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block">Sign in</button>
            </form>
          </div>
        </div>

      </div>
    </div>
</header>
<?php require('includes/footer.php') ?>       
