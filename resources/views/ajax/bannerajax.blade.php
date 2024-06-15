<script>
$(document).ready(function () {
    
//=================Banner Insert Data Start=========================================================>    
$("#bannerfrom").submit(function(e){
              e.preventDefault();
              var formdata = new FormData(this);
              $('#error').text('');
              $.ajax({
                method:'POST',
                url:"{{ route('banner.post') }}",
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
//=================Banner Insert Data End=========================================================> 

//=================Banner Item Edit Start=========================================================>    
$(document).on('click','.banner_edit_btn',function(){
                  let id = $(this).data('id');
                  let title_one = $(this).data('title_one');
                  let title_two = $(this).data('title_two');
                  let sub_title = $(this).data('sub_title');
                  let banner_photo = $(this).data('banner_photo');

                  $('#id').val(id);
                  $('#title_one').val(title_one);
                  $('#title_two').val(title_two);
                  $('#sub_title').val(sub_title);
                  $('#banner_photo').val(banner_photo);
            });

//=================Banner Item End=========================================================> 

//=================Banner Item Update Start=========================================================>
$("#bannerfromupdate").submit(function(e){
              e.preventDefault();
              var formdata = new FormData(this);
              $('#banner_error').text('');
              $.ajax({
                method:'POST',
                url:"{{ route('banner.update') }}",
                data:formdata,
                contentType:false,
                processData:false,
                success:(response)=>{
                  if(response){
                    this.reset();
                    $('#bannerUpdateModal').modal('hide');
                    $('.table').load(location.href+' .table');
                    alert('Full upload Successfull');
                  }
                },
                error:function(response){
                   $('#banner_error').text(response.responseJSON.message);
                }

              });

         })    
//=================Banner Item Update End=========================================================> 

//=================Banner Item Delete Start=========================================================>
$(document).on('click','.banner_delete_btn',function(e){
                  e.preventDefault();
                  let banner_id = $(this).data('id');

                if(confirm('You are sure to Delete Your Product ?')){
                    $.ajax({
                  url:"{{route('banner.delete')}}",
                  method:'get',
                  data:{banner_id:banner_id},
                  success:function(res){
                        if (res.status=='success') { 
                            $('.table').load(location.href+' .table');
                        }
                  }

                });
                }
                
              });      
//=================Banner Item Delete End=========================================================>  

//==================Paginator pagr Ajax Responsive Start============================================================>              
$(document).on('click','.pagination a',function(e){
                  e.preventDefault();
                  var page = $(this).attr('href').split('page=')[1]
                  category(page);
        });

        function category(page){
                $.ajax({
                      url:"{{route('banner.pagination')}}?page="+page,
                      success:function(r){
                        $('#table-data').html(r);
                      }
                });
        }
//==================Paginator pagr Ajax Responsive End============================================================> 

//====================Category Item Search Start=========================>
$(document).on('keyup',function(e){
        e.preventDefault();
        let search_string = $('#all_search').val();
        $.ajax({
            url:"{{ route('banner.search') }}",
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

})
</script>