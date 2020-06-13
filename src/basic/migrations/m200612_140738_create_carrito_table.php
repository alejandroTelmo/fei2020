<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%carrito}}`.
 */
class m200612_140738_create_carrito_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%carrito}}', [
            'id' => $this->primaryKey(),
            'cantidad' => $this->integer(55)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%carrito}}');
    }
}
