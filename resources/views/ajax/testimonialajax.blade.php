<script>
$(document).ready(function(){

//===================================Testimonial Data Insert Start=======================================>
$("#testimonialform").submit(function(e){
             e.preventDefault();
             var formData = new FormData(this);

            $.ajax({
                url: '{{ route("testimonial.post")}}',
                type: 'post',
                data :formData,
                dataType: 'json',
                contentType:false,
                processData:false,
                success: function(response){          
                   if (response.status == false) {
                       var errors = response.errors;
                            if (errors.testimonial_name) {
                                $("#testimonial_name").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.testimonial_name)
                                }else(
                                $("#testimonial_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                            
                            if (errors.testimonial_title) {
                                $("#testimonial_title").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.testimonial_title)
                                }else(
                                $("#testimonial_title").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )

                            if (errors.testimonial_desc) {
                                $("#testimonial_desc").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.testimonial_desc)
                                }else(
                                $("#testimonial_desc").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )

                            if (errors.testimonial_photo) {
                                $("#testimonial_photo").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.testimonial_photo)
                                }else(
                                $("#testimonial_photo").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                    }else{

                            $("#testimonial_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#testimonial_title").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#testimonial_desc").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#testimonial_photo").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                            window.location.href = '{{ route("testimonial") }}'
                        
                    }
                }
             });




         });
//===================================Testimonial Data Insert End=======================================>

//========Testimonial Data Edit Start====================================================>
$(document).on('click','.testimonial_edit_btn',function(){
                  let id = $(this).data('id');
                  let testimonial_name = $(this).data('testimonial_name');
                  let testimonial_title = $(this).data('testimonial_title');
                  let testimonial_desc = $(this).data('testimonial_desc');
                  let testimonial_photo = $(this).data('testimonial_photo');

                  $('#id').val(id);
                  $('#up_testimonial_name').val(testimonial_name);
                  $('#up_testimonial_title').val(testimonial_title);
                  $('#up_testimonial_desc').val(testimonial_desc);
                  $('#up_testimonial_photo').val(testimonial_photo);
            });
//========Testimonial Data Edit End====================================================> 


//===================================Testimonial Data Update Start=======================================>
$("#testimonialupdateform").submit(function(e){
             e.preventDefault();
             var formData = new FormData(this);

            $.ajax({
                url: '{{ route("testimonial.update")}}',
                type: 'post',
                data :formData,
                dataType: 'json',
                contentType:false,
                processData:false,
                success: function(response){          
                   if (response.status == false) {
                       var errors = response.errors;
                            if (errors.testimonial_name) {
                                $("#up_testimonial_name").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.testimonial_name)
                                }else(
                                $("#up_testimonial_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                            
                            if (errors.testimonial_title) {
                                $("#up_testimonial_title").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.testimonial_title)
                                }else(
                                $("#up_testimonial_title").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )

                            if (errors.testimonial_desc) {
                                $("#up_testimonial_desc").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.testimonial_desc)
                                }else(
                                $("#up_testimonial_desc").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )

                            if (errors.testimonial_new_photo) {
                                $("#testimonial_new_photo").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.testimonial_new_photo)
                                }else(
                                $("#testimonial_new_photo").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                    }else{

                            $("#up_testimonial_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#up_testimonial_title").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#up_testimonial_desc").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#testimonial_new_photo").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                            window.location.href = '{{ route("testimonial") }}'
                        
                    }
                }
             });
         });
//===================================Testimonial Data Update End=======================================>

//===================================History Data Delete Start=======================================>
$(document).on('click','.testimonial_delete_btn',function(e){
                  e.preventDefault();
                  let testimonial_id = $(this).data('id');

                if(confirm('You are sure to Delete Your Product ?')){
                    $.ajax({
                  url:"{{route('testimonial.delete')}}",
                  method:'get',
                  data:{testimonial_id:testimonial_id},
                  success:function(res){
                        if (res.status=='success') { 
                            $('.table').load(location.href+' .table');
                        }
                  }

                });
                }
                
              });    
//===================================History Data Delete End=======================================>

});
</script>