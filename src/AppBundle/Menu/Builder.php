<?php

// src/AppBundle/Menu/Builder.php
namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

use Knp\Menu\Matcher\Matcher;
use Knp\Menu\Matcher\Voter\RouteVoter;

class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function adminMenuGauche(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav-side-menu');


        $menu->addChild('Retour au site', array('route' => 'homepage'));

        $menu->addChild('Admin', array(
            'uri' => '#',
            'extras' => array(
                'routes' => array(
                    array('pattern' => '/^admin.*/')
                 ),
             )
        ));



        $menu['Admin']->setAttribute('icon', 'menu-icon fa fa-tachometer');
        $menu['Admin']->setAttribute('arrow', 'fa fa-angle-down');
        $menu['Admin']->setAttribute('span', 'menu-text');
//        $menu['Admin']->setAttribute('extras', 'menu-text');
//        $menu['Admin']->setAttribute('dropdown', true);

//        $menu['Admin']->setLinkAttribute('class', 'dropdown-toggle');
        $menu['Admin']->setLinkAttribute('data-toggle', 'collapse');
        $menu['Admin']->setChildrenAttribute('class', 'sub-menu collapse');
        $menu['Admin']->addChild('Admin', array('route' => 'admin_homepage'));
        $menu['Admin']->addChild('Admin2', array('route' => 'admin_homepage2'));


        $matcher = new Matcher();
        $matcher->addVoter(new RouteVoter());
        $voter = new RouteVoter();
        $voter->setRequest( $this->container->get('request_stack')->getCurrentRequest());



        if( $voter->matchItem($menu['Admin']))
        {

            $menu['Admin']->setAttribute('class', 'open');
        }















//// access services from the container!
//        $em = $this->container->get('doctrine')->getManager();
//// findMostRecent and Blog are just imaginary examples
//        $blog = $em->getRepository('AppBundle:Blog')->findMostRecent();
//
//        $menu->addChild('Latest Blog Post', array(
//            'route' => 'blog_show',
//            'routeParameters' => array('id' => $blog->getId())
//        ));
//
//// create another menu item
//        $menu->addChild('About Me', array('route' => 'about'));
//// you can also add sub level's to your menu's as follows
//        $menu['About Me']->addChild('Edit profile', array('route' => 'edit_profile'));

// ... add more children

        return $menu;
    }
}