    
    window.onload = hideErrorMessages();

    function hideErrorMessages(){
        $("#error_ename").hide();
        $("#error_ename2").hide();
        $("#error_frequency").hide();
        $("#error_frequency2").hide();
        $("#error_esd").hide();
        $("#error_esd2").hide();
        $("#error_esd3").hide();
        $("#error_esd4").hide();
        $("#error_eed").hide();
        $("#error_eed2").hide();
        $("#error_eed3").hide();
        $("#error_eed4").hide();
        $("#error_edescription").hide();
        $("#error_edescription2").hide();
        
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

    function add_exercise_plan_popup(customerid){
        $("#exercise-plan_customer-id").val(customerid);       
        $('#newExercisePlanSubmit').attr("onclick","add_exercise_plan("+customerid+")");
    }

    function add_exercise_plan(customerid) {
        hideErrorMessages();
        show_loading();
        var i=0;
        var exercise_name = $('#ename').val().trim();
        var frequency = $('#frequency').val().trim();
        var sd = $('#esd').val().trim();
        var ed = $('#eed').val().trim();
        var description = $('#edescription').val().trim();

        if(exercise_name == ""){
            $("#error_ename").show();
            i++;
        }
        else if (!exercise_name.match(/^[A-Za-z0-9\s]+$/)) {
            $("#error_ename2").show();
            i++;
        }

        if(frequency == ""){
            $("#error_frequency").show();
            i++;
        }
        else if (!frequency.match(/^[A-Za-z0-9\s]+$/)) {
            $("#error_frequency2").show();
            i++;
        }

        var day=sd.split("/")[0];
        var month=sd.split("/")[1];
        var year=sd.split("/")[2];

        if(sd == ""){
            $("#error_esd").show();
            i++;
        }
        else if (!sd.match(/^\d{1,2}\/\d{1,2}\/\d{4}$/)) {
            $("#error_esd2").show();
            i++;
        }
        else {
            if(day < 1 || day > 31) {
                $("#error_esd3").show();
                i++;
            }
            if(month < 1 || month > 12) {
                $("#error_esd4").show();
                i++;
            }
        }

        var day=ed.split("/")[0];
        var month=ed.split("/")[1];
        var year=ed.split("/")[2];

        if(ed == ""){
            $("#error_eed").show();
            i++;
        }
        else if (!ed.match(/^\d{1,2}\/\d{1,2}\/\d{4}$/)) {
            $("#error_eed2").show();
            i++;
        }
        else {
            if(day < 1 || day > 31) {
                $("#error_eed3").show();
                i++;
            }
            if(month < 1 || month > 12) {
                $("#error_eed4").show();
                i++;
            }
        }

        if(description == ""){
            $("#error_edescription").show();
            i++;
        }
        else if (!description.match(/^[A-Za-z0-9\s]+$/)) {
            $("#error_edescription2").show();
            i++;
        }

        if(i == 0){

            $.ajax({
                url: $("#base-url").val() + "customer/add_exercise_plan",
                traditional: true,
                type: "post",
                dataType: "text",

                data: {customerid:customerid, exercise_name:exercise_name, frequency:frequency, sd:sd, ed:ed, description:description},
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
