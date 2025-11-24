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
    $('#btn1').click(function () {
        cid = $('#cid').val();
        $.get( "php/buttonActionCenter.php", {cid: cid , action: "viewAllLiveClasses", type: "table"} ,function(data) {
            $('#viewAllLiveClassesTbody').empty();
            $('#viewAllLiveClassesTbody').html(data);
        });
    });

    let live_classes_id;
    $(document).on('click', '.view_editLiveClasses_btn', function () {
        cid = $('#cid').val();
        live_classes_id = $(this).val();  
        $.get( "php/buttonActionCenter.php", {cid: cid , live_classes_id: live_classes_id, action: "viewLiveClassesById", type: "JSON"} ,function(data) {
            obj = JSON.parse(data);
            $("#live_topic").val(obj['live_topic']);
            $("#live_host").val(obj['host_name']);
            $("#batch").val(obj['batch_id']);
            $("#live_date").val(obj['live_date']);
            $("#live_start_time").val(obj['live_start_time']);
            $("#live_end_time").val(obj['live_end_time']);
            $("#live_url").val(obj['live_url']);
            $("#live_desc").val(obj['live_desc']);
         
        });
    })
   


 // =========================AJAX AJAX AJAX=========================== 
// =========================Create Meeting=========================== 
    //when Submit button clicke data is send on server using AJAX
    $("#createLiveClassesForm").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        $.ajax({
            type: "POST",
            url: "php/buttonActionCenter.php",
            data: $("#createLiveClassesForm").serializeArray(),// serializes the form's elements.
            success: function(data)
            {
                alert(data); //show response from the php script.
                // $("#reset").click();
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
$("#editLiveClassesForm").submit(function(e) {
    e.preventDefault(); /// avoid to execute the actual submit of the form.
    data = $("#editLiveClassesForm").serializeArray();
    data.push({name: 'live_classes_id' , value: live_classes_id});
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