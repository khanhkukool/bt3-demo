<?php
require_once 'models/Model.php';

class Student extends Model
{
    public function insert($arr_params = [])
    {
        //1 - chuẩn bị câu truy vấn
        $obj_insert = $this
            ->connection
            ->prepare("INSERT INTO
            students(ma_sv, name, date_of_birth, major, email, phone, gpa, wish)
            VALUES(:ma_sv, :name, :date_of_birth, :major, :email, :phone, :gpa, :wish)
            ");
//        2 - thực thi bằng cách truyền tham số
        $is_insert = $obj_insert->execute($arr_params);

        return $is_insert;
    }

    public function delete($id) {
        //cbi truy vấn
        $obj_delete = $this->connection
            ->prepare("DELETE FROM students WHERE id=:id");
        //gắn giá trị cho tham số
        $arr_params = [
            ":id" => $id
        ];

        //thực thi truy vấn
        return $obj_delete->execute($arr_params);
    }

    public function getAll()
    {
//        1 - chuẩn bị truy vấn
        $obj_select = $this->connection
            ->prepare("SELECT students.*  FROM students");

        //2 - truyền giá trị cho tham số và
        // thực thi truy vấn
        $obj_select->execute();

        //3 - lấy dữ liệu trả về dưới dạng mảng
        $students = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $students;
    }

    public function getById($id) {
        //cbi kết nối
        $obj_select = $this
            ->connection
            ->prepare("SELECT * FROM students WHERE id = :id");
        //gắn params
        $arr_param = [
            ':id' => $id
        ];
        //thực thi
        $obj_select->execute($arr_param);
        //lấy ra dữ liệu từ việc execute
        $students = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $students[0];
    }

    public function update($arr_params) {
        //cbi truy vấn
        $obj_update = $this
            ->connection
            ->prepare("UPDATE students 
            SET ma_sv=:ma_sv, 
            name=:name, 
            date_of_birth=:date_of_birth,
            major=:major,
            email=:email,
            phone=:phone,
            gpa=:gpa,
            wish=:wish
            WHERE id=:id
            ");

        //truyền param và thực thi
        return $obj_update->execute($arr_params);
    }
}