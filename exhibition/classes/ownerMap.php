<?php


class ownerMap extends BaseMap
{
    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT user_id, adress, telephone  FROM owner WHERE user_id = $id");
            $owner = $res->fetchObject("Owner");
            if ($owner) {
                return $owner;
            }
        }
        return new owner();
    }

    public function save(user $user,owner $owner){
        if ($user->validate() && $owner->validate() && (new userMap())->save($user)) {
            if ($owner->user_id == 0) {
                $owner->user_id = $user->user_id;
                return $this->insert($owner);
            }
            else {
                return $this->update($owner);
            }
        }
        return false;
    }
    private function insert(owner $owner){
        $adress = $this-> db->quote($owner->adress);
        $telephone = $this-> db->quote($owner->telephone);
        if ($this->db->exec("INSERT INTO owner(user_id, adress, telephone) VALUES($owner->user_id, $adress, $telephone)") == 1) {
            return true;
        }
        return false;
    }

    private function update(owner $owner){
        $adress = $this-> db->quote($owner->adress);
        $telephone = $this-> db->quote($owner->telephone);
        if ($this->db->exec("UPDATE owner SET  adress= $adress, telephone= $telephone WHERE user_id=".$owner->user_id) == 1) {
            return true;
        }
        return false;
    }

    public function findAll($ofset=0, $limit=30){
        $res = $this->db->query("SELECT user.user_id, name, user.birthday, ". " gender.name AS gender, FROM user INNER JOIN owner ON user.user_id=owner.user_id ". "INNER JOIN gender ON user.gender_id=gender.gender_id  LIMIT $ofset, $limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }

    public function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM owner");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }


    public function findProfileById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT owner.user_id, ". " WHERE owner.user_id =$id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }
}