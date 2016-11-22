<?php

namespace bookStoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use bookStoreBundle\Entity\Colors;


class getController extends Controller
{
    /**
     * @Route("/getJson")
     * 
     */
    public function getJsonAction()
    {
        
        return $this->render('bookStoreBundle:get:get_json.html.twig', array(
            // ...
        ));
    }
    
    /**
     * @Route("/setJson")
     * @Template
     */
    public function setJsonAction() {
        $colorArray = array('kolory' => array(
           'red'=>'czerwony', 'green'=>'zielony', 'blue'=>'niebieski'));
           
        $colorsObject = new Colors();
        $colorsObject->setColorsArray($colorArray);
        $serializedColors = \json_encode($colorsObject);
        return array('colors' => $serializedColors); 
    }
    
}
