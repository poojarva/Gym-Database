jQuery(document).ready(function($) {

$(".ajax-contact-form").submit(function() {
var str = $(this).serialize();

$.ajax({
type: "POST",
url: "https://Your_domain/assets/php/contact.php",
data: str,
success: function(msg) {
if(msg == 'OK') {
result = '<h3 class="bg-primary text-center pt-5 pb-5 text-white">Message has been sent, we will contact you shortly.</h3>';
$(".fields").hide();
} else {
result = msg;
}
$('.note').html(result);
}
});
return false;
});
});