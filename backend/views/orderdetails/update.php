<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Orderdetails */

$this->title = Yii::t('app', 'Update Orderdetails: {name}', [
    'name' => $model->orderNumber,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orderdetails'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->orderNumber, 'url' => ['view', 'orderNumber' => $model->orderNumber, 'productCode' => $model->productCode]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="orderdetails-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
