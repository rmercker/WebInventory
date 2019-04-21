// controlls the effect of button clicks on the page

let searchOpen = false; // is the search bar up or down
let itemType = ""; // determine which view we are currently in
setupProductButton(); //default page is product view


$('#product-button').click(setupProductButton);

function setupProductButton() {
	if (itemType != "product") { // all button logic follows here, so as to not reload when in inventory view
		itemType = "product";
		console.log("hello1");

		productOptionFields();
		productSearchFields();
	}
}

function productOptionFields() {
	$('#product-update-form').show();
	$('#resource-update-form').hide();
	$('#sale-update-form').hide();

	$('#product-create-sale').show();
	$('#resource-create-sale').hide();
	$('#create-sale-button').show();
}

function productSearchFields() {
	$('#product-search-bar-form').show();
	$('#resource-search-bar-form').hide();
	$('#sales-search-bar-form').hide();
}



$('#resource-button').click(setupResourceButton);

function setupResourceButton() {
	if (itemType != "resource") { 
		itemType = "resource";
		console.log("hello3");

		resourceOptionFields();
		resourceSearchFields();
	}
}

function resourceOptionFields() {
	$('#product-update-form').hide();
	$('#resource-update-form').show();
	$('#sale-update-form').hide();

	$('#product-create-sale').hide();
	$('#resource-create-sale').show();
	$('#create-sale-button').show();
}

function resourceSearchFields() {
	$('#product-search-bar-form').hide();
	$('#resource-search-bar-form').show();
	$('#sales-search-bar-form').hide();
}



$('#sales-button').click(setupSalesButton);

function setupSalesButton() {
	if (itemType != "sales") {
		itemType = "sales";
		console.log("hello2");

		salesOptionFields();
		salesSearchFields();
	}
}

function salesOptionFields() {
	$('#product-update-form').hide();
	$('#resource-update-form').hide();
	$('#sale-update-form').show();

	$('#product-create-sale').hide();
	$('#resource-create-sale').hide();
	$('#create-sale-button').hide();
}

function salesSearchFields() {
	$('#product-search-bar-form').hide();
	$('#resource-search-bar-form').hide();
	$('#sales-search-bar-form').show();
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

		showCorrectSearchBar();
	}

	searchOpen = !searchOpen;
}

function showCorrectSearchBar() {
	switch (itemType) {
		case "product":
			productSearchFields();
			break;
		case "resource":
			resourceSearchFields();
			break;
		case "sales":
			salesSearchFields();
			break;
		default: break;
	}
}

function searchBarResizer (internalDisplayPadding) {
	$('#internal-display').css("padding-top", internalDisplayPadding);
}
