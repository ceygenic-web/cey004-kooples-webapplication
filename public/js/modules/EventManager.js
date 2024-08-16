/**
 * simple event manager
 *
 * @author janithnirmal https://github.com/janithnirmal
 *
 * @description this module must required to have both jQuery and DataTables js libraries to be linked with the project.
 */
class EventManager {
  constructor() {
    this.events = {};
  }

  subscribe(event, ...listeners) {
    if (!this.events[event]) {
      this.events[event] = [];
    }

    listeners.forEach((listener) => {
      this.events[event].push(listener);
    });
  }

  unsubscribe(event) {
    delete this.events[event];
  }

  emit(event, data) {
    if (this.events[event]) {
      this.events[event].forEach((listener) => {
        listener(data);
      });
      // finisher
      this.emit(`${event}_end`);
    }
  }
}

// // // //
//
// example code

// const EM = new EventManager(); // instantiate new Evenet Manager
// document.addEventListener("DOMContentLoaded", () => {
//   console.log("admin area");
//   EM.subscribe("firstLoad", secondListner, firstListner); // subscribe to event and add action hierachy
//   EM.subscribe("secondLoad", firstListner, secondListner);

//   setTimeout(() => {
//     EM.emit("firstLoad", ["working 1", 123]); // emit an event and run action hierachy
//   }, 5000);

//   setTimeout(() => {
//     EM.emit("secondLoad", ["working 2", 456]);
//   }, 1000);
// });

// // listner 1
// const firstListner = (data) => {
//   console.log(data + " : 1");
// };

// const secondListner = (data) => {
//   console.log(data + " : 2");
// };
