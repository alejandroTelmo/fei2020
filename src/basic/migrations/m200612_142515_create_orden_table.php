<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orden}}`.
 */
class m200612_142515_create_orden_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orden}}', [
            'id' => $this->primaryKey(),
            'total' => $this->integer(55),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%orden}}');
    }
}
