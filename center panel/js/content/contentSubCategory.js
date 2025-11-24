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


// ===================================================================
// ********** START View Sub Category List ***************************
// ===================================================================
$( document ).ready(function() {
    //when select tag change option then 
    $('#categoryDivForView').hide();
    // $('#viewCategoryTbody').hide()

    $('#selectCourseForView').change(function(){
        $('#courseLableForView').text('Currently Selected Category');
        $('#viewSubCategoryTbody').hide()
        $('#categoryDivForView').show();
        // console.log("its working");
        course = $('#selectCourseForView').val();
        cid = $('#cid').val();
        
        $.get( "php/buttonActionCenter.php", { course: course, cid: cid , action: "viewCategory", type : "selectOption"} ,function(data) {
          $( "#selectCategoryForView").html('<option value="">-- Select Category --</option>'+data);
        });

    });
    $('#selectCategoryForView').change(function(){
        $('#viewSubCategoryTbody').show();
        cid = $('#cid').val();
        course = $('#selectCourseForView').val();
        category = $('#selectCategoryForView').val();
      
        $.get( "php/buttonActionCenter.php", { course: course, cid: cid , category: category , action: "viewSubCategory", type: "table"} ,function(data) {
            $( "#viewSubCategoryTbody").html(data);
            // alert(data);
        });
    });

});
// ******************* END View Sub Category List ******************



// ===================================================================
// ********** START Create Sub category ****************************
// ===================================================================
$( document ).ready(function() {

    //When dom load per hide element
    $('#inputDiv').hide();
    $('#submit').hide();
    $('#reset').hide();   
    $('#categoryDiv').hide();

    //when select course tag change option then 
    $('#selectCourse').change(function(){
        $('#courseLabel').text('Currently Selected Course'); 
        // console.log("its working");
        course = $('#selectCourse').val();
        cid = $('#cid').val();
        
        $.get( "php/buttonActionCenter.php", { course: course, cid: cid , action: "viewCategory", type : "selectOption"} ,function( data ) {
          $( "#selectCategory").html('<option value="">-- Select Category --</option>'+data);
        //   alert( data );
            // console.log(data);
        });
        $('#categoryDiv').show();
        $('#mainDiv').hide();
        $('#reset').hide();
        $('#submit').hide();
    });

    //when select Category tag change option then 
    $('#selectCategory').change(function(){
        $('#categoryLable').text('Currently Selected Category');
        $('#mainDiv').show();
        $('#inputDiv').show();
        $('#reset').show();
        $('#submit').show();
        
    });

    // when click + button/icon then append new input tag
    $('#addInputTagBtn').click(function(){
        $('#mainDiv').append(`<div id="inputDiv" class="mx-2">
        <div class="form-group w-100">
          <label for="example-email-input" class="form-control-label">Enter Sub Category Name</label>
          <input class="form-control" name="sub_category_name[]" type="text" placeholder="Snow" id="example-text-input">
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
        $('#categoryDiv').hide();
        $('#mainDiv').hide();
        $('#reset').hide();
        $('#submit').hide();
    });


// =========================AJAX AJAX AJAX=========================== 
// =========================AJAX AJAX AJAX=========================== 
    //when Submit button clicke data is send on server using AJAX
    $("#createSubCategoryForm").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        $.ajax({
            type: "POST",
            url: "php/buttonActionCenter.php",
            data: $("#createSubCategoryForm").serializeArray(),// serializes the form's elements.
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
// **************** END Create Sub category ******************

