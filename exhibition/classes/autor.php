<?php


class autor extends BaseMap
{
    public $user_id=0;
    public $info='';
    public $education='';

    public function validate()
    {
        if (!empty($this->user_id) &&
            !empty($this->info) &&
            !empty($this->education)) {
            return true;
        }
        return false;
        //return false;
    }
}