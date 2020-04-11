<?php

use Psr\Http\Message\ResponseInterface as RS;
use Psr\Http\Message\ServerRequestInterface as SR;

$app->get('/admin/repair', function (SR $rq, RS $rs, array $ag) {
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
                                        $sql2 .= "'" . $val . "',";
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
                $tmp2 .= "'" . $val . "',";
            }
            $tmp1 = rtrim($tmp1, ',') . ')';
            $tmp2 = rtrim($tmp2, ',') . ');';
            $sqlScript .= $tmp1 . ' ' . $tmp2 . "\n\n";
        }

        $sqlScript .= "\n";
    }
    file_put_contents('app/backup/database.sql', $sqlScript);
    ob_clean();
    return 'Done!';
});

/**
 * set language for current user
 */
$app->post('/setLang', function (SR $rq, RS $rs, array $ag) {
    $_SESSION['lang'] = $rq->getParam('lang');
    return $rs->withJson(array('success' => 1));
});
$app->get('/setLang/{lang}', function (SR $rq, RS $rs, array $ag) {
    $_SESSION['lang'] = $ag['lang'];
    return $rs->withRedirect($rq->getParam('redirect_to'));
});

$app->get('/admin/module/{name}', function (SR $rq, RS $rs, array $ag) {
    $s = file_get_contents('app/backup/router.php');
    $s = str_replace('modulenametkt', $ag['name'], $s);
    file_put_contents('app/routers/' . $ag['name'] . '.php', $s);

    $s = file_get_contents('app/backup/database.php');
    $s = str_replace('modulenametkt', $ag['name'], $s);
    file_put_contents('app/database/' . $ag['name'] . '.php', $s);

    mkdir('app/views/app/' . $ag['name']);

    $s = file_get_contents('app/backup/create.twig');
    $s = str_replace('modulenametkt', $ag['name'], $s);
    file_put_contents('app/views/app/' . $ag['name'] . '/create.twig', $s);

    $s = file_get_contents('app/backup/list.twig');
    $s = str_replace('modulenametkt', $ag['name'], $s);
    file_put_contents('app/views/app/' . $ag['name'] . '/list.twig', $s);

    $s = file_get_contents('app/backup/detail.twig');
    $s = str_replace('modulenametkt', $ag['name'], $s);
    file_put_contents('app/views/app/' . $ag['name'] . '/detail.twig', $s);

    $s = file_get_contents('app/backup/edit.twig');
    $s = str_replace('modulenametkt', $ag['name'], $s);
    file_put_contents('app/views/app/' . $ag['name'] . '/edit.twig', $s);

    $s = file_get_contents('app/backup/menu.twig');
    $s = str_replace('modulenametkt', $ag['name'], $s);

    $s1 = file_get_contents('app/views/app/menu_sidebar.twig');
    $s1 = str_replace('{#menutktaddnew#}', $s . '{#menutktaddnew#}', $s1);
    file_put_contents('app/views/app/menu_sidebar.twig', $s1);


    return $rs->withRedirect($GLOBALS['config']['base_url'] . '/admin/repair');
});