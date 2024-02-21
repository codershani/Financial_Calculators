<?php 

use app\core\form\Form;
use app\core\form\TextareaField;

/** @var \app\core\View $this */
/** @var \app\models\ContactForm $model */

$this->title = 'Contact Us';

?>
    
<h1>Contact Us</h1>

<?php $form = Form::begin('','post') ?>
<?php echo $form->field($model, 'subject') ?>
<?php echo $form->field($model, 'email') ?>
<?php echo new TextareaField($model, 'messageBody') ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end(); ?>
