<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Insult;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class AdminController extends Controller
{
    public function createAction(Request $request)
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

        return $this->render('@App/forms/create.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }

}
