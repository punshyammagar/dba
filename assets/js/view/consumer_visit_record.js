    
    window.onload = hideErrorMessages();

    function hideErrorMessages(){
        $("#error_name").hide();
        $("#error_name2").hide();
        $("#error_lname").hide();
        $("#error_lname2").hide();
        $("#error_dob").hide();
        $("#error_dob2").hide();
        $("#error_dob3").hide();
        $("#error_dob4").hide();
        $("#error_phone").hide();
        $("#error_phone2").hide();
        $("#error_email").hide();
        $("#error_email2").hide();
        $("#error_email3").hide();
        $("#error_address").hide();
        $("#error_address2").hide();
        hide_loading();
    }

    $( "#newCustomerSubmit" ).click(function() {
        hideErrorMessages();
        show_loading();
        var i=0;
        var name = $('#name').val().trim();
        var lname = $('#lname').val().trim();
        var dob = $('#dob').val().trim();
        var phone = $('#phone').val().trim();
        var email = $('#email').val().trim();
        var address = $('#address').val().trim();

        if(name == ""){
            $("#error_name").show();
            i++;
        }
        else if (!name.match(/^[A-Za-z0-9\s]+$/)) {
            $("#error_name2").show();
            i++;
        }

        if(lname == ""){
            $("#error_lname").show();
            i++;
        }
        else if (!lname.match(/^[A-Za-z0-9\s]+$/)) {
            $("#error_lname2").show();
            i++;
        }

        var day=dob.split("/")[0];
        var month=dob.split("/")[1];
        var year=dob.split("/")[2];

        if(dob == ""){
            $("#error_dob").show();
            i++;
        }
        else if (!dob.match(/^\d{1,2}\/\d{1,2}\/\d{4}$/)) {
            $("#error_dob2").show();
            i++;
        }
        else {
            if(day < 1 || day > 31) {
                $("#error_dob3").show();
                i++;
            }
            if(month < 1 || month > 12) {
                $("#error_dob4").show();
                i++;
            }
        }


        if(phone == ""){
            $("#error_phone").show();
            i++;
        }
        else if (!phone.match(/^[A-Za-z0-9\s]+$/)) {
            $("#error_phone2").show();
            i++;
        }

        if(email == ""){
            $("#error_email").show();
            i++;
        }
        else if (!email.match(/^[\w -._]+@[\-0-9a-zA-Z_.]+?\.[a-zA-Z]{2,3}$/)) {
            $("#error_email3").show();
            i++;
        }

        if(address == ""){
            $("#error_address").show();
            i++;
        }
        else if (!address.match(/^[A-Za-z0-9\s]+$/)) {
            $("#error_address2").show();
            i++;
        }

        if(i == 0){

            $.ajax({
                url: $("#base-url").val() + "customer/add_customer",
                traditional: true,
                type: "post",
                dataType: "text",

                data: {name:name, lname:lname, dob:dob, phone:phone, email:email, address:address},
                success: function (result) {
                    console.log(result);
                    var result = $.parseJSON(result);
                    if(result.status=='success'){
                        location.reload();
                    }
                    else if(result.status=='exist'){
                        $("#error_email2").show();
                        hide_loading();
                    }
                    else{
                        alert("Oops there is something wrong!");
                    }
                  
                },
                error: ajax_error_handling
            });
        }else{
            hide_loading();
        }
            
    });


