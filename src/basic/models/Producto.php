<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property int $id
 * @property string|null $nombre
 * @property int|null $stock
 * @property int|null $costoPesos
 * @property int|null $precioVenta
 * @property string|null $descripcion
 * @property float|null $costoDolar
 * @property float|null $ventaDolar
 *
 * @property CarritoProducto[] $carritoProductos
 * @property Carrito[] $carritos
 * @property ProductoOrdenDetalle[] $productoOrdenDetalles
 * @property OrdenDetalle[] $ordenDetalles
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stock', 'costoPesos', 'precioVenta'], 'integer'],
            [['costoDolar', 'ventaDolar'], 'number'],
            [['nombre', 'descripcion'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'stock' => 'Stock',
            'costoPesos' => 'Costo Pesos',
            'precioVenta' => 'Precio Venta',
            'descripcion' => 'Descripcion',
            'costoDolar' => 'Costo Dolar',
            'ventaDolar' => 'Venta Dolar',
        ];
    }

    /**
     * Gets query for [[CarritoProductos]].
     *
     * @return \yii\db\ActiveQuery|CarritoProductoQuery
     */
    public function getCarritoProductos()
    {
        return $this->hasMany(CarritoProducto::className(), ['producto_id' => 'id']);
    }

    /**
     * Gets query for [[Carritos]].
     *
     * @return \yii\db\ActiveQuery|CarritoQuery
     */
    public function getCarritos()
    {
        return $this->hasMany(Carrito::className(), ['id' => 'carrito_id'])->viaTable('carrito_producto', ['producto_id' => 'id']);
    }

    /**
     * Gets query for [[ProductoOrdenDetalles]].
     *
     * @return \yii\db\ActiveQuery|ProductoOrdenDetalleQuery
     */
    public function getProductoOrdenDetalles()
    {
        return $this->hasMany(ProductoOrdenDetalle::className(), ['producto_id' => 'id']);
    }

    /**
     * Gets query for [[OrdenDetalles]].
     *
     * @return \yii\db\ActiveQuery|OrdenDetalleQuery
     */
    public function getOrdenDetalles()
    {
        return $this->hasMany(OrdenDetalle::className(), ['id' => 'ordenDetalle_id'])->viaTable('producto_ordenDetalle', ['producto_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ProductoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductoQuery(get_called_class());
    }
}
