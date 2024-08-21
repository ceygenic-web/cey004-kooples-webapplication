// Core admin panel features
class Core {
  /** @type {EventManager} */
  static EM = null;
  /** @type {APIRequestHandler} */
  static APIR = null;
  /** @type {ExtendedDatatables} */
  static EDT = null;
  /** @type {ToastManager} */
  static toast = null;
  /** @type {ImageInputManager} */
  static ImageInputManager = null;
  /** @type {AttributeObserver} */
  static AO = null;

  constructor() {
    this.#requiredPlugins();
    this.#optionalPlugins();
  }

  #requiredPlugins() {
    try {
      Core.EM = new EventManager();
      Core.APIR = new APIRequestHandler("http://localhost:9001");
      Core.EDT = new ExtendedDatatables();
      Core.toast = new ToastManager();
      Core.ImageInputManager = new ImageInputManager();
      Core.AO = new AttributeObserver();
    } catch (error) {
      console.error(error);

      alert("Missing Plugins! ⚠️");
      console.error("Plugin Not Found!");
    }
  }

  #optionalPlugins() {}
}
