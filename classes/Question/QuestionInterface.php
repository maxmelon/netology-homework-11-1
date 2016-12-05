<?php

namespace Question;

interface QuestionInterface
{
    public function setQuestion($numb, $question);
    public function setAnswer($questionsNumber, $answer, $type);
    public function getAnswer($numb);
    public function showQuestion();
    public function getNumb();
    public function getQuestion();
}