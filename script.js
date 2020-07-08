//variables used in code
const global = {
    enter : document.getElementById("enter"),
    //todo : document.getElementById("todo"),
    ol : document.getElementById("ol"),
    list : [],
    button : document.getElementsByTagName("button"),
}

//to check if input is empty or not
const isNotEmpty=()=>{
value = (todo.value.length != 0) ? true : false;
return value;
}

//to check if input is 'enter' key before proceeding to 'valueCheck'
const keyCheck=(event)=>{
    if(event.which===13){valueCheck()}
}

//checks whether the textbox is empty or not before creating a new list
const valueCheck=(event)=>{
    if(isNotEmpty()){addLists()}else{
        alert('Attendance Empty')
}
}





//creates a new list element
const createLi= ()=>{
    
    global.list.push((todo.value).toLowerCase());
    let li=document.createElement('li');
    li.appendChild(document.createTextNode(todo.value))
    return li;
}

//adds the new list element created to the ordered list
const addLists=()=>{
    if(checkList(todo.value) !== -1){
        return alert(`cannot add list because "${todo.value}" already exists in line ${checkList(todo.value)+1}`)
    }
    global.ol.appendChild(createLi());
    todo.value=``;
}

//returns the index of the value parsed after checking the todo list array
const checkList = (value)=>{
    let index = global.list.indexOf(value.toLowerCase());
    return index;
}

//Event Listeners

//when list items are clicked
global.ol.addEventListener('click',(event)=>{
    event.target.classList.toggle('mark')
})

//when 'enter' button is clicked
global.enter.addEventListener('click',valueCheck);
//when keys are pressed
todo.addEventListener('keypress',keyCheck);