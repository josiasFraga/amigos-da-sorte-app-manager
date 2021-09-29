var Index = function () {

    var handleMisc = function() {
        alert(window.user_token);
        //$.get();
    }

	
	return { // main function to initiate the module
		init: function () {
			handleMisc();
		}
	};

}();

$(document).ready(function() {
	Index.init();
});