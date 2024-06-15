<script>
$(document).ready(function(){

//=================User Item Delete Start=========================================================>
$(document).on('click','.user_delete_btn',function(e){
                e.preventDefault();
                let user_id = $(this).data('id');
                if(confirm('You are sure to Delete Profile ?')){
                $.ajax({
                url:"{{route('user.delete')}}",
                method:'get',
                data:{user_id:user_id},
                success:function(res){
                        if (res.status=='success') { 
                            $('.table').load(location.href+' .table');
                        }
                }

                });
                }
                
              });      
//=================User Item Delete End=========================================================>  

});
</script>