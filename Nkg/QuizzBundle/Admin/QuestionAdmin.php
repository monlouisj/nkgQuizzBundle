<?php
namespace Nkg\QuizzBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Nkg\QuizzBundle\Entity\Question;

class QuestionAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Le question', array('class' => 'col-md-6'))
              ->add('libelle', 'text', array('label' => 'Intitulé'))
              ->add('description', 'text', array('label' => 'Description', 'required'=>false))
              ->add('propriete1', 'text', array('label' => 'Info additionnelle 1 (facultatif)', 'required'=>false))
              ->add('propriete2', 'text', array('label' => 'Info additionnelle 2 (facultatif)', 'required'=>false))
              ->add('hide', 'checkbox', array('label' => 'Masquer bouton jouer','required'=>false))
              ->add('active', 'checkbox', array('label' => 'Actif?','required'=>false))
              ->add('quizz', null, array())
            ->end()
            ->with('Les réponses', array('class' => 'col-md-6'))
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
            ->add('quizz')
            ;
        }
        
        // Fields to be shown on lists
        protected function configureListFields(ListMapper $listMapper)
        {
            $listMapper
            ->addIdentifier('libelle')
            ->add('quizz')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getNewInstance()
    {
        $question = parent::getNewInstance();

        $quizz = $question->getQuizz();

        //par défaut, dernière question
        if(is_null($quizz)){
            $query = $this->getModelManager()->createQuery("NkgQuizzBundle:Quizz", 'q')->orderBy('q.id','DESC');//->setMaxResults(1);
            $query = $query->getQuery();
            $quizz = $query->getSingleResult();
            if($quizz) $question->setQuizz($quizz);
        }

        return $question;
    }
}
