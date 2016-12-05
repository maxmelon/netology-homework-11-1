<?php
namespace Results;
class Results implements ResultsInterface
{
    protected $imgForAnswerA;
    protected $imgForAnswerB;
    protected $imgForAnswerC;
    protected $imgForAnswerD;
    protected $titleForAnswerA;
    protected $titleForAnswerB;
    protected $titleForAnswerC;
    protected $titleForAnswerD;
    protected $descriptionForAnswerA;
    protected $descriptionForAnswerB;
    protected $descriptionForAnswerC;
    protected $descriptionForAnswerD;

    // Итоговые картинка, заголовок и описание (по результатам теста)
    protected $desc;
    protected $img;
    protected $title;

    // Для вычисления результата
    protected $a;
    protected $b;
    protected $c;
    protected $d;

    public function __construct($imgForA, $imgForB, $imgForC, $imgForD, $titleA, $titleB,
                                $titleC, $titleD, $descForA, $descForB, $descForC, $descForD)
    {
        $this->imgForAnswerA = $imgForA;
        $this->imgForAnswerB = $imgForB;
        $this->imgForAnswerC = $imgForC;
        $this->imgForAnswerD = $imgForD;
        $this->titleForAnswerA = $titleA;
        $this->titleForAnswerB = $titleB;
        $this->titleForAnswerC = $titleC;
        $this->titleForAnswerD = $titleD;
        $this->descriptionForAnswerA = $descForA;
        $this->descriptionForAnswerB = $descForB;
        $this->descriptionForAnswerC = $descForC;
        $this->descriptionForAnswerD = $descForD;
    }

    public function __get($property)
    {
        echo "Ошибка! Обращение к недоступному свойству - " . $property;

    }

    public function __set($property, $value)
    {
        echo "Ошибка! Попытка присвоения значение \"" . $value . "\" недоступному свойству " . $property;
    }

    public function showResults($test)
    {
        if (!empty($_POST)) {
            $this->calculateResults($test);
            ?>
            <h3>Поздравляем! Ваш результат:</h3>
            <h2><?php echo $this->title; ?></h2>
            <div class="answer"><img src="assets/<?php echo $this->img; ?>"></div>
            <?php
        } else {
            echo '<img src="assets/tree.jpg" style="width:250px;height:256px">';
        }
    }

    public function showDescription () {
            if (!empty($_POST)) {
            ?>
                <tr>
                    <td>
                        <div class="answer"><p><?php echo $this->desc; ?></p></div>
                    </td>
                </tr>
            <?php
            }
    }

    // Выясняем, ответов какого из четырех типов пользователь дал больше всего
    // Если два типа 
    protected function calculateResults ($test)
    {
        $i = 1;
        while ($test->issetQuestion($i) == true) {
            $questionNumber = $i;
            if (isset($_POST['question' . $questionNumber])) {
                $answerType = $_POST['question' . $questionNumber];
                switch ($answerType) {
                    case 'a':
                        $this->a++;
                        break;
                    case 'b':
                        $this->b++;
                        break;
                    case 'c':
                        $this->c++;
                        break;
                    case 'd':
                        $this->d++;
                        break;
                }
            }
            $i++;
        }
        $this->selectResults();
    }

    protected function selectResults ()
    {
        $result = max($this->a, $this->b, $this->c, $this->d);
        switch ($result) {
            case $this->a:
                $this->img = $this->imgForAnswerA;
                $this->desc = $this->descriptionForAnswerA;
                $this->title = $this->titleForAnswerA;
                break;
            case $this->b:
                $this->img = $this->imgForAnswerB;
                $this->desc = $this->descriptionForAnswerB;
                $this->title = $this->titleForAnswerB;
                break;
            case $this->c:
                $this->img = $this->imgForAnswerC;
                $this->desc = $this->descriptionForAnswerC;
                $this->title = $this->titleForAnswerC;
                break;
            case $this->d:
                $this->img = $this->imgForAnswerD;
                $this->desc = $this->descriptionForAnswerD;
                $this->title = $this->titleForAnswerD;
                break;
        }
        return false;
    }
}