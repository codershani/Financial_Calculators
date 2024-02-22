<?php

namespace app\core;
use app\core\db\DbModel;

abstract class ToolClassModel extends DbModel
{
    abstract public function getClassName($where): bool|object;

}