function toggle(value){
    if(value == "btn1"){
        console.log("button 1 click");
        document.getElementById('btn1').classList.remove("bg-gradient-primary");
        document.getElementById('btn1').style.backgroundColor='#fff';
        document.getElementById('btn2').classList.add("bg-gradient-primary");
        document.getElementById('table').style.display='block';
        document.getElementById('addStudentForm').style.display='none';
    }
    else if(value == "btn2"){
        console.log("button 2 click");
        document.getElementById('btn1').classList.add("bg-gradient-primary");
        document.getElementById('btn2').classList.remove("bg-gradient-primary");
        document.getElementById('btn2').style.backgroundColor='#fff';
        document.getElementById('table').style.display='none';
        document.getElementById('addStudentForm').style.display='block';
    }
}

$(document).ready(function() {
    $('#meetingID_PASS_div').hide();
    $('#meeting_platform').change(function(){
        if( $('#meeting_platform').val() == "ZM") {
            $('#meetingID_PASS_div').show();
            $('#meeting_url_lable').text("Zoom Meeting URL");
            $('#meeting_url').attr('placeholder','https://zoom.us/j/55551112222');
        }else{
            $('#meetingID_PASS_div').hide();
        }
    });

    $('#btn1').click(function () {
        cid = $('#cid').val();
        $.get( "php/buttonActionCenter.php", {cid: cid , action: "viewAllMeeting", type: "table"} ,function(data) {
            $('#viewAllMeetingTbody').empty();
            $('#viewAllMeetingTbody').html(data);
        });
    });

    let meeting_id;
    $(document).on('click', '.view_editMeeting', function () {
        cid = $('#cid').val();
        meeting_id = $(this).val();  
        console.log("tigger jsss");
        $("#meetingID_PASS_div_ve").hide();
        $.get( "php/buttonActionCenter.php", {cid: cid , meeting_id: meeting_id, action: "viewMeetingById", type: "JSON"} ,function(data) {
            obj = JSON.parse(data);
            $("#meeting_topic").val(obj['meeting_topic']);
            $("#meeting_host").val(obj['host_name']);
            $("#batch").val(obj['batch_id']);
            $("#meeting_date").val(obj['meeting_date']);
            $("#meeting_start_time").val(obj['meeting_start_time']);
            $("#meeting_end_time").val(obj['meeting_end_time']);
            $("#meeting_platform_ve").val(obj['meeting_platform']);
            $("#meeting_url_ve").val(obj['meeting_url']);
            if (obj['meeting_platform'] == "ZM") {
                $("#meetingID_PASS_div_ve").show();
                $("#meeting_password_ve").val(obj['meet_join_password']);
                $("#meeting_id_ve").val(obj['meet_join_id']);
            }
            $("#meeting_desc").val(obj['meeting_desc']);
         
        });
        $('#meeting_platform_ve').change(function(){
            if ($('#meeting_platform_ve').val() == "GM") {
                $("#meetingID_PASS_div_ve").hide();
            }else if ($('#meeting_platform_ve').val() == "ZM") {
                $("#meetingID_PASS_div_ve").show();
            }
        });
    })
   


 // =========================AJAX AJAX AJAX=========================== 
// =========================Create Meeting=========================== 
    //when Submit button clicke data is send on server using AJAX
    $("#createMeetingForm").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        $.ajax({
            type: "POST",
            url: "php/buttonActionCenter.php",
            data: $("#createMeetingForm").serializeArray(),// serializes the form's elements.
            success: function(data)
            {
                alert(data); //show response from the php script.
                $("#reset").click();
            }
          }); 
        // data = $("#createMeetingForm").serializeArray();
        // $.post( "php/buttonActionCenter.php", function( data ) {
        //     // $( ".result" ).html( data );
        //     console.log(data);
        //   });
    });
    
    
// **************** END Create Meeting ******************


// =========================AJAX AJAX AJAX=========================== 
// =========================Edit Meeting=========================== 
$("#editMeetingForm").submit(function(e) {
    e.preventDefault(); /// avoid to execute the actual submit of the form.
    data = $("#editMeetingForm").serializeArray();
    data.push({name: 'meeting_id' , value: meeting_id});
    // console.log(meeting_id);
    $.ajax({
        type: "POST",
        url: "php/buttonActionCenter.php",
        data: data,// serializes the form's elements.
        success: function(data)
        {
            alert(data); //show response from the php script.
            $("#closeViewEditModal_btn").click();
            $('#btn1').click();
        }
      }); 
});

// **************** END Edit Meeting ******************

})