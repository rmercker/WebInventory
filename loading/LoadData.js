class LoadData {
    // this will be the Interface between getting the data and loading them to the page;

    constructor () {

        if (this.constructor === LoadData) {
            throw new TypeError ("LoadData Is Abstract and cannot be instantiated");
        }

        if (this.add === undefined || this.remove === undefined
            || this.update === undefined || this.find === undefined)
        {
            let methodsNotOverridden = "";

            methodsNotOverridden += this.add === undefined ? "add " : "";
            methodsNotOverridden += this.remove === undefined ? "remove " : "";
            methodsNotOverridden += this.update === undefined ? "update " : "";
            methodsNotOverridden += this.find === undefined ? "find " : "";

            throw new TypeError (methodsNotOverridden +
                       " method(s) must be defined before instantiating any child class");

        }
    }

}

export default LoadData;
