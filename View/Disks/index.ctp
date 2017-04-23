<head>
    <title>
        <?php $this->assign('title', 'Disk'); ?>
    </title>
</head>

<div class="container">
    <h1>DiskLibra</h1>
    <p>ディスクの管理。表の項目名クリックでソート。</p>

    <div style="text-align: right">
        <p>▼ 単一キーワードで絞り込む</p>
        <form action = "<?= $this->Html->url(['action' => 'index']); ?>" class="form-inline" method="get">
            <div class="form-group"><input type="text" name="keyword" class="form-control"></div>
            <div class="form-group"><input type="submit" value="検索" class="form-control btn btn-primary"></div>
        </form>
    </div>
    
    <h2>ディスク一覧</h2>
    
    <button type="button" class="btn btn-success btn-lg">
        <i class="fa fa-plus" aria-hidden="true">
            <?= $this->Html->link(' ディスク登録', ['action' => 'add']); ?>
        </i>
    </button>
    <button type="button" class="btn btn-info btn-lg">
        <i class="fa fa-list-ul" aria-hidden="true">
            <?= $this->Html->link(' カテゴリ一覧', ['controller' => 'Categories','action' => 'index']); ?>
        </i>
    </button>

    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width: 10%;"><?= $this->Paginator->sort('id', 'Disk NO.'); ?></th>
                <th style="width: 10%;"><?= $this->Paginator->sort('disk_standard', 'Disk Standard'); ?></th>
                <th style="width: 10%;"><?= $this->Paginator->sort('Category.name', 'Category'); ?></th>
                <th style="width: 20%;"><?= $this->Paginator->sort('title', 'Title'); ?></th>
                <th style="width: 40%;"><?= $this->Paginator->sort('description', 'Description'); ?></th>
                <th style="width: 10%;"><?= $this->Paginator->sort('modified', 'Modified Date'); ?></th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($disks as $disk) : ?>
                <tr>
                    <td>
                        <?= h($disk['Disk']['id']); ?>
                    </td>
                    <td>
                        <?= h($disk['Disk']['disk_standard']); ?>
                    </td>
                    <td>
                        <?= h($disk['Category']['name']); ?>
                    </td>
                    <td>
                        <?= h($disk['Disk']['title']); ?>
                    </td>
                    <td>
                        <?= nl2br($disk['Disk']['description']); ?>
                    </td>
                    <td>
                        <?= $this->Time->format($disk['Disk']['modified'], '%Y/%m/%d'); ?>
                    </td>
                    <td class="actions" style="text-align: center" colspan="2">
                        <?= $this->Html->link('編集', ['action' => 'edit', $disk['Disk']['id']], ['class' => 'btn btn-warning']); ?>
                        <!--削除機能が欲しい場合は下記をアクティブにする。-->
                        <?php // echo $this->Form->postLink('削除', array('action' => 'delete', $disk['Disk']['id']), array('class' => 'btn btn-danger', 'confirm' => '本当に削除してもよろしいですか?')); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?= $this->Paginator->counter([
        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
    ]); ?>
    
    <div style="text-align: center">
        <?= $this->element('pagination'); ?>
    </div>
</div>