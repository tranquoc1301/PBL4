       <!-- Begin Page Content -->
       <div class="container-fluid">

           <!-- Page Heading -->
           <div class="d-sm-flex align-items-center justify-content-between mb-4">
               <h1 class="h3 mb-0 text-gray-800"><?=$title;?></h1>
           </div>

           <!-- Content Row -->
           <div class="row">
               <?php foreach ($display as $key => $value) : ?>
                   <?php if ($key == 'c_department') : ?>
                       <div class="col-xl-3 col-md-6 mb-4">
                           <div class="card border-left-primary shadow h-100 py-2">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col mr-2">
                                           <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Departments
                                           </div>
                                           <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$value;?>
                                               Departments</div>
                                       </div>
                                       <div class="col-auto">
                                           <i class="fas fa-building fa-2x text-gray-300"></i>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   <?php elseif ($key == 'c_shift') : ?>
                       <div class="col-xl-3 col-md-6 mb-4">
                           <div class="card border-left-info shadow h-100 py-2">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col mr-2">
                                           <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Working Shifts
                                           </div>
                                           <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$value;?>
                                               Shifts</div>
                                       </div>
                                       <div class="col-auto">
                                           <i class="fas fa-exchange-alt fa-2x text-gray-300"></i>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   <?php elseif ($key == 'c_employee') : ?>
                       <div class="col-xl-3 col-md-6 mb-4">
                           <div class="card border-left-success shadow h-100 py-2">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col mr-2">
                                           <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Employees
                                           </div>
                                           <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$value;?>
                                               Employees</div>
                                       </div>
                                       <div class="col-auto">
                                           <i class="fas fa-id-badge fa-2x text-gray-300"></i>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   <?php elseif ($key == 'c_users') : ?>
                       <div class="col-xl-3 col-md-6 mb-4">
                           <div class="card border-left-danger shadow h-100 py-2">
                               <div class="card-body">
                                   <div class="row no-gutters align-items-center">
                                       <div class="col mr-2">
                                           <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Users
                                           </div>
                                           <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$value;?>
                                               Active Users</div>
                                       </div>
                                       <div class="col-auto">
                                           <i class="fas fa-users fa-2x text-gray-300"></i>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   <?php endif; ?>
               <?php endforeach; ?>
