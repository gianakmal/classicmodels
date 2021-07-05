<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Productlines */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productlines-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'productLine')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'textDescription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'htmlDescription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'image')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
