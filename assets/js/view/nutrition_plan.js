    
    window.onload = hideErrorMessages();

    function hideErrorMessages(){
        $("#error_food").hide();
        $("#error_food2").hide();
        $("#error_amount").hide();
        $("#error_amount2").hide();
        $("#error_sd").hide();
        $("#error_sd2").hide();
        $("#error_sd3").hide();
        $("#error_sd4").hide();
        $("#error_ed").hide();
        $("#error_ed2").hide();
        $("#error_ed3").hide();
        $("#error_ed4").hide();
        $("#error_description").hide();
        $("#error_description2").hide();
        
        hide_loading();
    }

    $(document).ready( function () {
        $('#dataTables-customer-list').DataTable({
            "bFilter": true,
            "paging":   false,
            "order": [[ 0, "asc" ]],
            "bDestroy": true
        }).fnDestroy();
     } );

    function add_nutrition_plan_popup(customerid){
        $("#nutrition-plan_customer-id").val(customerid);       
        $('#newNutritionPlanSubmit').attr("onclick","add_nutrition_plan("+customerid+")");
    }

    function add_nutrition_plan(customerid) {
        hideErrorMessages();
        show_loading();
        var i=0;
        var food = $('#food').val().trim();
        var amount = $('#amount').val().trim();
        var sd = $('#sd').val().trim();
        var ed = $('#ed').val().trim();
        var description = $('#description').val().trim();

        if(food == ""){
            $("#error_food").show();
            i++;
        }
        else if (!food.match(/^[A-Za-z0-9\s]+$/)) {
            $("#error_food2").show();
            i++;
        }

        if(amount == ""){
            $("#error_amount").show();
            i++;
        }
        else if (!amount.match(/^[A-Za-z0-9\s]+$/)) {
            $("#error_amount2").show();
            i++;
        }

        var day=sd.split("/")[0];
        var month=sd.split("/")[1];
        var year=sd.split("/")[2];

        if(sd == ""){
            $("#error_sd").show();
            i++;
        }
        else if (!sd.match(/^\d{1,2}\/\d{1,2}\/\d{4}$/)) {
            $("#error_sd2").show();
            i++;
        }
        else {
            if(day < 1 || day > 31) {
                $("#error_sd3").show();
                i++;
            }
            if(month < 1 || month > 12) {
                $("#error_sd4").show();
                i++;
            }
        }

        var day=ed.split("/")[0];
        var month=ed.split("/")[1];
        var year=ed.split("/")[2];

        if(ed == ""){
            $("#error_ed").show();
            i++;
        }
        else if (!ed.match(/^\d{1,2}\/\d{1,2}\/\d{4}$/)) {
            $("#error_ed2").show();
            i++;
        }
        else {
            if(day < 1 || day > 31) {
                $("#error_ed3").show();
                i++;
            }
            if(month < 1 || month > 12) {
                $("#error_ed4").show();
                i++;
            }
        }

        if(description == ""){
            $("#error_description").show();
            i++;
        }
        else if (!description.match(/^[A-Za-z0-9\s]+$/)) {
            $("#error_description2").show();
            i++;
        }

        if(i == 0){

            $.ajax({
                url: $("#base-url").val() + "customer/add_nutrition_plan",
                traditional: true,
                type: "post",
                dataType: "text",

                data: {customerid:customerid, food:food, amount:amount, sd:sd, ed:ed, description:description},
                success: function (result) {
                    var result = $.parseJSON(result);
                    if(result.status=='success'){
                        location.reload();
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
            
    }

    // function edit_customer_popup(customerid,dietitianid,fname,lname,dob,phone,email,address){
    //     $( "#edit-customer-id" ).val(customerid);
    //     $( "#edit-dietitian-id" ).val(dietitianid);
    //     $( "#edit-name" ).val(fname);
    //     $( "#edit-lname" ).val(lname);
    //     $( "#edit-dob" ).val(dob);
    //     $( "#edit-phone" ).val(phone);
    //     $( "#edit-email" ).val(email);
    //     $( "#edit-address" ).val(address);
        
    //     $('#editCustomerSubmit').attr("onclick","update_customer_details("+customerid+")");
    // }

    // function update_customer_details(customerid){
    //     hideErrorMessages();
    //     show_loading();
    //     var i=0;

    //     var dietitianid = $( "#edit-dietitian-id" ).val().trim();
    //     var name = $( "#edit-name" ).val().trim();
    //     var lname = $( "#edit-lname" ).val().trim();
    //     var dob = $( "#edit-dob" ).val().trim();
    //     var phone = $( "#edit-phone" ).val().trim();
    //     var email = $( "#edit-email" ).val().trim();
    //     var address = $( "#edit-address" ).val().trim();

    //     if(name == ""){
    //         $("#error-edit_name").show();
    //         i++;
    //     }
    //     else if (!name.match(/^[A-Za-z0-9\s]+$/)) {
    //         $("#error-edit_name2").show();
    //         i++;
    //     }

    //     if(lname == ""){
    //         $("#error-edit_lname").show();
    //         i++;
    //     }
    //     else if (!lname.match(/^[A-Za-z0-9\s]+$/)) {
    //         $("#error-edit_lname2").show();
    //         i++;
    //     }

    //     var day=dob.split("/")[0];
    //     var month=dob.split("/")[1];
    //     var year=dob.split("/")[2];

    //     if(dob == ""){
    //         $("#error-edit_dob").show();
    //         i++;
    //     }
    //     else if (!dob.match(/^\d{1,2}\/\d{1,2}\/\d{4}$/)) {
    //         $("#error-edit_dob2").show();
    //         i++;
    //     }
    //     else {
    //         if(day < 1 || day > 31) {
    //             $("#error-edit_dob3").show();
    //             i++;
    //         }
    //         if(month < 1 || month > 12) {
    //             $("#error-edit_dob4").show();
    //             i++;
    //         }
    //     }


    //     if(phone == ""){
    //         $("#error-edit_phone").show();
    //         i++;
    //     }
    //     else if (!phone.match(/^[A-Za-z0-9\s]+$/)) {
    //         $("#error-edit_phone2").show();
    //         i++;
    //     }

    //     if(email == ""){
    //         $("#error-edit_email").show();
    //         i++;
    //     }
    //     else if (!email.match(/^[\w -._]+@[\-0-9a-zA-Z_.]+?\.[a-zA-Z]{2,3}$/)) {
    //         $("#error-edit_email3").show();
    //         i++;
    //     }

    //     if(address == ""){
    //         $("#error-edit_address").show();
    //         i++;
    //     }
    //     else if (!address.match(/^[A-Za-z0-9\s]+$/)) {
    //         $("#error-edit_address2").show();
    //         i++;
    //     }


    //     if(i == 0){
    //         $.ajax({
    //             url: $("#base-url").val()+"customer/update_customer_details/",
    //             traditional: true,
    //             type: "post",
    //             dataType: "text",
    //             data: {customerid:customerid, dietitianid:dietitianid, name:name, lname:lname, dob:dob, phone:phone, email:email, address:address},
    //             success: function (result) {
    //                 var result = $.parseJSON(result);
    //                 if(result.status=='success'){
    //                     location.reload();
    //                 }
    //                 else if(result.status=='exist'){
    //                     $("#edit-error_email2").show();
    //                     hide_loading();
    //                 }
    //                 else{
    //                     alert("Oops there is something wrong!");
    //                 }
    //             },
    //             error: ajax_error_handling
    //         });
    //     }
    // }


