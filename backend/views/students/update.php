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
        <h3>Sửa sinh viên</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Mã sinh viên</label>
                <input type="text" name="ma_sv" class="form-control" value="<?php echo isset($_POST['ma_sv']) ? $_POST['ma_sv'] : $student['ma_sv'] ?>" />
            </div>

            <div class="form-group">
                <label>Họ tên</label>
                <input type="text" name="name" class="form-control"  value="<?php echo isset($_POST['name']) ? $_POST['name'] : $student['name'] ?>"/>
            </div>

            <div class="form-group">
                <label>Ngày sinh</label>
                <input type="date" name="date_of_birth" class="form-control" value="<?php echo isset($_POST['date_of_birth']) ? date('Y-m-d', strtotime($_POST['date_of_birth'])) : date('Y-m-d', strtotime($student['date_of_birth'])) ?>" />
            </div>

            <div class="form-group">
                <label>Chuyên ngành</label>
                <input type="text" name="major" class="form-control" value="<?php echo isset($_POST['major']) ? $_POST['major'] : $student['major'] ?>"/>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $_POST['email'] : $student['email'] ?>"/>
            </div>

            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="number" name="phone" class="form-control"  value="<?php echo isset($_POST['phone']) ? $_POST['name'] : $student['phone'] ?>"/>
            </div>

            <div class="form-group">
                <label>Điểm trung bình</label>
                <input type="number" step="0.01" name="gpa" class="form-control" value="<?php echo isset($_POST['gpa']) ? $_POST['gpa'] : $student['gpa'] ?>"/>
            </div>

            <div class="form-group">
                <label>Yêu cầu</label>
                <textarea name="wish" class="form-control"><?php echo isset($_POST['wish']) ? $_POST['wish'] : $student['wish'] ?></textarea>
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

