<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orden".
 *
 * @property int $id
 * @property int|null $total
 * @property int $id_usuario
 * @property int $id_domicilio
 *
 * @property MetodosDePago[] $metodosDePagos
 * @property Domicilio $domicilio
 * @property Usuario $usuario
 * @property OrdenDetalle[] $ordenDetalles
 */
class Orden extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orden';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['total', 'id_usuario', 'id_domicilio'], 'integer'],
            [['id_usuario', 'id_domicilio'], 'required'],
            [['id_domicilio'], 'exist', 'skipOnError' => true, 'targetClass' => Domicilio::className(), 'targetAttribute' => ['id_domicilio' => 'id']],
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
            'total' => 'Total',
            'id_usuario' => 'Id Usuario',
            'id_domicilio' => 'Id Domicilio',
        ];
    }

    /**
     * Gets query for [[MetodosDePagos]].
     *
     * @return \yii\db\ActiveQuery|MetodosDePagoQuery
     */
    public function getMetodosDePagos()
    {
        return $this->hasMany(MetodosDePago::className(), ['id_orden' => 'id']);
    }

    /**
     * Gets query for [[Domicilio]].
     *
     * @return \yii\db\ActiveQuery|DomicilioQuery
     */
    public function getDomicilio()
    {
        return $this->hasOne(Domicilio::className(), ['id' => 'id_domicilio']);
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
     * Gets query for [[OrdenDetalles]].
     *
     * @return \yii\db\ActiveQuery|OrdenDetalleQuery
     */
    public function getOrdenDetalles()
    {
        return $this->hasMany(OrdenDetalle::className(), ['id_orden' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return OrdenQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrdenQuery(get_called_class());
    }
}
