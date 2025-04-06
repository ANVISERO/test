<ul>
    <li>
 <ol>
<?php
$user_id=mysqli_result(mysqli_query($link,"SELECT user_id from for_users_corporat_login where session_id = '".$_SESSION['user_number']. "' "),0,0);

$reports_q=mysqli_query($link,"SELECT title,url FROM for_report_type WHERE id IN(
    SELECT report_id from for_tarif_reports where tarif_id=(
        SELECT tarif_id from for_users_corporat WHERE id='$user_id'))
    OR id IN(SELECT report_type_id from for_users_corporat_report_type where user_id='$user_id')
        order by title");
while ($reports = mysqli_fetch_object($reports_q)) {
    echo "<li><a href='/work/".$reports->url."'>".$reports->title."&raquo;</a></li>";
}
?>
    </ol>
</li>

<li><a href="/archive/">Архив</a></li>
<li><a href="/">Профайл</a></li>
<li><a href="/support/">Служба поддержки</a></li>
</ul>