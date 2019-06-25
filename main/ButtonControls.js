// controlls the effect of button clicks on the page

let searchOpen = false; // is the search bar up or down
let itemType = ""; // determine which view we are currently in
setupProductButton(); //default page is product view


$('#product-button').click(setupProductButton);

function setupProductButton() {
	window.location.href = "http://www.ProductsPage.html";
}



$('#resource-button').click(setupResourceButton);

function setupResourceButton() {
	window.location.href = "http://www.ResourcePage.html";
}



$('#sales-button').click(setupSalesButton);

function setupSalesButton() {
	window.location.href = "http://www.SalesPage.html";
}



$('#update-detail-button').click(setupUpdateButton);

function setupUpdateButton() {
	$('#update-forms').show();
	$('#create-sale-forms').hide();
}



$('#create-sale-button').click(setupCreateSaleButton);

function setupCreateSaleButton() {
	$('#update-forms').hide();
	$('#create-sale-forms').show();
}



$('#search-button').click(setupSearchButton);

function setupSearchButton() {
	if (searchOpen) {
		searchBarResizer("50px");
		$('#search-bar').hide();
	}
	else {
		searchBarResizer("90px");
		$('#search-bar').show();

	}

	searchOpen = !searchOpen;
}

function searchBarResizer (internalDisplayPadding) {
	$('#internal-display').css("padding-top", internalDisplayPadding);
}