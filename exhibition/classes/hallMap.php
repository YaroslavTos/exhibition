<?php


class hallMap extends BaseMap
{



    public function findById($id = null)
    {
        if ($id) {
            $res = $this->db->query("SELECT hall_id, owner.user_id->hall.user_id, name, area,adress,telephone, user_id FROM hall WHERE hall_id = $id");
            return $res->fetchObject("hall");
        }
        return new hall();
    }

    public function save(hall $hall)
    {
        if ($hall->validate()) {
            if ($hall->hall_id == 0) {
                return $this->insert($hall);
            } else {
                return $this->update($hall);
            }
        }
        return false;
    }




    public function arrhall(){
        $res = $this->db->query("SELECT hall.hall_id AS id, hall.name AS value FROM hall INNER JOIN exhibition on hall.hall_id = exhibition.hall_id ");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }




    private function insert(hall $hall)
    {
        $name = $this->db->quote($hall->name);
        $area = $this->db->quote($hall->area);
        $adress = $this->db->quote($hall->adress);
        $telephone = $this->db->quote($hall->telephone);

        if ($this->db->exec("INSERT INTO hall(name,area,adress,telephone,user_id)" . " VALUES($name, $area, $adress, $telephone, $hall->user_id)") == 1) {
            $hall->hall_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }

    private function update(hall $hall)
    {
        $name = $this->db->quote($hall->name);
        $area = $this->db->quote($hall->area);
        $adress = $this->db->quote($hall->adress);
        $telephone = $this->db->quote($hall->telephone);

        if ($this->db->exec("UPDATE hall SET name = $name," . " $area,$adress,$telephone, $hall->user_id WHERE hall_id = " . $hall->hall_id) == 1) {
            return true;
        }
        return false;
    }

    public function findAll($ofset = 0, $limit = 30)
    {
        $res = $this->db->query("SELECT hall_id, name,area,adress,telephone, user_id FROM hall LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function count()
    {
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM hall");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }

    public function findViewById($id = null)
    {
        if ($id) {
            $res = $this->db->query("SELECT hall_id, name, area,adress,telephone, user_id FROM hall WHERE hall_id =$id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }

}