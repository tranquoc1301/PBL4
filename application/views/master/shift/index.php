        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="row">
            <div class="col-lg-3">
              <a href="<?= base_url('master/a_shift'); ?>" class="btn btn-primary btn-icon-split mb-4">
                <span class="icon text-white">
                  <i class="fas fa-plus-circle"></i>
                </span>
                <span class="text">Add New Shift</span>
              </a>
            </div>
            <div class="col-lg-5 offset-lg-4">
              <?= $this->session->flashdata('message'); ?>
            </div>
          </div>

          <!-- Data Table Shift-->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Shift</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Shift Start Time</th>
                      <th>Shift End Time</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php
                    $i = 1;
                    foreach ($shift as $sft) :
                    ?>
                      <tr>
                        <td class="align-middle"><?= $i++; ?></td>
                        <td class="align-middle"><?= $sft['start']; ?></td>
                        <td class="align-middle"><?= $sft['end']; ?></td>
                        <td class="align-middle text-center">
                          <a href="<?= base_url('master/e_shift/') . $sft['id'] ?>" class="btn btn-primary btn-circle">
                            <span class="icon text-white" title="Edit">
                              <i class="fas fa-edit"></i>
                            </span>
                          </a> |
                          <a href="<?= base_url('master/d_shift/') . $sft['id'] ?>" class="btn btn-danger btn-circle" onclick="return confirm('Deleted Shift will lost forever. Still want to delete?')">
                            <span class="icon text-white" title="Delete">
                              <i class="fas fa-trash-alt"></i>
                            </span>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->