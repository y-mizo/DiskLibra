<ul class="pagination">
    <?= $this->Paginator->first('|<', ['tag' => 'li'], $options = []); ?>
    <?= $this->Paginator->prev(__('<'), ['tag' => 'li'], null, ['tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a']); ?>
    <?= $this->Paginator->numbers(['separator' => '', 'currentTag' => 'a', 'currentClass' => 'active', 'tag' => 'li', 'first' => 1, 'ellipsis' => '<li class="disabled"><a>...</a></li>']); ?>                              
    <?= $this->Paginator->next(__('>'), ['tag' => 'li', 'currentClass' => 'disabled'], null, ['tag' => 'li', 'class' => 'disabled', 'disabledTag' => 'a']); ?>
    <?= $this->Paginator->last('>|', ['tag' => 'li'], $options = []); ?>
</ul>  