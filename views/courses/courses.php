<?php require('./views/includes/header.php') ?>
<?php require('./views/includes/nav.php') ?>       
<!-- Mashead header-->
<header class="masthead">
    <?php if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])): ?>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">

              <div class="row mb-3 d-flex justify-content-end">
                <div class="col-3">
                  <a href=".?action=add-course" class="btn btn-primary">Add Course</a>
                </div>
              </div>

              <div class="row">

                <table class="table align-middle mb-0 bg-white">
                  <thead class="bg-dark" style="color: #fff; font-weight: normal;">
                    <tr>
                      <th>S/N</th>
                      <th>Code</th>
                      <th>Title</th>
                      <th>Unit</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($data['courses']):?>
                      <?php foreach ($data['courses'] as $course):?>

                        <tr>
                          <td><?= $data['count']++; ?></td>
                          <td><?= $course['code']; ?></td>
                          <td><?= $course['title']; ?></td>
                          <td><?= $course['unit']; ?></td>
                          <td>
                            <div class="d-flex">
                              <a 
                                href=".?action=edit-course&course_id=<?= $course['id'] ?>" 
                                class="btn btn-success btn-sm btn-rounded mr-2"
                                style="margin-right: 5px;">Edit</a>

                              <form action=".?action=delete_course" method="POST">
                                <input type="hidden" name="course_id" value="<?= $course['id']; ?>">
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
