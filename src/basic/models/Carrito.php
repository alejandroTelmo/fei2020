<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carrito".
 *
 * @property int $id
 * @property int $cantidad
 * @property int $id_usuario
 *
 * @property Usuario $usuario
 * @property CarritoProducto[] $carritoProductos
 * @property Producto[] $productos
 */
class Carrito extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carrito';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cantidad', 'id_usuario'], 'required'],
            [['cantidad', 'id_usuario'], 'integer'],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id_usuario' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cantidad' => 'Cantidad',
            'id_usuario' => 'Id Usuario',
        ];
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery|UsuarioQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'id_usuario']);
    }

    /**
     * Gets query for [[CarritoProductos]].
     *
     * @return \yii\db\ActiveQuery|CarritoProductoQuery
     */
    public function getCarritoProductos()
    {
        return $this->hasMany(CarritoProducto::className(), ['carrito_id' => 'id']);
    }

    /**
     * Gets query for [[Productos]].
     *
     * @return \yii\db\ActiveQuery|ProductoQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['id' => 'producto_id'])->viaTable('carrito_producto', ['carrito_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CarritoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CarritoQuery(get_called_class());
    }
}
