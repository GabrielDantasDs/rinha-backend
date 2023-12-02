<?php 

namespace models;

use Exception;

class Users {

    public static function createTable() {
        try {
            $create_statement = 'CREATE TABLE IF NOT EXISTS users (
                id serial,
                name varchar(100),
                nickname varchar(32),
                birthday date,
                stack varchar(32)
            );';

            pg_query($GLOBALS['connect_pg'], $create_statement);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return true;
    }

    public static function insert($values) {
        $values = json_decode($values);

        try {
            return pg_insert($GLOBALS['connect_pg'], 'users', ['name' => $values->name, 'nickname' => $values->nickname, 'birthday' => $values->birthday, 'stack' => $values->stack ]);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return true;    
    }

    public static function update($id, $values) {
        $values = json_decode($values);

        try {
            return pg_update($GLOBALS['connect_pg'], 'users', ['name' => $values->name, 'nickname' => $values->nickname, 'birthday' => $values->birthday, 'stack' => $values->stack ], ['id' => $id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return true; 
    }

    public static function get($id) {
        try {
            return pg_select($GLOBALS['connect_pg'], 'users', ['id' => $id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return true; 
    }

    public static function delete($id) {
        try {
            return pg_delete($GLOBALS['connect_pg'], 'users', ['id' => $id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }

        return true; 
    }
}