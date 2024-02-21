<?php

namespace app\models;
use app\core\ToolModel;

class Tool extends ToolModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    public string $title = '';
    public string $tool_name = '';
    public string $slug = '';
    public ?string $featured_image = '';
    public ?string $page_title = '';
    public ?string $short_description = '';
    public ?string $description = '';
    public ?string $subtitle = '';

    public int $status = self::STATUS_ACTIVE;
    public array $data = [];
    public function rules(): array
    {
        return [
            'title' => [self::RULE_REQUIRED],
            'tool_name' => [self::RULE_REQUIRED],
            'slug' => [self::RULE_REQUIRED],
            'featured_image' => [self::RULE_REQUIRED],
            'short_description' => [self::RULE_REQUIRED],
            'description' => [self::RULE_REQUIRED],
            'page_title' => [self::RULE_REQUIRED],
            'subtitle' => [self::RULE_REQUIRED],
        ];
    }

    public function labels(): array
    {
        return [
            'page_title' => 'Page Title',
            'title' => 'Title',
            'tool_name' => 'Calculator Name',
            'slug' => 'Slug',
            'featured_image' => 'Featured Image',
            'subtitle' => 'Subtitle',
            'short_description' => 'Short Description',
            'description' => 'Description'
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
        return ['page_title', 'title', 'subtitle', 'tool_name', 'slug', 'featured_image', 'short_description', 'description'];
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