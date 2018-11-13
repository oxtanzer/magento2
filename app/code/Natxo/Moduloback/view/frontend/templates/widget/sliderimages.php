<?php
$_title = $this->getData('title');
$_message = $this->getData('message');
?>
<?php if ($_title): ?>
    <h1><?php echo $_title; ?></h1>
<?php endif; ?>
<p><?php echo $_message; ?></p>