<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Offices */

$this->title = Yii::t('app', 'Update Offices: {name}', [
    'name' => $model->officeCode,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Offices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->officeCode, 'url' => ['view', 'id' => $model->officeCode]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="offices-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
