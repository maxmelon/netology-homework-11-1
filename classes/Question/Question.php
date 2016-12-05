<?php
namespace Question;
use Answer\Answer;

class Question implements QuestionInterface
{
    protected $numb;
    protected $question;
    protected $answer;

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
        $this->numb = $numb;
        $this->question = $question;
        return $this;
    }

    public function setAnswer($questionsNumber, $answer, $type)
    {
        $this->answer[$questionsNumber] = new Answer($answer, $type);
        return $this;
    }

    public function getAnswer($numb)
    {
        return $this->answer[$numb];
    }

    public function showQuestion()
    {
        echo '<div class="question">';
        echo $this->numb . '.' . ' ' . $this->question . '<br>';
            $i = 1;
            while (isset($this->answer[$i])) {
                ?>
                <div>
                <label>
                    <input type="radio" name="question<?php echo $this->numb; ?>"
                              value="<?php echo $this->answer[$i]->getType(); ?>">
                    <?php echo $this->answer[$i]->getAnswer(); ?>
                </label>
                </div>
                <?php
                $i++;
            }
        echo '</div>';
    }

    public function getNumb()
    {
        return $this->numb;
    }

    public function getQuestion()
    {
        return $this->question;
    }
}