<?php

$layout = $page['layout'] ?? 'layout::default';
$title  = $page['title'] ?? '';

$this->layout(
    $layout,
    [
       'title' => $title
    ]
);

?>

<div class="page-header">
    <h1><?php echo $this->e($title); ?></h1>
</div>

<?php foreach ($blurbs as $blurb) : ?>
    <?php $this->insert('blurb::blurb', ['blurb' => $blurb]); ?>
<?php endforeach; ?>
