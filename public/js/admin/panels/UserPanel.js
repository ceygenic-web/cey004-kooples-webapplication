/**
 * users functionalities will be handled here
 */
class UserPanel extends Panel {
  constructor(config) {
    super(config);
  }

  init() {
    console.log("user panel created");
  }

  boot() {
    console.log("user panel rendered");
    this.loadUsers();
  }

  loadUsers() {
    console.log("user data loaded 🥰");
  }
}
