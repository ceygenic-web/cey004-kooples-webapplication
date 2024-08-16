// initiator
const CustomEM = new EventManager();
let ADMIN = null;
document.addEventListener("DOMContentLoaded", () => {
  ADMIN = new AdminPanel();
  console.log(ADMIN.info);
  console.log(ADMIN.UI.panels);

  testAdmin();
  return;

  const dataSet = [
    {
      name: null,
      age: 21,
      mobile: "0710902997",
    },
    {
      name: "janith",
      age: {
        first: 45,
        second: "Fourty Five",
      },
      mobile: "0000000000",
    },
    {
      name: "Kumara",
      age: 55,
      mobile: "",
    },
    {
      name: "Perera",
      age: 31,
      mobile: "0790790799",
    },
    {
      name: "Kasun",
      age: 45,
      mobile: "0000000000",
    },
    {
      name: "Kumara",
      age: 55,
      mobile: "0780780788",
    },
  ];

  const dataSet2 = [
    {
      id: 123,
      name: "Lawata",
      age: 59,
      mobile: "0780780788",
    },
    {
      name: "Lawata",
      age: 59,
      mobile: "0780780788",
    },
    {
      name: "Kasun",
      age: {
        first: 35,
        second: "Thirty Five",
      },
      mobile: "123123123",
    },
  ];

  const EDT1 = new ExtendedDatatables();
  EDT1.createTabel("#sampleTable", dataSet, {
    lengthMenu: [
      [5, 10, 20, -1],
      [5, 10, 20, "All"],
    ],
    responsive: true,
    searching: true,
    columns: [
      { data: "name", title: "First Name" },
      { data: "mobile", title: "Number" },
      {
        data: "age.second",
        title: "Your Age",
      },
    ],
  });

  // EDT1.onCellClick((cell, data) => {
  //   console.log(cell);
  //   console.log(data);
  // });

  EDT1.onCellClickExtended((cell, data) => {
    console.log(cell);
    console.log(data);
  });

  EDT1.udpateData(dataSet2, true);

  testAdmin();

  
});

const testAdmin = () => {
  ADMIN.test();
};
