<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int $CityID
 * @property string $CityName
 * @property string $CityCode
 * @property int $StateID
 *
 * @property State $state
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['StateID'], 'integer'],
            [['CityName'], 'string', 'max' => 50],
            [['CityCode'], 'string', 'max' => 10],
            [['StateID'], 'exist', 'skipOnError' => true, 'targetClass' => State::className(), 'targetAttribute' => ['StateID' => 'StateID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CityID' => 'City ID',
            'CityName' => 'City Name',
            'CityCode' => 'City Code',
            'StateID' => 'State ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(State::className(), ['StateID' => 'StateID']);
    }
}
