    
    $('#analyseclose,#analysecancel').on('click', function() { 
        
        window.location = $("#base-url").val() + "customer/reports"; 
    });

    window.onload = hideErrorMessages();

    function hideErrorMessages(){
        $("#error_smoker").hide();
        //$("#error_smoker2").hide();
        $("#error_pa").hide();
        //$("#error_pa2").hide();
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


    function edit_health_data_popup(healthdataid,customerid,weight,height,age,waist,gl,bp,dl){
        var total_score = 0;
        // Age
        if (age<=34){
            $('#agec1').css({backgroundColor:'#fcc'});
            $('#agesc0').css({backgroundColor:'#fcc'});
            $('#ages0').css({backgroundColor:'#fcc'});
            total_score = total_score + 0;
        } else if (age>=35 && age<=44) {
            $('#agec2').css({backgroundColor:'#fcc'});
            $('#agesc2').css({backgroundColor:'#fcc'});
            $('#ages2').css({backgroundColor:'#fcc'});
            total_score = total_score + 2;
        }   else if (age>=45 && age<=54) {
            $('#agec3').css({backgroundColor:'#fcc'});
            $('#agesc4').css({backgroundColor:'#fcc'});
            $('#ages4').css({backgroundColor:'#fcc'});
            total_score = total_score + 4;
        }   else if (age>=55 && age<=64) {
            $('#age4').css({backgroundColor:'#fcc'});
            $('#agesc6').css({backgroundColor:'#fcc'});
            $('#ages6').css({backgroundColor:'#fcc'});
            total_score = total_score + 6;
        }   else {
            $('#age5').css({backgroundColor:'#fcc'});
            $('#agesc8').css({backgroundColor:'#fcc'});
            $('#ages8').css({backgroundColor:'#fcc'});
            total_score = total_score + 8;
        }

        // Glucose Level
        if (gl<=100) {
            $('#glNo').css({backgroundColor:'#fcc'});
            $('#glsc0').css({backgroundColor:'#fcc'});
            $('#gls0').css({backgroundColor:'#fcc'});
            total_score = total_score + 0;
        } else {
            $('#glYes').css({backgroundColor:'#fcc'});
            $('#glsc2').css({backgroundColor:'#fcc'});
            $('#gls2').css({backgroundColor:'#fcc'});
            total_score = total_score + 2;
        }

        // Waist
        if (waist<40) {
            $('#waistc1').css({backgroundColor:'#fcc'});
            $('#waistsc0').css({backgroundColor:'#fcc'});
            $('#waists0').css({backgroundColor:'#fcc'});
            total_score = total_score + 0;
        } else if (waist>=40 && waist<=43) {
            $('#waistc2').css({backgroundColor:'#fcc'});
            $('#waistsc4').css({backgroundColor:'#fcc'});
            $('#waists4').css({backgroundColor:'#fcc'});
            total_score = total_score + 4;
        } else {
            $('#waistc3').css({backgroundColor:'#fcc'});
            $('#waistsc7').css({backgroundColor:'#fcc'});
            $('#waists7').css({backgroundColor:'#fcc'});
            total_score = total_score + 7;
        }

        $('#low_medium,#medium_high,#high_very_high,#rp05,#rp68,#rp911,#rp1215,#rp1619,#rp20').css({'backgroundColor':'#bae4fa',
                            'text-align': 'justify',
                            'text-justify': 'inter-word'});

        $('#rp1,#rp2,#rp3,#rplm,#rpml,#rpmh,#rphm,#rphh,#rpvh').css({'backgroundColor':'#bae4fa'});


        $('#rp1,#rp2,#rp3,#rplm,#rpml,#rpmh,#rphm,#rphh,#rpvh').css({'font-size': '1.05em'});

        if (total_score<=8) {
            $('#num6').text(total_score);
            $('#low_medium').css({'visibility':'visible','backgroundColor':'#e0f3fc'});
            $('#rp05,#rp68').css({'backgroundColor':'#e0f3fc'});
            $('#rp1,#rplm,#rpml').css({'backgroundColor':'#39bb9c'});
            $('#medium_high').css({'visibility':'hidden'});
            $('high_very_high').css({'visibility':'hidden'});
        } else if (total_score>=9 && total_score<=15) {
            $('#num11').text(total_score);
            $('#medium_high').css({'visibility':'visible','backgroundColor':'#e0f3fc'});
            $('#rp911,#rp1215').css({'backgroundColor':'#e0f3fc'});
            $('#rp2,#rpmh,#rphm').css({'backgroundColor':'#748ac3'});
            $('#low_medium').css({'visibility':'hidden'});
            $('high_very_high').css({'visibility':'hidden'});
        } else {
            $('#num22').text(total_score);
            $('high_very_high').css({'visibility':'visible','backgroundColor':'#e0f3fc'});
            $('#rp1619,#rp20').css({'backgroundColor':'#e0f3fc'});
            $('#rp3,#rphh,#rpvh').css({'backgroundColor':'#d74e6a'});
            $('#low_medium').css({'visibility':'hidden'});
            $('#medium_high').css({'visibility':'hidden'});
        }

        $('#additionalHealthDataSubmit').attr("onclick","analyse_additional_health_data("+total_score+")");
    }

    function analyse_additional_health_data(total_score) {
        var current_smoker = $( "#smoker" ).val().trim();
        var physical_activity = $( "#pa" ).val().trim();
        var i=0;

        if (current_smoker=="Yes"||current_smoker=="yes"){
            $('#csYes').css({backgroundColor:'#fcc'});
            $('#cssc2').css({backgroundColor:'#fcc'});
            $('#css2').css({backgroundColor:'#fcc'});
            total_score = total_score + 2;
            $("#error_smoker").hide();
        } else if (current_smoker=="No"||current_smoker=="no") {
            $('#csNo').css({backgroundColor:'#fcc'});
            $('#cssc0').css({backgroundColor:'#fcc'});
            $('#css0').css({backgroundColor:'#fcc'});
            total_score = total_score + 0;
            $("#error_smoker").hide();
        } else if (current_smoker=="") {
            $("#error_smoker").hide();
        } else {
            $("#error_smoker").show();
            i++;
        }
        if (physical_activity=="Yes"||physical_activity=="yes"){
            $('#paYes').css({backgroundColor:'#fcc'});
            $('#pasc0').css({backgroundColor:'#fcc'});
            $('#pas0').css({backgroundColor:'#fcc'});
            total_score = total_score + 0;
            $("#error_pa").hide();
        } else if (physical_activity=="No"||physical_activity=="no") {
            $('#paNo').css({backgroundColor:'#fcc'});
            $('#pasc2').css({backgroundColor:'#fcc'});
            $('#pas2').css({backgroundColor:'#fcc'});
            total_score = total_score + 2;
            $("#error_pa").hide();
        } else if (physical_activity=="") {
            $("#error_pa").hide();
        } else {
            $("#error_pa").show();
            i++;
        }
        if(i==0){
            if (total_score<=8) {
                $('#num6').text(total_score);
                $('#low_medium').css({'visibility':'visible'});
                $('#medium_high').css({'visibility':'hidden'});
                $('high_very_high').css({'visibility':'hidden'});
            } else if (total_score>=9 && total_score<=15) {
                $('#num11').text(total_score);
                $('#medium_high').css({'visibility':'visible'});
                $('#low_medium').css({'visibility':'hidden'});
                $('high_very_high').css({'visibility':'hidden'});
            } else {
                $('#num22').text(total_score);
                $('high_very_high').css({'visibility':'visible'});
                $('#low_medium').css({'visibility':'hidden'});
                $('#medium_high').css({'visibility':'hidden'});
            }
        } else {
            hide_loading();
        }
        
    }   

