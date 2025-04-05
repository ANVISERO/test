<?
$file_url=$_GET["file_url"];
$back_url=$_SERVER['HTTP_REFERER'];
unlink($file_url);
?>

<script>
self.location.href='<? echo($back_url);?>';
</script>