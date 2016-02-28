<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class TelephoneAdmin extends Admin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('type', 'text')
            ->add('numero', 'text')->end();


        $formMapper->with('Meta data')
            ->add('user', 'sonata_type_model', array(
                'class' => 'AppBundle\Entity\User',
                'property' => 'username',
            ))
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('type');
        $datagridMapper->add('numero');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('type');
        $listMapper->addIdentifier('numero');
    }

}