<?php

use yii\db\Migration;

/**
 * Handles the creation of table `documents`.
 */
class m230116_000001_create_documents_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('documents', [
            'id' => $this->primaryKey(),
            'document_type' => $this->string(255)->notNull(),
            'document_number' => $this->string(50)->notNull(),
            'issue_date' => $this->date()->notNull(),
            'subject' => $this->text()->notNull(),
            'decision_date' => $this->date(),
            'main_basis' => $this->text(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('documents');
    }
}