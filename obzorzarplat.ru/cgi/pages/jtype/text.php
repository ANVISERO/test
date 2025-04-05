<style type="text/css" title="currentStyle">
			@import "http://www.datatables.net/release-datatables/media/css/demo_table.css";
</style>

<script type="text/javascript" src="http://jquery-datatables-editable.googlecode.com/svn/trunk/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://jquery-datatables-editable.googlecode.com/svn/trunk/media/js/jquery.jeditable.js"></script>
<script type="text/javascript" src="http://jquery-datatables-editable.googlecode.com/svn/trunk/media/js/jquery.validate.js"></script>
<script type="text/javascript" src="http://jquery-datatables-editable.googlecode.com/svn/trunk/media/js/jquery.dataTables.editable.js"></script>
<script type="text/javascript" src="/_js/jquery/jtypes.js"></script>

<table id="jtypes">
    <thead>
<tr>
<th>Наименование</th>
</tr>
    </thead>
    <tbody>

<?php
$query="select id,name from base_jtype order by name";
$result=mysqli_query($link,$query);
$chet=0;
while($row=mysqli_fetch_array($result)){
?>
<tr id="<?=$row["id"]?>">
<td><?=$row["name"];?></td>
</tr>
<?php } ?>
    </tbody>
</table>
<div class="add_delete_toolbar" />
    <form id="formAddNewRow" action="#" title="Новая должностная группа">
        <p><input type="text" name="jtype_name" rel="0" class="required"></p>
    </form>