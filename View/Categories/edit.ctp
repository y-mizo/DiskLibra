<head>
    <title>
        <?php $this->assign('title', 'Category'); ?>
    </title>
</head>

<div class="container">
    <h1>カテゴリ情報編集</h1>
    <?= $this->element('Categories/form', ['submitLabel' => '更新']); ?>
</div>