
function widget_area_manager_set_area(layout_area_id, widget_area_id, page_id){
    // post this data via ajax to our blog
    // the plugin will handle auth and the rest.
    // plugin will return some javascript so we can do something fancy.
    // only work if jquery enabled.
    if(typeof jQuery == 'undefined'){
        alert("Sorry jQuery is not loaded. Please check your theme comes with jQuery");
        return false;
    }
    jQuery.ajax({
        type: "POST",
        url: window.location.href, // this should work?
        data: "widget_area_manager_hook=true&layout_area_id="+layout_area_id+"&set_widget_area_id="+widget_area_id+"&page_id="+page_id+"&current_url="+window.location.href,
        dataType: 'script'
        });
    return false;
}
function widget_area_manager_set_position(layout_area_id, position_id, page_id){
    if(typeof jQuery == 'undefined'){
        alert("Sorry jQuery is not loaded. Please check your theme comes with jQuery");
        return false;
    }
    jQuery.ajax({
        type: "POST",
        url: window.location.href, // this should work?
        data: "widget_area_manager_hook=true&layout_area_id="+layout_area_id+"&set_position_id="+position_id+"&page_id="+page_id+"&current_url="+window.location.href,
        dataType: 'script'
    });
    return false;
}
function widget_area_manager_set_position_default(layout_area_id, position_id, page_id, page_type){
    if(typeof jQuery == 'undefined'){
        alert("Sorry jQuery is not loaded. Please check your theme comes with jQuery");
        return false;
    }
    jQuery.ajax({
        type: "POST",
        url: window.location.href, // this should work?
        data: "widget_area_manager_hook=true&layout_area_id="+layout_area_id+"&set_default_position_id="+position_id+"&page_id="+page_id+"&page_type="+page_type+"&current_url="+window.location.href,
        dataType: 'script'
    });
    return false;
}
function widget_area_manager_set_widget_default(layout_area_id, widget_area_id, page_id, page_type){
    if(typeof jQuery == 'undefined'){
        alert("Sorry jQuery is not loaded. Please check your theme comes with jQuery");
        return false;
    }
    jQuery.ajax({
        type: "POST",
        url: window.location.href, // this should work?
        data: "widget_area_manager_hook=true&layout_area_id="+layout_area_id+"&set_default_widget_id="+widget_area_id+"&page_id="+page_id+"&page_type="+page_type+"&current_url="+window.location.href,
        dataType: 'script'
    });
    return false;
}