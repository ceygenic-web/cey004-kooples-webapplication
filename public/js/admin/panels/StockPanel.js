/**
 * stock functionalities will be handled here
 */
class StockPanel extends Panel {
  constructor(config) {
    super(config);
  }

  init() {
    console.log("stock panel created");
  }

  boot() {
    this.loadStock();
  }

  loadStock() {
    console.log("load stock");
  }
}
