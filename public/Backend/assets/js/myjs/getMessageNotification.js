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

export { getMessage};