<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Insult;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class HomeController extends Controller
{
    public function indexAction(Request $request)
    {
        $insult = new Insult();

        $form = $this->createFormBuilder($insult)
            ->add('level', ChoiceType::class,
                [
                    'label' => 'Pick insult level',
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
                    'label' => 'Generate Insult',
                    'attr' => [
                        'class' => 'btn btn-primary',
                    ]
                ]
            )
            ->getForm();

        $form->handleRequest($request);


        // Add validation
        if($form->isSubmitted() && $form->isValid()) {

            $level = $form['level']->getData();

            return  $this->redirectToRoute('generate', ['level' => $level]);
        }

        return $this->render('@App/home/index.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }

    //get all insults based on level
    public function generateAction(Request $request)
    {
        $level = $request->get('level');

        $insult = new Insult();

        $content = $insult->getLevel();

        return new Response(dump($content));
        
//        return $this->render('@App/home/index.html.twig',
//                [
//                    'level' => $level,
//                ]
//            );
    }
}