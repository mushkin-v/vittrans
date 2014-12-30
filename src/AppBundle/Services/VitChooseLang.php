<?php

namespace AppBundle\Services;

class VitChooseLang
{
    public function chooseLang($transLang)
    {
        return array('from'=>$transLang == 'ru'? 'ru': 'en','to'=>$transLang == 'ru'? 'en': 'ru');
    }
}