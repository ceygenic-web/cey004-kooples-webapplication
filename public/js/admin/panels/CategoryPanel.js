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
  }

  successProcess() {
    console.log("Successfuly added 🫡");
  }

  failedProcess() {
    console.log("failed added 😒");
  }
  
  otherAction() {
    console.log("hmmmm 🤔");
  }
}
