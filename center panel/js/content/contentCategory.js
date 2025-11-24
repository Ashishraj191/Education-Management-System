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


// =======================================================
// **********START Category List View ******************
// ======================================================
$( document ).ready(function() {
    //when select tag change option then 
    $('#selectCourseForView').change(function(){
        $('#courseLableForView').text('Currently Selected Course');    
        // console.log("its working");
        course = $('#selectCourseForView').val();
        cid = $('#cid').val();
        
        $.get( "php/buttonActionCenter.php", { course: course, cid: cid , action: "viewCategory", type: "table"} ,function( data ) {
          $( "#viewCategoryTbody" ).html(data);
        //   alert( data );
            // console.log(data);
        });
            
    });

});
// ***************END Category List View**********************



// =======================================================
// **********START Create Category *********************
// ======================================================
$( document ).ready(function() {

    //When dom load per hide element
    $('#inputDiv').hide();
    $('#submit').hide();
    $('#reset').hide();   
    $('#submit').hide();
    $('#dispalySelectCourseData').hide();

    //when select tag change option then 
    $('#selectCourse').change(function(){
        $('#courseLabel').text('Currently Selected Course');
        $('#dispalySelectCourseData').show();
        $('#dispalySelectCourseData').val($('#selectCourse option:selected').html()) //get select input tag text
        $('#dispalySelectCourseData').prop( "disabled", true);
        $('#selectCourse').hide();
        $('#mainDiv').show();
        $('#inputDiv').show();
        $('#createCategory').show();
        $('#reset').show();
        $('#submit').show();
        
    });

    //when Edit click (beside lable taf) then
    $('#editSelectCourse').click(function(){
        $('#courseLabel').text('Selected Course');
        $('#selectCourse').show();
        // $('#dispalySelectCourseData').prop("disabled", true);
        $('#dispalySelectCourseData').val('');
        $('#dispalySelectCourseData').hide();  
        $('#mainDiv').hide();
        $('#createCategory').hide();
        $('#reset').hide();
        $('#submit').hide();
    });

    // when click + button/icon then append new input tag
    $('#addInputTagBtn').click(function(){
        $('#mainDiv').append(`<div id="inputDiv" class="mx-2">
        <div class="form-group w-100">
          <label for="example-email-input" class="form-control-label">Enter Category Name</label>
          <input class="form-control" name="category_name[]" type="text" placeholder="Snow" id="example-text-input">
        </div>
        <div id="addRemoveBtnDiv">
          <span id="removeInputTagBtn" style="font-size: 30px;">-</span>
        </div>
      </div>`)
    });

     // when click - button/icon then remove new added input tag
    $(document).on('click', '#removeInputTagBtn', function () {
        $(this).closest('#inputDiv').remove();
    });

    //when reset button cliced then
    $('#reset').click(function(){
        $('#courseLabel').text('Selected Course');
        $('#selectCourse').show();
        // $('#dispalySelectCourseData').prop( "disabled", true);
        $('#dispalySelectCourseData').val('');
        $('#dispalySelectCourseData').hide();  
        $('#mainDiv').hide();
        $('#createCategory').hide();
        $('#reset').hide();
        $('#submit').hide();
    });


// =========================AJAX AJAX AJAX=========================== 
// =========================AJAX AJAX AJAX=========================== 
    //when Submit button clicke data is send on server using AJAX
    $("#createCategoryForm").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        $.ajax({
            type: "POST",
            url: "php/buttonActionCenter.php",
            data: $("#createCategoryForm").serializeArray(),// serializes the form's elements.
            success: function(data)
            {
                
                alert(data); // show response from the php script.
                $("#reset").click();
                // $("#resultOutput").html(data);
                // console.log(data);
            }
          }); 
    });
    

   
});
// ***************END Create Category**********************

