<?php

namespace app\models;

use app\models\Role;
use app\models\UserRole;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int $id ИД
 * @property string $surname Фамилия
 * @property string $name Имя
 * @property string $email Email
 * @property string|null $password_hash Хеш пароля
 * @property string|null $about О себе
 *
 * @property UserRole[] $userRoles
 */
class User extends ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['surname', 'name', 'email'], 'required'],
            [['surname', 'name', 'email'], 'string', 'max' => 50],
            [['about'], 'string'],
            [['password_hash'], 'string', 'max' => 64],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ИД',
            'surname' => 'Фамилия',
            'name' => 'Имя',
            'email' => 'Email',
            'password_hash' => 'Хеш пароля',
            'about' => 'О себе',
        ];
    }

    /**
     *
     * @return ActiveQuery
     */
    public function getUserRoles()
    {
        return $this->hasMany(UserRole::class, ['user_id' => 'id']);
    }

    /**
     *
     * @return ActiveQuery
     */
    public function getRoles()
    {
        return $this->hasMany(Role::class, ['id' => 'role_id'])->via('userRoles');
    }

}
