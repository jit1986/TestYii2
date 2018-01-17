<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property int $CountryID
 * @property string $CountryName
 * @property string $CountryCode
 *
 * @property State[] $states
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CountryName'], 'string', 'max' => 50],
            [['CountryCode'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CountryID' => 'Country ID',
            'CountryName' => 'Country Name',
            'CountryCode' => 'Country Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStates()
    {
        return $this->hasMany(State::className(), ['CountryID' => 'CountryID']);
    }
}
