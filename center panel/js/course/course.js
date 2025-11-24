function toggle(value){
    if(value == "btn1"){
        console.log("button 1 click");
        document.getElementById('btn1').classList.remove("bg-gradient-success");
        document.getElementById('btn1').style.backgroundColor='#fff';
        document.getElementById('btn2').classList.add("bg-gradient-success");
        document.getElementById('table').style.display='block';
        document.getElementById('addStudentForm').style.display='none';
    }
    else if(value == "btn2"){
        console.log("button 2 click");
        document.getElementById('btn1').classList.add("bg-gradient-success");
        document.getElementById('btn2').classList.remove("bg-gradient-success");
        document.getElementById('btn2').style.backgroundColor='#fff';
        document.getElementById('table').style.display='none';
        document.getElementById('addStudentForm').style.display='block';
    }
}