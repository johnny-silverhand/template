<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m210202_080058_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'surname' => $this->string(50)->notNull()->comment('Фамилия'),
            'name' => $this->string(50)->notNull()->comment('Имя'),
            'email' => $this->string(50)->notNull()->unique()->comment('Email'),
            'password_hash' => $this->string(64)->comment('Хеш пароля'),
            'about' => $this->text()->null()->comment('О себе'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
