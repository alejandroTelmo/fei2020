<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[OrdenDetalle]].
 *
 * @see OrdenDetalle
 */
class OrdenDetalleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return OrdenDetalle[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return OrdenDetalle|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
