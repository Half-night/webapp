<?php

class CustomPageModel extends Model
{

    private $error_messages = array();

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

    public function getById($id) {

        $id = (int) $id;

        $query = "SELECT * FROM `pages` WHERE id='" . $id . "'";

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

    public function update($id, $path, $title, $description, $content) {

        $id = (int) $id;
        $path = addslashes($path);
        $title = addslashes($title);
        $description = addslashes($description);
        $content = addslashes($content);

        $query = "UPDATE pages SET url='" . $path . "', title='" . $title . "', description='" . $description . "', content='" . $content . "' WHERE id='" . $id . "'";

        $this->db->connect();
        $result = $this->db->query($query);
        $this->db->disconnect();

        if ($result) {

            return true;
        } else {

            return false;
        }
    }

    public function delete($id) {

        $id = (int) $id;
        $query = "DELETE FROM pages WHERE id='" . $id . "'";

        $this->db->connect();
        $result = $this->db->query($query);
        $this->db->disconnect();

        if ($result) {

            return true;
        } else {

            return false;
        }
    }


    public function getList() {

        $query = "SELECT * FROM `pages`";

        $this->db->connect();
        $result = $this->db->query($query);
        $this->db->disconnect();

        if ($result) {

            return $result;
        } else {

            return false;
        }
    }

    // Check input data

    public function checkCreate(array $data = array()) {

        if (isset($data['url']) 
            AND isset($data['title'])
            AND isset($data['description'])
            AND isset($data['keywords'])
            AND isset($data['content'])) {

            if (!empty($data['url']) AND !empty($data['title'])) {

                if ($this->get($data['url'])) {

                    //TODO: get rid of error messages. We should not store them in Model.
                    $this->error_messages[] = '"URL" field should be unique';
                } else {

                    return true;
                }
            } else {
                
                //TODO: get rid of error messages. We should not store them in Model.
                $this->error_messages[] = 'Fields "URL" and "Title" required';
                return false;
            }

        } else {
            
            //TODO: get rid of error messages. We should not store them in Model.
            $this->error_messages[] = 'Incorrect data array';
            return false;
        }
    }

    // Get error messages

    public function getErrors() {

        if (count($this->error_messages) > 0) {

            return $this->error_messages;
        } else {

            return false;
        }
    }

}