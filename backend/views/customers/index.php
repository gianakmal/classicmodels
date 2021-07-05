<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Customers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Customers'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'customerNumber',
            'customerName',
            'contactLastName',
            'contactFirstName',
            'phone',
            //'addressLine1',
            //'addressLine2',
            //'city',
            //'state',
            //'postalCode',
            //'country',
            //'salesRepEmployeeNumber',
            [
                'header' => 'Sales Rep Employee Number',
                'value' => 'salesRepEmployeeNumber0.firstName',
            ],
            'creditLimit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
