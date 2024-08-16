
/**
 * product functionalities will be handled here
 */
class ProductPanel extends Panel {
    constructor(config) {
      super(config);
    }
  
    init() {
      console.log("product panel created");
    }
  
    boot() {
      console.log("product panel rendered");
      this.loadProducts();
    }
  
    loadProducts() {
      console.log("load product list");
    }
  }