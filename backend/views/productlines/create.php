<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Productlines */

$this->title = Yii::t('app', 'Create Productlines');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Productlines'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productlines-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
