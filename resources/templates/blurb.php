<?php

$edit = '';
if ($this->auth()->isAuthenticated() && $this->auth()->isAdmin()) {
    $url = $this->url('blurb.edit', ['blurb_id' => $blurb->getBlurbId()]);
    $edit = $this->ui()->edit($url);
}

?>

<div class="blurb">
    <?php echo $edit; ?>
    <?php echo $blurb->getContent(); ?>
</div>
