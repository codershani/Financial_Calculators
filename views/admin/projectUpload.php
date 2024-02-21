<?php 
use app\core\form\Form;

/** @var \app\core\View $this */
/** @var \app\models\Project $model */

?>

<h1>Admin Panel Projects Upload Page</h1>

<?php $form = Form::begin('','post') ?>
<?php echo $form->field($model, 'title') ?>
<?php //echo $form->field($model, 'file')->filesField(); ?>
<?php //echo $form->field($model, 'file')->filesField(); ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end(); ?>