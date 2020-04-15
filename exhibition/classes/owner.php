<?php


class owner extends BaseMap
{
    public $user_id=0;
    public $adress='';
    public $telephone='';

    public function validate()
    {
        if (!empty($this->adress) &&
            !empty($this->telephone)) {
            return true;
        }
        return false;
        //return false;
    }
}