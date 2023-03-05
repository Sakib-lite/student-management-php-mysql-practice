<?php


class Utility
{
    public $blank = false;

    public function checkBlankField($formData)
    {

        foreach ($formData as $key => $value) {
            if (empty($value)) {
                echo htmlspecialchars($key) . " field  is empty" . "<br>";
                $this->blank = true;
            }
        }


    }


}


