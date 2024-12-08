// name
    while (true) {
        username = prompt("Please enter your name:");
        if (username&& isNaN(username))  {
            break;
        } else {
        alert("Invalid input. Please enter a valid name.");
    }
    }

// age
    while (true) {
        birthYear = prompt("Please enter your birth year:");
        if (birthYear && !isNaN(birthYear) && Number(birthYear) < 2010) {
        birthYear = Number(birthYear);
            break;
        }
        alert("Invalid input. Please enter a year  less than 2010.");
    }




// Calculate age
    age = 2024 - birthYear;


document.write( "Your name :" + username + "<br>" ) ;
document.write( "Birth Year:" + +birthYear + "<br>");
document.write( "Age:" + +age + "<br>");