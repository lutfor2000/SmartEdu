<script>
$(document).ready(function(){


//===================================Package Data Insert Start=======================================>
$("#packageform").submit(function(e){
             e.preventDefault();
             var formData = new FormData(this);

            $.ajax({
                url: '{{ route("package.post")}}',
                type: 'post',
                data :formData,
                dataType: 'json',
                contentType:false,
                processData:false,
                success: function(response){          
                   if (response.status == false) {
                       var errors = response.errors;
                            if (errors.package_price) {
                                $("#package_price").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.package_price)
                                }else(
                                $("#package_price").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                            
                            if (errors.package_date) {
                                $("#package_date").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.package_date)
                                }else(
                                $("#package_date").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )

                            if (errors.package_email) {
                                $("#package_email").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.package_email)
                                }else(
                                $("#package_email").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )

                            if (errors.package_storage) {
                                $("#package_storage").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.package_storage)
                                }else(
                                $("#package_storage").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )

                            if (errors.package_database) {
                                $("#package_database").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.package_database)
                                }else(
                                $("#package_database").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )

                            if (errors.package_domain) {
                                $("#package_domain").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.package_domain)
                                }else(
                                $("#package_domain").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )

                            if (errors.package_support) {
                                $("#package_support").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.package_support)
                                }else(
                                $("#package_support").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                    }else{

                            $("#package_price").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#package_date").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#package_email").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#package_storage").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#package_database").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#package_domain").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#package_support").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                            window.location.href = '{{ route("package") }}'
                        
                    }
                }
             });

         });
//===================================Package Data Insert End=======================================>

//===================================Package Data Edit End=======================================>
$(document).on('click','.package_edit_btn',function(){
                  let id = $(this).data('id');
                  let package_price = $(this).data('package_price');
                  let package_date = $(this).data('package_date');
                  let package_email = $(this).data('package_email');
                  let package_storage = $(this).data('package_storage');
                  let package_database = $(this).data('package_database');
                  let package_domain = $(this).data('package_domain');
                  let package_support = $(this).data('package_support');

                  $('#id').val(id);
                  $('#up_package_price').val(package_price);
                  $('#up_package_date').val(package_date);
                  $('#up_package_email').val(package_email);
                  $('#up_package_storage').val(package_storage);
                  $('#up_package_database').val(package_database);
                  $('#up_package_domain').val(package_domain);
                  $('#up_package_support').val(package_support);
        
            });

//===================================Package Data Edit End=======================================>

//===================================Package Data Update End=======================================>
$("#updatepackageform").submit(function(e){
             e.preventDefault();
             var formData = new FormData(this);

            $.ajax({
                url: '{{ route("package.update")}}',
                type: 'post',
                data :formData,
                dataType: 'json',
                contentType:false,
                processData:false,
                success: function(response){          
                   if (response.status == false) {
                       var errors = response.errors;
                            if (errors.package_price) {
                                $("#up_package_price").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.package_price)
                                }else(
                                $("#up_package_price").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                            
                            if (errors.package_date) {
                                $("#up_package_date").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.package_date)
                                }else(
                                $("#up_package_date").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )

                            if (errors.package_email) {
                                $("#up_package_email").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.package_email)
                                }else(
                                $("#up_package_email").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )

                            if (errors.package_storage) {
                                $("#up_package_storage").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.package_storage)
                                }else(
                                $("#up_package_storage").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )

                            if (errors.package_database) {
                                $("#up_package_database").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.package_database)
                                }else(
                                $("#up_package_database").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )

                            if (errors.package_domain) {
                                $("#up_package_domain").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.package_domain)
                                }else(
                                $("#up_package_domain").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )

                            if (errors.package_support) {
                                $("#up_package_support").addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.package_support)
                                }else(
                                $("#up_package_support").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('')
                            )
                    }else{

                            $("#up_package_price").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#up_package_date").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#up_package_email").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#up_package_storage").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#up_package_database").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#up_package_domain").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');
                            $("#up_package_support").removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html('');

                            window.location.href = '{{ route("package") }}'
                        
                    }
                }
             });

         });
//===================================Package Data Update End=======================================>

//===================================Package Data Delete Start=======================================>
$(document).on('click','.package_delete_btn',function(e){
                  e.preventDefault();
                  let package_id = $(this).data('id');

                if(confirm('You are sure to Delete Your Product ?')){
                    $.ajax({
                  url:"{{route('package.delete')}}",
                  method:'get',
                  data:{package_id:package_id},
                  success:function(res){
                        if (res.status=='success') { 
                            $('.table').load(location.href+' .table');
                        }
                  }

                });
                }
                
              });    
//===================================Package Data Delete End=======================================>

//====================Package Item Search Start=========================>
$(document).on('keyup',function(e){
        e.preventDefault();
        let search_string = $('#all_search').val();
        $.ajax({
            url:"{{ route('package.search') }}",
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
//====================Package Item Search End=========================>



//==================Paginator pagr Ajax Responsive Start============================================================>              
$(document).on('click','.pagination a',function(e){
                  e.preventDefault();
                  var page = $(this).attr('href').split('page=')[1]
                  category(page);
        });

        function category(page){
                $.ajax({
                      url:"{{route('package.pagination')}}?page="+page,
                      success:function(r){
                        $('#table-data').html(r);
                      }
                });
        }
//==================Paginator pagr Ajax Responsive End============================================================> 

});



</script>