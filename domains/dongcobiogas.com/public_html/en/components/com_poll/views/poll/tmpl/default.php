<?php // no direct access
defined('_JEXEC') or die('Restricted access');
?>

<?php JHTML::_('stylesheet', 'poll_bars.css', 'components/com_poll/assets/'); ?>

<form action="index.php" method="post" name="poll" id="poll">

<div class="contentpane<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<label for="id">
		<?php echo JText::_('Select Poll'); ?>
		<?php echo $this->lists['polls']; ?>
	</label>
</div>
<div class="contentpane<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
<?php echo $this->loadTemplate('graph'); ?>
</div>
</form>
