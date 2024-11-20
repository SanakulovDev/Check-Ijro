<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%document_details}}`.
 */
class m241120_061658_add_redline_column_to_document_details_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%document_details}}', 'redline', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%document_details}}', 'redline');
    }
}
