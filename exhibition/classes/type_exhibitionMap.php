<?php


class type_exhibitionMap extends BaseMap
{

    public function findById($id = null)
    {
        if ($id) {
            $res = $this->db->query("SELECT type_exhibition_id, name " . "FROM type_exhibition WHERE type_exhibition_id = $id");
            $type_exhibition = $res->fetchObject("type_exhibition");
            if ($type_exhibition) {
                return $type_exhibition;
            }
        }
        return new type_exhibition();
    }

    public function arrtype()
    {
        $res = $this->db->query("SELECT type_exhibition_id AS id, name AS value FROM type_exhibition");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }


    public function save(type_exhibition $type_exhibition)
    {

        if ($type_exhibition->type_exhibition_id == 0) {
            return $this->insert($type_exhibition);
        } else {
            return $this->update($type_exhibition);
        }

        return false;
    }


    private function insert(type_exhibition $type_exhibition)
    {
        $name = $this->db->quote($type_exhibition->name);


        if ($this->db->exec("INSERT INTO type_exhibition( name)" . " VALUES($name )") == 1) {
            $type_exhibition->type_exhibition_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }


    private function update(type_exhibition $type_exhibition)
    {
        $name = $this->db->quote($type_exhibition->name);
        if ($this->db->exec("UPDATE type_exhibition SET name = $name" . "WHERE type_exhibition_id = " . $type_exhibition->type_exhibition_id) == 1) {
            return true;
        }
        return false;
    }


    public function findProfileById($id = null)
    {
        if ($id) {
            $res = $this->db->query("SELECT type_exhibition.type_exhibition.id, type_exhibition.name AS gender FROM user INNER JOIN gender ON user.gender_id=gender.gender_id WHERE user.user_id = $id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }
}






