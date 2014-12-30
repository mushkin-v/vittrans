<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/{_locale}", name="homepage", defaults={"_locale": "en"}, requirements={"_locale": "en|ru"})
     */
    public function indexAction(Request $request)
    {
        if ($request->isMethod('POST')) {
            $transLang = $request->getLocale();
            $text = $request->request->get('textArea');
            $lang = $this->get('vitchooselang')->chooseLang($transLang);

            return $this->render('default/index.html.twig',
                ['transLang' => $transLang,
                    'text' => $text,
                    'fromLang' => $lang['from'],
                    'toLang' => $lang['to'],
                ]);
        }

        $transLang = $request->getLocale();
        $text = $this->get('translator')->trans('Text.to.trans');
        $lang = $this->get('vitchooselang')->chooseLang($transLang);

        return $this->render('default/index.html.twig',
            ['transLang' => $transLang,
                'text' => $text,
                'fromLang' => $lang['from'],
                'toLang' => $lang['to'],
            ]);
    }
}