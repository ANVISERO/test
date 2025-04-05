$(document).ready(function(){
    $('#jtypes').dataTable().makeEditable({
        sUpdateURL:"/_admin/pages/jtype-update.php",
        sAddURL:"/_admin/pages/jtype-add.php",
        sDeleteURL:"/_admin/pages/jtype-delete.php"
    });
    
})