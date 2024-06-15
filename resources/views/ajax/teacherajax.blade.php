<script>
$(document).ready(function(){
  
//===================================Teacher Data Insert Start=======================================>
$("#teacherform").submit(function(e){
             e.preventDefault();
             var formData = new FormData(this);

            $.ajax({
                url: '{{ route("teacher.post")}}',
                type: 'post',
                data :formData,
                dataType: 'json',
                contentType:false,
                processData:false,
                success: function(response){          
                   if (response.status == false) {
                       var errors = response.errors;
                            if (errors.teacher_name) {
                                $("#teacher_name").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.teacher_name)
                                }else(
                                $("#teacher_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                            if (errors.teacher_title) {
                                $("#teacher_title").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.teacher_title)
                                }else(
                                $("#teacher_title").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                            if (errors.teacher_photo) {
                                $("#teacher_photo").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.teacher_photo)
                                }else(
                                $("#teacher_photo").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                            
                    }else{

                            $("#teacher_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#teacher_title").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#teacher_photo").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                            window.location.href = '{{ route("teacher") }}'
                        
                    }
                }
             });

         });
//===================================Teacher Data Insert End=======================================>

//===================================Teacher Data Edit Start=======================================>
$(document).on('click','.teacher_edit_btn',function(){
    let id = $(this).data('id');
    let teacher_name = $(this).data('teacher_name');
    let teacher_title = $(this).data('teacher_title');
    let teacher_photo = $(this).data('teacher_photo');

    $('#id').val(id);
    $('#up_teacher_name').val(teacher_name);
    $('#up_teacher_title').val(teacher_title);
    $('#up_teacher_photo').val(teacher_photo);

})
//===================================Teacher Data Edit End=======================================>

//===================================Teacher Update Data Insert Start=======================================>
$("#teacherupdateform").submit(function(e){
             e.preventDefault();
             var formData = new FormData(this);

            $.ajax({
                url: '{{ route("teacher.update")}}',
                type: 'post',
                data :formData,
                dataType: 'json',
                contentType:false,
                processData:false,
                success: function(response){          
                   if (response.status == false) {
                       var errors = response.errors;
                            if (errors.teacher_name) {
                                $("#up_teacher_name").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.teacher_name)
                                }else(
                                $("#up_teacher_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                            if (errors.teacher_title) {
                                $("#up_teacher_title").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.teacher_title)
                                }else(
                                $("#up_teacher_title").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                            if (errors.teacher_new_photo) {
                                $("#teacher_new_photo").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.teacher_new_photo)
                                }else(
                                $("#teacher_new_photo").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                            
                    }else{

                            $("#up_teacher_name").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#up_teacher_title").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#teacher_new_photo").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                            window.location.href = '{{ route("teacher") }}'
                        
                    }
                }
             });

         });
//===================================Teacher Update Data Insert End=======================================>

//===================================Teacher Data Delete Start=======================================>
$(document).on('click','.teacher_delete_btn',function(e){
                  e.preventDefault();
                  let teacher_id = $(this).data('id');

                if (confirm('You are sure to Delete Teacher ?')){
                    $.ajax({
                  url:"{{route('teacher.delete')}}",
                  method:'get',
                  data:{teacher_id:teacher_id},
                  success:function(res){
                        if (res.status=='success') { 
                            $('.table').load(location.href+' .table');
                        }
                  }

                });
                }
                
              });    
//===================================Teacher Data Delete End=======================================>

//==================Paginator pagr Ajax Teacher Start============================================================>              
$(document).on('click','.pagination a',function(e){
                  e.preventDefault();
                  var page = $(this).attr('href').split('page=')[1]
                  category(page);
        });

        function category(page){
                $.ajax({
                      url:"{{route('teacher.pagination')}}?page="+page,
                      success:function(r){
                        $('#table-data').html(r);
                      }
                });
        }
//==================Paginator pagr Ajax Teacher End============================================================> 

//====================Category Item Search Start=========================>
$(document).on('keyup',function(e){
        e.preventDefault();
        let search_string = $('#all_search').val();
        $.ajax({
            url:"{{ route('teacher.search') }}",
            method:'GET',
            data:{search_string:search_string},
            success:function(res){
                $('#table-data').html(res);
                if (res.status == "nothing_found"){
                    $('#table-data').html('<span class ="text-danger text-center">'+'Nothing found'+'</span>');
                }
            }

        });
});  
//====================Category Item Search End=========================>

});

</script>