<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Orderdetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orderdetails-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'orderNumber')->textInput() ?>

    <?= $form->field($model, 'productCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantityOrdered')->textInput() ?>

    <?= $form->field($model, 'priceEach')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'orderLineNumber')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
