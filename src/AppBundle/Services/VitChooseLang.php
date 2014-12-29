<?php

namespace AppBundle\Services;

class VitChooseLang
{
    public function chooseLang($transLang)
    {
        if ($transLang == 1){
            $from = 'ru';
            $to = 'en';
        } else {
            $from = 'en';
            $to = 'ru';
        }

        return array('from'=>$from,'to'=>$to);
    }
}