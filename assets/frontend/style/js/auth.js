 $(document).ready(function(){
        $('body').on('submit','#submit_singup',function(e){
             e.preventDefault();
             let formDta = new FormData(this);
             $(".submit_button").html("Processing...").prop('disabled', true)
             $.ajax({
               url: $(this).attr('data-action'),
               method: "POST",
               data: formDta,
               cache: false,
               contentType: false,
               processData: false,
               success:function(response){
                   let data=JSON.parse(response)
                   if (data.type=="success") 
                   {

                    $("#submit_singup")[0].reset();
                    $(".submit_button").text("Success").prop('disabled', false)
                     window.location = data.route
                     
                   }  
               },

               error:function(response){

                    if (response.status === 422) {
                       
                           if (response.responseJSON.errors.hasOwnProperty('name')) {
                                $('.error_name').html(response.responseJSON.errors.name)      
                            }else{
                                $('.error_name').html('') 
                            }

                            if (response.responseJSON.errors.hasOwnProperty('email')) {
                                $('.error_email').html(response.responseJSON.errors.email)      
                            }else{
                                $('.error_email').html('') 
                            }

                            if (response.responseJSON.errors.hasOwnProperty('phone')) {
                                $('.error_phone').html(response.responseJSON.errors.phone)      
                            }else{
                                $('.error_phone').html('') 
                            }

                            if (response.responseJSON.errors.hasOwnProperty('password')) {
                                $('.error_password').html(response.responseJSON.errors.password)      
                            }else{
                                $('.error_password').html('') 
                            }

                            if (response.responseJSON.errors.hasOwnProperty('privacy')) {
                                $('.error_privacy').html(response.responseJSON.errors.privacy)      
                            }else{
                                $('.error_privacy').html('') 
                            }  

                            $(".submit_button").html('Register Account<i class="flaticon-right"></i>').prop('disabled', false)  
                    }
               }

             });
        });

      })