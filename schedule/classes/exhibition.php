<?php


class exhibition extends BaseMap
{
    public $exhibition_id=0;
    public $name='';
    public $hall_id='';
    public $date='';
    public $adress='';
    public $type_exhibition_id='';


    public function validate()
    {
        if (!empty($this->exhibition_id) &&
            !empty($this->name) &&
            !empty($this->hall_id) &&
            !empty($this->date) &&
            !empty($this->adress) &&
            !empty($this->type_exhibition_id))
        {
            return true;
        }
        return false;
        //return false;
    }
}