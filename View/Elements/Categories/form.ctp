<?= $this->Form->create('Category', ['novalidate' => true]); ?>

    <div class="form-group" style="width: 50%;">
        <?= $this->Form->input('name', ['label' => 'Category Name', 'class' => 'form-control']); ?> 
    </div>

    <?php if (!empty($this->request->data)) : ?>
        <?= $this->Form->hidden('id'); ?>
    <?php endif; ?>

<?= $this->Form->input($submitLabel, ['controller' => 'categories', 'action'=> 'add', 'type' => 'submit', 'class' => 'btn btn-primary', 'label' => false]); ?>
<?= $this->Form->end(); ?>
