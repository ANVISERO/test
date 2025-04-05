function inputTextValuesShow(target){
    $(target).each(function(){
               var titleInput=$(this).attr('title');
               var inputNew="";

               $(this).val(titleInput).css('font-style','italic').css('color','gray');

               $(this).focus(function(){
                   if($(this).val()==titleInput){
                       $(this).val("");
                   }else{
                       $(this).val(inputNew);
                   }

                   $(this).css('font-style','normal').css('font-weight','bold').css('color','#000');

               });

               $(this).blur(function(){
                   if(inputNew==""){
                       $(this).val(titleInput);
                   }else{
                       $(this).val(inputNew);
                   }
               });

               $(this).change(function(){
                   inputNew=$(this).val();
               });
           })
}

function addCheckbox(name,id,nameChkb,container) {
   var inputs = container.find('input');
   var nameChkbPrefix=RegExp(/^\w+/).exec(nameChkb);
   //var id = inputs.length+1;

   var html = '<input type="checkbox" id="'+nameChkbPrefix+'_'+id+'" value="'+id+'" name="'+nameChkb+'" /> <label for="'+nameChkbPrefix+'_'+id+'">'+name+'</label>';
   container.append($(html));
}

$(document).ready(function(){

    $('.zebra-table tr:odd').addClass('odd');
    
        /*ADD NEW REGION*/
        /*show region block*/
        $('#addRegion').click(function(){
           $('#newRegion').slideToggle(400);
           inputTextValuesShow($('#newRegion p input[type="text"]'));

           return false;
        });

        /*submit region form*/
        $('#newRegionSubmit').click(function(){
            /*if there aren't any changes reset form*/
            if($('#newRegion p input[name="regionName"]').val()==$('#newRegion p input[name="regionName"]').attr('title')){
                $('#newRegion :input[type=text]').val("");
            }else{
            $.ajax({
                type:'post',
                url:'/_admin/pages/region-add.php',
                data:{'regionName':$('[name=regionName]').val(),
                'regionNamePartitive':$('[name=regionNamePartitive]').val(),
                'regionNameEng':$('[name=regionNamePartitive]').val()},
                success:function(data){
                   $('[name=regions]').prepend(data);
                },
                error:function(){
                    alert('error on region')
                }
            })
            }

            $('#newRegion').slideToggle(400);
        });

        /*ADD NEW SPHERE*/
        $('#addSphere').live('click',function(){
           $('#newSphere').slideToggle(400);
           inputTextValuesShow($('#newSphere p input[type="text"]'));

           return false;
        });

        /*submit sphere form*/
        $('#newSphereSubmit').live('click',function(){
            /*if there aren't any changes reset form*/
            if($('#newSphere p input[name="sphereName"]').val()==$('#newSphere p input[name="sphereName"]').attr('title')){
                $('#newSphere :input[type=text]').val("");
            }else{
            $.ajax({
                type:'post',
                dataType:'json',
                url:'/_admin/pages/sphere-add.php',
                data:{'sphereName':$('[name=sphereName]').val()},
                success:function(data){
                   addCheckbox(data.sphereName,data.sphereId,'spheres[]',$('#spheresChkb'));
                   //$('input[name=spheres]').parent().append(newSphereChkb);

                },
                error:function(){
                    alert('error on sphere')
                }
            })
            }

            $('#newSphere').slideToggle(400);
        });

        $(".mainBody div.body").hide();
        $(".mainBody a.h3-click").live('click',function(){
            $(this).parent().next("div.body").slideToggle(400);
        });
        $(".mainBody a.div_body_close").live('click',function(){
            $(this).parent("p").parent("div.body").slideToggle(400);
            return false;
        });

        $('#add_company').ajaxForm({
            type: 'post',
            url: '/_admin/pages/companies-save/',
            success:function(data){
              alert(data);
                alert("Данные добавлены")},
            error:function(){alert("Произошла ошибка при сохранении данных =(")}
        });

        $('#companySphere').click(function(){
            $.ajax({
                type:'post',
                data:({company_id:$('form#add_company input[name=id]').val()}),
                datatype:'html',
                url:'/_admin/pages/company-spheres-show.php',
                success:function(data){
                    $('#companySphereDiv').html(data)
                }
            })
            return false;
        })

        $('#peopleSalary').click(function(){
            $.ajax({
                type:'post',
                data:({company_id:$('form#add_company input[name=id]').val()}),
                datatype:'html',
                url:'/_admin/pages/companies-people-salary/',
                success:function(data){
                    $('#peopleSalaryDiv').html(data)
                }
            })
            return false;
        })

        $('#peopleSalaryArchive').click(function(){
            $.ajax({
                type:'post',
                data:({company_id:$('form#add_company input[name=id]').val()}),
                datatype:'html',
                url:'/_admin/pages/companies-archive-people-salary/',
                success:function(data){
                    $('#peopleSalaryArchiveDiv').html(data)
                }
            })
            return false;
        })

        $('#editedRowDiv').dialog({
		autoOpen: false,
                modal:true,
		width: 650,
		buttons: {
			"Ok": function() {
				$(this).dialog("close");
			}
		}
	});
	
	   /*
        $('#company-premium').ajaxForm({
            type: 'post',
            url: '/_admin/pages/companies-premium/',
			success:function(){
               //$('#peoplePremiumDiv').html(data)
			    alert("Данные добавлены")
			},
            error:function(){alert("Произошла ошибка при сохранении данных =(")}
        });
	*/
	
    });