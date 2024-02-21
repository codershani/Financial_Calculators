<?php

namespace app\core;
use app\core\db\DbModel;

abstract class ToolModel extends DbModel
{
    abstract public function getToolDetails(): array;

    // abstract public function editVideo($id = []);

    // abstract public function deleteVideo();


}