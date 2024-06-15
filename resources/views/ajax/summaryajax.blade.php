<script>
$(document).ready(function(){

//========Summary Data Insert Start====================================================>
$("#summerfrom").submit(function(e){
             e.preventDefault();
             

            $.ajax({
                url: '{{ route("summar.post")}}',
                type: 'post',
                data: $("#summerfrom").serializeArray(),
                dataType: 'json',
                success: function(response){          
                   if (response.status == false) {
                       var errors = response.errors;
                            if (errors.summary_title) {
                                $("#summary_title").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.summary_title)
                                }else(
                                $("#summary_title").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                            
                            if (errors.summary_description) {
                                $("#summary_description").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.summary_description)
                                }else(
                                $("#summary_description").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )

                            if (errors.summary_icon) {
                                $("#summary_icon").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.summary_icon)
                                }else(
                                $("#summary_icon").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                    }else{

                            $("#summary_title").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#summary_description").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#summary_icon").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                            window.location.href = '{{ route("aboutsummary") }}'
                        
                    }
                }
             });




         });
//========Summary Data Insert End====================================================>   

//========Summary Data Edit Start====================================================>
$(document).on('click','.summery_edit_btn',function(){
                  let id = $(this).data('id');
                  let summary_title = $(this).data('summary_title');
                  let summary_description = $(this).data('summary_description');
                  let summary_icon = $(this).data('summary_icon');

                  $('#id').val(id);
                  $('#up_summary_title').val(summary_title);
                  $('#up_summary_description').val(summary_description);
                  $('#up_summary_icon').val(summary_icon);
            });
//========Summary Data Edit End====================================================>  

//========Summary Data Update Start====================================================>   
$("#summerupdatefrom").submit(function(e){
             e.preventDefault();
             

            $.ajax({
                url: '{{ route("summar.update")}}',
                type: 'post',
                data: $("#summerupdatefrom").serializeArray(),
                dataType: 'json',
                success: function(response){          
                   if (response.status == false) {
                       var errors = response.errors;
                            if (errors.summary_title) {
                                $("#up_summary_title").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.summary_title)
                                }else(
                                $("#up_summary_title").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                            
                            if (errors.summary_description) {
                                $("#up_summary_description").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.summary_description)
                                }else(
                                $("#up_summary_description").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )

                            if (errors.summary_icon) {
                                $("#up_summary_icon").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.summary_icon)
                                }else(
                                $("#up_summary_icon").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                    }else{

                            $("#up_summary_title").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#up_summary_description").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#up_summary_icon").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                            window.location.href = '{{ route("aboutsummary") }}'
                        
                    }
                }
             });




         });
//========Summary Data Update End====================================================>   

//========Summary Delete Start====================================================>   
$(document).on('click','.summery_delete_btn',function(e){
                  e.preventDefault();
                  let summary_id = $(this).data('id');

                if(confirm('You are sure to Delete Your Product ?')){
                    $.ajax({
                  url:"{{route('summery.delete')}}",
                  method:'get',
                  data:{summary_id:summary_id},
                  success:function(res){
                        if (res.status=='success') { 
                            $('.table').load(location.href+' .table');
                        }
                  }

                });
                }
                
              });    
//========Summary Delete End====================================================>   

//========Summary Data Update Start====================================================>   
//========Summary Data Update End====================================================>   



})

</script>