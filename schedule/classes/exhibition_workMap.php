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
        return new Exhibition_work();
    }
    public function save(User $user,Exhibition_work $exhibition_work){
        if ($user->validate() && $exhibition_work->validate() && (new exhibition_workMap())->save($user)) {
            if ($exhibition_work->user_id == 0) {
                $exhibition_work->user_id = $user->user_id;
                return $this->insert($exhibition_work);
            }
            else {
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
        if ($this->db->exec("UPDATE Exhibition_work SET exhibition_id = $exhibition_work->exhibition_id WHERE exhibition_id=".$exhibition_work->exhibition_id) == 1) {
            return true;
        }
        return false;
    }

    public function findAll($ofset=0, $limit=30){
        $res = $this->db->query("SELECT exhibition.exhibition_id, ". " FROM exhibition INNER JOIN exhibition_work ON work.work_id=exhibition_work.work_id ". "INNER JOIN user ON autor.user_id=exhibition_work.user_id LIMIT $ofset, $limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM exhibition_work");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }

    public function findProfileById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT Exhibition_work.exhibition_id, exhibition.name AS exhibition FROM exhibition_work ". "INNER JOIN work ON exhibition_work.work_id=work.work_id WHERE autor.user_id =$id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }
}