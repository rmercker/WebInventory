import Item from "../items/Item.js";

class Product extends Item {

    constructor (_name, _imageURL, _description, _cost,
                    _units, _labor, _wholeSale, _retail)
    {
        super (_name, _imageURL, _description, _cost);
        this.units = _units;
        this.labor = _labor;
        this.wholeSale = _wholeSale;
        this.retail = _retail;
    }
}

export default Product;
