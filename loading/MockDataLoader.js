import Item from "../items/Item.js";
import Material from "../items/Material.js";
import Product from "../items/Product.js";
import LoadData from "../loading/LoadData.js";

class MockDataLoader extends LoadData {

    constructor (_numItemsToCreate, _numMaterialsToCreate, _numProductsToCreate) {
        super ();

        this.itemArray = [];
        for (let i = 0; i < _numItemsToCreate; ++i) {
            this.itemArray.push (MockDataLoader.createItem());
        }
        for (let i = 0; i < _numMaterialsToCreate; ++i) {
            this.itemArray.push (MockDataLoader.createMaterial());
        }
        for (let i = 0; i < _numProductsToCreate; ++i) {
            this.itemArray.push (MockDataLoader.createProduct());
        }

        for (let i = 0; i < this.itemArray.length; ++i) {
            this.itemArray[i].id = i;
        }
    }

    add (item) {
        this.itemArray.push (item);
    }

    remove (itemIndex) {
        this.itemArray.splice (itemIndex, 1);
    }

    update (item, itemIndex) {
        this.itemArray.splice (itemIndex, 1);
        this.itemArray.push (item);
    }

    find (itemName) {
        let item;
        this.itemArray.forEach (function(element) {
            if (element.name.localeCompare(itemName) === 0) {
                item = element;
            }
        })

        return item;
    }

    allItems () {
        return this.itemArray;
    }

    static createItem () {
        return new Item ("thingy", "thingy.png", "The bestest Thingy!", 5.50);
    }

    static createMaterial () {
        return new Material ("materialThingy", "materialThingy.png", "The material Thingy!", 4.50, 10, "inch", "the dudes", "good...");
    }

    static createProduct () {
        return new Product ("productThingy", "productThingy.png", "The product Thingy!", 6.50, 10, 5, 4, 6);
    }
}

export default MockDataLoader;
