<?php
    include "DB.php";
    class Student{
        private $tbl_name       = 'tbl_student';
        public $errors          = array();
        public $start           = 0;
        public $row_per_page    = 3;

        /* retrive limit */
        public function readAll(){
            $sql    = "SELECT * FROM $this->tbl_name LIMIT $this->start, $this->row_per_page";
            $stmt   = DB::Prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        /* pagenation page */
        public function perPage(){
            $sql    = "SELECT * FROM $this->tbl_name";
            $stmt   = DB::Prepare($sql);
            $stmt->execute();
            $nr_of_rows = $stmt->rowCount();
            $pages = ceil($nr_of_rows / $this->row_per_page);
            return $pages;
        }

        /* insert data */
        public function insertData($name, $dep, $age){

            if(empty($name) && empty($dep) && empty($age)){
                $this->errors[] = "All fields are required!";
            }else{
                if(empty($name)){
                    $this->errors[] = "Name are required!";
                }
                if(empty($dep)){
                    $this->errors[] = "Department are required!";
                }
                if(empty($age)){
                    $this->errors[] = "Age are required!";
                }
            }

            if(empty($this->errors)){
                $sql    = "INSERT INTO $this->tbl_name(name, department, age) values(?, ?, ?)";
                $stmt   = DB::Prepare($sql);
                $arr    = array($name, $dep, $age);
                return $stmt->execute($arr);
            }
        }

        /* update data */
        public function updateData($name, $dep, $age, $get_id){

            if(empty($name) && empty($dep) && empty($age)){
                $this->errors[] = "All fields are required!";
            }else{
                if(empty($name)){
                    $this->errors[] = "Name are required!";
                }
                if(empty($dep)){
                    $this->errors[] = "Department are required!";
                }
                if(empty($age)){
                    $this->errors[] = "Age are required!";
                }
            }

            if(empty($this->errors)){
                $sql    = "UPDATE $this->tbl_name SET name=:name, department=:department, age=:age WHERE id=:id";
                $stmt   = DB::Prepare($sql);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':department', $dep);
                $stmt->bindParam(':age', $age);
                $stmt->bindParam(':id', $get_id);
                return $stmt->execute();
            }
        }

        /* Delete single row */
        public function deleteData($get_id){
            $sql    = "DELETE FROM $this->tbl_name WHERE id=:id";
            $stmt   = DB::Prepare($sql);
            $stmt->bindParam(':id', $get_id);
            return $stmt->execute();
        }

        /* Delete all */
        public function deleteAll(){
            $sql    = "DELETE FROM $this->tbl_name";
            $stmt   = DB::Prepare($sql);
            return $stmt->execute();
        }
    }
?>