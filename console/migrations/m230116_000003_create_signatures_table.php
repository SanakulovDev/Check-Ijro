<?php

use yii\db\Migration;

/**
 * Handles the creation of table `signatures`.
 * Has foreign keys to the table `documents`.
 */
class m230116_000003_create_signatures_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('signatures', [
            'id' => $this->primaryKey(),
            'document_id' => $this->integer()->notNull(),
            'signed_by' => $this->string(255)->notNull(),
            'organization' => $this->string(255),
            'valid_from' => $this->date(),
            'valid_until' => $this->date(),
            'qr_code' => $this->text(),
        ]);

        // Foreign key for document_id
        $this->addForeignKey(
            'fk-signatures-document_id',
            'signatures',
            'document_id',
            'documents',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-signatures-document_id',
            'signatures'
        );

        $this->dropTable('signatures');
    }
}