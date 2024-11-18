<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <?=$title;?>
        </h1>
    </div>

    <!-- Overview Row -->
    <div class="row">
        <!-- Department Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase text-primary font-weight-bold mb-2">Departments</h6>
                        <h5 class="text-gray-800 font-weight-bold mb-0"><?=$display['c_department'];?> Departments</h5>
                    </div>
                    <i class="fas fa-building fa-3x text-gray-300"></i>
                </div>
            </div>
        </div>

        <!-- Shifts Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase text-info font-weight-bold mb-2">Working Shifts</h6>
                        <h5 class="text-gray-800 font-weight-bold mb-0"><?=$display['c_shift'];?> Shifts</h5>
                    </div>
                    <i class="fas fa-exchange-alt fa-3x text-gray-300"></i>
                </div>
            </div>
        </div>

        <!-- Employees Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase text-success font-weight-bold mb-2">Employees</h6>
                        <h5 class="text-gray-800 font-weight-bold mb-0"><?=$display['c_employee'];?> Employees</h5>
                    </div>
                    <i class="fas fa-id-badge fa-3x text-gray-300"></i>
                </div>
            </div>
        </div>

        <!-- Users Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-uppercase text-danger font-weight-bold mb-2">Users</h6>
                        <h5 class="text-gray-800 font-weight-bold mb-0"><?=$display['c_users'];?> Active Users</h5>
                    </div>
                    <i class="fas fa-users fa-3x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Tables Row -->
    <div class="row">
        <!-- Departments' Employees Table -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-users"></i> Departments' Employees
                    </h6>

                </div>
                <div class="card-body table-responsive" style="max-height: 400px;">
                    <table class="table table-hover">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>#</th>
                                <th>Dept Code</th>
                                <th>Employees</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach ($d_list as $d): ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$d['d_id']?></td>
                                <td><?=$d['qty']?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Employees per Shift Table -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-clock"></i> Employees per Shift
                    </h6>
                </div>
                <div class="card-body table-responsive" style="max-height: 400px;">
                    <table class="table table-hover">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>#</th>
                                <th>Shift Code</th>
                                <th>Employees</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach ($s_list as $s): ?>
                            <?php if ($s['s_id'] == 0) continue; ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$s['s_id']?></td>
                                <td><?=$s['qty']?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>