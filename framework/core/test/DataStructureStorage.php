<?php

class DataStructureStorage
{

    private $db = null;
    private $qb = null;

    public function __construct(Mysqli $db) {
        $this->db = $db;
        $this->db->query('set names utf8;');

        $this->qb = new MysqlQueryBuilder();
    }

    public function insert(DataStructure $structure) {

        $description = $structure->getDescription();
        $structure_name = $description->getName();

        d($this->qb->insert($structure_name)->values($structure->getAll()));

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
                $collection[] = $structure;
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