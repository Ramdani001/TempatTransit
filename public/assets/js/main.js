let list = document.querySelectorAll(".navigation li");

function activeLink(){
    list.forEach((item)=> {
        item.classList.remove("hovered");
    })
    this.classList.add("hovered");
}

list.forEach(item => item.addEventListener("mouseover", activeLink))

// Menu Toggle

let toggle = document.querySelector(".toggle");
let navigation  = document.querySelector(".navigation");
let main = document.querySelector(".main")

toggle.onclick = function () {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
}



$(document).on('click', '.userView', function()
{
    var _this = $(this).parents('tr');
    $('#v_id').val(_this.find('.id').text());
    $('#v_name').val(_this.find('.name').text());
    $('#v_email').val(_this.find('.email').text());
    $('#v_phone').val(_this.find('.phone').text());
    $('#v_prices').val(_this.find('.prices').text());
    $('#v_address').val(_this.find('.address').text());
    $('#v_details').val(_this.find('.details').text());

});
