<?php
namespace Nkg\QuizzBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Nkg\QuizzBundle\Entity\Question;
use Nkg\QuizzBundle\Entity\Quizz;

class QuizzAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Le quizz', array('class' => 'col-md-4'))
              ->add('startdate', 'datetime', array('label' => 'Date de début'))
              ->add('enddate', 'datetime', array('label' => 'Date de fin'))
              ->add('active', 'checkbox', array('label' => 'Actif?','required'=>false))
            ->end()
            ->with('Les questions', array('class' => 'col-md-8'))
              ->add('questions', 'sonata_type_collection', array(
                    'label'       => "Veuillez saisir les questions proposées: ",
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
            ->add('id')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('startdate')
            ->add('enddate')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getNewInstance()
    {
        $question = parent::getNewInstance();
        $debut = $question->getStartdate();

        if($debut === null){
          $debut = new \Datetime("now");
          $question->setStartdate($debut);
        }


        if($question->getEnddate() === null){
          $fin = clone $debut;
          $fin = $fin->add( new \DateInterval("P10D"));
          $question->setEnddate($fin);
        }

        return $question;
    }
}
