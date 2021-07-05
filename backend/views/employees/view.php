<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Employees */

$this->title = $model->employeeNumber;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Employees'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="employees-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->employeeNumber], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->employeeNumber], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        'pic',
            // [
            //     'attribute'=>'pic',
            //     'value'=>Yii::getAlias('picImgUrl').'/'.$model->pic,
            //     'format'=>['image',['width'=>'100','height'=>'100']],
            // ],
            'employeeNumber',
            'lastName',
            'firstName',
            'extension',
            'email:email',
            'officeCode',
            'reportsTo',
            'jobTitle',
        ],
    ]) ?>

</div>
