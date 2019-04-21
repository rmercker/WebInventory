class Item {

    constructor (_name, _imageURL, _description, _cost) {
        this.id = 0;
        this.name = _name;
        this.imageURL = _imageURL;
        this.description = _description;
        this.cost = _cost;
    }

    get details () {
        return [this.name, this.cost];
    }
}

export default Item;
