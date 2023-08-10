<?php require('includes/header.php') ?>
<?php require('includes/nav.php') ?>       
<!-- Mashead header-->
<header class="masthead">
    <?php if (isset($_SESSION['matric_no']) && isset($_SESSION['user_email'])): ?>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">

              <div class="row mb-3 d-flex justify-content-end">
                <div class="col-3">
                  <a href=".?action=add-student" class="btn btn-primary">Add Student</a>
                </div>
              </div>

              <div class="row">

                <table class="table align-middle mb-0 bg-white">
                  <thead class="bg-dark" style="color: #fff; font-weight: normal;">
                    <tr>
                      <th>S/N</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Contact</th>
                      <th>Matic No.</th>
                      <th>Department</th>
                      <th>Faculty</th>
                      <th>Profile</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($data['students']):?>
                      <?php foreach ($data['students'] as $student):?>

                        <tr>
                          <td><?= $data['count']++; ?></td>
                          <td><?= $student['first_name']." ".$student['last_name']; ?></td>
                          <td><?= $student['email']; ?></td>
                          <td><?= $student['phone_number']; ?></td>
                          <td><?= $student['matric_no']; ?></td>
                          <td>Science Education</td>
                          <td>Education</td>
                          <td>
                            <div class="d-flex align-items-center">
                              <img
                                  src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                                  alt=""
                                  style="width: 45px; height: 45px"
                                  class="rounded-circle"
                                  />
                            </div>
                          </td>
                          <td>
                            <div class="d-flex">
                              <a 
                                href=".?action=edit-student&email=$student['email']" 
                                class="btn btn-success btn-sm btn-rounded mr-2"
                                style="margin-right: 5px;">Edit</a>

                              <form>
                                <button type="button" class="btn btn-danger btn-sm btn-rounded">
                                  Delete
                                </button>
                            </form>
                            </div>
                            
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>

              </div>
            
            </div>
        </div>
    <?php else: ?>
        
    <?php endif; ?>
</header>
<?php require('includes/footer.php') ?>       
