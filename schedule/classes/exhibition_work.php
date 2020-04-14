<?php


class exhibition_work extends BaseMap
{
    public $exhibition_id='';
    public $user_id='';
    public $work_id='';

    public function validate()
    {
        if (!empty($this->exhibition_id) &&
            !empty($this->user_id) &&
            !empty($this->work_id)) {
            return true;
        }
        return false;
        //return false;
    }
}