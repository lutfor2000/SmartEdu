<script>

$(document).ready(function(){

//===================================Course Data Insert Start=======================================>
$("#courseform").submit(function(e){
             e.preventDefault();
             var formData = new FormData(this);

            $.ajax({
                url: '{{ route("course.post")}}',
                type: 'post',
                data :formData,
                dataType: 'json',
                contentType:false,
                processData:false,
                success: function(response){          
                   if (response.status == false) {
                       var errors = response.errors;
                            if (errors.course_name) {
                                $("#course_name").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.course_name)
                                }else(
                                $("#course_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                            
                            if (errors.course_short_desc) {
                                $("#course_short_desc").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.course_short_desc)
                                }else(
                                $("#course_short_desc").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )

                            if (errors.course_long_desc) {
                                $("#course_long_desc").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.course_long_desc)
                                }else(
                                $("#course_long_desc").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )

                            if (errors.course_photo) {
                                $("#course_photo").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.course_photo)
                                }else(
                                $("#course_photo").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                    }else{

                            $("#course_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#course_short_desc").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#course_long_desc").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#course_photo").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                            window.location.href = '{{ route("course") }}'
                        
                    }
                }
             });

         });
//===================================Course Data Insert End=======================================>

//========Course Data Edit Start====================================================>
$(document).on('click','.course_edit_btn',function(){
                  let id = $(this).data('id');
                  let course_name = $(this).data('course_name');
                  let course_short_desc = $(this).data('course_short_desc');
                  let course_long_desc = $(this).data('course_long_desc');
                  let course_photo = $(this).data('course_photo');

                  $('#id').val(id);
                  $('#up_course_name').val(course_name);
                  $('#up_course_short_desc').val(course_short_desc);
                  $('#up_course_long_desc').val(course_long_desc);
                  $('#up_course_photo').val(course_photo);
            });
//========Course Data Edit End====================================================> 

//===================================Course Data Update Start=======================================>
$("#courseupdateform").submit(function(e){
             e.preventDefault();
             var formData = new FormData(this);

            $.ajax({
                url: '{{ route("course.update")}}',
                type: 'post',
                data :formData,
                dataType: 'json',
                contentType:false,
                processData:false,
                success: function(response){          
                   if (response.status == false) {
                       var errors = response.errors;
                            if (errors.course_name) {
                                $("#up_course_name").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.course_name)
                                }else(
                                $("#up_course_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                            
                            if (errors.course_short_desc) {
                                $("#up_course_short_desc").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.course_short_desc)
                                }else(
                                $("#up_course_short_desc").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )

                            if (errors.course_long_desc) {
                                $("#up_course_long_desc").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.course_long_desc)
                                }else(
                                $("#up_course_long_desc").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )

                            if (errors.course_new_photo) {
                                $("#course_new_photo").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.course_new_photo)
                                }else(
                                $("#course_new_photo").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                    }else{

                            $("#up_course_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#up_course_short_desc").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#up_course_long_desc").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#course_new_photo").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                            window.location.href = '{{ route("course") }}'
                        
                    }
                }
             });

         });
//===================================Course Data Update End=======================================>

//===================================Course Data Delete Start=======================================>
$(document).on('click','.course_delete_btn',function(e){
                  e.preventDefault();
                  let course_id = $(this).data('id');

                if(confirm('You are sure to Delete Your Course ?')){
                    $.ajax({
                  url:"{{route('course.delete')}}",
                  method:'get',
                  data:{course_id:course_id},
                  success:function(res){
                        if (res.status=='success') { 
                            $('.table').load(location.href+' .table');
                        }
                  }

                });
                }
                
              });    
//===================================Course Data Delete End=======================================>





});


</script>