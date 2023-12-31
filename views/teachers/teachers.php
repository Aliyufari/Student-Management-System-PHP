<?php require('./views/includes/header.php') ?>
<?php require('./views/includes/nav.php') ?>       
<!-- Mashead header-->
<header class="masthead">
    <?php if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])): ?>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">

              <div class="row mb-3 d-flex justify-content-end">
                <div class="col-3">
                  <a href=".?action=add-teacher" class="btn btn-primary">Add Teacher</a>
                </div>
              </div>

              <div class="row">

                <table class="table align-middle mb-0 bg-white">
                  <thead class="bg-dark" style="color: #fff; font-weight: normal;">
                    <tr>
                      <th>S/N</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Gender</th>
                      <th>Department</th>
                      <th>Profile</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($data['teachers']):?>
                      <?php foreach ($data['teachers'] as $teacher):?>

                        <tr>
                          <td><?= $data['count']++; ?></td>
                          <td><?= $teacher['name']; ?></td>
                          <td><?= $teacher['email']; ?></td>
                          <td><?= $teacher['phone']; ?></td>
                          <td><?= $teacher['gender']; ?></td>
                          <td>Science Education</td>
                          <td>
                            <img
                              src="
                              <?php 
                                if(!empty($teacher['image'])){
                                    echo './public/images/profiles/students/' . $teacher['image'];
                                 }else{
                                    if(strtolower($teacher['gender']) === 'male'){
                                      echo './public/images/profiles/user-male.png';
                                    }else{
                                      echo './public/images/profiles/user-female.png';
                                    } 
                                 }
                              ?>"
                              alt=""
                              style="width: 45px; height: 45px"
                              class="rounded-circle"
                              />
                          </td>
                          <td>
                            <div class="d-flex">
                              <a 
                                href=".?action=edit-teacher&teacher_id=<?= $teacher['id'] ?>" 
                                class="btn btn-success btn-sm btn-rounded mr-2"
                                style="margin-right: 5px;">Edit</a>

                              <form action=".?action=delete_teacher" method="POST">
                                <input type="hidden" name="teacher_id" value="<?= $teacher['id']; ?>">
                                <button type="submit" class="btn btn-danger btn-sm btn-rounded">
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
<?php require('./views/includes/footer.php') ?>       
