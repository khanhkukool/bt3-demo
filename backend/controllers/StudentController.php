<?php
require_once 'models/Student.php';

class StudentController
{
    public $error;

    /**
     * Liệt kê sản phẩm trong hệ thống
     */
    public function index()
    {
        //gọi model để lấy tất cả dữ liệu
        $student_model = new Student();
        $students = $student_model->getAll();
        require_once 'views/students/index.php';
    }

    public function create()
    {
        //xử lý lưu dữ liệu khi submit form
        if (isset($_POST['submit'])) {

            $ma_sv = $_POST['ma_sv'];
            $name = $_POST['name'];
            $date_of_birth = date('Y-m-d', strtotime($_POST['date_of_birth']));
            $major = $_POST['major'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $gpa = $_POST['gpa'];
            $wish = $_POST['wish'];

            //check validate
            //check trường hợp không nhập tên sản phẩm
            if (empty($ma_sv)) {
                $this->error = "Không được để trống mã sinh viên";
            } else if (empty($name)) {
                $this->error = "Không được để trống họ tên";
            }else if(empty($major)){
                $this->error = "Không được để trống chuyên ngành";
            } else {

                //gọi model thực hiện insert data vào CSDL
                //sử dụng cơ chế PDO
                $arr_params = [
                    ":ma_sv" => $ma_sv,
                    ":name" => $name,
                    ":date_of_birth" => $date_of_birth,
                    ":major" => $major,
                    ":email" => $email,
                    ":phone" => $phone,
                    ":gpa" => $gpa,
                    ":wish" => $wish
                ];

                $student_model = new Student();
                $is_insert = $student_model->insert($arr_params);

                if ($is_insert) {
                    $_SESSION['success'] = 'Thêm sinh viên thành công';
                } else {
                    $_SESSION['error'] = 'Thêm sinh viên thất bại';
                }

                header("Location: index.php?controller=student");
                exit();

            }
        }

        //gọi view
        require_once 'views/students/create.php';
    }

    public function update()
    {
        //lấy ra thông tin sản phẩm dựa theo id truyền trên url
        //check 1 số trường hợp validate cho id
        if (!isset($_GET['id'])) {
            $_SESSION['error'] = "ID không tồn tại";
            header("Location: index.php?controller=student&action=index");
            exit();
        }

        $id = $_GET['id'];
        //lấy ra thông tin sản phẩm dựa vào id
        $student_model = new Student();
        $student = $student_model->getById($id);
        //xử lý lưu dữ liệu khi submit form
        if (isset($_POST['submit'])) {

            $ma_sv = $_POST['ma_sv'];
            $name = $_POST['name'];
            $date_of_birth = date('Y-m-d', strtotime($_POST['date_of_birth']));
            $major = $_POST['major'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $gpa = $_POST['gpa'];
            $wish = $_POST['wish'];

            //check validate
            //check trường hợp không nhập tên sản phẩm
            if (empty($ma_sv)) {
                $this->error = "Không được để trống mã sinh viên";
            } else if (empty($name)) {
                $this->error = "Không được để trống họ tên";
            }else if(empty($major)){
                $this->error = "Không được để trống chuyên ngành";
            } else {

                //gọi model thực hiện insert data vào CSDL
                //sử dụng cơ chế PDO
                $arr_params = [
                    ":ma_sv" => $ma_sv,
                    ":name" => $name,
                    ":date_of_birth" => $date_of_birth,
                    ":major" => $major,
                    ":email" => $email,
                    ":phone" => $phone,
                    ":gpa" => $gpa,
                    ":wish" => $wish
                ];

                $student_model = new Student();
                $is_insert = $student_model->insert($arr_params);

                if ($is_insert) {
                    $_SESSION['success'] = 'Sửa thông tin thành công';
                } else {
                    $_SESSION['error'] = 'Sửa thông tin thất bại';
                }

                header("Location: index.php?controller=student");
                exit();

            }
        }

        //gọi view
        require_once 'views/students/update.php';
    }

    public function delete()
    {
        //bắt id từ trình duyệt
        //validate nếu ko có tham số id thì báo lỗi và chuyển hướng
//        về trang danh sách
        if (!isset($_GET['id'])) {
            $_SESSION['error'] = "Tham số ID không hợp lệ";
            header("Location: index.php?controller=student");
            exit();
        }

        $id = $_GET['id'];

        $student_model = new Student();
        $is_delete = $student_model->delete($id);

        if ($is_delete) {
            $_SESSION['success'] = "Xóa thành công";
        } else {
            $_SESSION['error'] = "Xóa thất bại";
        }

        header("Location: index.php?controller=student");
        exit();
    }
}