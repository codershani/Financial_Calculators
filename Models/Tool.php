<?php

namespace app\models;
use app\core\ToolModel;

class Tool extends ToolModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    public string $file = '';
    public int $status = self::STATUS_ACTIVE;
    public array $data = [];
    public function rules(): array
    {
        return [
            'tool_name' => [self::RULE_REQUIRED],
            'slug' => [self::RULE_REQUIRED],
        ];
    }

    public function labels(): array
    {
        return [
            'tool_name' => 'Calculator',
            'slug' => 'Slug',
            'featured_image' => 'Set Featured Image',
            'icon_image' => 'Set Icon',
        ];
    }

    public static function tableName(): string
    {
        return 'tools';
    }
    public static function primaryKey(): string
    {
        return 'id';
    }
    public function attributes(): array
    {
        return ['tool_name', 'slug', 'featured_image', 'icon_image'];
    }

    public function save()
    {
        $this->status = self::STATUS_ACTIVE;
        return parent::save();
    }

    public function getToolDetails(): array
    {
        $this->data = $this->findAll();
        return $this->data;
    }

    public function getTool($where): bool|object 
    {
        return $this->findOne($where);
    }

    public function update($where)
    {
        return parent::update($where);
    }

}