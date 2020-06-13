<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProbandoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Probandos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="probando-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Probando', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'numeroFactura',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
