const styles = `
  body {
    display: block;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  .containerr {
    width: 60%;
    }

  .input {
    display: flex;
  }

  input[type="text"] {
    flex: 1;
    padding: 10px;
    border-radius: 20px;
    border: 1px solid;
    margin-right: 10px;
    outline: none;
    background-color: #AFB0A1;
    color: white;
  }

  button {
    background-color: #BFB0A3;
    color: WHITE;
    border: none;
    padding: 10px 20px;
    border-radius: 20px;
    cursor: pointer;
    font-size: 16px;
    
  }

  ul {
  
    padding: 0;
  }

  li {
    display: flex;
    align-items: center;
    padding: 10px 20px;
    border-radius: 20px;
    margin-bottom: 10px;
    background-color: lightgray;
  }

  li.done {
    background-color: lightgreen;
  }

  .task-text {
    flex: 1;
  }

  li button {
    margin-left: 10px;
    background-color: #BFB0A3;
    padding: 5px 15px;
    font-size: 14px;
    border-radius: 20px;
  }

 

`;

// addstyle to the  page
const styleSheet = document.createElement('style');
styleSheet.type = 'text/css';
styleSheet.textContent = styles;
document.head.appendChild(styleSheet);

// get elemnt from html by id
const taskInput = document.getElementById('taskInput');
const addTaskButton = document.getElementById('addTaskButton');
const taskList = document.getElementById('taskList');


function addTask() {
  const taskText = taskInput.value.trim();
  if (taskText === '') return;

  const listItem = document.createElement('li');

  const taskSpan = document.createElement('span');
  taskSpan.className = 'task-text';
  taskSpan.textContent = taskText;
  listItem.appendChild(taskSpan);



  // show in tasks list
  taskList.appendChild(listItem)

  // done 
  const doneButton = document.createElement('button');
  doneButton.textContent = 'Done';
  doneButton.onclick = () => listItem.classList.toggle('done')
  listItem.appendChild(doneButton);
  // delete
  const deleteButton = document.createElement('button');
  deleteButton.textContent = 'Delete';
  deleteButton.onclick = () => listItem.remove();
  listItem.appendChild(deleteButton);
  // clear
  taskInput.value = ''
}


addTaskButton.addEventListener('click', addTask);

// second task

const container = document.createElement('div');
container.className = 'container';

const heading = document.createElement('h1');
heading.textContent ='table ';
container.appendChild(heading);

const inputSection = document.createElement('div');
const idInput = document.createElement('input');
idInput.type = 'number';
idInput.placeholder = 'Enter ID';
idInput.id = 'idInput';

const getByIdButton = document.createElement('button');
getByIdButton.textContent = 'Get Data by ID';

inputSection.appendChild(idInput);
inputSection.appendChild(getByIdButton);
container.appendChild(inputSection);

const table = document.createElement('table');
const tableHead = document.createElement('thead');
tableHead.innerHTML = `
  <tr>
    <th>ID</th>
    <th>Title</th>
    <th>Body</th>
  </tr>
`;

const tableBody = document.createElement('tbody');
table.appendChild(tableHead);
table.appendChild(tableBody);
container.appendChild(table);


document.body.appendChild(container);

async function fetchData() {
  const response = await fetch('https://jsonplaceholder.typicode.com/posts');
  const data = await response.json();
  populateTable(data);
}

function populateTable(data) {
  tableBody.innerHTML = ''; 
  data.forEach((item) => {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${item.id}</td>
      <td>${item.title}</td>
      <td>${item.body}</td>
    `;
    tableBody.appendChild(row);
  });
}


async function fetchDataById() {
  const id = idInput.value.trim();
  if (id === '') {
    return;
  }

  const response = await fetch(`https://jsonplaceholder.typicode.com/posts/${id}`);
  if (response.ok) {
    const data = await response.json();
    populateTable([data]); 
  } else {
    alert('No data found for the given ID');
  }
}

fetchData();


getByIdButton.addEventListener('click', fetchDataById);
