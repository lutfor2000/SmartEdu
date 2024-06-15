<script>
$(document).ready(function(){
   
//=================About Insert Data Start=========================================================>    
$("#aboutfrom").submit(function(e){
              e.preventDefault();
              var formdata = new FormData(this);
              $('#error').text('');
              $.ajax({
                method:'POST',
                url:"{{ route('about.post') }}",
                data:formdata,
                contentType:false,
                processData:false,
                success:(response)=>{
                  if(response){
                    this.reset();
                    $('#addModal').modal('hide');
                    $('.table').load(location.href+' .table');
                     $(window).reload();
                  }
                },
                error:function(response){
                   $('#error').text(response.responseJSON.message);
                }

              });

         })
//=================About Insert Data End=========================================================>  

//=================About Item Edit Start=========================================================>    
$(document).on('click','.about_edit_btn',function(){
                  let id = $(this).data('id');
                  let about_title = $(this).data('about_title');
                  let about_description = $(this).data('about_description');
                  let about_photo = $(this).data('about_photo');
                  let about_title_two = $(this).data('about_title_two');
                  let about_description_two = $(this).data('about_description_two');
                  let about_photo_two = $(this).data('about_photo_two');
                 

                  $('#id').val(id);
                  $('#about_title').val(about_title);
                  $('#about_description').val(about_description);
                  $('#about_photo').val(about_photo);
                  $('#about_title_two').val(about_title_two);
                  $('#about_description_two').val(about_description_two);
                  $('#about_photo_two').val(about_photo_two);
                 
            });

//=================About Item End=========================================================> 

//=================About Item Update Start=========================================================>
$("#aboutfromupdate").submit(function(e){
              e.preventDefault();
              var formdata = new FormData(this);
              $('#about_error').text('');
              $.ajax({
                method:'POST',
                url:"{{ route('about.update') }}",
                data:formdata,
                contentType:false,
                processData:false,
                success:(response)=>{
                  if(response){
                    this.reset();
                    $('#aboutediteModal').modal('hide');
                    $('.table').load(location.href+' .table');
                    alert('Full Update Successfull');
                  }
                },
                error:function(response){
                   $('#about_error').text(response.responseJSON.message);
                }

              });

         })    
//=================About Item Update End=========================================================> 

//=================Banner Item Delete Start=========================================================>
$(document).on('click','.about_delete_btn',function(e){
                  e.preventDefault();
                  let about_id = $(this).data('id');

                if(confirm('You are sure to Delete Your Product ?')){
                    $.ajax({
                  url:"{{route('about.delete')}}",
                  method:'get',
                  data:{about_id:about_id},
                  success:function(res){
                        if (res.status=='success') { 
                            $('.table').load(location.href+' .table');
                        }
                  }

                });
                }
                
              });      
//=================Banner Item Delete End=========================================================> 

});
</script>