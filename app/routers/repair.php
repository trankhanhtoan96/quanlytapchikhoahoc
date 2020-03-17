<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$app->get('/admin/repair', function (ServerRequestInterface $rq, ResponseInterface $rs, array $ag) {
    if (empty($this->db)) return 'Database not config yet!';
    $databases = scandir('app/database');
    foreach ($databases as $database) {
        if (is_file('app/database/' . $database)) {
            $tables = $values = array();
            include 'app/database/' . $database;
            foreach ($tables as $tableName => $table) {
                if ($r1 = $this->db->query("SHOW TABLES LIKE '{$tableName}'")) {
                    if ($r1->num_rows > 0) {
                        /*
                         * table exist
                         * check field to add or modify
                         */
                        foreach ($table as $fieldName => $field) {
                            if ($r2 = $this->db->query("SHOW COLUMNS FROM $table LIKE '$fieldName'")) {
                                if ($r2->num_rows > 0) {
                                    $required = (empty($field['required']) ? '' : 'not null');
                                    $this->db->query("ALTER TABLE {$table} MODIFY {$fieldName} {$field['dbType']} {$required}");
                                }
                            } else {
                                $required = (empty($field['required']) ? '' : 'not null');
                                $this->db->query("ALTER TABLE $tableName ADD COLUMN  {$fieldName} {$field['dbType']} {$required}");
                            }
                        }
                    } else {
                        /**
                         * table not exist
                         * create table for new
                         */
                        $sql = "create table " . $tableName . " (";
                        foreach ($table as $fieldName => $field) {
                            $required = (empty($field['required']) ? '' : 'not null');
                            $sql .= "{$fieldName} {$field['dbType']} {$required} ,";
                        }
                        $sql = rtrim($sql, ',') . ')';
                        $this->db->query($sql);

                        /**
                         * insert default data
                         */
                        if (!empty($values)) {
                            foreach ($values as $table => $datas) {
                                foreach ($datas as $data) {
                                    $sql = "insert into {$table} (";
                                    $sql2 = 'values(';
                                    foreach ($data as $col => $val) {
                                        $sql .= $col . ',';
                                        $sql2 .= '"' . $val . '",';
                                    }
                                    $sql = rtrim($sql, ',') . ') ' . rtrim($sql2, ',') . ')';
                                    $this->db->query($sql);
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    /**
     * backup SQL
     */
    $tables = array();
    $result = $this->db->query("SHOW TABLES");
    while ($row = $result->fetch_row()) $tables[] = $row[0];
    $sqlScript = "";
    foreach ($tables as $table) {
        $result = $this->db->query("SHOW CREATE TABLE $table");
        $row = $result->fetch_row();
        $sqlScript .= $row[1] . ";\n\n";


        $result = $this->db->query("SELECT * FROM $table");
        while ($row = $result->fetch_assoc()) {
            $tmp1 = "insert into " . $table . "(";
            $tmp2 = "values(";
            foreach ($row as $key => $val) {
                $tmp1 .= $key . ',';
                $tmp2 .= '"' . $val . '",';
            }
            $tmp1 = rtrim($tmp1, ',') . ')';
            $tmp2 = rtrim($tmp2, ',') . ');';
            $sqlScript .= $tmp1 . ' ' . $tmp2 . "\n\n";
        }

        $sqlScript .= "\n";
    }
    file_put_contents('app/database/backup.database.sql', $sqlScript);
    ob_clean();
    return 'Done!';
});

/**
 * set language for current user
 */
$app->post('/setLang', function (ServerRequestInterface $rq, ResponseInterface $rs, array $ag) {
    $_SESSION['lang'] = $rq->getParam('lang');
    return $rs->withJson(array('success' => 1));
});