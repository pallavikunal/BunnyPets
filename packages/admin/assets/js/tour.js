var date = new Date();
date.setDate(date.getDate() + 1);
function _initializeDatePicker(id)
{
    var days = 32 - parseInt(date.getDate());
    $("#date_start_" + id).datepicker({
        defaultDate: "+1d",
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        minDate: "+1d",
        maxDate: "+21M +" + days + "D",
        onSelect: function(selectedDate) {
            $("#date_end_" + id).datepicker("option", "minDate", selectedDate);
            $("#date_end_" + id).datepicker("option", "setDate", selectedDate);
        }
    });

    $("#date_end_" + id).datepicker({
        defaultDate: "+1d",
        changeMonth: true,
        dateFormat: "yy-mm-dd",
        minDate: "+1d",
        maxDate: "+21M +" + days + "D",
        onSelect: function(selectedDate) {
            $("#date_start_" + id).datepicker("option", "defaultDate", selectedDate);
        }
    });

    if (id > 0) {
        var prevId = parseInt(id) - 1;
        var prevEndDate = $("#date_end_" + prevId).datepicker("getDate");
        if (prevEndDate instanceof Date) {
            prevEndDate.setDate(prevEndDate.getDate() + 1);
            $("#date_start_" + id).datepicker("setDate", prevEndDate);
            $("#date_start_" + id).datepicker("option", "minDate", prevEndDate);
            $("#date_end_" + id).datepicker("option", "minDate", prevEndDate);
            $("#date_start_" + id).datepicker("refresh");
//            /$("#date_start_" + id).datepicker("show");
        }
    }
}

function showDateOptions(dateOption)
{
    if (dateOption == 2) {
        $("#radioRandomDate").iCheck('uncheck');
        $("#radioRangeDate").iCheck('check');

        $("#dateRangeWrapper").show();
        $("#individualDates").hide();
    } else {
        $("#radioRandomDate").iCheck('check');
        $("#dateRangeWrapper").hide();
        $("#individualDates").show();
    }
}

function showDatePickers(rangeInput)
{
    if (rangeInput > 0) {
        for (var iterator = 1; iterator <= rangeInput; iterator++) {
            _initializeDatePicker(iterator);
        }
    }
}
$(function() {
    $(':radio[name="dateType"]').on('ifChecked', function() {
        var option = parseInt($(this).val());
        if (option == 1) {
            $("#individualDates").show();
            $("#dateRangeWrapper").hide();
        }
        if (option == 2) {
            $('#dates').multidatepicker('hide');
            $("#individualDates").hide();
            $("#dateRangeWrapper").show();

        }
    });

    $('#activity_timing').timepicker({
        defaultTime: false,
        showMeridian: true
    });

    $(document).on('click', '.removeDate', function() {
        $(this).parent().parent().remove();
        var datePickerSize = $(".date-range-picker").size();
        if (datePickerSize <= 5) {
            $(".addDate").show();
        }
    });

    $(document).on('click', ".addDate", function(event) {
        var dateCloneObject = $('#span-date-range-picker').clone();
        var size = $(".date-range-picker").size();
        dateCloneObject.css('margin-top', '4px');
        dateCloneObject.removeAttr('id');
        dateCloneObject.find('input[name="startdate[]"]')
                .removeClass('hasDatepicker')
                .attr('id', "date_start_" + (size))
                .val("");
        dateCloneObject.find('input[name="enddate[]"]')
                .removeClass('hasDatepicker')
                .attr('id', "date_end_" + (size))
                .val("");
        dateCloneObject.find('input[type="button"]')
                .removeClass('addDate')
                .addClass('removeDate')
                .val('-');
        $("#moreDateRange").append(dateCloneObject);
        _initializeDatePicker(size);
        if (size >= 5) {
            $(this).hide();
            event.preventDefault();
        }
    });

    $('#dates').multidatepicker({
        multidate: true,
        startDate: date,
        format: "yyyy-mm-dd",
        endDate: new Date(date.getFullYear() + 2, 11, 30)
    });

    $(".textarea-editor").wysihtml5();
    $(document).on('change', "#country", function() {
        var _self = $(this);
        var data = {"country": _self.val(),
            "type": CONFIG.get('TOUR_COUNTRY_STATE')}
        var res = executeAjaxRequest(_self, data);
        $('#state').replaceWith(res);
    });

    $(document).on('change', "#state", function() {
        var _self = $(this);
        var data = {"state": _self.val(),
            "type": CONFIG.get('TOUR_REGION_STATE')}
        var res = executeAjaxRequest(_self, data);
        $('#region').replaceWith(res);
    });

    $(document).on('change', "#region", function() {
        var isOther = $("#region").val();
        if (isOther == "other") {
            $("#otherCity").css("display", "block")
        } else {
            $("#otherCity").css("display", "none")
        }
    });
    var isOther = $("#region").val();
    if (isOther == "other") {
        $("#otherCity").css("display", "block")
    }
});