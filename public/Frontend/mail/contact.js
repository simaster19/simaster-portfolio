$(function () {
$("#contactForm input, #contactForm textarea").jqBootstrapValidation({
preventSubmit: true,
submitError: function ($form, event, errors) {},
submitSuccess: function ($form, event) {
event.preventDefault();
var data = {
name: $("#name").val(),
email: $("#email").val(),
subject: $("#subject").val(),
message: $("#message").val(),
_token: $('input[name="_token"]').val(),
};

$this = $("#sendMessageButton");
$this.prop("disabled", true);

$.ajax({
url: "/sendMessage",
type: "POST",
data: data,
cache: false,
success: function (response) {
//console.log(response);

$("#success").html("<div class='alert alert-success'>");
$("#success > .alert-success")
.html(
"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
)
.append("</button>");
$("#success > .alert-success").append(
"<strong>Your message has been sent. </strong>"
);
$("#success > .alert-success").append("</div>");
$("#contactForm").trigger("reset");
},
error: function (xhr, status, error) {
// console.error(xhr.responseText);
$("#success").html("<div class='alert alert-danger'>");
$("#success > .alert-danger")
.html(
"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;"
)
.append("</button>");
$("#success > .alert-danger").append(
$("<strong>").text(
"Sorry " +
data.name +
", it seems that our mail server is not responding. Please try again later!"
)
);
$("#success > .alert-danger").append("</div>");
$("#contactForm").trigger("reset");
},
complete: function () {
setTimeout(function () {
$this.prop("disabled", false);
}, 1000);
},
});
},
filter: function () {
return $(this).is(":visible");
},
});

$('a[data-toggle="tab"]').click(function (e) {
e.preventDefault();
$(this).tab("show");
});
});

$("#name").focus(function () {
$("#success").html("");
});