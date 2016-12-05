<?php
namespace Test;
use Question\Question;
use Results\Results;

class Test implements TestInterface
{
    protected $question;
    protected $totalPoints;
    public $results;

    public function __get($property)
    {
        echo "Ошибка! Обращение к недоступному свойству - " . $property;

    }

    public function __set($property, $value)
    {
        echo "Ошибка! Попытка присвоения значение \"" . $value . "\" недоступному свойству " . $property;
    }

    public function setQuestion($numb, $question)
    {
        $newQuestion = new Question();
        $newQuestion->setQuestion($numb, $question);
        $this->question[$numb] = $newQuestion;
        return $this->question[$numb];
    }

    public function getQuestion($num)
    {
        return $this->question[$num];
    }

    public function issetQuestion($num)
    {
        if (isset($this->question[$num])) {
            return true;
        } else {
            return false;
        }
    }

    public function setResults($imgForA, $imgForB, $imgForC, $imgForD, $titleA, $titleB,
                               $titleC, $titleD, $descForA, $descForB, $descForC, $descForD)
    {
        $this->results = new Results($imgForA, $imgForB, $imgForC, $imgForD, $titleA, $titleB,
            $titleC, $titleD, $descForA, $descForB, $descForC, $descForD);
    }

    public function showQuestions()
    {
        if (!empty($this->question)) {
            $i = 1;
            while (isset($this->question[$i])) {
                $this->question[$i]->showQuestion();
                $i++;
            }
        }
    }

}