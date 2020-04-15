<?php


class workMap extends BaseMap
{

    public function arrSpecials(){
        $res = $this->db->query("SELECT work_id AS id, name AS value FROM work");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT work_id, autor.user_id->work.user_id, name, user_id, date_create, execution, height, width, volume FROM work WHERE work_id = $id");
            return $res->fetchObject("work");
        }
        return new work();
    }

    public function save(work $work){
        if ($work->validate()) {
            if ($work->work_id == 0) {
                return $this->insert($work);
            }
            else {
                return $this->update($work);
            }
        }
        return false;
    }

    private function insert(work $work){
        $name = $this->db->quote($work->name);
        $date_create = $this->db->quote($work->date_create);
        $execution = $this->db->quote($work->execution);
        $height = $this->db->quote($work->height);
        $width = $this->db->quote($work->width);
        $volume = $this->db->quote($work->volume);

        if ($this->db->exec("INSERT INTO work(name,user_id, date_create, execution, height, width, volume,)". " VALUES($name, $work->user_id, $date_create, $execution, $height, $width, $volume)") == 1) {
            $work->work_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }

    private function update(work $work){
        $name = $this->db->quote($work->name);
        $date_create = $this->db->quote($work->date_create);
        $execution = $this->db->quote($work->execution);
        $height = $this->db->quote($work->height);
        $width = $this->db->quote($work->width);
        $volume = $this->db->quote($work->volume);
        if ( $this->db->exec("UPDATE work SET name = $name,". " date_begin = $date_create, $work->user_id, $execution, $height, $width, $volume WHERE work_id = ".$work->work_id) == 1) {
            return true;
        }
        return false;
    }

    public function findAll($ofset=0, $limit=30){
        $res = $this->db->query("SELECT work_id, name, user_id, date_create, execution, height, width, volume FROM work LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM work");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }

    public function findViewById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT work_id, name, user_id, date_create, execution, height, width, volume  FROM work WHERE work_id =$id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }
}