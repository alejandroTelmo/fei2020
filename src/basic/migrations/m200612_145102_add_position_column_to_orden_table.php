<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%orden}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%domicilio}}`
 */
class m200612_145102_add_position_column_to_orden_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%orden}}', 'id_domicilio', $this->integer()->notNull());

        // creates index for column `id_domicilio`
        $this->createIndex(
            '{{%idx-orden-id_domicilio}}',
            '{{%orden}}',
            'id_domicilio'
        );

        // add foreign key for table `{{%domicilio}}`
        $this->addForeignKey(
            '{{%fk-orden-id_domicilio}}',
            '{{%orden}}',
            'id_domicilio',
            '{{%domicilio}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%domicilio}}`
        $this->dropForeignKey(
            '{{%fk-orden-id_domicilio}}',
            '{{%orden}}'
        );

        // drops index for column `id_domicilio`
        $this->dropIndex(
            '{{%idx-orden-id_domicilio}}',
            '{{%orden}}'
        );

        $this->dropColumn('{{%orden}}', 'id_domicilio');
    }
}
