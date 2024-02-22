<?php

namespace app\core;
use app\core\db\DbModel;

abstract class UserModel extends DbModel
{
    public string $username;
    abstract public function getDisplayName(): string;
}