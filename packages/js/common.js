var CONFIG = (function() {
    var private = {
        'SERVICE_CHANGE_STATUS': 'service_change_status',
        'SERVICE_DELETE': 'service_delete',        
        'PET_CHANGE_STATUS': 'pet_change_status',
        'PET_DELETE': 'pet_delete' 
    };

    return {
        get: function(name) {
            return private[name];
        }
    };

})();


/**
 * To execute ajax request
 *
 * {_elem} HTMLObject on which triggers ajax event
 * {parameters} Parameters that we need to send to server
 */
function executeAjaxRequest(_elem, parameters, replace) {
    var res;
    $.ajax({
        async: false,
        url: BASE_URL + "/ajax",
        type: "POST",
        data: parameters,
        dataType: "JSON",
        beforeSend: function() {
            if (replace && _elem)
                _elem.replaceWith("<img id='loader' src='" + BASE_URL + "/packages/images/loader.gif' />");
        },
        success: function(msg) {
            res = msg;
            if (replace) {
                $("#loader").replaceWith(_elem);
            }
        }
    });

    return res;
}



$(function() {
    var regionAutoSelect = $("#regions");
    $(document).on('change', '#categories', function() {
        var adventure = $(this).val();
        var data = {'cat': adventure, 'type': CONFIG.get('SEARCH_REGION_CAT')};
        var response = executeAjaxRequest("", data, false);
        var parsedResponse = JSON.parse(response);
        if (parsedResponse.valid == 1 && parsedResponse.region != '') {
            $("#regions").replaceWith(parsedResponse.region);
        } else {
            $("#regions").replaceWith(regionAutoSelect);
            makeRegionAutoComplete();
        }
    });

    $(document).on('submit', '#searchToursfrm', function() {
        var data = {"type": CONFIG.get('SEARCH_AUTOCOMPLETE'),
            "search": $("#regions").val(),
            "cat": $("#categories").val(),
            "look_from": 'regions'};
        var response = executeAjaxRequest("", data);
        var obj = JSON.parse(response);

        if (obj.length !== 0 && $("#regions").val() != '') {
            $("#regions").val(obj[0].value);
        } else if ($("#regions").val()) {
            $("#regions").val($("#regions").val());
        } else {
            $("#regions").val('');
        }
    });

   
});
