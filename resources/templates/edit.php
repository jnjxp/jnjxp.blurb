<?php

$title  = 'Edit blurb: ' . $blurb->getBlurbId();

$this->layout(
    'layout::one-col',
    [
       'title' => $title
    ]
);

$action = $this->url('blurb.edit', ['blurb_id' => $blurb->getBlurbId()]);

$this->wysiwyg()->instance('textarea');
?>

<div class="page-header">
    <h1><?php echo $this->e($title); ?></h1>
</div>

<form method="post" action="<?php echo $action; ?>">
    <textarea name="content" class="form-control">
        <?php echo $blurb->getContent(); ?>
    </textarea>

  <button type="submit" class="btn btn-primary mt-2">Submit</button>
</form>
