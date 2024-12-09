 //first task


//  name
while (true) {
    Name = prompt("Enter your name :");
    if (Name && isNaN(Name)) {
        break;
    } else {
        alert("Invalid name. Please enter characters only.");
    }
}

//  phone number
while (true) {
    phoneNumber = prompt("Enter your phone number :");
    if (phoneNumber && /^\d{8}$/.test(phoneNumber)) {
        break;
    } else {
        alert("Invalid phone number. It should be an 8-digit number.");
    }
}

// mobile numbe
while (true) {
    mobileNumber = prompt("Enter your mobile number:");
    if (mobileNumber && /^(010|011|012)\d{8}$/.test(mobileNumber)) {
        break;
    } else {
        alert("Invalid mobile number. It should be starting with 010, 011, 012 or 015.");
    }
}

//  email
while (true) {
    email = prompt("Enter your email (e.g., abc@123.com):");
    if (email && /^[A-Za-z0-9._]+@[A-Za-z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)) {
        break;
    } else {
        alert(" Please enter a valid email address.");
    }
}

// color
while (true) {
    colorChoice = prompt("Choose a color (red, green, blue):");
    if (colorChoice === "red" || colorChoice === "green" || colorChoice === "blue") {
        break;
    } else {
        alert("Invalid choice. Please choose red, green, or blue.");
    }
}



console.log(`%cWelcome  `+ Name, `color: ${colorChoice}`);
console.log(`%cName:`+ Name, `color: ${colorChoice};`);
console.log(`%cPhone Number:`+phoneNumber, `color: ${colorChoice};`);
console.log(`%cMobile Number:`+mobileNumber, `color: ${colorChoice};`);
console.log(`%cEmail:`+email, `color: ${colorChoice};`);




// //second task

function largestWord(inputString) {
    const words = inputString.split(" ");
    let lword = "";
    for (let word of words) {
        
        if (word.length > lword.length) {
            lword = word;
        }
    }
    return lword;
}


const input = "this is a javascript string demo";
const result = largestWord(input);
console.log(result); 






// //third task


    let numbers = [];
    for (let i = 0; i < 5; i++) {
        while (true) {
            let value = prompt(`Enter number ${i + 1}:`);
            if (!isNaN(value)) {
                numbers.push(Number(value));
                break;
            }
        }
    }

document.write("Sorting <hr>");
document.write(`<p style="color: red;">Original array: </p>`+numbers,"<br>" );
document.write(`<p style="color: red;">Array arranged in ascending way:</p> ` +numbers.sort((a,b)=>a-b),"<br>");
document.write(`<p style="color: red;">Array arranged in descending way: </p>` +numbers.sort((a,b)=>b-a),"<br>"); 
    


//fourth


// raduis
let raduis =prompt('what is the value of the circle Raduis?');
    if (!isNaN(raduis) && raduis > 0) {
        raduis = Number(raduis);
        
    } else {
            alert("Please enter a valid num.");
                }

let area = Math.PI * Math.pow(raduis, 2);
alert(`Total area of the circle is `+area);              


//sqrroot
let sqr =prompt('what is the number you want to get its squareroot?');
if (!isNaN(sqr) && sqr >= 0) {
    sqr = Number(sqr);
    
} else {
    alert("Please enter a valid num.");
}
let sqroot = Math.sqrt(sqr);
alert(`the square root of the number you entered is: `+sqroot);  


// cos of angle
let angle =prompt('what is the number of the angle?');
if (!isNaN(angle) && angle !== null ) {
    angle = Number(angle);
    
    if (angle >360){
        angle =angle -360;
    }
    
} else {
    alert("Please enter a valid angle.");
}
let cosValue = Math.cos(angle);
document.write(`cosine of the angle you entered is :`+cosValue);
