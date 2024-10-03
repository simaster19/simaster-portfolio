const getMessage = () => {
return new Promise((resolve, reject) => {
$.ajax({
url: "getMessage",
type: "GET",
success: function (response) {
//console.log(response);
resolve(response); // Memanggil resolve di sini
},
error: function (error) {
//console.error("Error:", error);
reject(error); // Memanggil reject di sini
}
});
});
};

const readAllMessage = () => {
return new Promise((resolve,reject) => {
$.ajax({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
url: "readAllMessage",
type: "GET",
success: function(response){

resolve(response);

},
error: function(error){
reject(error);
}
});
});
}

export { getMessage, readAllMessage};