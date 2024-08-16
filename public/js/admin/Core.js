// Core admin panel features
class Core {
  static EM = null;
  static APIR = null;
  static EDT = null;
  static toast = null;

  constructor() {
    Core.EM = new EventManager();
    Core.APIR = new APIRequestHandler("http://localhost:9001");
    Core.EDT = new ExtendedDatatables();
    Core.toast = new ToastManager();
  }
}
