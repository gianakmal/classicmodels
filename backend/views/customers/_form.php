<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Customers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customerNumber')->textInput() ?>

    <?= $form->field($model, 'customerName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contactLastName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contactFirstName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addressLine1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addressLine2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'postalCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'salesRepEmployeeNumber')->dropDownList($salesRepEmployeeNumber0, ['prompt'=>'-choose sales rep employee number-']) ?>

    <?= $form->field($model, 'creditLimit')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
