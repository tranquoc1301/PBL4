<!-- Begin Page Content -->
<style>
#camera {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 0.25rem;
    z-index: 10;
}

#output-wrapper {
    position: relative;
    width: 100%;
    height: auto;
    object-fit: cover;
}

.card-header {
    background-color: #4e73df;
    color: white;
}

.card-body {
    background-color: #f8f9fc;
}

.btn-lg {
    padding: 1rem 2rem;
    font-size: 18px;
}

.quote-text {
    font-size: 1.2rem;
    font-weight: bold;
    color: #5a5c69;
    margin-top: 20px;
    text-align: center;
}
</style>
<div class="container-fluid">

    <!-- Page Title -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title;?></h1>
        <!-- Nút New Form -->
        <div class="text-center">
            <a href="<?=base_url('attendance/new_form')?>" class="btn btn-success btn-lg">
                <i class="fas fa-plus-circle"></i> New Form
            </a>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Attendance Form -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Stamp Your Attendance</h6>
                </div>
                <div class="card-body">
                    <?php if (!$in): ?>
                    <!-- Hiển thị nút Turn It -->
                    <?=form_open_multipart('attendance')?>
                    <div class="form-group">
                        <label for="work_shift">Work Shift</label>
                        <input type="text" id="work_shift" name="work_shift" class="form-control"
                            value="<?=$account['shift'];?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="notes">Notes</label>
                        <textarea maxlength="120" id="notes" name="notes" class="form-control" rows="3"
                            placeholder="Optional notes..."></textarea>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-circle"
                            style="width: 100px; height: 100px; font-size: 20px;">
                            <i class="fas fa-sign-in-alt"></i>
                        </button>
                        <p class="quote-text">"Chào ngày mới, cơ hội mới!"</p>
                    </div>
                    <?=form_close()?>
                    <?php elseif (!$disable): ?>
                    <!-- Hiển thị nút Checkout -->
                    <div class="text-center">
                        <h1>Check Out</h1>
                        <a href="<?=base_url('attendance/checkout')?>"
                            onclick="return confirm('Check out now? Make sure you are done with your work!')"
                            class="btn btn-danger btn-circle" style="width: 200px; height: 200px; font-size: 35px;">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                        <p class="quote-text">"Mỗi bước đi đều dẫn đến thành công!"</p>
                    </div>
                    <?php else: ?>
                    <!-- Nút Checkout bị vô hiệu hóa -->
                    <div class="text-center">
                        <button disabled class="btn btn-danger btn-circle"
                            style="width: 200px; height: 200px; font-size: 35px;">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                        <p class="quote-text">"Tạm dừng thôi, nhưng không dừng lại!"</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Camera Section -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Scan Your Face</h6>
                </div>
                <div class="card-body text-center" style="max-width: 400px; margin: 0 auto;">
                    <div id="output-wrapper">
                        <!-- Placeholder Image -->
                        <img id="output" class="img-thumbnail rounded mx-auto d-block"
                            src="<?=base_url('images/attendance/scanface.jpg')?>" alt="Scan Face">

                        <!-- Video Stream -->
                        <video id="camera" autoplay playsinline muted class="d-none"></video>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-center gap-3 mt-3">
                        <button id="openCameraButton" class="btn btn-primary">Open Camera</button>
                        <button id="closeCameraButton" class="btn btn-danger d-none">Close Camera</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<script>
const video = document.getElementById('camera');
const image = document.getElementById('output');
const openCameraButton = document.getElementById('openCameraButton');
const closeCameraButton = document.getElementById('closeCameraButton');
let stream = null;

// Start Camera
async function startCamera() {
    try {
        stream = await navigator.mediaDevices.getUserMedia({
            video: {
                facingMode: "user"
            }
        });
        video.srcObject = stream;

        // Hiển thị video và ẩn ảnh
        video.classList.remove('d-none');
        image.classList.add('d-none');

        // Điều chỉnh nút
        openCameraButton.classList.add('d-none');
        closeCameraButton.classList.remove('d-none');
    } catch (error) {
        console.error("Error accessing camera:", error);
        alert("Cannot access camera. Please check your permissions or device settings.");
    }
}

// Stop Camera
function stopCamera() {
    if (stream) {
        stream.getTracks().forEach(track => track.stop());
        stream = null;
    }

    // Hiển thị lại ảnh và ẩn video
    video.classList.add('d-none');
    image.classList.remove('d-none');

    // Điều chỉnh nút
    openCameraButton.classList.remove('d-none');
    closeCameraButton.classList.add('d-none');
}

// Event Listeners
openCameraButton.addEventListener('click', startCamera);
closeCameraButton.addEventListener('click', stopCamera);
</script>