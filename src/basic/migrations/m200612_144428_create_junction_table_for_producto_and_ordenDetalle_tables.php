<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%producto_ordenDetalle}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%producto}}`
 * - `{{%ordenDetalle}}`
 */
class m200612_144428_create_junction_table_for_producto_and_ordenDetalle_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%producto_ordenDetalle}}', [
            'producto_id' => $this->integer(),
            'ordenDetalle_id' => $this->integer(),
            'created_at' => $this->dateTime(),
            'PRIMARY KEY(producto_id, ordenDetalle_id)',
        ]);

        // creates index for column `producto_id`
        $this->createIndex(
            '{{%idx-producto_ordenDetalle-producto_id}}',
            '{{%producto_ordenDetalle}}',
            'producto_id'
        );

        // add foreign key for table `{{%producto}}`
        $this->addForeignKey(
            '{{%fk-producto_ordenDetalle-producto_id}}',
            '{{%producto_ordenDetalle}}',
            'producto_id',
            '{{%producto}}',
            'id',
            'CASCADE'
        );

        // creates index for column `ordenDetalle_id`
        $this->createIndex(
            '{{%idx-producto_ordenDetalle-ordenDetalle_id}}',
            '{{%producto_ordenDetalle}}',
            'ordenDetalle_id'
        );

        // add foreign key for table `{{%ordenDetalle}}`
        $this->addForeignKey(
            '{{%fk-producto_ordenDetalle-ordenDetalle_id}}',
            '{{%producto_ordenDetalle}}',
            'ordenDetalle_id',
            '{{%ordenDetalle}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%producto}}`
        $this->dropForeignKey(
            '{{%fk-producto_ordenDetalle-producto_id}}',
            '{{%producto_ordenDetalle}}'
        );

        // drops index for column `producto_id`
        $this->dropIndex(
            '{{%idx-producto_ordenDetalle-producto_id}}',
            '{{%producto_ordenDetalle}}'
        );

        // drops foreign key for table `{{%ordenDetalle}}`
        $this->dropForeignKey(
            '{{%fk-producto_ordenDetalle-ordenDetalle_id}}',
            '{{%producto_ordenDetalle}}'
        );

        // drops index for column `ordenDetalle_id`
        $this->dropIndex(
            '{{%idx-producto_ordenDetalle-ordenDetalle_id}}',
            '{{%producto_ordenDetalle}}'
        );

        $this->dropTable('{{%producto_ordenDetalle}}');
    }
}
