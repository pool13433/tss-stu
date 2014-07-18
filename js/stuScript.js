$(function() {
    $('#birthdate').datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd',
    });
    datePickerBeTween();
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
    $("#from").datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        onClose: function(selectedDate) {
            $("#to").datepicker("option", "minDate", selectedDate);
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
function deleteItem(id, url) {
    if (confirm('ยืนยันการลบ รหัส: ' + id + " ใช่หรือไม่")) {
        $.ajax({
            url: url,
            data: {id: id},
            type: 'POST',
            success: function(data) {
                //alert(data);
                if (data) {
                    window.location.reload();
                } else {
                    alert('ลบไม่สำเร็จ เกิดข้อผิดพลาด');
                }
            }
        });
    }
}

