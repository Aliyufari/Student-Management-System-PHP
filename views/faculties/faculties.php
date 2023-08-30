<?php require('./views/includes/header.php') ?>
<?php require('./views/includes/nav.php') ?>       
<!-- Mashead header-->
<header class="masthead">
    <?php if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])): ?>
        <div class="container px-5">
            <div class="row gx-5 align-items-center">

              <div class="row mb-3 d-flex justify-content-end">
                <div class="col-3">
                  <a href=".?action=add-faculty" class="btn btn-primary">Add Faculty</a>
                </div>
              </div>

              <div class="row">

                <table class="table align-middle mb-0 bg-white">
                  <thead class="bg-dark" style="color: #fff; font-weight: normal;">
                    <tr>
                      <th>S/N</th>
                      <th>Name</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($data['faculties']):?>
                      <?php foreach ($data['faculties'] as $faculty):?>

                        <tr>
                          <td><?= $data['count']++; ?></td>
                          <td><?= $faculty['name']; ?></td>
                          <td>
                            <div class="d-flex">
                              <a 
                                href=".?action=edit-faculty&faculty_id=<?= $faculty['id'] ?>" 
                                class="btn btn-success btn-sm btn-rounded mr-2"
                                style="margin-right: 5px;">Edit</a>

                              <form action=".?action=delete_faculty" method="POST">
                                <input type="hidden" name="faculty_id" value="<?= $faculty['id']; ?>">
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
