<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carrito_producto".
 *
 * @property int $carrito_id
 * @property int $producto_id
 * @property string|null $created_at
 *
 * @property Carrito $carrito
 * @property Producto $producto
 */
class CarritoProducto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carrito_producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['carrito_id', 'producto_id'], 'required'],
            [['carrito_id', 'producto_id'], 'integer'],
            [['created_at'], 'safe'],
            [['carrito_id', 'producto_id'], 'unique', 'targetAttribute' => ['carrito_id', 'producto_id']],
            [['carrito_id'], 'exist', 'skipOnError' => true, 'targetClass' => Carrito::className(), 'targetAttribute' => ['carrito_id' => 'id']],
            [['producto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['producto_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'carrito_id' => 'Carrito ID',
            'producto_id' => 'Producto ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Carrito]].
     *
     * @return \yii\db\ActiveQuery|CarritoQuery
     */
    public function getCarrito()
    {
        return $this->hasOne(Carrito::className(), ['id' => 'carrito_id']);
    }

    /**
     * Gets query for [[Producto]].
     *
     * @return \yii\db\ActiveQuery|ProductoQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['id' => 'producto_id']);
    }

    /**
     * {@inheritdoc}
     * @return CarritoProductoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CarritoProductoQuery(get_called_class());
    }
}
