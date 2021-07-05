<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'productCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productLine')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productScale')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productVendor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productDescription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'quantityInStock')->textInput() ?>

    <?= $form->field($model, 'buyPrice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MSRP')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
