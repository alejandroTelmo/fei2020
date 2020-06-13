<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ordenDetalle".
 *
 * @property int $id
 * @property int|null $total
 * @property int $id_orden
 *
 * @property Orden $orden
 * @property ProductoOrdenDetalle[] $productoOrdenDetalles
 * @property Producto[] $productos
 */
class OrdenDetalle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ordenDetalle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['total', 'id_orden'], 'integer'],
            [['id_orden'], 'required'],
            [['id_orden'], 'exist', 'skipOnError' => true, 'targetClass' => Orden::className(), 'targetAttribute' => ['id_orden' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'total' => 'Total',
            'id_orden' => 'Id Orden',
        ];
    }

    /**
     * Gets query for [[Orden]].
     *
     * @return \yii\db\ActiveQuery|OrdenQuery
     */
    public function getOrden()
    {
        return $this->hasOne(Orden::className(), ['id' => 'id_orden']);
    }

    /**
     * Gets query for [[ProductoOrdenDetalles]].
     *
     * @return \yii\db\ActiveQuery|ProductoOrdenDetalleQuery
     */
    public function getProductoOrdenDetalles()
    {
        return $this->hasMany(ProductoOrdenDetalle::className(), ['ordenDetalle_id' => 'id']);
    }

    /**
     * Gets query for [[Productos]].
     *
     * @return \yii\db\ActiveQuery|ProductoQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['id' => 'producto_id'])->viaTable('producto_ordenDetalle', ['ordenDetalle_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return OrdenDetalleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrdenDetalleQuery(get_called_class());
    }
}
