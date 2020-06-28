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
        <h3>Danh sách sinh viên</h3>
        <a href="<?php echo "index.php?controller=student&action=create" ?>" class="btn btn-primary">
            Thêm mới
        </a>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Mã sinh viên</th>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Chuyên ngành</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Điểm trung bình</th>
                <th>Yêu cầu</th>
            </tr>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td>
                        <?php echo $student['id']; ?>
                    </td>
                    <td>
                        <?php echo $student['ma_sv'];  ?>
                    </td>
                    <td>
                        <?php echo $student['name']; ?>
                    </td>
                    <td>
                        <?php
                        echo date('d-m-Y', strtotime($student['date_of_birth']));
                        ?>
                    </td>
                    <td>
                        <?php echo $student['major']; ?>
                    </td>
                    <td>
                        <?php echo $student['email']; ?>
                    </td>
                    <td>
                        <?php echo $student['phone']; ?>
                    </td>
                    <td>
                        <?php echo $student['gpa']; ?>
                    </td>
                    <td>
                        <?php echo $student['wish']; ?>
                    </td>
                    <td>
                        <?php
                        $url_update = "index.php?controller=student&action=update&id=" . $student['id'];
                        $url_delete = "index.php?controller=student&action=delete&id=" . $student['id'];
                        ?>
                        <a href="<?php echo $url_update ?>" title="Cập nhật">
                            <i class="fa fa-pencil-alt"></i> &nbsp;
                        </a>
                        <a onclick="return confirm('Xóa ?')"
                           href="<?php echo $url_delete ?>" title="Xóa">
                            <i class="fa fa-trash"></i> &nbsp;
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
    <!-- /.content -->
</div>

<?php
require_once 'views/layouts/footer.php';
?>

