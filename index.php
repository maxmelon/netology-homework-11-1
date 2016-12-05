<?php
require_once 'autoloader.php';
include 'questions.php';
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Как вам стоит украсить ёлку на этот новый год? - Тест</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css" media="screen"/>
</head>
<body>
<table>
    <tr>
        <td colspan="2" style=""><h2>Как вам стоит украсить ёлку на этот новый год?</h2></td>
    </tr>
    <tr>
        <td>
            <div class="center"><?php $test1->results->showResults($test1); ?></div>
        </td>
        <td rowspan="2">
            <form method="post">
                <?php $test1->showQuestions(); ?>
                <div class="center"><button type="submit" class="button button1">Проверить</button></div>
            </form>
        </td>
    </tr>
    <?php $test1->results->showDescription(); ?>
</table>
</body>
</html>
