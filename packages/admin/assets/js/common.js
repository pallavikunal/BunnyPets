var CONFIG = (function() {
    var private = {
        'CATEGORY_CHANGE_STATUS': 'category_change_status',
        'CATEGORY_DELETE': 'category_delete',
        'CATEGORY_TOP': 'category_make_top',
        'COUNTRY_CHANGE_STATUS': 'country_change_status',
        'COUNTRY_DELETE': 'country_delete',
        'STATE_CHANGE_STATUS': 'state_change_status',
        'STATE_DELETE': 'state_delete',
        'REGION_CHANGE_STATUS': 'region_change_status',
        'REGION_DELETE': 'region_delete',
        'REGION_TOP': 'region_make_top',
        'SITEMAP_CHANGE_STATUS': 'sitemap_change_status',
        'SITEMAP_DELETE': 'sitemap_delete',
        'COUNTRY_STATE': 'state_by_country',
        'TOUR_CHANGE_STATUS': 'tour_change_status',
        'TOUR_COUNTRY_STATE': 'tour_state_by_country',
        'TOUR_REGION_STATE': 'tour_region_state',
        'SEARCH_SITEUSER': 'search_site_user',
        'TOUR_SEARCH_SORT': 'tour_search_sort',
        'TOUR_ADD_TO_CART': 'tour_add_to_cart',
        'CART_REMOVE': 'cart_from_remove',
        'TOUR_BLOCK': 'block_tour_status',
        'REVIEW_CHANGE_STATUS': 'review_change_status',
        'BOOKING_SEND_MAIL_POPUP': 'booking_send_mail_popup',
        'BOOKING_SEND_MAIL_SUBMIT': 'booking_send_mail_submit',
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
 * {replace} Flag To replace trigger component or not
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
                _elem.replaceWith("<img id='loader' src='" + BASE_URL + "/packages/admin/assets/img/loader.gif' />");
        },
        success: function(msg) {
            res = msg;
        }
    });

    return res;
}
