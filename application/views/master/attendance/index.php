<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?=$title;?></h1>

    <!-- Attendance Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Attendance Records</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Employee ID</th>
                            <th>Department ID</th>
                            <th>Shift ID</th>
                            <th>In Time</th>
                            <th>Out Time</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($attendance as $record): ?>
                        <tr>
                            <td><?=$record['id'];?></td>
                            <td><?=$record['username'];?></td>
                            <td><?=sprintf('%03d', $record['employee_id']);?></td>
                            <td><?=$record['department_id'];?></td>
                            <td><?=$record['shift_id'];?></td>
                            <td><?=date('Y-m-d H:i:s', strtotime($record['in_time']));?></td>
                            <td><?=date('Y-m-d H:i:s', strtotime($record['out_time']));?></td>
                            <td><?=$record['notes'];?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>