$(document).ready(function()
{
    $("#business_info li.list ul").hide();
    //toggle message body
    
     $("#business_info li.list").click(function()
    {
        $(this).children("ul").slideToggle(500)
        return false;
    });
    
});