<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "productlines".
 *
 * @property string $productLine
 * @property string|null $textDescription
 * @property string|null $htmlDescription
 * @property string|null $image
 *
 * @property Products[] $products
 */
class Productlines extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productlines';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productLine'], 'required'],
            [['htmlDescription', 'image'], 'string'],
            [['productLine'], 'string', 'max' => 50],
            [['textDescription'], 'string', 'max' => 4000],
            [['productLine'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'productLine' => Yii::t('app', 'Product Line'),
            'textDescription' => Yii::t('app', 'Text Description'),
            'htmlDescription' => Yii::t('app', 'Html Description'),
            'image' => Yii::t('app', 'Image'),
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['productLine' => 'productLine']);
    }
}
