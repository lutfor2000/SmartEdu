<script>
$(document).ready(function(){

//===================================History Data Insert Start=======================================>
$("#historyform").submit(function(e){
             e.preventDefault();
             var formData = new FormData(this);

            $.ajax({
                url: '{{ route("post.history")}}',
                type: 'post',
                data :formData,
                dataType: 'json',
                contentType:false,
                processData:false,
                success: function(response){          
                   if (response.status == false) {
                       var errors = response.errors;
                            if (errors.history_year) {
                                $("#history_year").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.history_year)
                                }else(
                                $("#history_year").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                            
                            if (errors.history_description) {
                                $("#history_description").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.history_description)
                                }else(
                                $("#history_description").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )

                            if (errors.history_photo) {
                                $("#history_photo").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.history_photo)
                                }else(
                                $("#history_photo").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                    }else{

                            $("#history_year").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#history_description").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#history_photo").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                            window.location.href = '{{ route("history") }}'
                        
                    }
                }
             });




         });
//===================================History Data Insert End=======================================>

//===================================History Data Edit Start=======================================>
$(document).on('click','.history_edit_btn',function(){
                  let id = $(this).data('id');
                  let history_year = $(this).data('history_year');
                  let history_description = $(this).data('history_description');
                  let history_photo = $(this).data('history_photo');

                  $('#id').val(id);
                  $('#up_history_year').val(history_year);
                  $('#up_history_description').val(history_description);
                  $('#up_history_photo').val(history_photo);
        
            });
//===================================History Data Edit End=======================================>

//===================================History Data Update Start=======================================>
$("#uphistoryform").submit(function(e){
             e.preventDefault();
             var formData = new FormData(this);

            $.ajax({
                url: '{{ route("history.update")}}',
                type: 'post',
                data :formData,
                dataType: 'json',
                contentType:false,
                processData:false,
                success: function(response){          
                   if (response.status == false) {
                       var errors = response.errors;
                            if (errors.history_year) {
                                $("#up_history_year").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.history_year)
                                }else(
                                $("#up_history_year").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                            
                            if (errors.history_description) {
                                $("#up_history_description").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.history_description)
                                }else(
                                $("#up_history_description").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )

                            if (errors.new_history_photo) {
                                $("#new_history_photo").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.new_history_photo)
                                }else(
                                $("#new_history_photo").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                    }else{

                            $("#up_history_year").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#up_history_description").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#new_history_photo").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                            window.location.href = '{{ route("history") }}'
                        
                    }
                }
             });

         });
//===================================History Data Update End=======================================>

//===================================History Data Delete Start=======================================>
$(document).on('click','.history_delete_btn',function(e){
                  e.preventDefault();
                  let history_id = $(this).data('id');

                if(confirm('You are sure to Delete Your Product ?')){
                    $.ajax({
                  url:"{{route('history.delete')}}",
                  method:'get',
                  data:{history_id:history_id},
                  success:function(res){
                        if (res.status=='success') { 
                            $('.table').load(location.href+' .table');
                        }
                  }

                });
                }
                
              });    
//===================================History Data Delete End=======================================>

//===================================History Data Insert Start=======================================>
//===================================History Data Insert End=======================================>






});
</script>