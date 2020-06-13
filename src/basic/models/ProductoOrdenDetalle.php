<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto_ordenDetalle".
 *
 * @property int $producto_id
 * @property int $ordenDetalle_id
 * @property string|null $created_at
 *
 * @property OrdenDetalle $ordenDetalle
 * @property Producto $producto
 */
class ProductoOrdenDetalle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto_ordenDetalle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['producto_id', 'ordenDetalle_id'], 'required'],
            [['producto_id', 'ordenDetalle_id'], 'integer'],
            [['created_at'], 'safe'],
            [['producto_id', 'ordenDetalle_id'], 'unique', 'targetAttribute' => ['producto_id', 'ordenDetalle_id']],
            [['ordenDetalle_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrdenDetalle::className(), 'targetAttribute' => ['ordenDetalle_id' => 'id']],
            [['producto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['producto_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'producto_id' => 'Producto ID',
            'ordenDetalle_id' => 'Orden Detalle ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[OrdenDetalle]].
     *
     * @return \yii\db\ActiveQuery|OrdenDetalleQuery
     */
    public function getOrdenDetalle()
    {
        return $this->hasOne(OrdenDetalle::className(), ['id' => 'ordenDetalle_id']);
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
     * @return ProductoOrdenDetalleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductoOrdenDetalleQuery(get_called_class());
    }
}
