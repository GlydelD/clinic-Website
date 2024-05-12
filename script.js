//for sign-in and log-in switching of container :)  
document.addEventListener("DOMContentLoaded", function() {
    var patientInformationCont = document.getElementById("patients-informtions-incont");
    var patientsReportsCont = document.getElementById("patients-reports-incont");

function togglePages() {

    if (patientInformationCont.style.display === "none") {
        patientInformationCont.style.display = "flex";
    } else {
        patientInformationCont.style.display = "none";
    }

    if (patientsReportsCont.style.display === "none") {
        patientsReportsCont.style.display = "flex";
    } else {
        patientsReportsCont.style.display = "none";
    }
}
// var patientsSaveButton = document.querySelector(".patientsSaveButton");
//     if (patientsSaveButton) {
//         patientsSaveButton.addEventListener("click", togglePages);
//     }
}
);
    document.addEventListener("DOMContentLoaded", function () {
    var l = document.getElementById("modal-box").style.display = "none";
    
    });

    function modalClose(){

    var l = document.getElementById("modal-box");
    var g = document.getElementById("patients-informtions-incont");

    if(l.style.display === "none" || l.style.display === "") {
        l.style.display = "block";
    }else {
        l.style.display = "none";
        g.style.transform = "translateY(-110%)";
    }
    }


    function callValues(){

        var l = document.getElementById("modal-box");

        if(l.style.display === "none" || l.style.display === "") {
            l.style.display = "block";
        }else {
            l.style.display = "none";
        }


        var fName = document.getElementById("firstName").value;
        document.getElementById("fNameLbl").innerHTML = "<b>Firstname: " +fName;
        var mName = document.getElementById("midName").value;
        document.getElementById("mNameLbl").innerHTML = "<b>Middlename: " +mName;
        var lName = document.getElementById("lastName").value;
        document.getElementById("lNameLbl").innerHTML = "<b>Lastname: " +lName;
        var ageLabel = document.getElementById("age").value;
        document.getElementById("ageLbl").innerHTML = "<b>Age: " +ageLabel;
        var sexLabel = document.getElementById("sex").value;
        document.getElementById("sexLbl").innerHTML = "<b>Sex: " +sexLabel;
        var birthdate = document.getElementById("birthdate").value;
        document.getElementById("birthdayLbl").innerHTML = "<b>Birthday: " +birthdate;
        var course = document.getElementById("course").value;
        document.getElementById("courseLbl").innerHTML = "<b>Course: " +course;
        var address = document.getElementById("address").value;
        document.getElementById("addressLbl").innerHTML = "<b>Address: " +address;
        var cNumber = document.getElementById("cNumber").value;
        document.getElementById("cNumberLbl").innerHTML = "<b>Contact Number: " +cNumber;
        var parentName = document.getElementById("parentName").value;
        document.getElementById("parentNameLbl").innerHTML = "<b>Parent/Guadian Name: " +parentName;
        var parentCNumber = document.getElementById("parentCNumber").value;
        document.getElementById("parentCnumberLbl").innerHTML = "<b>Contact Number: " +parentCNumber;
    }

    function showConfirmModal() {
        var l = document.getElementById("modal-box");

        if(l.style.display === "none" || l.style.display === "") {
            l.style.display = "block";
        }else {
            l.style.display = "none";
        }
    }
// --------------------------------------------
    //for prompting message 
    document.addEventListener('DOMContentLoaded', function () {
        const signInForm = document.querySelector('#sign-incont');
        const signInPasswordInput = document.querySelector('#sign-incont input[name="sign_in_password"]');
        const signInConfirmPasswordInput = document.querySelector('#sign-incont input[name="sign_in_confirmPassword"]');
    
        signInForm.addEventListener('submit', function (event) {
            if (signInPasswordInput.value.length < 8 || signInConfirmPasswordInput.value.length < 8) {
                event.preventDefault();
                alert("Your password must be at least 8 characters long.");
            } else if (signInPasswordInput.value !== signInConfirmPasswordInput.value) {
                event.preventDefault();
                alert("Passwords do not match.");
            }
        });
    });
    
  
    