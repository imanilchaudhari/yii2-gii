<?php
/**
 * This is the template for generating a controller class file.
 */

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator dee\gii\generators\mvc\Generator */

$controllerClass = StringHelper::basename($generator->getControllerClass());
echo "<?php\n";
?>

namespace <?= StringHelper::dirname(ltrim($generator->getControllerClass(), '\\')) ?>;

use Yii;
use <?= ltrim($generator->baseControllerClass, '\\') ?>;
<?php if(!empty($generator->modelClass)):?>
use <?= $generator->modelClass ?>;
<?php endif;?>

/**
 * <?= $controllerClass ?>.
 */
class <?= $controllerClass ?> extends <?= StringHelper::basename($generator->baseControllerClass) . "\n" ?>
{
<?php foreach ($generator->getActionIDs() as $action): ?>
<?php if($generator->isFormAction($action)):?>

    public function action<?= Inflector::id2camel($action) ?>()
    {
        $model = new <?= StringHelper::basename($generator->modelClass) ?><?= empty($generator->scenarioName) ? "()" : "(['scenario' => '{$generator->scenarioName}'])" ?>;

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                return;
            }
        }

        return $this->render('<?= $action ?>', [
            'model' => $model,
        ]);
    }
<?php else:?>

    public function action<?= Inflector::id2camel($action) ?>()
    {
        return $this->render('<?= $action ?>');
    }
<?php endif;?>
<?php endforeach; ?>
}
