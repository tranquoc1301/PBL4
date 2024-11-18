<!-- Begin Page Content -->
<div class="container-fluid min-vh-100">
    <!-- Page Heading -->
    <div class="row mb-4">
        <div class="col">
            <h1 class="h3 text-gray-900"><i class="fas fa-user-tie"></i> <?=$account['name']?></h1>
        </div>
    </div>
    <div class="row">
        <!-- Left Section (Profile Picture) -->
        <div class="col-sm-12 col-md-4 col-lg-3  d-flex justify-content-center align-items-center">
            <div class="text-center">
                <img src="<?=base_url('images/pp/') . $account['image'];?>" class="rounded-circle img-thumbnail shadow-lg" alt="Profile Picture" style="max-width: 220px; max-height: 220px; object-fit: cover;">
            </div>
        </div>

        <!-- Right Section (Profile Details) -->
        <div class="col-sm-12 col-md-7">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0"><i class="fas fa-id-card"></i> Employee Profile</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th scope="row" class="bg-light text-primary"><i class="fas fa-list-ol"></i> Employee ID</th>
                                <td> <?=$account['id'];?></td>
                            </tr>
                            <tr>
                                <th scope="row" class="bg-light text-primary"><i class="fas fa-venus-mars"></i> Gender</th>
                                <td> <?=$account['gender'] == 'M' ? 'Male' : 'Female';?></td>
                            </tr>
                            <tr>
                                <th scope="row" class="bg-light text-primary"><i class="fas fa-building"></i> Department</th>
                                <td> <?=$account['department'];?></td>
                            </tr>
                            <tr>
                                <th scope="row" class="bg-light text-primary"><i class="fas fa-birthday-cake"></i> Date of Birth</th>
                                <td> <?=date('F j, Y', strtotime($account['birth_date']));?></td>
                            </tr>
                            <tr>
                                <th scope="row" class="bg-light text-primary"><i class="fas fa-calendar-alt"></i> Joined On</th>
                                <td> <?=date('F j, Y', strtotime($account['hire_date']));?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->
