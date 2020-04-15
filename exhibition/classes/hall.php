<?php


class hall extends BaseMap
{
    public $hall_id=0;
    public $name='';
    public $area='';
    public $adress='';
    public $telephone='';
    public $user_id='';

    public function validate()
    {
        if (!empty($this->hall_id) &&
            !empty($this->name) &&
            !empty($this->area) &&
            !empty($this->adress) &&
            !empty($this->telephone) &&
            !empty($this->user_id)) {
            return true;
        }
        return false;
        //return false;
    }
}