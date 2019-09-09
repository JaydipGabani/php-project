$(window).ready(function() {
    $('select').material_select();
    $('ul.tabs').tabs();
    $('.collapsible').collapsible({
        accordion : false
    });
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 100, // Creates a dropdown of 15 years to control year
        format: 'm/d/yy'
    });
//modal start
    //start: single placeorder bufferOrder
    $('#placeOrderTrigger').click(function () {
        var placeorder = document.getElementById('placeOrder');
        placeorder.style.display = "block";
    });

    $('#closePlaceOrder').click(function () {
        var placeorder = document.getElementById('placeOrder');
        placeorder.style.display = "none";
    });
    //end: single placeorder bufferorder
    var modal;
    var currentIndex;
    $('.myBtn').click(function() {
        currentIndex=$(this).attr('somedata');
         modal = document.getElementById('myModal'+currentIndex);
         modal.style.display = "block";
    });
    $('.close').click(function () {
            modal.style.display = "none";
    });
    $('.refreshLbs').click(function () {
        $('#totallbs'+currentIndex).html($('#orderRQty'+currentIndex).val() * $('#weight'+currentIndex).html() * $('#orderLength'+currentIndex).val()/12);
    });
    $('#refreshLbsAddOrder').click(function () {
        console.log('maunil');
        var tlbs=$('#orderQty').val() * $('#orderWeight').val() * $('#orderlength').val()/12;
        $('#totallbs').val(tlbs);
        $('#totallbslabel').html(tlbs);

    });

//modal end

//    disable refresh page
//     function disableF5(e) { if ((e.which || e.keyCode) == 116) e.preventDefault(); };
//     $(document).on("keydown", disableF5);

//    handlebars helpers
});