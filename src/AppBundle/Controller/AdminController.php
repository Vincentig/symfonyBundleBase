<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Categorie controller.
 *
 * @Route("/admin")
 * 
 * 
 */
class AdminController extends Controller {

    /**
     * Lists all Categorie entities.
     *
     * @Route("/", name="admin_homepage")
     * @Method("GET")
     * 
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();





        return $this->render('layout_back.html.twig', array(

        ));
    }    /**
     * Lists all Categorie entities.
     *
     * @Route("/2", name="admin_homepage2")
     * @Method("GET")
     *
     */
    public function index2Action() {
        $em = $this->getDoctrine()->getManager();





        return $this->render('layout_back.html.twig', array(

        ));
    }

}
