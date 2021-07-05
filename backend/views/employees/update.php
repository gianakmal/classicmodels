<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Employees */

$this->title = Yii::t('app', 'Update Employees: {name}', [
    'name' => $model->employeeNumber,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Employees'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employeeNumber, 'url' => ['view', 'id' => $model->employeeNumber]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="employees-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'officeCode0' => $officeCode0,
        'reportsTo0' => $reportsTo0,
    ]) ?>

</div>
