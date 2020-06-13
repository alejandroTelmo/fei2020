<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "metodosDePago".
 *
 * @property int $id
 * @property string|null $descripcion
 */
class MetodosDePago extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'metodosDePago';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * {@inheritdoc}
     * @return MetodosDePagoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MetodosDePagoQuery(get_called_class());
    }
}
