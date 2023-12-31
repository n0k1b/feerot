$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    show_all_product();


});

function get_product_list() {
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: '../get_all_retailer_list/' + homepage_section_id,
        success: function(data) {
            $("product_list").html(data);
        }
    })
}

function edit_discount_price_modal(product_percentagge, id) {
    //alert(id)
    $("#product_percentage").val(product_percentagge);
    $(".product_id").val(id);
    //alert($(".product_id").val())
    $("#edit_discount_price_modal").modal('show');
}

function update_discount_percentage() {
    var product_id = $(".product_id").val();
    var product_percentage = $("#product_percentage").val();
    //alert(product_id+" "+product_percentage)
    var formdata = new FormData();
    formdata.append('product_id', product_id);
    formdata.append('product_percentage', product_percentage);



    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        data: formdata,
        url: '../update-product-to-section',
        success: function(data) {
            $("#edit_discount_price_modal").modal('hide');
            show_all_product();


        }
    })

}

function show_all_product() {
    $.ajax({
        processData: false,
        contentType: false,
        type: 'get',

        url: '../get_all_homepage_section_retailer/' + homepage_section_id,
        success: function(data) {
            var all_data = JSON.parse(data);
            $("#all_section_retailer").html(all_data.section_retailer);
            $("#retailer_list").html(all_data.all_retailer);



        }
    })
}

function delete_retailer_from_section(id) {
    var conf = confirm('Are you sure?');
    if (conf == true) {
        $.ajax({
            processData: false,
            contentType: false,
            type: 'GET',
            url: '../delete_retailer_from_section/' + id,
            success: function(data) {
                alert('Content Delete Successfully')
                show_all_product();
            }
        })
    }

}

function add_product_to_section() {


    var retailer_id = $('#retailer_id').val();

    var formdata = new FormData();
    formdata.append('retailer_id', retailer_id);
    formdata.append('homepage_section_id', homepage_section_id);


    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        data: formdata,
        url: '../add-retailer-to-section',
        success: function(data) {

            show_all_product();
            $("#product_id").val('');
            $("#discount_percentage").val('');

        }
    })

}
