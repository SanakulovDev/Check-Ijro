<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%documents}}`.
 */
class m241117_042806_add_document_number_column_to_documents_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%documents}}', 'document_number', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%documents}}', 'document_number');
    }
}
