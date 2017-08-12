var url = window.location;
$('ul.nav a').filter(function(){
	return this.href == url;
}).parent().addClass('active');

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

//alert("Hello");
function submitcourse(id){
	alert(id);
	$.post("../dashboard.php",
    {
        id: id,
        status:'addcourse'
    },
    function(data, status){
        alert("Data: " + data + "\nStatus: " + status);
    });
}