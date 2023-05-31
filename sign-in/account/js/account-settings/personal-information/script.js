//Open the Date of birth panel
function date_open() {
    if (document.getElementById("year").style.display == "none") {
        document.getElementById("year").style.display = "block";
        document.getElementById("button_save").style.display = "block";
    } else {
        document.getElementById("year").style.display = "none";
        if (document.getElementById("sex_element").style.display == "none") {
             document.getElementById("button_save").style.display = "none";
        }
    }
}
//Open the Sex panel
function sex_open() {
    if (document.getElementById("sex_element").style.display == "none") {
        document.getElementById("sex_element").style.display = "block";
        document.getElementById("button_save").style.display = "block";
    } else {
        document.getElementById("sex_element").style.display = "none";
        if (document.getElementById("year").style.display == "none") {
            document.getElementById("button_save").style.display = "none"; 
        }
    }
}

//When the value from a radio button change
var male_v = document.getElementById("male").value;
var female_v = document.getElementById("female").value;
function change_value_radio() {
   var male_c = document.getElementById("male").value;
   var female_c = document.getElementById("female").value;
   if (male_c == male_v || female_c == female_v) {
      document.getElementById("message_error2").innerHTML = "Click 'Save changes!' button to save your changes!";
   }
}

//Values from textboxes first
var day_f = parseInt(document.getElementById("day_text").value);
var month_f = parseInt(document.getElementById("month_text").value);
var year_f = parseInt(document.getElementById("year_text").value);
var ele1 = document.getElementsByName('sex');

//If a date of birth textbox changes
function change_values() {
   var day_t = parseInt(document.getElementById("day_text").value);
   var month_t = parseInt(document.getElementById("month_text").value);
   var year_t = parseInt(document.getElementById("year_text").value);
   if (day_t != day_f || month_t != month_f || year_t != year_f) {
      document.getElementById('error_message1').innerHTML = "Click 'Save changes!' button to save your changes!";
   }
}

//Code for form submit
function submit_fun() {
    var day_c = parseInt(document.getElementById("day_text").value);
    var month_c = parseInt(document.getElementById("month_text").value);
    var year_c = parseInt(document.getElementById("year_text").value);
    var ele = document.getElementsByName('sex');
    var sex_c = "";
    for(i = 0; i < ele.length; i++) {
        if(ele[i].checked) {
            sex_c =ele[i].value;
        }
    }
    var sex_f = "";
    for(i = 0; i < ele1.length; i++) {
        if(ele1[i].checked) {
            sex_f = ele1[i].value;
        }
    }
    if (day_c != day_f || month_c != month_f || year_c != year_f || sec_c != sex_f) {
        document.getElementById("year_text").style.border = "2px solid #1a0033fa";
        document.getElementById("day_text").style.border = "2px solid #1a0033fa";
        document.getElementById("month_text").style.border = "2px solid #1a0033fa";
        var max = new Date().getFullYear();
        min = max - 99;
        var r_true = 0;
        var day_check = 0;
        var month_check = 0;
        var year_check = 0;
        if (sex_c != sex_f) {
            r_true++;
        }
        for (var i = min; i <= max-5; i++) {
            if (year_c == i) {
                r_true++;
                year_check = 1;
            } 
        }
        if (day_c > 0 && day_c < 32) {
            r_true++;
            if (day_c < 10) {
                string = day_c.toString();
                document.getElementById("day_text").value = "0" + day_c.toString();
            }
            day_check = 1;
        }
        if (month_c > 0 && month_c < 13) {
            r_true++;
            if (month_c < 10) {
                string = month_c.toString();
                document.getElementById("month_text").value = "0" + string;
            }
            month_check = 1;
        }
        if (r_true >= 0) {
            //return true;
        } else {
            document.getElementById('error_message1').innerHTML = "*Change the values in the fields and then press the 'Save changes!' button!";
            if (year_check === 0) {
                document.getElementById("year_text").style.border = "2px solid #ff0000";
            }
            if (day_check === 0) {
                document.getElementById("day_text").style.border = "2px solid #ff0000";
            }
            if (month_check === 0) {
                document.getElementById("month_text").style.border = "2px solid #ff0000";
            }
            return false;
        }
    } else {
        document.getElementById('error_message1').innerHTML = "*You don't change the values in the fields to save the changes!";
        document.getElementById("year_text").style.border = "2px solid #ff0000";
        document.getElementById("day_text").style.border = "2px solid #ff0000";
        document.getElementById("month_text").style.border = "2px solid #ff0000";
        return false;
    }
}