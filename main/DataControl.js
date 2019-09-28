import Item from "../items/Item.js";
import LoadData from "../loading/LoadData.js";
import MockDataLoader from "../loading/MockDataLoader.js";

let loader;

window.onload = function load () {

    loader = new MockDataLoader (1, 7, 2);

    displayItemList(loader.allItems());

    $('#scrollable-items .item').click(setMainItem);

}

function displayItem(item, location) {
    let details = item.details;
    let detailHTML = "";

    for (let i = 0; i < details.length; ++i) {
        detailHTML += "<h1>" + details[i] + "<h1>";
    }

/*    let itemHTML = '<div class="item" id="' + item.id + '">' +
                        '<div class="item-top">' +
                             '<img class="image" src=# alt="Here lays an image!">' +
                             '<div class="item-details">' +
                                  detailHTML +
                             '</div>' +
                        '</div>' +
                        '<div class="item-bottom">' +
                             item.description +
                        '</div>' +
                    '</div>';
*/

    let fragment = document.importNode(document.querySelector('#scrollable-item-template').content, true);
    let itemHTML = fragment.querySelector(".item");
    itemHTML.id = item.id;

    $(location).append (itemHTML);

    $(itemHTML).find(".item-details").append(detailHTML);
    $(itemHTML).find(".item-bottom").append(item.description);
}

function displayItemList (items) {
    items.forEach (function (element) {
        displayItem (element, "#scrollable-items");
    })
}

function setMainItem() {
	let item = $('#item-container .mainItem');

	$('#scrollable-items #' + item.attr('id')).css({'background-color': 'white'});
	$('#item-container').empty();

    let mainItem = $(this).clone();
    mainItem.attr('class', "mainItem")
	$('#item-container').append(mainItem);

	$(this).css({'background-color': 'lightblue'});
}

function mainItemView() {
    let fragment = document.importNode(document.querySelector('#main-item-template').content, true);
    let itemHTML = fragment.querySelector(".item");

    return itemHTML;
}
