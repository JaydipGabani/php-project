/**
 * Created by maunil on 01-12-2016.
 */

var base_url = $("#base_url").text(); //Very important !!!!

function searchbom() {
    var optionBOM=$('#bom-option').val();
    var searchvalOfBOM=$('#bom-search-val').val();
    var searchedData=JSON.parse('{"server":"",' +
        '"BomDelete":"orderController/deleteBom",' +
        '"orderToStock":"orderController/OrdertoStock",' +
        '"InStock":"orderController/allocate",' +
        '"bomdata":[],'+
        '"orderdata":[],'+
        '"instockdata":[]}');
    searchedData.server=base_url;
    console.log(searchedData);

    switch (optionBOM){
        case 'Projectid':
            $(function() {
                $.each(allData.bomdata, function(i, v) {
                    if (v.Projectid.search(searchvalOfBOM) != -1) {
                        searchedData.bomdata.push(v);
                        searchBtnBOM(searchedData);
                    }
                });
            });
            break;
        case 'NorexID':
            $(function() {
                $.each(allData.bomdata, function(i, v) {
                    if (v.NorexID.search(searchvalOfBOM) != -1) {
                        searchedData.bomdata.push(v);
                        searchBtnBOM(searchedData);
                    }
                });
            });
            break;
        case 'AstroDieNo':
            $(function() {
                $.each(allData.bomdata, function(i, v) {
                    if (v.AstroDieNo.search(searchvalOfBOM) != -1) {
                        searchedData.bomdata.push(v);
                        searchBtnBOM(searchedData);
                    }
                });
            });
            break;
        case 'Qty':
            $(function() {
                $.each(allData.bomdata, function(i, v) {
                    if (v.Qty.search(searchvalOfBOM) != -1) {
                        searchedData.bomdata.push(v);
                        searchBtnBOM(searchedData);
                    }
                });
            });
            break;
        case 'Color':
            $(function() {
                $.each(allData.bomdata, function(i, v) {
                    if (v.Color.search(searchvalOfBOM) != -1) {
                        searchedData.bomdata.push(v);
                        searchBtnBOM(searchedData);
                    }
                });
            });
            break;
    }
}
function searchBtnBOM(a) {
    var BOMtemplate = Handlebars.templates['OrderModuleBOM'](a);
    $('#BOM-tuples').html(BOMtemplate);
    $('.collapsible').collapsible({
        accordion : false
    });
}


function searchorder() {
    var optionOrderList=$('#order-list-option').val();
    var searchvalOfOrderList=$('#order-list-search-val').val();
    var searchedData=JSON.parse('{"server":"",' +
        '"BomDelete":"orderController/deleteBom",' +
        '"orderToStock":"orderController/OrdertoStock",' +
        '"InStock":"orderController/allocate",' +
        '"bomdata":[],'+
        '"orderdata":[],'+
        '"instockdata":[]}');
    searchedData.server=base_url;
    switch (optionOrderList){
        case 'Projectid':
            $(function() {
                $.each(allData.orderdata, function(i, v) {
                    if (v.ProjId.search(searchvalOfOrderList) != -1) {
                        searchedData.orderdata.push(v);
                        searchBtnOrderList(searchedData);
                    }
                });
            });
            break;
        case 'NorexID':
            $(function() {
                $.each(allData.orderdata, function(i, v) {
                    if (v.Norex.search(searchvalOfOrderList) != -1) {
                        searchedData.orderdata.push(v);
                        searchBtnOrderList(searchedData);
                    }
                });
            });
            break;
        case 'Qty':
            $(function() {
                $.each(allData.orderdata, function(i, v) {
                    if (v.Qty.search(searchvalOfOrderList) != -1) {
                        searchedData.orderdata.push(v);
                        searchBtnOrderList(searchedData);
                    }
                });
            });
            break;
        case 'Color':
            $(function() {
                $.each(allData.orderdata, function(i, v) {
                    if (v.Color.search(searchvalOfOrderList) != -1) {
                        searchedData.orderdata.push(v);
                        searchBtnOrderList(searchedData);
                    }
                });
            });
            break;
    }
}
function searchBtnOrderList(a) {
    var OrderListtemplate = Handlebars.templates['OrderModuleOrderlist'](a);
    $('#order-list').html(OrderListtemplate);
    $('.collapsible').collapsible({
        accordion : false
    });
    $('select').material_select();
}




function searchinstock() {
    var optionInStock=$('#instock-option').val();
    var searchvalOfInStock=$('#instock-search-val').val();
    var searchedData=JSON.parse('{"server":"",' +
        '"BomDelete":"orderController/deleteBom",' +
        '"orderToStock":"orderController/OrdertoStock",' +
        '"InStock":"orderController/allocate",' +
        '"bomdata":[],'+
        '"orderdata":[],'+
        '"instockdata":[]}');
    searchedData.server=base_url;
    switch (optionInStock){
        case 'Site':
            $(function() {
                $.each(allData.instockdata, function(i, v) {
                    if (v.Location.search(searchvalOfInStock) != -1) {
                        searchedData.instockdata.push(v);
                        searchBtninstock(searchedData);
                    }
                });
            });
            break;
        case 'NorexID':
            $(function() {
                $.each(allData.instockdata, function(i, v) {
                    if (v.Norex.search(searchvalOfInStock) != -1) {
                        searchedData.instockdata.push(v);
                        searchBtninstock(searchedData);
                    }
                });
            });
            break;
        case 'LocOnSite':
            $(function() {
                $.each(allData.instockdata, function(i, v) {
                    if (v.LocOnSite.search(searchvalOfInStock) != -1) {
                        searchedData.instockdata.push(v);
                        searchBtninstock(searchedData);
                    }
                });
            });
            break;
        case 'Qty':
            $(function() {
                $.each(allData.instockdata, function(i, v) {
                    if (v.Qty.search(searchvalOfInStock) != -1) {
                        searchedData.instockdata.push(v);
                        searchBtninstock(searchedData);
                    }
                });
            });
            break;
        case 'Color':
            $(function() {
                $.each(allData.instockdata, function(i, v) {
                    if (v.Color.search(searchvalOfInStock) != -1) {
                        searchedData.instockdata.push(v);
                        searchBtninstock(searchedData);
                    }
                });
            });
            break;
    }
}
function searchBtninstock(a) {
    var InStocktemplate = Handlebars.templates['OrderModuleInstock'](a);
    $('#Instock').html(InStocktemplate);
    $('.collapsible').collapsible({
        accordion : false
    });

}


