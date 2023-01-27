<?php

include('common.class.php');

    class Category extends Common
    
    {

        public $id, $name, $rank, $status, $created_by, $created_date, $modified_by, $modified_date;

        public function save() {
            $conn = mysqli_connect('localhost', 'root', '', 'newsmagazine');
            $sql = "insert into category(name, rank, status, created_by, created_date) values('$this->name', '$this->rank', '$this->status', '$this->created_by', '$this->created_date')";

            $conn->query($sql);

            if($conn->affected_rows == 1 && $conn->insert_id > 0) {
                return $conn->insert_id;
            } else {
                return false;
            }
        }

        public function retrieve() {

        }

        public function edit() {

        }

        public function delete() {

        }
        
    }

?>