<?php
namespace Answer;
class Answer implements AnswerInterface
{
    protected $answer;
    protected $type;

    public function __construct($answer, $type)
    {
        $this->answer = $answer;
        $this->type = $type;
    }

    public function __get($property)
    {
        echo "Ошибка! Обращение к недоступному свойству - " . $property;
    }

    public function __set($property, $value)
    {
        echo "Ошибка! Попытка присвоения значение \"" . $value . "\" недоступному свойству " . $property;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getAnswer()
    {
        return $this->answer;
    }
}