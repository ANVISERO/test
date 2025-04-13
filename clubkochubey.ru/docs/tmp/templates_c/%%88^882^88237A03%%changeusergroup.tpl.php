<?php /* Smarty version 2.6.25, created on 2013-03-18 17:29:13
         compiled from changeusergroup.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'changeusergroup.tpl', 45, false),)), $this); ?>

<?php if (isset ( $this->_tpl_vars['message'] )): ?>
<p class="pagemessage"><?php echo $this->_tpl_vars['message']; ?>
</p>
<?php endif; ?>

<div class="pageoverflow">
<form method="post" action="<?php echo $this->_tpl_vars['filter_action']; ?>
">
<div class="hidden">
  <input type="hidden" name="<?php echo $this->_tpl_vars['cms_secure_param_name']; ?>
" value="<?php echo $this->_tpl_vars['cms_user_key']; ?>
" />
</div>
	<b><?php echo $this->_tpl_vars['selectgroup']; ?>
:</b>&nbsp;
        <select name="groupsel" id="groupsel">
	<?php $_from = $this->_tpl_vars['allgroups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['thisgroup']):
?>
           <?php if ($this->_tpl_vars['thisgroup']->id == $this->_tpl_vars['disp_group']): ?>
                <option value="<?php echo $this->_tpl_vars['thisgroup']->id; ?>
" selected="selected"><?php echo $this->_tpl_vars['thisgroup']->name; ?>
</option>
           <?php else: ?>
		<option value="<?php echo $this->_tpl_vars['thisgroup']->id; ?>
"><?php echo $this->_tpl_vars['thisgroup']->name; ?>
</option>
           <?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	</select>&nbsp;
        <input type="submit" name="filter" value="<?php echo $this->_tpl_vars['apply']; ?>
"/>
</form>
</div><br />

<?php echo $this->_tpl_vars['form_start']; ?>

<div class="hidden">
  <input type="hidden" name="<?php echo $this->_tpl_vars['cms_secure_param_name']; ?>
" value="<?php echo $this->_tpl_vars['cms_user_key']; ?>
" />
</div>
<table cellspacing="0" class="pagetable" id="permtable">
  <thead>
  <tr>
    <th><?php if (isset ( $this->_tpl_vars['title_group'] )): ?><?php echo $this->_tpl_vars['title_group']; ?>
<?php endif; ?></th>
	<?php $_from = $this->_tpl_vars['group_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['thisgroup']):
?>
		<?php if ($this->_tpl_vars['thisgroup']->id != -1): ?><th class="g<?php echo $this->_tpl_vars['thisgroup']->id; ?>
"><?php echo $this->_tpl_vars['thisgroup']->name; ?>
</th><?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
 </tr>
  </thead>
  <tbody>
  <?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user']):
?>
    <?php echo smarty_function_cycle(array('values' => 'row1,row2','assign' => 'currow'), $this);?>

    <tr class="<?php echo $this->_tpl_vars['currow']; ?>
" onmouseover="this.className='<?php echo $this->_tpl_vars['currow']; ?>
hover';" onmouseout="this.className='<?php echo $this->_tpl_vars['currow']; ?>
';">
 		<td><?php echo $this->_tpl_vars['user']->name; ?>
</td>
		<?php $_from = $this->_tpl_vars['group_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['thisgroup']):
?>
                    <?php if ($this->_tpl_vars['user']->id == $this->_tpl_vars['user_id']): ?>
    		      <?php if ($this->_tpl_vars['thisgroup']->id != -1): ?>
                        <td class="g<?php echo $this->_tpl_vars['thisgroup']->id; ?>
">--</td>
                      <?php endif; ?>
                    <?php else: ?>
			<?php if ($this->_tpl_vars['thisgroup']->id != -1): ?>
                          <?php if (( $this->_tpl_vars['thisgroup']->id == 1 && $this->_tpl_vars['user']->id == 1 )): ?>
  			    <td class="g<?php echo $this->_tpl_vars['thisgroup']->id; ?>
">&nbsp;</td>
                          <?php else: ?>
			    <?php $this->assign('gid', ($this->_tpl_vars['thisgroup']->id)); ?>
			    <td class="g<?php echo $this->_tpl_vars['thisgroup']->id; ?>
">
                              <input type="checkbox" name="ug_<?php echo $this->_tpl_vars['user']->id; ?>
_<?php echo $this->_tpl_vars['gid']; ?>
" value="1"<?php if (isset ( $this->_tpl_vars['user']->group[$this->_tpl_vars['gid']] )): ?> checked="checked"<?php endif; ?>  />
                            </td>
			  <?php endif; ?>
                        <?php endif; ?>
                     <?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
    </tr>
  <?php endforeach; endif; unset($_from); ?>
  </tbody>
</table>

<div class="pageoverflow">
  <p class="pageoptions">
    <?php echo $this->_tpl_vars['hidden']; ?>

    <?php echo $this->_tpl_vars['submit']; ?>
 <?php echo $this->_tpl_vars['cancel']; ?>
 
  </p>
</div>
</form>