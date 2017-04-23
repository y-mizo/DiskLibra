<?= $this->Form->create('Disk', ['novalidate' => true]); ?>
<form>
    <div class="form-group" style="width: 50%;">
        <?= $this->Form->input('title', ['label' => 'Title', 'class' => 'form-control']); ?> 
    </div>
    <div class="form-group" style="width: 50%;">
        <?= $this->Form->input('category_id', [
            'class' => 'form-control',
            'type' => 'select', 
            'options' => $category_list
            ]); ?>
    </div>
    <div class="radio">
        <?= $this->Form->input('disk_standard', [
            'type' => 'radio',
            'legend' => false,
            'label' => 'Disk',
            'options' => $disk_standards,
        ]); ?>           
    </div>
    <div class="form-group" style="width: 50%;">
        <?= $this->Form->input('description', ['label' => 'Description', 'class' => 'form-control']); ?>
    </div>
    <?php if (!empty($this->request->data)) : ?>
        <?= $this->Form->hidden('id'); ?>
    <?php endif; ?>
<?= $this->Form->input($submitLabel, ['controller' => 'Disks', 'action'=> 'add', 'type' => 'submit', 'class' => 'btn btn-primary', 'label' => false,]); ?>
<?= $this->Form->end(); ?>
</form>