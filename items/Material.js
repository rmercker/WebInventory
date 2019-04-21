import Item from "../items/Item.js";

class Material extends Item {

    constructor (_name, _imageURL, _description, _cost,
                    _units, _unitType, _supplier, _quality)
    {
        super (_name, _imageURL, _description, _cost);
        this.units = _units;
        this.unitType = _unitType;
        this.supplier = _supplier;
        this.quality = _quality;
    }
}

export default Material;
