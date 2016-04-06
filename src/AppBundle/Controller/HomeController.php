<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
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

    public function insultAction()
    {
        return $this->render(
            'home/index.html.twig',
            array('insult' => true)
            );
    }

    public function listAction()
    {
        // List all insults by id - no time or date ordering. Possible ordering by level
        // Create admin controller and move everything below to that controller
    }

    public function createAction()
    {
        // Create a create view
        return $this->render('@App/forms/create.html.twig');
    }

    public function editAction($id)
    {
        // Create edit view
        // Use create view wisely
    }

    public function deleteAction($id)
    {
        // Figure out how to delete insults
    }
}
