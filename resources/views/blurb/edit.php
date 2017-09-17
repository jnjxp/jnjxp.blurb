<?php
// @codingStandardsIgnoreFile

use Jnjxp\Blurb\Web\Action\Update;


$blurb_id = $this->blurb->getBlurbId();

$headline = $this->eleRaw(
    'h1',
    sprintf('Edit Blurb: <var>%s</var>',  $blurb_id)
);

if ($this->getViewRegistry()->has('_wysiwyg')) {
    $this->render('_wysiwyg');
}

$action = $this->url(
    Update::class,
    ['blurb_id' => $blurb_id]
);

$form = $this->form(
    [
        'id'     => 'update-blurb',
        'method' => 'post',
        'action' => $action
    ]
);

$form .= $this->input(
    [
        'type'    => 'textarea',
        'name'    => 'content',
        'value'   => $this->blurb->getContent(),
        'attribs' => [
            'data-wysiwyg' => true
        ]
    ]
);

$form .= $this->input(
        [
            'type' => 'submit',
            'name' => 'submit',
            'value' => 'Edit Blurb',
            'attribs' => [
                'class' => 'btn btn-primary'
            ]
        ]
    ). $this->tag('/form');

?>

<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <?php echo $headline; ?>
            <?php echo $form; ?>
        </div>
    </div>
</div>



