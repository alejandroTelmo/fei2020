<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%domicilio}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%usuario}}`
 */
class m200612_145231_add_position_column_to_domicilio_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%domicilio}}', 'id_usuario', $this->integer()->notNull());

        // creates index for column `id_usuario`
        $this->createIndex(
            '{{%idx-domicilio-id_usuario}}',
            '{{%domicilio}}',
            'id_usuario'
        );

        // add foreign key for table `{{%usuario}}`
        $this->addForeignKey(
            '{{%fk-domicilio-id_usuario}}',
            '{{%domicilio}}',
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
            '{{%fk-domicilio-id_usuario}}',
            '{{%domicilio}}'
        );

        // drops index for column `id_usuario`
        $this->dropIndex(
            '{{%idx-domicilio-id_usuario}}',
            '{{%domicilio}}'
        );

        $this->dropColumn('{{%domicilio}}', 'id_usuario');
    }
}
