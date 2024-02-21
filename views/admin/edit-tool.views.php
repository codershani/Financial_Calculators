<?php
use app\core\form\Form;

/** @var \app\core\View $this */

$this->title = 'Edit '. $data->tool_name;

?>

<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Edit <strong><?=$data->tool_name?></strong></h1>
                            </div>
                            <?php $form = Form::begin('', "post"); ?>
                                <?=$form->field($data, 'page_title')?>
                                <?=$form->field($data, 'title')?>
                                <?=$form->field($data, 'subtitle')?>
                                <?=$form->field($data, 'tool_name')?>
                                <?=$form->field($data, 'slug')?>
                                <?=$form->field($data, 'short_description')?>
                                <?=$form->field($data, 'featured_image')->filesField()?>
                                <?=$form->field($data, 'description')?>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Update Tool</button>
                            <?php Form::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>