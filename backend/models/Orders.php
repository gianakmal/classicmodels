<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $orderNumber
 * @property string $orderDate
 * @property string $requiredDate
 * @property string|null $shippedDate
 * @property string $status
 * @property string|null $comments
 * @property int $customerNumber
 *
 * @property Orderdetails[] $orderdetails
 * @property Products[] $productCodes
 * @property Customers $customerNumber0
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orderNumber', 'orderDate', 'requiredDate', 'status', 'customerNumber'], 'required'],
            [['orderNumber', 'customerNumber'], 'integer'],
            [['orderDate', 'requiredDate', 'shippedDate'], 'safe'],
            [['comments'], 'string'],
            [['status'], 'string', 'max' => 15],
            [['orderNumber'], 'unique'],
            [['customerNumber'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['customerNumber' => 'customerNumber']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'orderNumber' => Yii::t('app', 'Order Number'),
            'orderDate' => Yii::t('app', 'Order Date'),
            'requiredDate' => Yii::t('app', 'Required Date'),
            'shippedDate' => Yii::t('app', 'Shipped Date'),
            'status' => Yii::t('app', 'Status'),
            'comments' => Yii::t('app', 'Comments'),
            'customerNumber' => Yii::t('app', 'Customer Number'),
        ];
    }

    /**
     * Gets query for [[Orderdetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderdetails()
    {
        return $this->hasMany(Orderdetails::className(), ['orderNumber' => 'orderNumber']);
    }

    /**
     * Gets query for [[ProductCodes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductCodes()
    {
        return $this->hasMany(Products::className(), ['productCode' => 'productCode'])->viaTable('orderdetails', ['orderNumber' => 'orderNumber']);
    }

    /**
     * Gets query for [[CustomerNumber0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerNumber0()
    {
        return $this->hasOne(Customers::className(), ['customerNumber' => 'customerNumber']);
    }
}
