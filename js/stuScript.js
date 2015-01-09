$(function() {
    $('#birthdate').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd',
    });
    datePickerBeTween();
    //mutiselectCheck_single();
    //mutiselectCheck_muti();

});
function tableGridPagination(sizePage) {
//$(document).ready(function() {
    var oTable = $('.tablePagination').dataTable({
        "bSort": true, // Disable sorting
        //"order": [[columnSortDesc, "desc" ]],
        "iDisplayLength": sizePage, //records per page
        //"sDom": "t<'row'<'col-md-6'i><'col-md-6'p>>",
        //"bJQueryUI": true, // color header yellow
        //"sPaginationType": "full_numbers",
        "sDom": "<'row'<'col-xs-9'l><'col-xs-3'f>r>t<'row'<'col-xs-8'i><'col-xs-4'p>>",
        "sPaginationType": "bootstrap",
        "oLanguage": {
            "sLengthMenu": "_MENU_ รายการต่อหน้า",
            "sSearch": ""
        }
    });
    //oTable.fnSort( [ [columnSortDesc,'desc']] );
    $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'ค้นหาข้อมูล...');
    $('.dataTables_length select').addClass('form-control');
    return oTable;
    //});
}
function showUrlInDialog(url, id) {
    //var url = 'd_Order.php';
    var tag = $("<div></div>");
    $.ajax({
        url: url,
        type: "POST",
        data: {
            id: id,
        },
        success: function(data) {
            tag.html(data).dialog({
                modal: true,
                width: "85%",
                height: 700,
                position: ['center', 100],
                buttons: {
                    "ปิดหน้าต่าง": function() {
                        $(this).dialog("close");
                    },
                }
            }).dialog('open');
        }
    });
}
function datePickerBeTween() {
    var total_date = $("#from").parent();
    //total_date.append('<input type="text" name="total_date" id="total" />');
    $("#from").datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        onClose: function(selectedDate) {
            $("#to").datepicker("option", "minDate", selectedDate);
            /*
             var arrDate = $("#to").val().split('-');
             alert(arrDate[1]);
             $('#total').val(arrDate[2]);*/
        }
    });
    $("#to").datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        onClose: function(selectedDate) {
            $("#from").datepicker("option", "maxDate", selectedDate);
        }
    });
}
function datePicker1Day() {
    $('#day').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd',
    });
}
function deleteItem(id, url) {
    if (confirm('ยืนยันการลบ รหัส: ' + id + " ใช่หรือไม่")) {
        $.ajax({
            url: url,
            data: {id: id},
            type: 'POST',
            success: function(data) {
                // alert(data);
                if (data) {
                    window.location.reload();
                } else {
                    alert('ลบไม่สำเร็จ เกิดข้อผิดพลาด');
                }
            }
        });
    }
}



