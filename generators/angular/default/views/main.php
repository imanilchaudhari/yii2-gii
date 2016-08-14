<?php
/**
 * This is the template for generating a CRUD controller class file.
 */
use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator imanilchaudhari\gii\generators\angular\Generator */

$restName = StringHelper::basename($generator->modelClass);
$resourceUrl = '/' . (empty($generator->restControllerID) ? $restName : $generator->restControllerID);
$prefixRoute = empty($generator->prefixRoute) ? '' : trim($generator->prefixRoute, '/') . '/';

echo "<?php\n";
?>
use yii\helpers\Url;
use imanilchaudhari\angular\NgView;

/* @var $this yii\web\View */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
?>
<?php echo "<?=\n" ?>
NgView::widget([
    'requires' => ['ngResource','ui.bootstrap','imanilchaudhari.ui'],
    'routes' => [
        '/<?= $prefixRoute; ?>' => [
            'view' => 'index',
            'js' => 'js/index.js',
            'injection' => ['<?= $restName;?>',],
        ],
        '/<?= $prefixRoute; ?>create' => [
            'view' => 'create',
            'js' => 'js/create.js',
            'injection' => ['<?= $restName;?>',],
        ],
        '/<?= $prefixRoute; ?>:id/edit' => [
            'view' => 'update',
            'js' => 'js/update.js',
            'injection' => ['<?= $restName;?>',],
        ],
        '/<?= $prefixRoute; ?>:id' => [
            'view' => 'view',
            'js' => 'js/view.js',
            'injection' => ['<?= $restName;?>',],
        ],
    ],
    'resources' => [
        '<?= $restName;?>' => [
        'url' => '<?= rtrim(Yii::$app->homeUrl,'/')."{$resourceUrl}/:id"?>',
            'actions' =>[
                'update' => [
                    'method' => 'PUT',
                ],
            ]
        ]
    ], 
]);?>
