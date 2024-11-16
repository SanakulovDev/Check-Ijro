<?php

use yii\db\Migration;

/**
 * Handles the creation of table `document_details`.
 * Links to the `documents` table.
 */
class m230116_000002_create_document_details_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('document_details', [
            'id' => $this->primaryKey(),
            'document_id' => $this->integer()->notNull(), // Bog‘langan hujjat ID
            'section_title' => $this->string(255), // Bo‘lim nomi (masalan: Qaror qismi)
            'main_content' => $this->text()->notNull(), // Bo‘lim matni,
            'resolution_content'    =>$this->text(),
            'mayor_of_the_city' =>  $this->string(255), // shahar hokimi
            'archive_head' =>  $this->string(255),// Arxiv mudiri
        ]);

        // Foreign key
        $this->addForeignKey(
            'fk-document_details-document_id',
            'document_details',
            'document_id',
            'documents',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-document_details-document_id', 'document_details');
        $this->dropTable('document_details');
    }
}