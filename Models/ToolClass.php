<?php

namespace app\models;
use app\core\ToolClassModel;

class ToolClass extends ToolClassModel
{

    public function rules(): array
    {
        return [
            'slug' => [self::RULE_REQUIRED],
            'class_name' => [self::RULE_REQUIRED],
        ];
    }
    public static function tableName(): string
    {
        return 'tools_class';
    }
    public static function primaryKey(): string
    {
        return 'id';
    }
    public function attributes(): array
    {
        return ['slug', 'class_name'];
    }

    public function getClassName($where): bool|object 
    {
        return $this->findOne($where);
    }
}