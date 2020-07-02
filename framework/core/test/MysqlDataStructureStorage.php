<?php

class MysqlDataStructureStorage
{

    private $db = null;
    private $qb = null;

    private $db_config = array();

    public function __construct($db_host, $db_user, $db_pass, $db_name) {

        $this->db_config['host'] = $db_host;
        $this->db_config['user'] = $db_user;
        $this->db_config['pass'] = $db_pass;
        $this->db_config['name'] = $db_name;

        //$this->db = new Mysqli($db_host, $db_user, $db_pass, $db_name);
        

        $this->qb = new MysqlQueryBuilder();
    }

    public function connect() {

        if (is_null($this->db)) {

            $this->db = new Mysqli($this->db_config['host'], $this->db_config['user'], $this->db_config['pass'], $this->db_config['name']);

            $this->db->query('set names utf8;');

            return true;
        }
    }

    public function disconnect() {

        if (!is_null($this->db)) {

            $this->db->close();
            $this->db = null;

            return true;
        }

    }

    public function insert(DataStructure $structure) {

        $description = $structure->getDescription();
        $structure_name = $description->getName();

        $result = $this->db->query( $this->qb->insert($structure_name)->values($structure->getAll()));
        
        if ($result) {

            return true;
        } else {

            $result = $this->db->query( $this->qb->select('2+2')->from($structure_name) );
            
            if (!$result) {

                if ( $this->create($description) ) {

                    $result = $this->db->query( $this->qb->insert($structure_name)->values($structure->getAll()));

                    if ($result) {

                        return true;
                    } else {

                        return false;
                    }
                } else {

                    return false;
                }

                return false;
            } else {

                return false;
            }
        }
    }

    public function update(DataStructure $structure) {

        $description = $structure->getDescription();
        $structure_name = $description->getName();

        $data = $structure->getAll();
        $id = $data['id'];
        unset($data['id']);

        echo $this->qb->update($structure_name)->set($data)->where('id=' . $id);

        if ( $this->db->query($this->qb->update($structure_name)->set($data)->where('id=' . $id)) ) {

            return true;
        } else {

            return false;
        }
    }

    public function updateById() {

    }

    public function updateByUniqueValue() {
        
    }

    public function delete(DataStructure $structure) {

        $description = $structure->getDescription();
        $structure_name = $description->getName();

        $data = $structure->getAll();
        $id = $data['id'];
        unset($data['id']);

        echo $this->qb->delete($structure_name)->where('id=' . $id);

        if ( $this->db->query($this->qb->delete($structure_name)->where('id=' . $id)) ) {

            return true;
        } else {

            return false;
        }
    }

    public function deleteById() {

    }

    public function deleteByUniqueValue() {

    }

    public function get(DataStructureDescription $description) {
        
        $structure_name = $description->getName();

        $result = $this->db->query( $this->qb->select('*')->from($structure_name) );

        if ($result) {

            $collection = array();

            while($row = $result->fetch_assoc()) {

                $structure = new DataStructure($description);
                $structure->load($row);
                // !!!
                $collection[] = $structure->getAll();
            }

            return $collection;

        } else {

            return false;
        }

    }

    public function getById() {
        
    }

    public function getByUniqueValue() {
        
    }

    public function create(DataStructureDescription $description) {

        $structure_name = $description->getName();
        $result = $this->db->query( $this->qb->create($structure_name)->define($description->getAll())->setOptions() );

        if ($result) {

            return true;
        } else {

            return false;
        }
    }
}