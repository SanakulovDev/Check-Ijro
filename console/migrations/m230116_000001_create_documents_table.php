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
            'id' => $this->primaryKey(), // Unikal hujjat identifikatori
            'document_code' => $this->string(50)->notNull(), // Hujjat kodi (masalan, NE21782624)
            'document_date' => $this->date()->notNull(), // Hujjat sanasi
            'resolution_date' => $this->date()->notNull(), // Qaror sanasi
            'resolution_number' => $this->string(50), // Qaror raqami
            'issuer_name' => $this->string(255), // Hujjat chiqaruvchi tashkilot nomi
            'executor_name' => $this->string(255), // Hujjat ijrochisi
            'signing_organization' => $this->string(255), // ERI bergan tashkilot
            'validity_period_start' => $this->date(), // ERI amal qilish boshlanish sanasi
            'validity_period_end' => $this->date(), // ERI amal qilish tugash sanasi
            'created_at'    =>  $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at'    =>  $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('documents');
    }
}