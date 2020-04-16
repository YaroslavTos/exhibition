<?php


class userMap extends BaseMap
{

    public function findById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT user_id, name,gender_id, birthday ". "FROM user WHERE user_id = $id");
            $user = $res->fetchObject("User");
            if ($user) {
                return $user;
            }
        }
        return new User();
    }

    public function arrGenders(){
        $res = $this->db->query("SELECT gender_id AS id, name AS value FROM gender");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }



    public function save(User $user){

            if ($user->user_id == 0) {
                return $this->insert($user);
            }
            else {
                return $this->update($user);
            }

        return false;
    }



    private function insert(User $user){
        $name = $this->db->quote($user->name);
        $birthday = $this->db->quote($user->birthday);

        if ($this->db->exec("INSERT INTO user( name, gender_id, birthday)". " VALUES($name, $user->gender_id, $birthday )") == 1) {
            $user->user_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }

    private function update(User $user){
        $name = $this->db->quote($user->name);
        $birthday = $this->db->quote($user->birthday);
        if ( $this->db->exec("UPDATE user SET name = $name, gender_id = $user->gender_id, birthday = $birthday ". "WHERE user_id = ".$user->user_id) == 1) {
            return true;
        }
        return false;
    }



    public function findProfileById($id=null){
        if ($id) {
            $res = $this->db->query("SELECT user.user_id, user.name, user.birthday, gender.name AS gender FROM user INNER JOIN gender ON user.gender_id=gender.gender_id WHERE user.user_id = $id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }






}