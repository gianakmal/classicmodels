<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Customers */

$this->title = Yii::t('app', 'Update Customers: {name}', [
    'name' => $model->customerNumber,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->customerNumber, 'url' => ['view', 'id' => $model->customerNumber]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="customers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'salesRepEmployeeNumber0' => $salesRepEmployeeNumber0,
    ]) ?>

</div>
