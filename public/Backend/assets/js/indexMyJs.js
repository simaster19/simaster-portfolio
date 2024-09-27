import { getMessage, readAllMessage } from "./myjs/getMessageNotification.js";

async function loadMessages() {
let baseurl = window.location.origin;
try {
const response = await getMessage();
let html = '';
response.data.forEach(item => {
html += `<a href="${baseurl}/admin/message/${item.id_message}/detail" class="dropdown-item dropdown-item-unread">
<div class="dropdown-item-avatar">
<img alt="image" src="${baseurl}/Backend/assets/img/avatar/avatar-1.png" class="rounded-circle">
</div>
<div class="dropdown-item-desc">
<b>${item.nama}</b>
<p>${item.message}</p>
<div class="time">${item.created_at}</div>
</div>
</a>`;
});
$('.data-message-all').html(html);
} catch (error) {
console.error("Gagal memuat pesan:", error);
}
}

function setupReadAllListener() {
$(".readAll").on('click', async function (e) {
e.preventDefault(); // Prevent page reload
e.stopPropagation();
try {
const readAll = await readAllMessage(); // Wait for the readAllMessage function to complete

if (readAll.status === true) {
$('.data-message-all').html(''); // Clear messages after reading
} else {
alert("Semua Pesan Telah dibaca!");
}
} catch (error) {
console.error("Error:", error);
}
});
}

// Call the functions
$(document).ready(function() {
loadMessages();
setupReadAllListener();
});