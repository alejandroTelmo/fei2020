<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%orden}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%usuario}}`
 */
class m200612_144951_add_position_column_to_orden_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%orden}}', 'id_usuario', $this->integer()->notNull());

        // creates index for column `id_usuario`
        $this->createIndex(
            '{{%idx-orden-id_usuario}}',
            '{{%orden}}',
            'id_usuario'
        );

        // add foreign key for table `{{%usuario}}`
        $this->addForeignKey(
            '{{%fk-orden-id_usuario}}',
            '{{%orden}}',
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
            '{{%fk-orden-id_usuario}}',
            '{{%orden}}'
        );

        // drops index for column `id_usuario`
        $this->dropIndex(
            '{{%idx-orden-id_usuario}}',
            '{{%orden}}'
        );

        $this->dropColumn('{{%orden}}', 'id_usuario');
    }
}
