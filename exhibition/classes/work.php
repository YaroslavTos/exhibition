<?php


class work extends Table
{
    public $work_id=0;
    public $user_id='';
    public $name='';
    public $date_create='';
    public $execution='';
    public $height='';
    public $width='';



    public function validate()
    {
        if (!empty($this->user_id) &&
            !empty($this->name) &&
            !empty($this->date_create) &&
            !empty($this->execution) &&
            !empty($this->height) &&
            !empty($this->width))
             {
            return true;
        }
        return false;
        //return false;
    }
}