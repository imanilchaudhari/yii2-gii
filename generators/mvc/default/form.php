<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator dee\gii\generators\mvc\Generator */

echo "<?php\n";
?>

use yii\web\View;
use yii\helpers\Html;


/* @var $this View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass))."-$action" ?>">

    <h1><?= $generator->controllerID . '/' . $action ?></h1>

    <?= "<?= " ?>$this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
