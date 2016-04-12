<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Insult;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('@App/home/index.html.twig');
    }

    //Move this to a separate createInsult class

    public function newAction(Request $request)
    {
        $insult = new Insult();

        $form = $this->createFormBuilder($insult)
            ->add('content', TextareaType::class,
                [
                'label' => 'Write your insult',
                    'attr' => [
                        'class' => 'form-control',
                    ],
                ]
            )
            ->add('level', ChoiceType::class,
                [
                    'label' => 'Set insult level',
                    'attr' => [
                        'class' => 'form-control',
                    ],
                    'choices' => [
                        'Posh' => 1,
                        'Normal' => 2,
                        'Brutal' => 3,
                    ],
                ]
            )
            ->add('save', SubmitType::class,
                [
                    'label' => 'Create Insult',
                    'attr' => [
                        'class' => 'btn btn-primary',
                    ]
                ]
            )
            ->getForm();

        $form->handleRequest($request);

        // Add validation
        if($form->isSubmitted() && $form->isValid()) {

            $content = $form['content']->getData();
            $level = $form['level']->getData();

            $insult->setContent($content);
            $insult->setLevel($level);

            $em = $this->getDoctrine()->getManager();

            $em->persist($insult);
            $em->flush();

            return new Response('Successfully saved');
        }

        return $this->render('AppBundle:forms:new.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }

    // Create admin controller and move everything below to that controller

    public function listAction()
    {
        // List all insults by id - no time or date ordering. Possible ordering by level
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
