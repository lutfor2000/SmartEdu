<script>
$(document).ready(function(){

//===================================Response Data Insert Start=======================================>
$("#responserform").submit(function(e){
             e.preventDefault();
             var formData = new FormData(this);

            $.ajax({
                url: '{{ route("responser.post")}}',
                type: 'post',
                data :formData,
                dataType: 'json',
                contentType:false,
                processData:false,
                success: function(response){          
                   if (response.status == false) {
                       var errors = response.errors;
                            if (errors.responser_photo) {
                                $("#responser_photo").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.responser_photo)
                                }else(
                                $("#responser_photo").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                            
                    }else{

                            $("#responser_photo").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                            window.location.href = '{{ route("responser") }}'
                        
                    }
                }
             });

         });
//===================================Response Data Insert End=======================================>

//===================================Response Data Edit Start=======================================>
$(document).on('click','.responser_edit_btn',function(){
    let id = $(this).data('id');
    let responser_photo = $(this).data('responser_photo');

    $('#id').val(id);
    $('#up_responser_photo').val(responser_photo);

})
//===================================Response Data Edit End=======================================>


//===================================Response Data Update Start=======================================>
$("#updateresponserform").submit(function(e){
             e.preventDefault();
             var formData = new FormData(this);

            $.ajax({
                url: '{{ route("responser.update")}}',
                type: 'post',
                data :formData,
                dataType: 'json',
                contentType:false,
                processData:false,
                success: function(response){          
                   if (response.status == false) {
                       var errors = response.errors;
                            if (errors.responser_new_photo) {
                                $("#responser_new_photo").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.responser_new_photo)
                                }else(
                                $("#responser_new_photo").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                            
                    }else{

                            $("#responser_new_photo").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                            window.location.href = '{{ route("responser") }}'
                        
                    }
                }
             });

         });
//===================================Response Data Update End=======================================>

//===================================Responser Data Delete Start=======================================>
$(document).on('click','.responser_delete_btn',function(e){
                  e.preventDefault();
                  let responder_id = $(this).data('id');

                if(confirm('You are sure to Delete Your Responser ?')){
                    $.ajax({
                  url:"{{route('responser.delete')}}",
                  method:'get',
                  data:{responder_id:responder_id},
                  success:function(res){
                        if (res.status=='success') { 
                            $('.table').load(location.href+' .table');
                        }
                  }

                });
                }
                
              });    
//===================================Responser Data Delete End=======================================>


//==================Paginator pagr Ajax Responsive Start============================================================>              
$(document).on('click','.pagination a',function(e){
                  e.preventDefault();
                  var page = $(this).attr('href').split('page=')[1]
                  category(page);
        });

        function category(page){
                $.ajax({
                      url:"{{route('responser.pagination')}}?page="+page,
                      success:function(r){
                        $('#table-data').html(r);
                      }
                });
        }
//==================Paginator pagr Ajax Responsive End============================================================> 

});
</script>