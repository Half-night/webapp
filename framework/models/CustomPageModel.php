<?php

class CustomPageModel extends Model
{

    public function get($path) {

        $path = addslashes($path);

        $query = "SELECT * FROM `pages` WHERE url='" . $path . "'";

        $this->db->connect();
        $result = $this->db->query($query);
        $this->db->disconnect();

        if (is_array($result) AND count($result) > 0) {

            return $result[0];
        } else {

            return false;
        }
    }

    public function create($path, $title, $description, $content) {

        $path = addslashes($path);
        $title = addslashes($title);
        $description = addslashes($description);
        $content = addslashes($content);

        $query = "INSERT INTO pages (`url`, `title`, `description`, `content`) VALUES ('" . $path . "', '" . $title . "', '" . $description . "', '" . $content . "')";

        $this->db->connect();
        $result = $this->db->query($query);
        $this->db->disconnect();

        if ($result) {

            return true;
        } else {

            return false;
        }
    }

    public function update() {

    }

    public function delete() {

    }

}