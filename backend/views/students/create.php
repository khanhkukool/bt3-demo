<?php
require_once 'views/layouts/header.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php
        require_once 'views/layouts/error.php';
        ?>
        <h3>Thêm sinh viên</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Mã sinh viên</label>
                <input type="text" name="ma_sv" class="form-control" value="" />
            </div>

            <div class="form-group">
                <label>Họ tên</label>
                <input type="text" name="name" class="form-control" />
            </div>

            <div class="form-group">
                <label>Ngày sinh</label>
                <input type="date" name="date_of_birth" class="form-control" value="" />
            </div>

            <div class="form-group">
                <label>Chuyên ngành</label>
                <input type="text" name="major" class="form-control" />
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" />
            </div>

            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="number" name="phone" class="form-control" />
            </div>

            <div class="form-group">
                <label>Điểm trung bình</label>
                <input type="number" step="0.01" name="gpa" class="form-control" />
            </div>

            <div class="form-group">
                <label>Yêu cầu</label>
                <textarea name="wish" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary"
                       name="submit" value="Lưu" />
                <a class="btn btn-secondary"
                   href="<?php echo "index.php?controller=student&action=index" ?>">
                    Quay lại
                </a>
            </div>
        </form>
    </section>
    <!-- /.content -->
</div>

<?php
require_once 'views/layouts/footer.php';
?>

