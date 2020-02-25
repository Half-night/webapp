<?php

class CustomPageModel extends Model
{

    public function get($path) {

        $path = addslashes($path);

        $query = "SELECT * FROM `pages` WHERE url='" . $path . "'";

        $this->db->connect();
        $result = $this->db->query($query);
        $this->db->disconnect();

        if (is_array($result) AND count($result) > 0)  {

            return $result[0];
        } else {

            return false;
        }
    }

    public function create() {

    }

    public function update() {

    }

    public function delete() {

    }

}