function CheckExtension(file) {
    var validFilesTypes = ["bmp", "gif", "png", "jpg", "jpeg",
        "doc", "docx", "xls", "xlsx", "rar", "zip", "txt", "pdf"];
    /*global document: false */
    var filePath = file.value;
    var ext = filePath.substring(filePath.lastIndexOf('.') + 1).toLowerCase();
    var isValidFile = false;

    for (var i = 0; i < validFilesTypes.length; i++) {
        if (ext == validFilesTypes[i]) {
            isValidFile = true;
            break;
        }
    }

    if (!isValidFile) {
        file.value = null;
        alert("Invalid File. Valid extensions are:\n\n" + validFilesTypes.join(", "));
    }

    return isValidFile;
}
function CheckFileSize(file) {
    var validFileSize = 15 * 1024 * 1024;
    /*global document: false */
    var fileSize = file.files[0].size;
    var isValidFile = false;
    if (fileSize !== 0 && fileSize <= validFileSize) {
        isValidFile = true;
    }
    else {
        file.value = null;
        alert("File Size Should be Greater than 0 and less than 15 MB.");
    }
    return isValidFile;
}
function CheckFile(file) {
    var isValidFile = CheckExtension(file);

    if (isValidFile)
        isValidFile = CheckFileSize(file);

    return isValidFile;
}
function jqueryMutiSelect($input) {
    var parent = $('.mutiselect').parent();
    parent.append('<input type="text" name="' + $input + '" class="getmutiselect"/>');
    //var multiple = $('.mutiselect').attr('multiple');

    $('.mutiselect').multiSelect({
        afterSelect: function(value, text) {
            var get_val = $('input[name=' + $input + ']').val();
            var hidden_val = (get_val != "") ? get_val + "," : get_val;
            $('input[name=' + $input + ']').val(hidden_val + "" + value);
        },
        afterDeselect: function(value, text) {
            var get_val = $('input[name=' + $input + ']').val();
            var new_val = get_val.replace(value, "");
            $('input[name=' + $input + ']').val(new_val);
        }
    });
}
function comboChild(object) {
    return new Option(object.pac_name, object.pac_id);
    //return '<option value="' + object.pac_id + '">' + object.pac_name + '</option>';
}
function mutiselectCheck_muti() {
    $('.mutiselect').multipleSelect({
        //width: 460,
        width: '100%',
        filter: true,
        //isOpen: true,
        keeyOpen: true,
        //selectAll: false,
        //multiple: true,
        //multipleWidth: 55
        position: 'bottom',
    });
    $('.mutiselect').click(function() {
        $('#getSelectsBtn').attr('checked', false);
    });
    $('#getSelectsBtn').click(function() {
        //alert("Selected values: " + $("select").multipleSelect("getSelects"));
        //alert("Selected texts: " + $("select").multipleSelect("getSelects", "text"));
        if (this.checked) {
            $('.inputMutiselect').val($("select").multipleSelect("getSelects"));
        } else {
            $('.inputMutiselect').val("");
        }
    });
}
function mutiselectCheck_single() {
    $('select').multipleSelect("setSelects", [9]);
    $('.singleselect').multipleSelect({
        //width: 460,
        width: '100%',
        filter: true,
        //isOpen: true,
        keeyOpen: true,
        single: true,
        //selectAll: false,
        //multiple: true,
        //multipleWidth: 55
        position: 'bottom',
    });
    $('.singleselect').click(function() {
        $('#getSelectsBtn').attr('checked', false);
    });
    $('#getSelectsBtn').click(function() {
        //alert("Selected values: " + $("select").multipleSelect("getSelects"));
        // alert("Selected texts: " + $("select").multipleSelect("getSelects", "text"));
        if (this.checked) {
            $('.inputMutiselect').val($("select").multipleSelect("getSelects"));
        } else {
            $('.inputMutiselect').val("");
        }
    });
}
function select2_single(value) {
    /*$('.select2').select2({
     placeholder: {title: "Search for a movie", id: ""},
     allowClear: true,
     width: '100%',
     val: value,
     });*/
    $('.select2').select2("data", {id: 1, text: "Some Text"});
    $('.select2').change(function() {
        $('.inputMutiselect').val($('.select2').select2("val"));
    });
}
function select2_muti() {

    $('.select2').select2({
        width: '100%',
        placeholder: "Select Size ",
        //multiple: isMultiple,
        //minimumInputLength: 2,
        allowClear: true,
        //multiple: true,
    });
}
function validate() {
    var refex = "[0-9]{2}";
    var tel = $('#tel').val();
    var idcart = $('#idcart').val();
    if (refex.test(tel) || refex.test(idcart)) {
        return false;
    } else {
        return true;
    }
}
function updateClock ( ){
    var currentTime = new Date ( );
    var currentHours = currentTime.getHours ( );
    var currentMinutes = currentTime.getMinutes ( );
    var currentSeconds = currentTime.getSeconds ( );

    // Pad the minutes and seconds with leading zeros, if required
    currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
    currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

    // Choose either "AM" or "PM" as appropriate
    var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";

    // Convert the hours component to 12-hour format if needed
    currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;

    // Convert an hours component of "0" to "12"
    currentHours = ( currentHours == 0 ) ? 12 : currentHours;

    // Compose the string for display
    var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
    
    
    $("#clock").html(currentTimeString);
        
 }