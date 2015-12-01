<?php
namespace Nkg\QuizzBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Nkg\QuizzBundle\Entity\Quizz;

class QuizzAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Le quizz', array('class' => 'col-md-6'))
              ->add('libelle', 'text', array('label' => 'Nom du quizz'))
              ->add('description', 'text', array('label' => 'Description du quizz', 'required'=>false))
              ->add('propriete1', 'text', array('label' => 'Info additionnelle 1', 'required'=>false))
              ->add('propriete2', 'text', array('label' => 'Info additionnelle 2', 'required'=>false))
              ->add('startdate', 'datetime', array('label' => 'Date de début'))
              ->add('enddate', 'datetime', array('label' => 'Date de fin'))
              ->add('hide', 'checkbox', array('label' => 'Masquer bouton jouer','required'=>false))
              ->add('active', 'checkbox', array('label' => 'Actif?','required'=>false))
            ->end()
            ->with('Les reponses', array('class' => 'col-md-6'))
              ->add('answers', 'sonata_type_collection', array(
                    'label'       => "Veuillez saisir les réponses proposées: ",
                    'by_reference'       => false,
                    'cascade_validation' => true,
                ), array(
                    'edit' => 'inline',
                    'inline' => 'table'
                ))
            ->end()
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
            ->add('startdate')
            ->add('enddate')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getNewInstance()
    {
        $quizz = parent::getNewInstance();
        $debut = $quizz->getStartdate();

        if($debut === null){
          $debut = new \Datetime("now");
          $quizz->setStartdate($debut);
        }


        if($quizz->getEnddate() === null){
          $fin = clone $debut;
          $fin = $fin->add( new \DateInterval("P10D"));
          $quizz->setEnddate($fin);
        }

        return $quizz;
    }
}
