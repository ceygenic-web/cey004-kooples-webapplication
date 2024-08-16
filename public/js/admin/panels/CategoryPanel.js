/**
 * category functionalities will be handled here
 */
class CategoryPanel extends Panel {
  constructor(config) {
    super(config);
  }

  init() {
    console.log("Category panel created");
  }

  boot() {
    console.log("Category panel rendered");
    this.loadCategories();
  }

  loadCategories() {
    console.log("Category data loaded");
  }
}
