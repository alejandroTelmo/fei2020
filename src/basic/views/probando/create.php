<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Probando */

$this->title = 'Create Probando';
$this->params['breadcrumbs'][] = ['label' => 'Probandos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="probando-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
