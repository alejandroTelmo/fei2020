<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ordenDetalle}}`.
 */
class m200612_142711_create_ordenDetalle_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ordenDetalle}}', [
            'id' => $this->primaryKey(),
            'total' => $this->integer(55),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ordenDetalle}}');
    }
}
