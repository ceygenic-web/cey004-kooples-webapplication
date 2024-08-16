/**
 * repesent an instance of admin panel and mange all the features regarding the admin panel
 *
 * @description
 *
 * **Directly dependant on the following dependancies**
 * - EventManager
 * - ExtendedDatatable
 * - ceygenic
 * - Component
 */
class AdminPanel extends Core {
  static #instance = null;

  data = null;

  constructor() {
    super();
    AdminPanel.#instance = this; // not required
    this.#init();
  }

  /**
   * testing method
   */
  async test() {
    console.log("test ===> start");
    console.log(this.info.started_time);

    // this.toast.prompt("toast message test");
    return;

    this.EM.subscribe(
      "stock_init",
      () => {
        console.log("Work 1");
      },
      () => {
        console.log("Work 2");
      }
    );

    AdminPanel.switchPanel("user");
    this.getPanel("stock");
    console.log("test ===> end");
  }

  /**
   * initial panel bootstrap
   */
  async #init() {
    // set config data
    this.info = {
      started_time: new Date(),
      state: "live",
      activePanelName: "product",
    };

    this.activePanel = null;

    this.UI = {
      panels: this.#createPanels(),
    };

    // bootstrap functions
    await this.#boot();
  }

  /**
   * admin event subscriber
   */
  async #boot() {
    AdminPanel.switchPanel(this.info.activePanelName); // load default panel

    // your code
  }

  /**
   *
   * @returns {object|null} - returns the admin panel object
   */
  static getInstance() {
    return AdminPanel.#instance ?? null;
  }

  // UI manager
  /**
   *
   * @returns {Array} - list of all the panels
   */
  #createPanels() {
    const panels = [
      new UserPanel({ name: "user" }),
      new ProductPanel({ name: "product" }),
      new StockPanel({ name: "stock" }),
      new CategoryPanel({ name: "category" }),
    ];

    return panels;
  }

  /**
   * get all the initiated panels
   *
   * @returns {Array} - panels list
   */
  static getPanelList() {
    return AdminPanel.getInstance().UI.panels;
  }

  /**
   * get all the initiated panels
   *
   * @returns {Panel} - panels
   */
  static getPanel(name) {
    AdminPanel.getPanelList().forEach((panel) => {
      if (panel.name === name) {
        return panel;
      }
    });
    return null;
  }

  /**
   * returns current panel
   *
   * @returns {Object|null} - current panel
   */
  static getCurrentPanel() {
    return AdminPanel.getInstance().activePanel ?? null;
  }

  /**
   * change the main panel into a different panel
   *
   * @param {string} name panel name
   */
  static async switchPanel(name) {
    const adminPanel = AdminPanel.getInstance();
    AdminPanel.getPanelList().forEach(async (panel) => {
      if (panel.getName() === name) {
        await panel.render();
        adminPanel.info.activePanelName = name;
        adminPanel.activePanel = AdminPanel.getPanel(name);
      }
    });
  }

  // navigation controller
  // data controller
  // action controller
}
