<?php /* Smarty version 2.6.25, created on 2013-03-18 17:29:59
         compiled from module_file_tpl:FrontEndUsers%3Baddgroup.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'module_file_tpl:FrontEndUsers;addgroup.tpl', 42, false),)), $this); ?>
<h3><?php echo $this->_tpl_vars['title']; ?>
</h3>

<?php if (isset ( $this->_tpl_vars['message'] )): ?>
  <?php if (isset ( $this->_tpl_vars['error'] )): ?>
    <p><font color="red"><?php echo $this->_tpl_vars['message']; ?>
</font></p>
  <?php else: ?>
    <p><?php echo $this->_tpl_vars['message']; ?>
</p>
  <?php endif; ?>
<?php endif; ?>

<?php echo $this->_tpl_vars['startform']; ?>

<?php if (isset ( $this->_tpl_vars['hidden'] )): ?>
<div><?php echo $this->_tpl_vars['hidden']; ?>
</div>
<?php endif; ?>

<div class="pageoverflow">
  <p class="pagetext"><?php echo $this->_tpl_vars['prompt_groupname']; ?>
</p>
  <p class="pageinput"><?php echo $this->_tpl_vars['input_groupname']; ?>
</p>
</div>
<div class="pageoverflow">
  <p class="pagetext"><?php echo $this->_tpl_vars['prompt_groupdesc']; ?>
</p>
  <p class="pageinput"><?php echo $this->_tpl_vars['input_groupdesc']; ?>
</p>
</div>

<?php if ($this->_tpl_vars['propcount'] > 0): ?>
<br/>
<div class="pageoverflow">
<table cellspacing="0" class="pagetable">
  <thead>
    <tr>
      <th><?php echo $this->_tpl_vars['nametext']; ?>
</th>
      <th><?php echo $this->_tpl_vars['prompttext']; ?>
</th>
      <th><?php echo $this->_tpl_vars['typetext']; ?>
</th>
      <th><?php echo $this->_tpl_vars['fieldstatustext']; ?>
</th>
      <th><?php echo $this->_tpl_vars['usedinlostuntext']; ?>
</th>
      <th class="pageicon"></th>
      <th class="pageicon"></th>
    </tr>
  </thead>
  <tbody>
  <?php $_from = $this->_tpl_vars['props']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['prope']):
?>
    <?php echo smarty_function_cycle(array('values' => "row1,row2",'assign' => 'rowclass'), $this);?>

    <tr class="<?php echo $this->_tpl_vars['rowclass']; ?>
" onmouseover="this.className='<?php echo $this->_tpl_vars['rowclass']; ?>
hover';" onmouseout="this.className='<?php echo $this->_tpl_vars['rowclass']; ?>
';">
      <td><?php echo $this->_tpl_vars['prope']->hidden; ?>
<?php echo $this->_tpl_vars['prope']->name; ?>
</td>
      <td><?php echo $this->_tpl_vars['prope']->prompt; ?>
</td>
      <td><?php echo $this->_tpl_vars['prope']->type; ?>
</td>
      <td><?php echo $this->_tpl_vars['prope']->required; ?>
</td>
      <td><?php echo $this->_tpl_vars['prope']->askinlostun; ?>
</td>
      <td><?php if (isset ( $this->_tpl_vars['prope']->moveup )): ?><?php echo $this->_tpl_vars['prope']->moveup; ?>
<?php endif; ?></td>
      <td><?php if (isset ( $this->_tpl_vars['prope']->movedown )): ?><?php echo $this->_tpl_vars['prope']->movedown; ?>
<?php endif; ?></td>
    </tr>
  <?php endforeach; endif; unset($_from); ?>
  </tbody>
</table>
</div>
<?php endif; ?>

<div class="pageoverflow">
  <p class="pagetext">&nbsp;</p>
  <p class="pageinput"><?php echo $this->_tpl_vars['hidden']; ?>
<?php echo $this->_tpl_vars['submit']; ?>
<?php echo $this->_tpl_vars['cancel']; ?>
</p>
</div>
<?php echo $this->_tpl_vars['endform']; ?>
