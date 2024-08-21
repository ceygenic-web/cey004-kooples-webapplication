/**
 * testing functionalities will be handled here
 */
class TestPanel extends Panel {
  constructor(config) {
    super(config);
  }

  init() {
    console.log("test panel created");
  }

  boot() {
    console.log("test panel rendered");

    setTimeout(() => {
      const mutationTest = document.getElementById("mutationTest");
      mutationTest.dataset.options =
        '[[0, "Select a Gender"],[1,"Male"],[2,"Female"],[3,"Other"],[4,"Attack Helicopter"],[5,"A tree"]]';
    }, 5000);
  }
}
