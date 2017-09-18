<?php
// @codingStandardsIgnoreFile

use Jnjxp\Blurb\Web\Action\Edit;

$blurb = $this->blurb($blurb_id);
$url   = $this->url(Edit::class, ['blurb_id' => $blurb->getBlurbId()]);

$edit = '<i title="edit" class="fa fa-5x fa-pencil-square" aria-hidden="true"></i>';
$attr = ['class' => 'edit-blurb'];

$control = $this->auth()->isValid()
    ? $this->anchorRaw($url, $edit, $attr)
    : '';

?>

<div class="blurb">
    <?php echo $control; ?>
    <?php echo $blurb; ?>
</div>

