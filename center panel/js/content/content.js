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
    $('#subCategoryDivForView').hide()

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
  
        $.get( "php/buttonActionCenter.php", { course: course, cid: cid , category: category , action: "viewSubCategory", type: "selectOption"} ,function(data) {
            // $( "#viewSubCategoryTbody").html(data);
            $( "#selectSubCategoryForView").html('<option value="">-- Select Category --</option>'+data);
            // alert(data);
        });
        $('#subCategoryDivForView').show();
    });

    $('#selectSubCategoryForView').change(function(){
        cid = $('#cid').val();
        course = $('#selectCourseForView').val();
        category = $('#selectCategoryForView').val();
        sub_category = $('#selectSubCategoryForView').val();

        $.get( "php/buttonActionCenter.php", { course: course, cid: cid , category: category , sub_category: sub_category , action: "viewContent", type: "table"} ,function(data) {
            $( "#viewSubCategoryTbody").html(data);
        });
    });
});
// ******************* END View Sub Category List ******************



// ===================================================================
// ********** START Create Sub category ****************************
// ===================================================================
$( document ).ready(function() {

    //When dom load per hide element
    $('#mainDiv').hide();
    $('#submit').hide();
    $('#reset').hide();   
    $('#categoryDiv').hide();
    $('#subCategoryDiv').hide();

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
        $('#subCategoryDiv').hide();
        $('#mainDiv').hide();
        $('#reset').hide();
        $('#submit').hide();
    });

    //when select Category tag change option then 
    $('#selectCategory').change(function(){
        $('#categoryLable').text('Currently Selected Category');
        category = $('#selectCategory').val();
        $.get( "php/buttonActionCenter.php", { course: course, cid: cid ,category: category, action: "viewSubCategory", type : "selectOption"} ,function( data ) {
            $( "#selectSubCategory").html('<option value="">-- Select Category --</option>'+data);
          //   alert( data );
              // console.log(data);
          });
          $('#subCategoryDiv').show();
    });

    //when select Sub Category tag change option then 
    $('#selectSubCategory').change(function(){
        $('#subCategoryLable').text('Currently Selected Category');
        $('#mainDiv').show();
        $('#inputDiv').show();
        $('#reset').show();
        $('#submit').show();
        
    });
    

    // when click + button/icon then append new input tag
    $('#addInputTagBtn').click(function(){
      $('#mainBox').append(`<div class="row p-0" id="mainDiv">
      <div id="inputDiv" class="col-sm mx-2">
        <div class="form-group w-100">
          <label for="example-email-input" class="form-control-label">Enter Content Title </label>
          <input class="form-control" name="content_title[]" type="text" placeholder="Snow"
            id="example-text-input">
        </div>
      </div>
      <div id="inputDiv" class="col-sm mx-2">
        <div class="form-group w-100">
          <label for="example-email-input" class="form-control-label">Enter Source/Link </label>
          <input class="form-control" name="content_source[]" type="text" placeholder="Snow"
            id="example-text-input">
        </div>
        <div id="addRemoveBtnDiv">
          <span id="removeInputTagBtn" style="font-size: 30px;">-</span>
        </div>
      </div>
    </div>`)
    });

     // when click - button/icon then remove new added input tag
    $(document).on('click', '#removeInputTagBtn', function () {
        $(this).closest('#mainDiv').remove();
    });

    //when reset button cliced then
    $('#reset').click(function(){
        $('#courseLabel').text('Selected Course');
        $('#subCategoryDiv').hide();
        $('#categoryDiv').hide();
        $('#mainDiv').hide();
        $('#mainBox').hide();
        $('#reset').hide();
        $('#submit').hide();
    });


// =========================AJAX AJAX AJAX=========================== 
// =========================AJAX AJAX AJAX=========================== 
    //when Submit button clicke data is send on server using AJAX
    $("#addContentForm").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        $.ajax({
            type: "POST",
            url: "php/buttonActionCenter.php",
            data: $("#addContentForm").serializeArray(),// serializes the form's elements.
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

