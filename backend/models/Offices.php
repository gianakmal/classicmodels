<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "offices".
 *
 * @property string $officeCode
 * @property string $city
 * @property string $phone
 * @property string $addressLine1
 * @property string|null $addressLine2
 * @property string|null $state
 * @property string $country
 * @property string $postalCode
 * @property string $territory
 *
 * @property Employees[] $employees
 */
class Offices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'offices';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['officeCode', 'city', 'phone', 'addressLine1', 'country', 'postalCode', 'territory'], 'required'],
            [['officeCode', 'territory'], 'string', 'max' => 10],
            [['city', 'phone', 'addressLine1', 'addressLine2', 'state', 'country'], 'string', 'max' => 50],
            [['postalCode'], 'string', 'max' => 15],
            [['officeCode'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'officeCode' => Yii::t('app', 'Office Code'),
            'city' => Yii::t('app', 'City'),
            'phone' => Yii::t('app', 'Phone'),
            'addressLine1' => Yii::t('app', 'Address Line1'),
            'addressLine2' => Yii::t('app', 'Address Line2'),
            'state' => Yii::t('app', 'State'),
            'country' => Yii::t('app', 'Country'),
            'postalCode' => Yii::t('app', 'Postal Code'),
            'territory' => Yii::t('app', 'Territory'),
        ];
    }

    /**
     * Gets query for [[Employees]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employees::className(), ['officeCode' => 'officeCode']);
    }
}
