<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%carrito}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%usuario}}`
 */
class m200612_143523_add_position_column_to_carrito_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%carrito}}', 'id_usuario', $this->integer()->notNull());

        // creates index for column `id_usuario`
        $this->createIndex(
            '{{%idx-carrito-id_usuario}}',
            '{{%carrito}}',
            'id_usuario'
        );

        // add foreign key for table `{{%usuario}}`
        $this->addForeignKey(
            '{{%fk-carrito-id_usuario}}',
            '{{%carrito}}',
            'id_usuario',
            '{{%usuario}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%usuario}}`
        $this->dropForeignKey(
            '{{%fk-carrito-id_usuario}}',
            '{{%carrito}}'
        );

        // drops index for column `id_usuario`
        $this->dropIndex(
            '{{%idx-carrito-id_usuario}}',
            '{{%carrito}}'
        );

        $this->dropColumn('{{%carrito}}', 'id_usuario');
    }
}
