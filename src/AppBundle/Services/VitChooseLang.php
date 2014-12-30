<?php

namespace AppBundle\Services;

use Symfony\Component\Routing\Router;

class VitChooseLang
{
    protected $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }
    public function chooseLang($transLang)
    {
        if ($transLang == 'ru'){
            $from = 'ru';
            $to = 'en';
        } else {
            $from = 'en';
            $to = 'ru';
        }

        return array('from'=>$from,'to'=>$to);
    }
}