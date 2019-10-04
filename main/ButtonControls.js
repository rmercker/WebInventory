// controlls the effect of button clicks on the page

let searchOpen = false; // is the search bar up or down
let itemType = ""; // determine which view we are currently in


$('#product-button').click(setupProductButton);

function setupProductButton() {
	if (getHrefString() !== "ProductsPage.php")
		window.location.href = "ProductsPage.php";
}



$('#resource-button').click(setupResourceButton);

function setupResourceButton() {
	if (getHrefString() !== "ResourcesPage.php")
		window.location.href = "ResourcesPage.php";
}



$('#sales-button').click(setupSalesButton);

function setupSalesButton() {
	if (getHrefString() !== "SalesPage.php")
		window.location.href = "SalesPage.php";
}



$('#logout-button').click(setupLogoutButton);

function setupLogoutButton() {
	window.location.href = "../login/Login.php?logout=true";
	console.log("changed location");
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