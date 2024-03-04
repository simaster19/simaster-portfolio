/**
*
* You can write your JS code here, DO NOT touch the default style file
* because it will make it harder for you to update.
*
*/

"use strict";

$("#agree").click(function(){
let checked = $("#agree").is(":checked");
if (checked) {
$(".btn-register").removeAttr("disabled", "disabled");
} else {
$(".btn-register").attr("disabled", "disabled");
}
});

$("#password2").on("keyup", function(){
let password = $("#password").val();
let message = $(".password2");

if ($(this).val() != password) {
message.text("Password tidak cocok!");
message.addClass("text-danger");
} else {
message.text("");
}
});