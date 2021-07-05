<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "payments".
 *
 * @property int $customerNumber
 * @property string $checkNumber
 * @property string $paymentDate
 * @property float $amount
 *
 * @property Customers $customerNumber0
 */
class Payments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customerNumber', 'checkNumber', 'paymentDate', 'amount'], 'required'],
            [['customerNumber'], 'integer'],
            [['paymentDate'], 'safe'],
            [['amount'], 'number'],
            [['checkNumber'], 'string', 'max' => 50],
            [['customerNumber', 'checkNumber'], 'unique', 'targetAttribute' => ['customerNumber', 'checkNumber']],
            [['customerNumber'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['customerNumber' => 'customerNumber']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'customerNumber' => Yii::t('app', 'Customer Number'),
            'checkNumber' => Yii::t('app', 'Check Number'),
            'paymentDate' => Yii::t('app', 'Payment Date'),
            'amount' => Yii::t('app', 'Amount'),
        ];
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
