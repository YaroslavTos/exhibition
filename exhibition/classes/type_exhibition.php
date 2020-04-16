<?php


class type_exhibition extends BaseMap
{
    public $type_exhibition_id=0;
    public $name='';


    public function validate()
    {
        if (!empty($this->name))
        {
            return true;
        }
        return false;
        //return false;
    }
}