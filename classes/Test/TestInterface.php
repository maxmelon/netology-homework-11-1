<?php

namespace Test;

interface TestInterface
{
    public function setQuestion($numb, $question);
    public function getQuestion($num);
    public function issetQuestion($num);
    public function setResults($imgForA, $imgForB, $imgForC, $imgForD, $titleA, $titleB,
                               $titleC, $titleD, $descForA, $descForB, $descForC, $descForD);
    public function showQuestions();

}