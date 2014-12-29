<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        if ($request->isMethod('POST')) {
            $transLang = $request->request->get('transLang');
            $text = $request->request->get('textArea');
            $lang = $this->get('vitchooselang')->chooseLang($transLang);

            return $this->render('default/index.html.twig',
                ['transLang' => $transLang,
                    'text' => $text,
                    'fromLang' => $lang['from'],
                    'toLang' => $lang['to'],
                ]);
        }
        return $this->render('default/index.html.twig',
            ['transLang' => '2',
                'text' => 'Enter text to translate',
                'fromLang' => 'en',
                'toLang' => 'ru',
            ]);
    }
}