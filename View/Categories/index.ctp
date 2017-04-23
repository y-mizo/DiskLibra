<head>
    <title>
        <?php $this->assign('title', 'Category'); ?>
    </title>
</head>

<div class="container">
    <h1>DiskLibra</h1>
    <p>ディスクの管理。表の項目名クリックでソート。</p>

    <div>
        <h2>カテゴリ一覧</h2>

        <button type="button" class="btn btn-success btn-lg">
            <i class="fa fa-plus" aria-hidden="true">
                <?= $this->Html->link(' カテゴリ登録', ['controller' => 'Categories', 'action' => 'add']); ?>
            </i>
        </button>
        <button type="button" class="btn btn-info btn-lg">
            <i class="fa fa-list-ul" aria-hidden="true">
                <?= $this->Html->link(' ディスク一覧', ['controller' => 'Disks','action' => 'index']); ?>
            </i>
        </button>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10%;"><?= $this->Paginator->sort('id', 'ID'); ?></th>
                        <th><?= $this->Paginator->sort('name', 'Category Name'); ?></th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category) : ?>
                        <tr>
                            <td>
                                <?= h($category['Category']['id']); ?>
                            </td>
                            <td>
                                <?= h($category['Category']['name']); ?>
                            </td>
                            <td>
                                <?php echo $this->Html->link('編集', ['action' => 'edit', $category['Category']['id']], ['class' => 'btn btn-warning']); ?>
                                <?php echo $this->Form->postLink('削除', ['action' => 'delete', $category['Category']['id']], ['class' => 'btn btn-danger', 'confirm' => '本当に削除してもよろしいですか?']); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div style="text-align: center">
            <?= $this->element('pagination'); ?>
        </div>
    </div>
</div>