import {getMessage} from "./myjs/getMessageNotification.js";
$(document).ready(async function() {

let baseurl = window.location.origin;

try {
const response = await getMessage();
let html = '';
response.data.forEach(item => {
html += `<a href="#" class="dropdown-item dropdown-item-unread">
<div class="dropdown-item-avatar">
<img alt="image" src="${baseurl}/Backend/assets/img/avatar/avatar-1.png"
class="rounded-circle">

</div>
<div class="dropdown-item-desc">
<b>${item.nama}</b>
<p>
${item.message}
</p>
<div class="time">
${item.created_at}
</div>
</div>
</a>`;
$('.data-message-all').html(html);
});

} catch (error) {
console.error("Gagal memuat pesan:", error);
}
});