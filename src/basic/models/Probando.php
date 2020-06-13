<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "probando".
 *
 * @property int $id
 * @property float|null $numeroFactura
 */
class Probando extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'probando';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['numeroFactura'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'numeroFactura' => 'Numero Factura',
        ];
    }
}
