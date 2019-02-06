<?php
namespace Nkg\QuizzBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Validator\Constraints as Assert;

class AnswerAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('libelle', 'text', array('label' => 'Libelle reponse'))
            ->add('description', 'text', array('label' => 'Description reponse'))
            ->add('propriete1', 'text', array('label' => 'Info additionnelle 1', 'required'=>false))
            ->add('propriete2', 'text', array('label' => 'Info additionnelle 2', 'required'=>false))
            ->add('question', null, array())
            ->add('correct', 'checkbox', array('label' => 'Correcte', 'required'=>false))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('libelle')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('libelle')
            ->add('description')
            ->add('id')
        ;
    }
}
