<div class="d-flex h-100">
    <div class="container-fluid p-0">
        <div class="row no-gutters vh-100">
            <!-- Left Column (Image) -->
            <div class="col-md-6">
                <img src="<?= base_url('images/timekeeping.jpg'); ?>" alt="Timekeeping Image" class="img-fluid">
            </div>

            <!-- Right Column (Login Form) -->
            <div class="col-md-6 d-flex justify-content-center align-items-center bg-light">
                <div class="card">
                    <div class="card-body">
                        <!-- Logo and Title -->
                        <div class="sidebar-brand">
                            <div class="sidebar-brand-icon">
                                <img src="<?= base_url('images/timekeeping.png'); ?>" alt="Logo">
                            </div>
                            <div class="sidebar-brand-text">Timekeeping</div>
                        </div>

                        <!-- Flash Message -->
                        <?= $this->session->flashdata('message'); ?>

                        <!-- Login Form -->
                        <form class="user" method="post" action="<?= base_url(); ?>">
                            <div class="form-group">
                                <label for="username" class="form-label">
                                    <i class="fas fa-user"></i> Username
                                </label>
                                <input type="text" class="form-control" name="username" id="username"
                                    placeholder="Username (example: STD026)" required>
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock"></i> Password
                                </label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Password" required>
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                            </div>
                            <button class="btn btn-primary btn-block mt-4" type="submit">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>