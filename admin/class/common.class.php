<?php

    abstract class Common
    {
        abstract function save();
        abstract function retrieve();
        abstract function edit();
        abstract function delete();

        public function set($key, $value) {
            $this->$key = $value;
        }

        public function validate($value) {
            $val = htmlspecialchars($value);
            $conn = mysqli_connect('localhost', 'root', '', 'newsmagazine');
            $newValue = $conn->real_escape_string($val);
            return $newValue;
        }

    }

?>