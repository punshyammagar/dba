    
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
        $("#error-edit_name").hide();
        $("#error-edit_name2").hide();
        $("#error-edit_lname").hide();
        $("#error-edit_lname2").hide();
        $("#error-edit_dob").hide();
        $("#error-edit_dob2").hide();
        $("#error-edit_dob3").hide();
        $("#error-edit_dob4").hide();
        $("#error-edit_phone").hide();
        $("#error-edit_phone2").hide();
        $("#error-edit_email").hide();
        $("#error-edit_email2").hide();
        $("#error-edit_email3").hide();
        $("#error-edit_address").hide();
        $("#error-edit_address2").hide();
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

    function edit_customer_popup(customerid,dietitianid,fname,lname,dob,phone,email,address){
        $( "#edit-customer-id" ).val(customerid);
        $( "#edit-dietitian-id" ).val(dietitianid);
        $( "#edit-name" ).val(fname);
        $( "#edit-lname" ).val(lname);
        $( "#edit-dob" ).val(dob);
        $( "#edit-phone" ).val(phone);
        $( "#edit-email" ).val(email);
        $( "#edit-address" ).val(address);
        
        $('#editCustomerSubmit').attr("onclick","update_customer_details("+customerid+")");
    }

    function update_customer_details(customerid){
        hideErrorMessages();
        show_loading();
        var i=0;

        var dietitianid = $( "#edit-dietitian-id" ).val().trim();
        var name = $( "#edit-name" ).val().trim();
        var lname = $( "#edit-lname" ).val().trim();
        var dob = $( "#edit-dob" ).val().trim();
        var phone = $( "#edit-phone" ).val().trim();
        var email = $( "#edit-email" ).val().trim();
        var address = $( "#edit-address" ).val().trim();

        if(name == ""){
            $("#error-edit_name").show();
            i++;
        }
        else if (!name.match(/^[A-Za-z0-9\s]+$/)) {
            $("#error-edit_name2").show();
            i++;
        }

        if(lname == ""){
            $("#error-edit_lname").show();
            i++;
        }
        else if (!lname.match(/^[A-Za-z0-9\s]+$/)) {
            $("#error-edit_lname2").show();
            i++;
        }

        var day=dob.split("/")[0];
        var month=dob.split("/")[1];
        var year=dob.split("/")[2];

        if(dob == ""){
            $("#error-edit_dob").show();
            i++;
        }
        else if (!dob.match(/^\d{1,2}\/\d{1,2}\/\d{4}$/)) {
            $("#error-edit_dob2").show();
            i++;
        }
        else {
            if(day < 1 || day > 31) {
                $("#error-edit_dob3").show();
                i++;
            }
            if(month < 1 || month > 12) {
                $("#error-edit_dob4").show();
                i++;
            }
        }


        if(phone == ""){
            $("#error-edit_phone").show();
            i++;
        }
        else if (!phone.match(/^[A-Za-z0-9\s]+$/)) {
            $("#error-edit_phone2").show();
            i++;
        }

        if(email == ""){
            $("#error-edit_email").show();
            i++;
        }
        else if (!email.match(/^[\w -._]+@[\-0-9a-zA-Z_.]+?\.[a-zA-Z]{2,3}$/)) {
            $("#error-edit_email3").show();
            i++;
        }

        if(address == ""){
            $("#error-edit_address").show();
            i++;
        }
        else if (!address.match(/^[A-Za-z0-9\s]+$/)) {
            $("#error-edit_address2").show();
            i++;
        }


        if(i == 0){
            $.ajax({
                url: $("#base-url").val()+"customer/update_customer_details/",
                traditional: true,
                type: "post",
                dataType: "text",
                data: {customerid:customerid, dietitianid:dietitianid, name:name, lname:lname, dob:dob, phone:phone, email:email, address:address},
                success: function (result) {
                    var result = $.parseJSON(result);
                    if(result.status=='success'){
                        location.reload();
                    }
                    else if(result.status=='exist'){
                        $("#edit-error_email2").show();
                        hide_loading();
                    }
                    else{
                        alert("Oops there is something wrong!");
                    }
                },
                error: ajax_error_handling
            });
        }
    }


