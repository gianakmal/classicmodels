<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Productlines */

$this->title = Yii::t('app', 'Update Productlines: {name}', [
    'name' => $model->productLine,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Productlines'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->productLine, 'url' => ['view', 'id' => $model->productLine]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="productlines-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
