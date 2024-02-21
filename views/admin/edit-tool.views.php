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
                                <!-- CKEditor textarea -->
                                <textarea id="editor1" name="description"><?=$data->description?></textarea>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Update Tool</button>
                            <?php Form::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- CKEditor5 File -->
    <script src="<?=SITE_ASSETS_PATH?>/vendor/ckeditor5/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor1' ) )
            .catch( error => {
                console.error( error );
            } );

            // Make sure to handle form submission with JavaScript
            document.querySelector('form').addEventListener('submit', function (event) {
                // Prevent the default form submission
                event.preventDefault();

                // Get CKEditor content
                var editor = ClassicEditor.instances.editor1;
                var descriptionContent = editor.getData();

                // Add a hidden input to the form to send CKEditor content
                var hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'description_content';
                hiddenInput.value = descriptionContent;
                this.appendChild(hiddenInput);

                // Now, submit the form
                this.submit();
            });
    </script>