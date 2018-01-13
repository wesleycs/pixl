window.onscroll = function() {myFunction()};

// Get the header
var header = document.getElementById("header");
// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add sticky class to header when you reach scroll position. Remove sticky when you
// leave scroll position

function myFunction() {
    if (window.pageYOffset >= sticky) {
	header.classList.add("sticky");
    } else {
	header.classList.remove("sticky");
 }
}

