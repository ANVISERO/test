$(document).ready(function() {
    $('#companies').dataTable( {
		"oLanguage": {
            "sUrl": "/_js/ru_RU.txt"
        },
		//"bFilter": false,
        //"bSort": false,
		"sDom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
		"iDisplayLength": 25,
        "bProcessing": true,
        "bServerSide": true,
		"aaSorting": [[ 0, "desc" ]],
        "sAjaxSource": "/_admin/pages/companies-per-page-show.php"
    } );
} );