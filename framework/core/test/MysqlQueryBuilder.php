<?php

class MysqlQueryBuilder
{

    private $query = array();

    private static $create_array = array(
        'create' => '',
        'create_definition' => '',
        'table_options' => '',
    );

    private static $select_array = array(
        'select' => '',
        'from' => '',
        'where' => '',
        'group_by' => '',
        'order_by' => '',
        'limit' => '',
    );

    private static $insert_array = array(
        'insert' => '',
        'values' => '',
    );

    private static $update_array = array(
        'update' => '',
        'set' => '',
        'where' => '',
    );

    private static $delete_array = array(
        'delete' => '',
        'where' => '',
    );

    public function __construct() {

    }

    public function create($name) {

        string_hint($name);

        $this->flushQuery();
        $this->query = self::$create_array;

        $this->query['create'] = 'CREATE TABLE ' . $name;

        return $this;

    }

    public function define(array $definitions) {

        foreach ($definitions as $name => $data) {
        
            if ($description = $data->getMysqlDescription()) {
                
                $query_body[] = '   ' . $data->getName() . ' ' . $description;
            } else {

                // Need testing!!!
                $type = $data->getType();
                $this->{'describe' . ucfirst($type)}($data);
            }
        }

        $this->query['create_definition'] = '(' . PHP_EOL . implode(',' . PHP_EOL, $query_body) . PHP_EOL  . ')';

        return $this;
    }

    public function setOptions($options = 'Engine=InnoDB') {
        
        string_hint($options);

        $this->query['table_options'] = ' ' . $options;

        return $this;
    }

    public function describeInt(FieldDescription $data) {

        $description = $data->getName() . ' int';
        if ($length = $data->getMaxLength()) {
            $description .= ' (' . $length . ')';
        }

        if ($mysql_description = $data->getMysqlDescription()) {
             $description .= ' ' . $mysql_description;
        }

        return $description;
    }

    public function describeChar($data) {
        
    }

    public function describeString($data) {
        
    }

    public function describeVarchar($data) {
        
    }

    public function describeText($data) {
        
    }

    public function describeFloat($data) {
        
    }

    public function drop($name) {

        string_hint($name);

        $this->flushQuery();

        $this->query = 'DROP TABLE ' . $name . ';';

        return $this;
    }

    public function truncate($name) {

        string_hint($name);

        $this->flushQuery();

        $this->query = 'TRUNCATE TABLE ' . $name . ';';

        return $this;
    }

    public function insert($table) {

        string_hint($table);

        $this->flushQuery();
        $this->query = self::$insert_array;


        if (isset($this->query['insert'])) {

            $this->query['insert'] = 'INSERT INTO ' . $table;
        }

        return $this;

    }

    public function values(array $data) {

        if (isset($this->query['values'])) {

            $columns = array();
            $values = array();

            $data = $this->prepareValues($data);

            foreach ($data as $column => $value) {
                $columns[] = $column;
                $values[] = $value;
            }

            $columns = implode(', ', $columns);
            $values = implode(', ', $values);


            $this->query['values'] = ' (' . $columns . ') VALUES (' . $values . ')';
        }

        return $this;        
    }

    public function update($table) {

        string_hint($table);

        $this->flushQuery();
        $this->query = self::$update_array;


        if (isset($this->query['update'])) {

            $this->query['update'] = 'UPDATE ' . $table;
        }

        return $this;

    }


    public function set(array $fields) {

        $expressions = array();

        foreach ($fields as $name => $value) {
            $expressions[] = $name . '=' . $this->addQuotes($value);
        }

        $expressions = implode(', ', $expressions);

        if (isset($this->query['set'])) {

            $this->query['set'] = ' SET ' . $expressions;
        }

        return $this;
    }


    public function select($fields) {

        string_hint($fields);

        $this->flushQuery();
        $this->query = self::$select_array;


        if (isset($this->query['select'])) {

            $this->query['select'] = 'SELECT ' . $fields;
        }

        return $this;
    }

    public function from($tables) {

        string_hint($tables);

        if (isset($this->query['from'])) {

            $this->query['from'] = ' FROM ' . $tables;
        }

        return $this;
    }

    public function where($definition) {

        string_hint($definition);

        if (isset($this->query['where'])) {

            $this->query['where'] = ' WHERE ' . $definition;
        }

        return $this;
    }

    public function groupBy($definition) {

        string_hint($definition);

        if (isset($this->query['group_by'])) {

            $this->query['group_by'] = ' GROUP BY ' . $definition;
        }

        return $this;
    }

    public function orderBy($definition) {

        string_hint($definition);

        if (isset($this->query['order_by'])) {

            $this->query['order_by'] = ' ORDER BY ' . $definition;
        }

        return $this;
    }

    public function limit($definition) {

        string_hint($definition);

        if (isset($this->query['limit'])) {

            $this->query['limit'] = ' LIMIT ' . $definition;
        }

        return $this;
    }

    public function delete($table) {

        string_hint($table);

        $this->flushQuery();
        $this->query = self::$delete_array;


        if (isset($this->query['delete'])) {

            $this->query['delete'] = 'DELETE FROM ' . $table;
        }

        return $this;
    }

    public function addQuotes($data) {

        string_hint($data);

        return '\'' . $data . '\'';
    }

    public function prepareValues(array $values = array()) {

        foreach ($values as $key => $value) {

            if ( is_string($value) ) {

                $values[$key] = $this->addQuotes($value);
            } elseif ( is_bool($value) ) {

                $values[$key] = ( $value === true ) ? 'true' : 'false';
            } elseif (is_callable($value)) {

                $values[$key] = $value();
            }
        }

        return $values;
    }

    public function flushQuery() {
        $this->query = array();
    }

    public function __toString() {

        if (is_array($this->query)) {

            $query = implode('', $this->query);
        } else {

            $query = $this->query;
        }

        return $query . ';';
    }
}
