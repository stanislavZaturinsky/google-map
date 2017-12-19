<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property float $lat
 * @property float $lng
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address'], 'required', 'message' => 'Field "{attribute}" is required'],
            [['name'], 'string', 'max' => 50, 'tooLong' => 'Field "{attribute}" can contain not more {max} symbols'],
            [['name'], 'match', 'pattern' => '/^[a-zа-я0-9_]*/i', 'message' => 'You can write only words, numbers and _'],
            [['address'], 'string', 'max' => 255, 'tooLong' => 'Field "{attribute}" can contain not more {max} symbols'],
            [['address'], 'required',
                'whenClient' => "function(attribute, value) {
                    if ($('[name=\"is-address-valid\"]').val() == '0') {
                        messages.push('This address is incorrect');
                    }
                }",
            ],
            [['lat', 'lng'], 'double']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'      => 'ID',
            'name'    => 'Name',
            'address' => 'Address',
        ];
    }
}
