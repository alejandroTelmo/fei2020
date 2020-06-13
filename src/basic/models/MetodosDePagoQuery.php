<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MetodosDePago]].
 *
 * @see MetodosDePago
 */
class MetodosDePagoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MetodosDePago[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MetodosDePago|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
