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
    public function createAction(Request $request)
    {   
        $newBook = new Book();
        $form = $this->createFormBuilder($newBook)
    //            ->setAction($this->generateUrl('save_to_db'))
                ->add('Author', 'text')
                ->add('title', 'text')
                ->add('page', 'text')
                ->add('publishYear', 'text')
                ->add('save', 'submit', array ('label'=>'Create Task'))
        
                ->getForm();
        $form->handleRequest($request);
        
        if ( $form->isSubmitted() ) {
            $task = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();
        }
        
        return $this->render('bookStoreBundle:Book:create.html.twig', array(
            'form'=>$form->createView()
        ));
    }
    
    /**
     * @Route("/load/{id}")
     */
    public function loadAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('bookStoreBundle:Book');
        $post = $repository->find($id);
        return $this->render('bookStoreBundle:Book:load.html.twig', array(
            'book'=>$post
        ));
    }
    
    

    /**
     * @Route("/loadAll")
     */
    public function loadAllAction()
    {
        return $this->render('bookStoreBundle:Book:load_all.html.twig', array(
            // ...
        ));
    }

}
