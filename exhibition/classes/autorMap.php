<?php


class autorMap extends BaseMap
{
    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT user_id, info,education FROM autor WHERE user_id = $id");
            $autor = $res->fetchObject("autor");
            if ($autor) {
                return $autor;
            }
        }
        return new autor();
    }


    public function save(user $user,autor $autor){
        if ($user->validate() && $autor->validate() && (new userMap())->save($user)) {
            if ($autor->user_id == 0) {
                $autor->user_id = $user->user_id;
                return $this->insert($autor);
            }
            else {
                return $this->update($autor);
            }
        }
        return false;
    }




    public function arrUser(){
        $res = $this->db->query("SELECT user.user_id AS id, user.name AS value FROM user INNER JOIN autor on user.user_id = autor.user_id ");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function arrUser2(){
        $res = $this->db->query("SELECT user.user_id AS id, user.name AS value FROM user INNER JOIN autor on user.user_id = autor.user_id ");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }



    private function insert(autor $autor){
        $info = $this-> db->quote($autor->info);
        $education = $this-> db->quote($autor->education);
        if ($this->db->exec("INSERT INTO autor(user_id, info, education) VALUES($autor->user_id, $info,$education)") == 1) {
            return true;
        }
        return false;
    }

    private function update(autor $autor){
        $info = $this-> db->quote($autor->info);
        $education = $this-> db->quote($autor->education);
        if ($this->db->exec("UPDATE autor SET info = $info ,education = $education  WHERE user_id=".$autor->user_id) == 1) {
            return true;
        }

        return false;
    }



    public function findAll($ofset=0, $limit=30){
        $res = $this->db->query("SELECT user.user_id, user.name , user.birthday, autor.info, autor.education ,   gender.name AS gender  FROM user INNER JOIN autor ON user.user_id=autor.user_id INNER JOIN gender ON user.gender_id=gender.gender_id  LIMIT $ofset, $limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM autor");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }

    public function findProfileById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT autor.user_id, info, education FROM autor ". "WHERE autor.user_id =$id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }

}