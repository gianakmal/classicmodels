<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "orderdetails".
 *
 * @property int $orderNumber
 * @property string $productCode
 * @property int $quantityOrdered
 * @property float $priceEach
 * @property int $orderLineNumber
 *
 * @property Orders $orderNumber0
 * @property Products $productCode0
 */
class Orderdetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orderdetails';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orderNumber', 'productCode', 'quantityOrdered', 'priceEach', 'orderLineNumber'], 'required'],
            [['orderNumber', 'quantityOrdered', 'orderLineNumber'], 'integer'],
            [['priceEach'], 'number'],
            [['productCode'], 'string', 'max' => 15],
            [['orderNumber', 'productCode'], 'unique', 'targetAttribute' => ['orderNumber', 'productCode']],
            [['orderNumber'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['orderNumber' => 'orderNumber']],
            [['productCode'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['productCode' => 'productCode']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'orderNumber' => Yii::t('app', 'Order Number'),
            'productCode' => Yii::t('app', 'Product Code'),
            'quantityOrdered' => Yii::t('app', 'Quantity Ordered'),
            'priceEach' => Yii::t('app', 'Price Each'),
            'orderLineNumber' => Yii::t('app', 'Order Line Number'),
        ];
    }

    /**
     * Gets query for [[OrderNumber0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderNumber0()
    {
        return $this->hasOne(Orders::className(), ['orderNumber' => 'orderNumber']);
    }

    /**
     * Gets query for [[ProductCode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductCode0()
    {
        return $this->hasOne(Products::className(), ['productCode' => 'productCode']);
    }
}
