<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%probando}}`.
 */
class m200613_143217_create_probando_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%probando}}', [
            'id' => $this->primaryKey(),
            'numeroFactura' => $this->float(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%probando}}');
    }
}
