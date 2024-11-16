<?php

use yii\db\Migration;

/**
 * Handles the creation of table `land_allocation`.
 * Has foreign keys to the table `documents`.
 */
class m230116_000002_create_land_allocation_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('land_allocation', [
            'id' => $this->primaryKey(),
            'document_id' => $this->integer()->notNull(),
            'address' => $this->text()->notNull(),
            'area_sqm' => $this->integer()->notNull(),
            'justification' => $this->text(),
            'created_at'    =>  $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at'    =>  $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        // Foreign key for document_id
        $this->addForeignKey(
            'fk-land_allocation-document_id',
            'land_allocation',
            'document_id',
            'documents',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-land_allocation-document_id',
            'land_allocation'
        );

        $this->dropTable('land_allocation');
    }
}