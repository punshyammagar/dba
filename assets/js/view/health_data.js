    
    window.onload = hideErrorMessages();

    function hideErrorMessages(){
        $("#error_weight").hide();
        $("#error_weight2").hide();
        $("#error_height").hide();
        $("#error_height2").hide();
        $("#error_age").hide();
        $("#error_age2").hide();
        $("#error_waist").hide();
        $("#error_waist2").hide();
        $("#error_gl").hide();
        $("#error_gl2").hide();
        $("#error_bp").hide();
        $("#error_bp2").hide();
        $("#error_dl").hide();
        $("#error_dl2").hide();
        $("#edit-error_weight").hide();
        $("#edit-error_weight2").hide();
        $("#edit-error_height").hide();
        $("#edit-error_height2").hide();
        $("#edit-error_age").hide();
        $("#edit-error_age2").hide();
        $("#edit-error_waist").hide();
        $("#edit-error_waist2").hide();
        $("#edit-error_gl").hide();
        $("#edit-error_gl2").hide();
        $("#edit-error_bp").hide();
        $("#edit-error_bp2").hide();
        $("#edit-error_dl").hide();
        $("#edit-error_dl2").hide();
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

    function add_health_data_popup(customerid){
        $("#health-data_customer-id").val(customerid);       
        $('#newHealthDataSubmit').attr("onclick","add_health_details("+customerid+")");
    }

    function add_health_details(customerid){
        hideErrorMessages();
        show_loading();
        var i=0;
        var customerid = $('#health-data_customer-id').val().trim();
        var weight = $('#weight').val().trim();
        var height = $('#height').val().trim();
        var age = $('#age').val().trim();
        var waist = $('#waist').val().trim();
        var gl = $('#gl').val().trim();
        var bp = $('#bp').val().trim();
        var dl = $('#dl').val().trim();

        if(weight == ""){
            $("#error_weight").show();
            i++;
        }
        else if (!weight.match(/^[A-Za-z0-9\s]+$/)) {
            $("#error_weight2").show();
            i++;
        }

        if(height == ""){
            $("#error_height").show();
            i++;
        }
        else if (!height.match(/^[A-Za-z0-9\s]+$/)) {
            $("#error_height2").show();
            i++;
        }

        if(age == ""){
            $("#error_age").show();
            i++;
        }
        else if (!age.match(/^[A-Za-z0-9\s]+$/)) {
            $("#error_age2").show();
            i++;
        }


        if(waist == ""){
            $("#error_waist").show();
            i++;
        }
        else if (!waist.match(/^[A-Za-z0-9\s]+$/)) {
            $("#error_waist2").show();
            i++;
        }

        if(gl == ""){
            $("#error_gl").show();
            i++;
        }
        else if (!gl.match(/^[A-Za-z0-9\s]+$/)) {
            $("#error_gl2").show();
            i++;
        }

        if(bp == ""){
            $("#error_bp").show();
            i++;
        }
        else if (!bp.match(/^[A-Za-z0-9\s]+$/)) {
            $("#error_bp2").show();
            i++;
        }

        if(dl == ""){
            $("#error_dl").show();
            i++;
        }
        else if (!dl.match(/^[A-Za-z0-9\s]+$/)) {
            $("#error_dl2").show();
            i++;
        }

        if(i == 0){

            $.ajax({
                url: $("#base-url").val() + "customer/add_health_data",
                traditional: true,
                type: "post",
                dataType: "text",

                data: {customerid:customerid, weight:weight, height:height, age:age, waist:waist, gl:gl, bp:bp, dl:dl},
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
    }

    function edit_health_data_popup(healthdataid,customerid,weight,height,age,waist,gl,bp,dl){
        $( "#edit-healthdata-id" ).val(healthdataid);
        $( "#edit-customer-id" ).val(customerid);
        $( "#edit-weight" ).val(weight);
        $( "#edit-height" ).val(height);
        $( "#edit-age" ).val(age);
        $( "#edit-waist" ).val(waist);
        $( "#edit-gl" ).val(gl);
        $( "#edit-bp" ).val(bp);
        $( "#edit-dl" ).val(dl);
        
        $('#editHealthDataSubmit').attr("onclick","update_health_data_details("+healthdataid+")");
    }

    function update_health_data_details(healthdataid){
        hideErrorMessages();
        show_loading();
        var i=0;

        var customerid = $( "#edit-customer-id" ).val().trim();
        var weight = $( "#edit-weight" ).val().trim();
        var height = $( "#edit-height" ).val().trim();
        var age = $( "#edit-age" ).val().trim();
        var waist = $( "#edit-waist" ).val().trim();
        var gl = $( "#edit-gl" ).val().trim();
        var bp = $( "#edit-bp" ).val().trim();
        var dl = $( "#edit-dl" ).val().trim();

        if(weight == ""){
            $("#edit-error_weight").show();
            i++;
        }
        else if (!weight.match(/^[A-Za-z0-9\s]+$/)) {
            $("#edit-error_weight2").show();
            i++;
        }

        if(height == ""){
            $("#edit-error_height").show();
            i++;
        }
        else if (!height.match(/^[A-Za-z0-9\s]+$/)) {
            $("#edit-error_height2").show();
            i++;
        }

        if(age == ""){
            $("#edit-error_age").show();
            i++;
        }
        else if (!age.match(/^[A-Za-z0-9\s]+$/)) {
            $("#edit-error_age2").show();
            i++;
        }


        if(waist == ""){
            $("#edit-error_waist").show();
            i++;
        }
        else if (!waist.match(/^[A-Za-z0-9\s]+$/)) {
            $("#edit-error_waist2").show();
            i++;
        }

        if(gl == ""){
            $("#edit-error_gl").show();
            i++;
        }
        else if (!gl.match(/^[A-Za-z0-9\s]+$/)) {
            $("#edit-error_gl2").show();
            i++;
        }

        if(bp == ""){
            $("#edit-error_bp").show();
            i++;
        }
        else if (!bp.match(/^[A-Za-z0-9\s]+$/)) {
            $("#edit-error_bp2").show();
            i++;
        }

        if(dl == ""){
            $("#edit-error_dl").show();
            i++;
        }
        else if (!dl.match(/^[A-Za-z0-9\s]+$/)) {
            $("#edit-error_dl2").show();
            i++;
        }

        if(i == 0){

            $.ajax({
                url: $("#base-url").val() + "customer/update_healthdata_details",
                traditional: true,
                type: "post",
                dataType: "text",

                data: {healthdataid:healthdataid, customerid:customerid, weight:weight, height:height, age:age, waist:waist, gl:gl, bp:bp, dl:dl},
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
    }

    // $( "#newHealthDataSubmit" ).click(function() {
    //     hideErrorMessages();
    //     show_loading();
    //     var i=0;
    //     var weight = $('#weight').val().trim();
    //     var height = $('#height').val().trim();
    //     var age = $('#age').val().trim();
    //     var waist = $('#waist').val().trim();
    //     var gl = $('#gl').val().trim();
    //     var bp = $('#bp').val().trim();
    //     var dl = $('#dl').val().trim();

    //     if(weight == ""){
    //         $("#error_weight").show();
    //         i++;
    //     }
    //     else if (!weight.match(/^[A-Za-z0-9\s]+$/)) {
    //         $("#error_weight2").show();
    //         i++;
    //     }

    //     if(height == ""){
    //         $("#error_height").show();
    //         i++;
    //     }
    //     else if (!height.match(/^[A-Za-z0-9\s]+$/)) {
    //         $("#error_height2").show();
    //         i++;
    //     }

    //     if(age == ""){
    //         $("#error_age").show();
    //         i++;
    //     }
    //     else if (!age.match(/^[A-Za-z0-9\s]+$/)) {
    //         $("#error_age2").show();
    //         i++;
    //     }


    //     if(waist == ""){
    //         $("#error_waist").show();
    //         i++;
    //     }
    //     else if (!waist.match(/^[A-Za-z0-9\s]+$/)) {
    //         $("#error_waist2").show();
    //         i++;
    //     }

    //     if(gl == ""){
    //         $("#error_gl").show();
    //         i++;
    //     }
    //     else if (!gl.match(/^[A-Za-z0-9\s]+$/)) {
    //         $("#error_gl2").show();
    //         i++;
    //     }

    //     if(bp == ""){
    //         $("#error_bp").show();
    //         i++;
    //     }
    //     else if (!bp.match(/^[A-Za-z0-9\s]+$/)) {
    //         $("#error_bp2").show();
    //         i++;
    //     }

    //     if(dl == ""){
    //         $("#error_dl").show();
    //         i++;
    //     }
    //     else if (!dl.match(/^[A-Za-z0-9\s]+$/)) {
    //         $("#error_dl2").show();
    //         i++;
    //     }

    //     if(i == 0){

    //         $.ajax({
    //             url: $("#base-url").val() + "customer/add_health_data",
    //             traditional: true,
    //             type: "post",
    //             dataType: "text",

    //             data: {weight:weight, height:height, age:age, waist:waist, gl:gl, bp:bp, dl:dl},
    //             success: function (result) {
    //                 var result = $.parseJSON(result);
    //                 if(result.status=='success'){
    //                     location.reload();
    //                 }
    //                 else if(result.status=='exist'){
    //                     $("#error_email2").show();
    //                     hide_loading();
    //                 }
    //                 else{
    //                     alert("Oops there is something wrong!");
    //                 }
                  
    //             },
    //             error: ajax_error_handling
    //         });
    //     }else{
    //         hide_loading();
    //     }
            
    // });
