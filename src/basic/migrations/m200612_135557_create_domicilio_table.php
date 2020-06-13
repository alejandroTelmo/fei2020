<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%domicilio}}`.
 */
class m200612_135557_create_domicilio_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%domicilio}}', [
            'id' => $this->primaryKey(),
            'calle' => $this->integer()->notNull(),
            'numero' => $this->integer()->notNull(),
            'departamento' => $this->string(55),
            'piso' => $this->string(20),
            'plantaBaja' => $this->string(255),
            'ciudad' => $this->string(255)->notNull(),
            'provincia' => $this->string(50)->notNull(),
            'cp' => $this->string(10)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%domicilio}}');
    }
}
