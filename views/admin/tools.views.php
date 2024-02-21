<?php

/** @var \app\core\View $this */

$this->title = 'Tools';

?>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Tool Name</th>
                    <th>Status</th>
                    <th>Latest Updated</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Tool Name</th>
                    <th>Status</th>
                    <th>Latest Updated</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>

            <?php foreach($data as $key => $tool):?>
                <tr>
                    <td><?=++$key?></td>
                    <td>
                        <div class="tools-view-img">
                            <img src="<?=SITE_PATH.$tool['featured_image']?>" alt="">
                        </div>
                    </td>
                    <td><?=$tool['tool_name']?></td>
                    <td>
                        <?php if($tool['status'] == 0):?>
                            <p class='bg-gradient-secondary text-white btn-sm text-center'>Disabled</p>
                            <?php else: ?>
                                <p class='bg-gradient-success text-white btn-sm text-center'>Enabled</p>
                        <?php endif; ?>
                    </td>
                    <td><?=$tool['updated_at']?></td>
                    <td>
                        <div class="row">
                            <a href="/admin/tools/edit/<?=$tool['id']?>/enable">
                                <button class="btn btn-success btn-sm btn-circle m-1"><i class="fas fa-check"></i></button>
                            </a>
                            <a href="/admin/tools/edit/<?=$tool['id']?>/disable">
                                <button class="btn btn-warning btn-sm btn-circle m-1"><i class="fas fa-ban"></i></button>
                            </a>
                        </div>
                        <div class="row">
                            <a href="/admin/tools/edit/<?=$tool['id']?>">
                                <button class="btn btn-primary btn-sm btn-circle m-1"><i class="fas fa-edit"></i></button>
                            </a>
                            <a href="/admin/tools/delete/<?=$tool['id']?>">
                                <button class="btn btn-danger btn-sm btn-circle m-1"><i class="fas fa-trash"></i></button>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
