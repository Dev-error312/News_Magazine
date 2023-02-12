<?php

require_once('common.class.php');

    class News extends Common
    
    {

        public $id, $title, $short_detail, $detail, $image, $featured, $breaking, $status, $slider_key, $created_by, $created_date, $modified_by, $modified_date, $category_id;

        public function save() {
            $conn = mysqli_connect('localhost', 'root', '', 'newsmagazine');
            $sql = "INSERT INTO `news` (`title`, `short_detail`, `detail`, `image`,
             `featured`, `breaking`, `status`, `slider_key`, `created_by`, `created_date`, `category_id`) 
                    VALUES ('$this->title','$this->short_detail', 
                    '$this->detail', '$this->image', '$this->featured', '$this->breaking', '$this->status', '$this->slider_key',
                    '$this->created_by','$this->created_date', '$this->category_id')";
            // echo $sql;
            $conn->query($sql);

            if($conn->affected_rows == 1 && $conn->insert_id > 0) {
                return $conn->insert_id;
            } else {
                return false;
            }
        }

        public function retrieve() {
            $conn = mysqli_connect('localhost', 'root', '', 'newsmagazine');
            $sql = "select * from news";
            $var = $conn->query($sql);
            if($var->num_rows > 0) {
                $dataList = $var->fetch_all(MYSQLI_ASSOC);
                return $dataList;
            } else {
                return false;
            }
            
        }

        public function edit() {
            $conn = mysqli_connect('localhost', 'root', '', 'newsmagazine');
            $sql = "update news set title='$this->title', short_detail='$this->short_detail', detail='$this->detail', image='$this->image', featured='$this->featured', breaking='$this->breaking', slider_key='$this->slider_key',
                    status='$this->status',
                    modified_by='$this->modified_by', 
                    modified_date='$this->modified_date',
                    category_id='$this->category_id',
                    where id='$this->id'";
            $conn->query($sql);

            if($conn->affected_rows == 1) {
                return $this->id;
            } else {
                return false;
            }
        }

        public function delete() {
            $conn = mysqli_connect('localhost', 'root', '', 'newsmagazine');
            $sql = "delete from news where id='$this->id'";
            $var = $conn->query($sql);
            if($var) {
                return "success";
            } else {
                return "failed";
            }
        }

        public function getById() {
            $conn = mysqli_connect('localhost', 'root', '', 'newsmagazine');
            $sql = "select * from news where id='$this->id'";
            $var = $conn->query($sql);
            if($var->num_rows > 0) {
                $data = $var->fetch_object();
                return $data;
            } else {
                return [];
            }
        }
        
    }

?>