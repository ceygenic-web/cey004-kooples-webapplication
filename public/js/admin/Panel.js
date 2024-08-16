class Panel {
  #mainContainerId = "adminMainContainer";
  #URL_ROOT = ""; //  empty for none that exits
  #config = {};
  #data = null;
  #name = null;
  #activeEvents = [];
  #buttonEvent = null;

  constructor(config) {
    if (!AdminPanel.getInstance()) {
      throw Error("Admin Panle is not instantiated");
    }
    if (!config.name) {
      throw Error("Missing Parameter : config.name : string");
    }
    this.#config = config;
    this.#name = config.name;
    this.#_init();
  }

  #_init() {
    // listner
    this.addListner(`${this.#name}_switch`, () => {
      AdminPanel.switchPanel(this.#name);
    });
    this.#_bootstrap();
    this.init();
  }

  /**
   * @description panel instantiating time executable programmes for all panels
   * this will work regardless of the panel
   */
  #_bootstrap() {
    // your code
  }

  /**
   * @description panel instantiating programmes. this only works with overide features in cirtain panel adn user to do panel specific tasks
   */
  init() {}

  /**
   * get the current panel name
   * @returns {string} - name of the panel
   */
  getName() {
    return this.#name;
  }

  async render() {
    const container = document.getElementById(this.#mainContainerId);
    container.innerHTML = "";
    container.innerHTML = await this.#fetchPanel();
    this.data = null;
    this.#_boot();
    this.eventDispatch(`${this.#name}_launch`);
  }

  /**
   * all the boot level hardcode registers and workers for a panel
   */
  #_boot() {
    // your code - required boot progarmmes
    this.#eventRegister();
    this.#autoActionTrigger();

    this.boot();
  }

  /**
   *
   * all the boot level registers and workers for a panel
   *
   * @override
   */
  boot() {}

  /**
   * get the panel HTML code from server
   */
  async #fetchPanel() {
    return await fetch(`${this.#URL_ROOT}/comp/panel/${this.#name}`)
      .then((res) => res.text())
      .then((data) => data)
      .catch((error) => {
        AdminPanel.getInstance().toast.prompt("Something Went Wrong!");
        console.error("Panel template loading failed! : html fetch failed");
      });
  }

  /**
   * event subscriber
   *
   * @param {string} eventName name of the event
   * @param {Function} functions functions list
   */
  addListner(eventName, functions) {
    Core.EM.subscribe(eventName, functions);
  }

  /**
   * dispatch an event
   *
   * @param {string} event name of the event wants to trigger
   */
  eventDispatch(event) {
    Core.EM.emit(event);
  }

  // busines process related codes
  #autoActionTrigger() {}

  /**
   * register all the events for a panel on render
   */
  #eventRegister() {
    this.#cleanPanelEvenets(); // required

    // add event listners
    const containers = document.querySelectorAll("[data-admin-container]");
    containers.forEach((container) => {
      const actionBtn = container.querySelector("[data-btn-action]");

      const action = () => {
        switch (actionBtn.dataset.btnAction) {
          case "add":
            this.addProcessEventAction(container); //  automated add process
            break;

          case "update":
            this.updateProcessEventAction(container); // automated udpate process
            break;

          default:
            break;
        }
      };

      actionBtn.addEventListener("click", action);

      this.#activeEvents.push({
        event: "click",
        btn: actionBtn,
        action: action,
      });
    });
  }

  /**
   * remove all the events from event manager related to the current panel
   */
  #cleanPanelEvenets() {
    this.#activeEvents.forEach((eventObject) => {
      eventObject.btn.removeEventListener(
        eventObject.event,
        eventObject.action
      ); // remove event listeners from DOM for actions
    });
    this.#activeEvents = []; // clear array

    console.log("cleaned");
  }

  /**
   * hadnle the request
   *
   * @param {Element} container object to use when creating form
   * @param {Object} options object to use when creating form
   */
  async actionHandler(container, options) {
    if (!options || !"method" in options) {
      throw new Error("Invalid Request Configuration at action handler");
    }

    const form = Core.APIR.createFormData(this.scrapeData(container)); // build form object by data
    const response = await Core.APIR.request(
      options.method,
      container.dataset.endpoint ?? "/",
      {
        body: form,
        ...options,
      }
    ); // build form object by data

    return response;
  }

  /**
   * scrape data from inputs in a container
   *
   */
  scrapeData(container) {
    const inputs = container.querySelectorAll(
      "input[name], textarea[name], select[name]"
    );
    const values = {};
    inputs.forEach((input) => {
      values[input.name] = input.value;
    });
    return values;
  }

  /**
   *  peraped add event action for a container
   *
   * @param {Element} container container object
   */
  async addProcessEventAction(container) {
    console.log(await this.actionHandler(container, { method: "POST" }));
    console.log(
      "proform adding operations : " + container.dataset.adminContainer
    );
  }

  /**
   *  peraped update event action for a container
   *
   * @param {Element} container container object
   */
  async updateProcessEventAction(container) {
    console.log(await this.actionHandler(container, { method: "POST" }));
    console.log(
      "proform updating operations : " + container.dataset.adminContainer
    );
  }
}
