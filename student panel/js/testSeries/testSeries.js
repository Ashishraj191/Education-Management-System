function toggle(value){
    if(value == "btn1"){
        console.log("button 1 click");
        document.getElementById('btn1').classList.remove("bg-gradient-warning");
        document.getElementById('btn1').style.backgroundColor='#fff';
        document.getElementById('btn2').classList.add("bg-gradient-warning");
        document.getElementById('table').style.display='block';
        document.getElementById('addStudentForm').style.display='none';
    }
    else if(value == "btn2"){
        console.log("button 2 click");
        document.getElementById('btn1').classList.add("bg-gradient-warning");
        document.getElementById('btn2').classList.remove("bg-gradient-warning");
        document.getElementById('btn2').style.backgroundColor='#fff';
        document.getElementById('table').style.display='none';
        document.getElementById('addStudentForm').style.display='block';
    }
}

$(document).ready(function() {    
    // $('#btn1').click(function () {
    //     cid = $('#cid').val();
    //     $.get( "php/buttonActionCenter.php", {cid: cid , action: "viewAllMeeting", type: "table"} ,function(data) {
    //         $('#viewAllMeetingTbody').empty();
    //         $('#viewAllMeetingTbody').html(data);
    //     });
    // });

    let meeting_id;
    $(document).on('click', '.viewMeetingDetail', function () {
        cid = $('#cid').val();
        meeting_id = $(this).val();  
        console.log("tigger");
        $("#meetingID_PASS_div_ve").hide();
        $.get( "php/buttonActionStudent.php", {cid: cid , meeting_id: meeting_id, action: "viewMeetingById", type: "JSON"} ,function(data) {
            obj = JSON.parse(data);
            $("#meeting_topic").val(obj['meeting_topic']);
            $("#meeting_host").val(obj['host_name']);
            $("#meeting_date").val(obj['meeting_date']);
            $("#meeting_start_time").val(obj['meeting_start_time']);
            $("#meeting_end_time").val(obj['meeting_end_time']);
            $("#meeting_platform_ve").val(obj['meeting_platform']);
            $("#meeting_url_ve").val(obj['meeting_url']);
            $("#joinNowModalbtn").prop("href", obj['meeting_url']);
            if (obj['meeting_platform'] == "ZM") {
                $("#meetingID_PASS_div_ve").show();
                $("#meeting_password_ve").val(obj['meet_join_password']);
                $("#meeting_id_ve").val(obj['meet_join_id']);
            }
            $("#meeting_desc").val(obj['meeting_desc']);
         
        });
    })
   
    

})