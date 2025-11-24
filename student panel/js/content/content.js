$(document).ready(function() {
    $('.loadingMainDiv').hide();
    $( ".folderMainDiv2").hide();
    $( ".contentListMainDiv").hide();
    $(document).on('click', '.folderImg', function () {
        $('.loadingMainDiv').show();
        $('#backbtn').removeClass("bg-gradient-info");
        $('#backbtn').css({"background-color": "white", "color": "black"});
        cid = $('#cid').val();
        course = $('#course').val();
        category = $(this).parent().children('input').val();
        var scajx = $.get( "php/buttonActionStudent.php", { course: course, cid: cid , category: category , action: "viewSubCategory", type: "folder"} ,function(data) {
            $('.folderMainDiv').hide();
            $( ".folderMainDiv2").html(data);
        })
        scajx.done(function() {
            $('.loadingMainDiv').hide();
            $( ".folderMainDiv2").show();
        });
    });

    $(document).on('click', '.subfolderImg', function () {
        $( ".folderMainDiv2").hide();
        $('.loadingMainDiv').show();
        var sub_category = $(this).parent().children('input').val();
        var content_ajax = $.get( "php/buttonActionStudent.php", { course: course, cid: cid , category: category , sub_category: sub_category, action: "viewContent", type: "folder"} ,function(data) {
            $( ".contentListMainDiv").html(data);  
        })
        content_ajax.done(function() {
            $('.loadingMainDiv').hide();
            $(".contentListMainDiv").show();
          });
    });
});