<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Insult;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('@App/home/index.html.twig');
    }

    //get all insults based on level
    public function generateAction($level)
    {
        $insult = new Insult();

        $insult = $insult->getLevel($level);
    }
}
