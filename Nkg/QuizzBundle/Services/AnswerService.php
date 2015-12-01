<?php
namespace Nkg\QuizzBundle\Services;

use Symfony\Component\HttpFoundation\Session\Session;

use Doctrine\ORM\EntityManager;

use Nkg\QuizzBundle\Entity\Quizz;
use Nkg\QuizzBundle\Entity\QuizzRepository;
use Nkg\QuizzBundle\Entity\Answer;
use Nkg\QuizzBundle\Entity\AnswerRepository;

class AnswerService
{
  protected $em;

  public function __construct(EntityManager $em) {
      $this->em = $em;
  }

  //lister les reponses d'un quizz actif
  public function getVotableAnswers($quizz_id)
  {
    $answerz = array();
    $quizzes = $this->em
    ->getRepository('NkgQuizzBundle:Quizz')
    ->findBy(array(
      "id" => (int)$quizz_id,
      "active" => 1
      )
    );

    if(isset($quizzes[0])){
        $answerz =  $quizzes[0]->getAnswers();
    }

    return $answerz;
  }

  //trouver 1 reponse
  public function getAnswer($answer_id)
  {
    $answer = $this->em
    ->getRepository('NkgQuizzBundle:Answer')
    ->find($answer_id);

    return $answer;
  }

  //la réponse est-elle correcte ?
  public function isCorrect($answer_id)
  {
    $answer = $this->getAnswer($answer_id);

    return $answer->getCorrect();
  }
}
