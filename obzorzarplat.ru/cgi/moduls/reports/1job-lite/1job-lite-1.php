<script type="text/javascript" src="/_js/jquery/1job-lite.js"></script>
<p><span class="title_mini">1. ����� ��������� &raquo;</span><span class="title_mini_others"> 2. ����� &raquo;</span></p>

<form method='post' action="?step=2" name="step1">
<table width="100%" class="report_form">
  <!--����������� ������-->
  <tr>
    <th width="30%">����������� ������</th>
    <td width="60%">
      <select name="jtype" class="text_1" id="jtype_select">
        <option value="">--- ������� ---</option>
  <?php
$result=mysqli_query($link,"select id,name from base_jtype order by name");
while($row=mysqli_fetch_array($result)){
    echo('<option value="'.$row["id"].'">'.$row["name"].'</option>');
}
?>
</select>
</td>
  </tr>


<!--���������-->
  <tr>
    <th>�������� ���������</th>
    <td>
    <div id='jobdiv'>
      <select name='job' class="text_1">
        <option value="">--- ������� ---</option>
      </select>
</div>
    </td>
</tr>

<!--�����-->
  <tr>
    <th>�������� �����</th>
    <td>
    <div id='citydiv'>
      <select name='city' class="text_1">
        <option value="">--- ������� ---</option>
      </select>
</div>
    </td>
</tr>

</table>

<p align="right"><input type="button" value="������ &raquo;" class="submit" onClick="return testform();"></p>
</form>

<!--�������� ���������-->
<div id="job_description_div"><p>�������� ���������</p></div>