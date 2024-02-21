<?php 
use app\core\Application;
use app\core\form\Form;

/** @var \app\core\View $this */
/** @var \app\models\Project $model */

$videos = $model->findAll();

?>

<h1>Admin Panel Projects Page</h1> 
<a class="btn btn-primary mb-4" href="/admin/upload">Upload</a>
<table class="table border">
    <thead>
        <tr>
            <th>Video Title</th>
            <th>Creation Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($videos as $video): ?>
        <tr>
            <td><?php echo $video['title']; ?></td>
            <td><?php echo date('d M, Y', strtotime($video['created_at'])); ?></td>
            <td>
                <a href="/admin/project/edit" <?php ?> class="btn btn-primary">Edit</a>
                <a href="/admin/project/" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
