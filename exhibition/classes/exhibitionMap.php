<?php


class exhibitionMap extends BaseMap
{



    public function findById($id = null)
    {
        if ($id) {
            $res = $this->db->query("SELECT exhibition_id, hall.hall_id->exhibition.hall_id, type_exhibition.type_exhibition_id->exhibition.type_exhibition_id, name, hall_id,date,adress,type_exhibition_id FROM exhibition WHERE exhibition_id = $id");
            return $res->fetchObject("exhibition");
        }
        return new exhibition();
    }

    public function save(exhibition $exhibition)
    {
        if ($exhibition->validate()) {
            if ($exhibition->exhibition_id == 0) {
                return $this->insert($exhibition);
            } else {
                return $this->update($exhibition);
            }
        }
        return false;
    }



    public function arrex(){
        $res = $this->db->query("SELECT exhibition.exhibition_id AS id, exhibition.name AS value FROM exhibition INNER JOIN exhibition_work on exhibition.exhibition_id = exhibition_work.exhibition_id ");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }




    private function insert(exhibition $exhibition)
    {
        $name = $this->db->quote($exhibition->name);
        $date= $this->db->quote($exhibition->date);
        $adress = $this->db->quote($exhibition->adress);


        if ($this->db->exec("INSERT INTO exhibition(name,hall_id,date,adress,type_exhibition_id)" . " VALUES($name,$exhibition->hall_id,$date, $adress, $exhibition->type_exhibition_id)") == 1) {
            $exhibition->exhibition_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }



    private function update(exhibition $exhibition)
    {
        $name = $this->db->quote($exhibition->name);
        $date= $this->db->quote($exhibition->date);
        $adress = $this->db->quote($exhibition->adress);

        if ($this->db->exec("UPDATE exhibition SET name = $name," . "$exhibition->hall_id,$date,$adress,$exhibition->type_exhibition_id WHERE exhibition_id = " . $exhibition->exhibition_id) == 1) {
            return true;
        }
        return false;
    }


    public function findAll($ofset = 0, $limit = 30)
    {
        $res = $this->db->query("SELECT exhibition_id, name,hall_id,date,adress,type_exhibition_id FROM exhibition LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }


    public function count()
    {
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM exhibition");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }


    public function findViewById($id = null)
    {
        if ($id) {
            $res = $this->db->query("SELECT exhibition_id, name,hall_id,date,adress,type_exhibition_id FROM exhibition WHERE exhibition_id =$id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }


}