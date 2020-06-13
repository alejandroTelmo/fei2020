<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%metodosDePago}}`.
 */
class m200612_141705_create_metodosDePago_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%metodosDePago}}', [
            'id' => $this->primaryKey(),
            'descripcion' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%metodosDePago}}');
    }
}
