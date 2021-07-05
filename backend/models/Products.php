<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property string $productCode
 * @property string $productName
 * @property string $productLine
 * @property string $productScale
 * @property string $productVendor
 * @property string $productDescription
 * @property int $quantityInStock
 * @property float $buyPrice
 * @property float $MSRP
 *
 * @property Orderdetails[] $orderdetails
 * @property Orders[] $orderNumbers
 * @property Productlines $productLine0
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productCode', 'productName', 'productLine', 'productScale', 'productVendor', 'productDescription', 'quantityInStock', 'buyPrice', 'MSRP'], 'required'],
            [['productDescription'], 'string'],
            [['quantityInStock'], 'integer'],
            [['buyPrice', 'MSRP'], 'number'],
            [['productCode'], 'string', 'max' => 15],
            [['productName'], 'string', 'max' => 70],
            [['productLine', 'productVendor'], 'string', 'max' => 50],
            [['productScale'], 'string', 'max' => 10],
            [['productCode'], 'unique'],
            [['productLine'], 'exist', 'skipOnError' => true, 'targetClass' => Productlines::className(), 'targetAttribute' => ['productLine' => 'productLine']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'productCode' => Yii::t('app', 'Product Code'),
            'productName' => Yii::t('app', 'Product Name'),
            'productLine' => Yii::t('app', 'Product Line'),
            'productScale' => Yii::t('app', 'Product Scale'),
            'productVendor' => Yii::t('app', 'Product Vendor'),
            'productDescription' => Yii::t('app', 'Product Description'),
            'quantityInStock' => Yii::t('app', 'Quantity In Stock'),
            'buyPrice' => Yii::t('app', 'Buy Price'),
            'MSRP' => Yii::t('app', 'Msrp'),
        ];
    }

    /**
     * Gets query for [[Orderdetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderdetails()
    {
        return $this->hasMany(Orderdetails::className(), ['productCode' => 'productCode']);
    }

    /**
     * Gets query for [[OrderNumbers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderNumbers()
    {
        return $this->hasMany(Orders::className(), ['orderNumber' => 'orderNumber'])->viaTable('orderdetails', ['productCode' => 'productCode']);
    }

    /**
     * Gets query for [[ProductLine0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductLine0()
    {
        return $this->hasOne(Productlines::className(), ['productLine' => 'productLine']);
    }
}
