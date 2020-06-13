<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ProductoOrdenDetalle]].
 *
 * @see ProductoOrdenDetalle
 */
class ProductoOrdenDetalleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ProductoOrdenDetalle[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ProductoOrdenDetalle|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
