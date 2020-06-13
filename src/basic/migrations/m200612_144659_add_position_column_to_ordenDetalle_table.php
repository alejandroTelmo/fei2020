<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%ordenDetalle}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%orden}}`
 */
class m200612_144659_add_position_column_to_ordenDetalle_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%ordenDetalle}}', 'id_orden', $this->integer()->notNull());

        // creates index for column `id_orden`
        $this->createIndex(
            '{{%idx-ordenDetalle-id_orden}}',
            '{{%ordenDetalle}}',
            'id_orden'
        );

        // add foreign key for table `{{%orden}}`
        $this->addForeignKey(
            '{{%fk-ordenDetalle-id_orden}}',
            '{{%ordenDetalle}}',
            'id_orden',
            '{{%orden}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%orden}}`
        $this->dropForeignKey(
            '{{%fk-ordenDetalle-id_orden}}',
            '{{%ordenDetalle}}'
        );

        // drops index for column `id_orden`
        $this->dropIndex(
            '{{%idx-ordenDetalle-id_orden}}',
            '{{%ordenDetalle}}'
        );

        $this->dropColumn('{{%ordenDetalle}}', 'id_orden');
    }
}
