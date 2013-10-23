<?php

namespace Me\Bundle\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/demo-1")
     * @Template()
     */
    public function counterAction()
    {
        return array();
    }

    /**
     * @Route("/demo-2")
     * @Template()
     */
    public function mailAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {

            $mail = $request->request->get('email');

            if (!$mail || strpos($mail, 'yopmail')) {

                return array('message' => 'Mail invalide');
            }


            $message = \Swift_Message::newInstance()
                ->setSubject('Register to newsletter')
                ->setFrom('send@example.com')
                ->setTo($mail)
                ->setBody('hello world');

            $this->get('mailer')->send($message);

            return array('message' => 'message envoyé');
        }

        return array();
    }

    /**
     * @Route("/demo-3")
     * @Template()
     */
    public function calculatorAction()
    {


        return array();
    }


}
