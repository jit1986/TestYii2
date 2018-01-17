<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "state".
 *
 * @property int $StateID
 * @property string $StateName
 * @property string $StateCode
 * @property int $CountryID
 *
 * @property City[] $cities
 * @property Country $country
 */
class State extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'state';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CountryID'], 'integer'],
            [['StateName'], 'string', 'max' => 50],
            [['StateCode'], 'string', 'max' => 10],
            [['CountryID'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['CountryID' => 'CountryID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'StateID' => 'State ID',
            'StateName' => 'State Name',
            'StateCode' => 'State Code',
            'CountryID' => 'Country ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['StateID' => 'StateID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['CountryID' => 'CountryID']);
    }
}
