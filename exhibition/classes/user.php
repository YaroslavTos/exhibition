<?php


class user extends BaseMap
{
    public $user_id=0;
    public $name='';
    public $gender_id=0;
    public $birthday='';

    public function validate()
    {
        if (!empty($this->user_id) &&
            !empty($this->name) &&
            !empty($this->birthday) &&
            !empty($this->gender_id)) {
            return true;
        }
        return false;
        //return false;
    }

}