$(function () {
	
function getPageName() {
	var pathName = window.location.pathname;

	pageName = '';

	if (pathName.indexOf("/") != -1) {
		pageName = pathName.split("/").pop();
	}

	else {
		pageName = pathName;
	}

	return pageName;
}

function navigateToPage() {

	var pageName = getPageName();

	$.get(pageName, function(response) {

		var markup = $("<div>" + response + "</div>"),
		fragment = markup.find(".fragment").html();

		$("#content-load").html(fragment);
	});
}


$("a[data-role='ajax']").on('click tap', function(e) {

	if (Modernizr.history) {
		e.preventDefault();
		var pageName = $(this).attr("href");
		window.history.pushState(null, "", pageName);
		navigateToPage();
	}

});

var _popStateEventCount = 0;

$(window).on('popstate', function (e) {
 
    this._popStateEventCount++;
 
    if ($.browser.webkit && this._popStateEventCount == 1) {
        return;
    }
    
    navigateToPage();

});

});