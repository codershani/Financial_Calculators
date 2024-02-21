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
                    <th>Page Title</th>
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
                    <th>Page Title</th>
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
                    <td><?=$tool['page_title']?></td>
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
                                <button class="btn btn-success btn-sm m-1 my-2"><i class="fas fa-check"></i></button>
                            </a>
                            <a href="/admin/tools/edit/<?=$tool['id']?>/disable">
                                <button class="btn btn-warning btn-sm m-1 my-2"><i class="fas fa-ban"></i></button>
                            </a>
                        </div>
                        <div class="row">
                            <a href="/admin/tools/edit/<?=$tool['id']?>" class="btn btn-primary btn-sm btn-icon-split m-1">
                                <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Edit</span>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
