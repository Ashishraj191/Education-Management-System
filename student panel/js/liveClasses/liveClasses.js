function toggle(value){
    if(value == "btn1"){
        console.log("button 1 click");
        document.getElementById('btn1').classList.remove("bg-gradient-danger");
        document.getElementById('btn1').style.backgroundColor='#fff';
        document.getElementById('btn2').classList.add("bg-gradient-danger");
        document.getElementById('table').style.display='block';
        document.getElementById('addStudentForm').style.display='none';
    }
    else if(value == "btn2"){
        console.log("button 2 click");
        document.getElementById('btn1').classList.add("bg-gradient-danger");
        document.getElementById('btn2').classList.remove("bg-gradient-danger");
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

    $(document).on('click', '.viewLiveClasses_btn', function () {
        cid = $('#cid').val();
        live_classes_id = $(this).val();  
        console.log("tigger");
        $.get( "php/buttonActionStudent.php", {cid: cid , live_classes_id: live_classes_id, action: "viewLiveClassesById", type: "JSON"} ,function(data) {
            obj = JSON.parse(data);
            $("#meeting_topic").val(obj['live_topic']);
            $("#meeting_host").val(obj['host_name']);
            $("#meeting_date").val(obj['live_date']);
            $("#meeting_start_time").val(obj['live_start_time']);
            $("#meeting_end_time").val(obj['live_end_time']);
            $("#joinNowModalbtn").prop("href", obj['live_url']);
            $("#meeting_desc").val(obj['live_desc']);
         
        });
    })
   
    

})