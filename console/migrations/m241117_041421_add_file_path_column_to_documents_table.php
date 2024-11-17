<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%documents}}`.
 */
class m241117_041421_add_file_path_column_to_documents_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%documents}}', 'file_path', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%documents}}', 'file_path');
    }
}
