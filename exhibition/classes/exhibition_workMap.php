<?php


class exhibition_workMap extends BaseMap
{
    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT exhibition_id ,user_id, work_id FROM exhibition_work WHERE exhibition_id = $id, user_id = $id, work_id = $id");
            $exhibition_work = $res->fetchObject("exhibition_work");
            if ($exhibition_work) {
                return $exhibition_work;
            }
        }
        return new exhibition_work();
    }

    public function save(exhibition_work $exhibition_work)
    {
        if ($exhibition_work->validate()) {
            if ($exhibition_work->exhibition_work_id == 0) {
                return $this->insert($exhibition_work);
            } else {
                return $this->update($exhibition_work);
            }
        }
        return false;
    }


    private function insert(Exhibition_work $exhibition_work){
        if ($this->db->exec("INSERT INTO exhibition_work(exhibition_id, user_id, work_id) VALUES($exhibition_work->exhibition_id, $exhibition_work->user_id, $exhibition_work->work_id)") == 1) {
            return true;
        }
        return false;
    }

    private function update(Exhibition_work $exhibition_work){
        if ($this->db->exec("UPDATE Exhibition_work SET $exhibition_work->exhibition_id, $exhibition_work->user_id, $exhibition_work->work_id WHERE exhibition_work_id=".$exhibition_work->exhibition_work_id) == 1) {
            return true;
        }
        return false;
    }

    public function findAll($ofset = 0, $limit = 30)
    {
        $res = $this->db->query("SELECT exhibition_work_id, exhibition_id ,user_id,work_id FROM exhibition_work LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function count()
    {
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM exhibition_work");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }

    public function findViewById($id = null)
    {
        if ($id) {
            $res = $this->db->query("SELECT exhibition_work_id, exhibition_id,user_id,work_id  FROM exhibition_work WHERE exhibition_work_id =$id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }
}

