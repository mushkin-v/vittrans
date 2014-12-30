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
//        $text = $request->request->has('text')? $request->request->get('text'): $this->get('translator')->trans('Text.to.trans');
        $text = $request->isMethod('GET')? $request->get('text'): $this->get('translator')->trans('Text.to.trans');

        return $this->render('default/index.html.twig',
            [   'text' => $text,
                'fromLang' => $request->isMethod('GET')? $request->get('translate-from'): 'en',
                'toLang' => $request->isMethod('GET')? $request->get('translate-to'): 'ru',
            ]);
    }
}