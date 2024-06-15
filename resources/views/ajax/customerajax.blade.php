<script>
$(document).ready(function(){


//===================================History Data Insert Start=======================================>
$("#customerregisform").submit(function(e){
             e.preventDefault();
             var formData = new FormData(this);

            $.ajax({
                url: '{{ route("customerregisterpost")}}',
                type: 'post',
                data :formData,
                dataType: 'json',
                contentType:false,
                processData:false,
                success: function(response){          
                   if (response.status == false) {
                       var errors = response.errors;
                            if (errors.name) {
                                $("#cu_name").addClass('is-invalid').siblings('small').addClass('invalid-feedback').html(errors.name)
                                }else(
                                $("#cu_name").removeClass('is-invalid').siblings('small').removeClass('invalid-feedback').html('')
                            )
                            
                            if (errors.email) {
                                $("#cu_email").addClass('is-invalid').siblings('small').addClass('invalid-feedback').html(errors.email)
                                }else(
                                $("#cu_email").removeClass('is-invalid').siblings('small').removeClass('invalid-feedback').html('')
                            )

                            if (errors.password) {
                                $("#cu_password").addClass('is-invalid').siblings('small').addClass('invalid-feedback').html(errors.password)
                                }else(
                                $("#cu_password").removeClass('is-invalid').siblings('small').removeClass('invalid-feedback').html('')
                            )
                            if (errors.confirm_password) {
                                $("#confirm_password").addClass('is-invalid').siblings('small').addClass('invalid-feedback').html(errors.confirm_password)
                                }else(
                                $("#confirm_password").removeClass('is-invalid').siblings('small').removeClass('invalid-feedback').html('')
                            )
                    }else{

                            $("#cu_name").removeClass('is-invalid').siblings('small').removeClass('invalid-feedback').html('');
                            $("#cu_email").removeClass('is-invalid').siblings('small').removeClass('invalid-feedback').html('');
                            $("#cu_password").removeClass('is-invalid').siblings('small').removeClass('invalid-feedback').html('');
                            $("#confirm_password").removeClass('is-invalid').siblings('small').removeClass('invalid-feedback').html('');

                            window.location.href = '{{ route("customerlogin") }}'
                        
                    }
                }
             });

         });
//===================================History Data Insert End=======================================>

//===================================Customer Login Data Insert Start=======================================>
$("#customeloginform").submit(function(e){
             e.preventDefault();
             var formData = new FormData(this);

            $.ajax({
                url: '{{ route("customerlogin.post")}}',
                type: 'post',
                data :formData,
                dataType: 'json',
                contentType:false,
                processData:false,
                success: function(response){          
                   if (response.status == false) {
                       var errors = response.errors;
                            if (errors.email) {
                                $("#lo_email").addClass('is-invalid').siblings('small').addClass('invalid-feedback').html(errors.email)
                                }else(
                                $("#lo_email").removeClass('is-invalid').siblings('small').removeClass('invalid-feedback').html('')
                            )
                            
                            if (errors.password) {
                                $("#lo_password").addClass('is-invalid').siblings('small').addClass('invalid-feedback').html(errors.password)
                                }else(
                                $("#lo_password").removeClass('is-invalid').siblings('small').removeClass('invalid-feedback').html('')
                            )
                          
                    }else{

                            $("#lo_email").removeClass('is-invalid').siblings('small').removeClass('invalid-feedback').html('');
                            $("#lo_password").removeClass('is-invalid').siblings('small').removeClass('invalid-feedback').html('');
                           

                            window.location.href = '{{ route("home") }}'
                        
                    }
                }
             });

         });
//===================================Customer Login Data Insert End=======================================>





});
</script>
