<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "domicilio".
 *
 * @property int $id
 * @property int $calle
 * @property int $numero
 * @property string|null $departamento
 * @property string|null $piso
 * @property string|null $plantaBaja
 * @property string $ciudad
 * @property string $provincia
 * @property string $cp
 * @property int $id_usuario
 *
 * @property Usuario $usuario
 * @property Orden[] $ordens
 */
class Domicilio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'domicilio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['calle', 'numero', 'ciudad', 'provincia', 'cp', 'id_usuario'], 'required'],
            [['calle', 'numero', 'id_usuario'], 'integer'],
            [['departamento'], 'string', 'max' => 55],
            [['piso'], 'string', 'max' => 20],
            [['plantaBaja', 'ciudad'], 'string', 'max' => 255],
            [['provincia'], 'string', 'max' => 50],
            [['cp'], 'string', 'max' => 10],
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
            'calle' => 'Calle',
            'numero' => 'Numero',
            'departamento' => 'Departamento',
            'piso' => 'Piso',
            'plantaBaja' => 'Planta Baja',
            'ciudad' => 'Ciudad',
            'provincia' => 'Provincia',
            'cp' => 'Cp',
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
     * Gets query for [[Ordens]].
     *
     * @return \yii\db\ActiveQuery|OrdenQuery
     */
    public function getOrdens()
    {
        return $this->hasMany(Orden::className(), ['id_domicilio' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return DomicilioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DomicilioQuery(get_called_class());
    }
}
