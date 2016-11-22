<?php

namespace bookStoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use bookStoreBundle\Entity\Book;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller 
{
    
    /**
     * @Route("/main")
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
        
//        if( $this->getRequest()->isMethod('GET') ) {
//            $repository = $this->getDoctrine()->getRepository('bookStoreBundle:Book');
//            $allBooks = $repository->findAll();
//            
//            $serializedData = json_encode($allBooks);
//            echo $serializedData;
//        }
            
        return $this->render('bookStoreBundle:Book:create.html.twig', array(
            'form'=>$form->createView(),
            //'allBooks'=>$allBooks
        ));
    }
    
    /**
     * @Route("/getJson/")
     * @Method({"GET"})
     */
    
    public function GetJsonAction() {
        $repository = $this->getDoctrine()->getRepository('bookStoreBundle:Book');
        $allBooks = $repository->findAll();

        $response = new Response();
        $serializedData = json_encode($allBooks);
        $response->setContent(json_encode(
                $allBooks
        ));
        $response->headers->set('Content-Type', 'application/json');
        
        return $response;
        
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
