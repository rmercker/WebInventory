// controlls the effect of button clicks on the page

let searchOpen = false; // is the search bar up or down
let itemType = ""; // determine which view we are currently in


$('#product-button').click(setupProductButton);

function setupProductButton() {
	if (getHrefString() !== "ProductsPage.html")
		window.location.href = "ProductsPage.html";
}



$('#resource-button').click(setupResourceButton);

function setupResourceButton() {
	if (getHrefString() !== "ResourcesPage.html")
		window.location.href = "ResourcesPage.html";
}



$('#sales-button').click(setupSalesButton);

function setupSalesButton() {
	if (getHrefString() !== "SalesPage.html")
		window.location.href = "SalesPage.html";
}



function getHrefString() {
	var index = window.location.href.lastIndexOf('/')
	var str = window.location.href.substring(index + 1);

	if (str === "")
		str = window.location.href.substring(window.location.href.lastIndexOf('/', index - 1) + 1);

	return str;
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