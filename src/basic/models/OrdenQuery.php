<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Orden]].
 *
 * @see Orden
 */
class OrdenQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Orden[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Orden|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
