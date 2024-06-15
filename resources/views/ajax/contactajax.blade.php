<script>
$(document).ready(function(){
    
//===================================Contact Data Insert Start=======================================>
$("#contactform").submit(function(e){
             e.preventDefault();
             var formData = new FormData(this);

            $.ajax({
                url: '{{ route("contactsfontend.post")}}',
                type: 'post',
                data :formData,
                dataType: 'json',
                contentType:false,
                processData:false,
                success: function(response){          
                   if (response.status == false) {
                       var errors = response.errors;
                            if (errors.contact_first_name) {
                                $("#contact_first_name").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.contact_first_name)
                                }else(
                                $("#contact_first_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                            if (errors.contact_last_name) {
                                $("#contact_last_name").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.contact_last_name)
                                }else(
                                $("#contact_last_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                            if (errors.contact_email) {
                                $("#contact_email").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.contact_email)
                                }else(
                                $("#contact_email").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                            if (errors.contact_phone) {
                                $("#contact_phone").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.contact_phone)
                                }else(
                                $("#contact_phone").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                            if (errors.contact_comments) {
                                $("#contact_comments").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.contact_comments)
                                }else(
                                $("#contact_comments").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                            
                    }else{

                            $("#contact_first_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#contact_last_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#contact_email").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#contact_phone").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#contact_comments").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                            window.location.href = '{{ route("contacs") }}'
                        
                    }
                }
             });

         });
//===================================Contact Data Insert End=======================================>

//===================================Contact Data Delete Start=======================================>
$(document).on('click','.contact_delete_btn',function(e){
                  e.preventDefault();
                  let contact_id = $(this).data('id');

                if(confirm('You are sure to Delete Your Responser ?')){
                    $.ajax({
                  url:"{{route('contact.delete')}}",
                  method:'get',
                  data:{contact_id:contact_id},
                  success:function(res){
                        if (res.status=='success') { 
                            $('.table').load(location.href+' .table');
                        }
                  }

                });
                }
                
              });    
//===================================Contact Data Delete End=======================================>

    
});
</script>