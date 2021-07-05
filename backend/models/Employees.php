<?php

namespace backend\models;

use Yii;
// use Imagine\Image\Box;
// use yii\imagine\Image;

/**
 * This is the model class for table "employees".
 *
 * @property string $pic
 * @property int $employeeNumber
 * @property string $lastName
 * @property string $firstName
 * @property string $extension
 * @property string $email
 * @property string $officeCode
 * @property int|null $reportsTo
 * @property string $jobTitle
 *
 * @property Customers[] $customers
 * @property Employees $reportsTo0
 * @property Employees[] $employees
 * @property Offices $officeCode0
 */
class Employees extends \yii\db\ActiveRecord
{
    /**
     * @var \yii\web\UploadedFile
     */
    //public $pic;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pic', 'employeeNumber', 'lastName', 'firstName', 'extension', 'email', 'officeCode', 'jobTitle'], 'required'],
            [['employeeNumber', 'reportsTo'], 'integer'],
            [['pic'], 'string', 'max' => 250],
            //[['picture'], 'file', 'extension' => 'jpg, jpeg, png'],
            [['lastName', 'firstName', 'jobTitle'], 'string', 'max' => 50],
            [['extension', 'officeCode'], 'string', 'max' => 10],
            [['email'], 'string', 'max' => 100],
            [['employeeNumber'], 'unique'],
            [['reportsTo'], 'exist', 'skipOnError' => true, 'targetClass' => Employees::className(), 'targetAttribute' => ['reportsTo' => 'employeeNumber']],
            [['officeCode'], 'exist', 'skipOnError' => true, 'targetClass' => Offices::className(), 'targetAttribute' => ['officeCode' => 'officeCode']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pic' => Yii::t('app', 'Pic'),
            'employeeNumber' => Yii::t('app', 'Employee Number'),
            'lastName' => Yii::t('app', 'Last Name'),
            'firstName' => Yii::t('app', 'First Name'),
            'extension' => Yii::t('app', 'Extension'),
            'email' => Yii::t('app', 'Email'),
            'officeCode' => Yii::t('app', 'Office Code'),
            'reportsTo' => Yii::t('app', 'Reports To'),
            'jobTitle' => Yii::t('app', 'Job Title'),
        ];
    }

    /**
     * Gets query for [[Customers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customers::className(), ['salesRepEmployeeNumber' => 'employeeNumber']);
    }

    /**
     * Gets query for [[ReportsTo0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReportsTo0()
    {
        return $this->hasOne(Employees::className(), ['employeeNumber' => 'reportsTo']);
    }

    /**
     * Gets query for [[Employees]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employees::className(), ['reportsTo' => 'employeeNumber']);
    }

    /**
     * Gets query for [[OfficeCode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOfficeCode0()
    {
        return $this->hasOne(Offices::className(), ['officeCode' => 'officeCode']);
    }
}
