<head>
    <title>
        <?php $this->assign('title', 'Category'); ?>
    </title>
</head>

<div class="container">
    <h1>カテゴリ登録</h1>
    <?= $this->element('Categories/form', ['submitLabel' => '登録']); ?>
</div>

