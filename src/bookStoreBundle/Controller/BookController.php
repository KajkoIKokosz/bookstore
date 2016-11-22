<?php

namespace bookStoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use bookStoreBundle\Entity\Book;
use Symfony\Component\HttpFoundation\Request;

class BookController extends Controller
{
    /**
     * @Route("/create")
     */
    public function createAction()
    {   
        $newBook = new Book();
        $form = $this->createFormBuilder($newBook)
                ->setAction($this->generateUrl('save_to_db'))
                ->add('Author', 'text')
                ->add('title', 'text')
                ->add('page', 'text')
                ->add('publishYear', 'text')
                ->add('save', 'submit', array ('label'=>'Create Task'))
                ->getForm();
        
        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();
        }
        
        return $this->redirectToRoute('task_success');
        
        return $this->render('bookStoreBundle:Book:create.html.twig', array(
            'form'=>$form->createView()
        ));
    }
    
    /**
     * @Route("/saveToDb/{form}", name="save_to_db")
     */
    public function handleFormData(Request $request, $form) {
        $form->handleRequest($request);
        
        if( $form->isSubmitted() ) {
            $post = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
            
            return $this->render('bookStoreBundle:Book:create.html.twig', array(
            ));
        }
    }

    /**
     * @Route("/showAll")
     */
    public function showAllAction()
    {
        return $this->render('bookStoreBundle:Book:show_all.html.twig', array(
            // ...
        ));
    }

}
