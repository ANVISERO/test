<?php /* Smarty version 2.6.25, created on 2014-01-16 18:03:51
         compiled from module_db_tpl:Forum%3Bindex */ ?>
<div id="forum">
<!-- index -->
<?php if ($this->_tpl_vars['breadcrumbs']): ?>
<div class="smalltext">
<?php $_from = $this->_tpl_vars['breadcrumbs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['breadcrumb'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['breadcrumb']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['entry']):
        $this->_foreach['breadcrumb']['iteration']++;
?><?php echo $this->_tpl_vars['entry']; ?>
 <?php if (! ($this->_foreach['breadcrumb']['iteration'] == $this->_foreach['breadcrumb']['total'])): ?>&raquo; <?php endif; ?><?php endforeach; endif; unset($_from); ?>
</div>
<?php endif; ?>

<?php if (isset ( $this->_tpl_vars['message'] )): ?><p class="message"><?php echo $this->_tpl_vars['message']; ?>
</p><?php endif; ?>
<br />

<?php if ($this->_tpl_vars['itemcount'] > 0): ?>
<div class="forum_border">
<?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
	<?php if ($this->_tpl_vars['entry']->type == 'section'): ?><br /><h3 class="catbg"><?php echo $this->_tpl_vars['entry']->forum_link; ?>
</h3>
	<?php else: ?>
	<table cellspacing="1" id="index_table">
		<tr>
			<td class="windowbg index_icon">
				<img src="<?php echo $this->_tpl_vars['entry']->forum_icon; ?>
" alt="<?php echo $this->_tpl_vars['fms']->Lang('forum'); ?>
" title="<?php echo $this->_tpl_vars['fms']->Lang('forum'); ?>
" />
			</td>
			<td class="windowbg2 index_info">
				<h4><?php echo $this->_tpl_vars['entry']->forum_link; ?>
</h4>
				<?php if (isset ( $this->_tpl_vars['entry']->description )): ?><p><?php echo $this->_tpl_vars['entry']->description; ?>
</p><?php endif; ?>
			</td>
			<td class="windowbg index_stats smalltext">
				<?php echo $this->_tpl_vars['entry']->posts_count; ?>
 <?php echo $this->_tpl_vars['fms']->Lang('num_posts_label'); ?>
<br /><?php echo $this->_tpl_vars['entry']->topics_count; ?>
 <?php echo $this->_tpl_vars['fms']->Lang('num_topics_label'); ?>

			</td>
			<td class="windowbg2 index_lastpost smalltext">
			<?php if (isset ( $this->_tpl_vars['entry']->lastposter )): ?>
				<strong><?php echo $this->_tpl_vars['fms']->Lang('topic_last_post_label'); ?>
</strong> <?php echo $this->_tpl_vars['fms']->Lang('by'); ?>
 <?php echo $this->_tpl_vars['entry']->lastposter; ?>
 <?php echo $this->_tpl_vars['fms']->Lang('in'); ?>
 <?php echo $this->_tpl_vars['entry']->topic_link; ?>
<br />
				<?php echo $this->_tpl_vars['entry']->lastposter_time; ?>
 <a href="<?php echo $this->_tpl_vars['entry']->post_url; ?>
#msg<?php echo $this->_tpl_vars['entry']->post_id; ?>
"><img src="<?php echo $this->_tpl_vars['ImageUrl']; ?>
last_post.gif" title="<?php echo $this->_tpl_vars['fms']->Lang('topic_last_post_label'); ?>
" alt="<?php echo $this->_tpl_vars['fms']->Lang('topic_last_post_label'); ?>
" /></a>
			<?php endif; ?>
			</td>
		</tr>
	</table>
	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</div>

<?php else: ?>
	<p><?php echo $this->_tpl_vars['fms']->Lang('forums_empty'); ?>
</p>
<?php endif; ?>

</div>