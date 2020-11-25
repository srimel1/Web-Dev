var secretNum = 0;
var attempts = 10;
var count = 10;


/***
 * function to generate the random number and to get the attempts
 */

function init() {
    secretNum = Math.floor(Math.random() * 101);

    document.getElementById('attempts').innerHTML = count + " guesses left";
}

/***
 * function to check if the number is higher, lower, or equal to the randomly generated number
 */
function check() {
    var c = document.getElementById('attempts').innerHTML;
    var guess = new Number(document.getElementById('input-7').value);
    if (guess == secretNum) {


        alert('You guessed the Secret Number! ' + secretNum + ' in '+ count +' tries.\n Restarting the game...');
        count = attempts;
        init();
    } else {
        if (guess > secretNum && count > 1) {
            alert('Your guess was higher than the secret number... '+count+' tries left. Random number= ' + secretNum);
            count--;
            document.getElementById('attempts').innerHTML = count + " tries left";
        }
        if (guess < secretNum && count > 1) {
            alert('Your guess was lower than secret number... '+count+' tries left. Random number: ' + secretNum);
            count = count - 1;
            document.getElementById('attempts').innerHTML = count + " guesses left";
        }
        if (count == 1) {
            alert('You lost.... The secret number was ' + secretNum + '.\n The game will now restart.');
            count = attempts;
            init();
        }
    }
}


/***
 *
 * Function
 * @param hrs
 * @returns {number}
 */

function grossPay(hrs) {
    if (hrs <= 40) {
        return (hrs * 15);
    } else {
        return ((40 * 15) + ((hrs - 40) * 1.5 * 15));
    }
}


function process() {
    var arr = [];
    var i = 1;
    
    while (true) {
        var val = prompt("Input the number of hours worked for Employee #" + (i) + ": ", 0);
        val = parseInt(val);
        if (val == -1)
            break;
        arr.push(val);
        i++;
    }
    CreateTable(arr);
}


//script for table
function CreateTable(arr) {

    // CREATE DYNAMIC TABLE.
    var table = document.createElement('table');

    // SET THE TABLE ID.
    // WE WOULD NEED THE ID TO TRAVERSE AND EXTRACT DATA FROM THE TABLE.
    table.setAttribute('id', 'employeeTable');

    var arrHead = new Array();
    arrHead = ['Employee #', 'Hours Worked', 'Gross Pay'];

    var arrValue = new Array();



    for (i = 0; i < arr.length; i++) {
        arrValue.push([i, arr[i], grossPay(arr[i])]);
    }

    var tr = table.insertRow(-1);

    for (var h = 0; h < arrHead.length; h++) {
        //headers
        var th = document.createElement('th');              
        th.innerHTML = arrHead[h];
        tr.appendChild(th);
    }

    for (var c = 0; c <= arrValue.length - 1; c++) {
        tr = table.insertRow(-1);

        for (var j = 0; j < arrHead.length; j++) {
            var td = document.createElement('td');          
            td = tr.insertCell(-1);
            //adds the values to the cells
            td.innerHTML = arrValue[c][j];                  
        }
    }


    document.getElementById("log").appendChild(table);

}

function GetTableValues() {

    var employeeTable = document.getElementById('employeeTable');

    var div = document.createElement('div');
    div.innerHTML = "";
    div.innerHTML = '<br />';

    //traverse through the table
    for (var row = 1; row <= employeeTable.rows.length - 1; row++) {
        for (var col = 0; col <= employeeTable.rows[r].cells.length - 1; col++) {

            //adds to the div
            div.innerHTML = div.innerHTML + ' ' +
                employeeTable.rows[row].cells[col].innerHTML;

        }
        div.innerHTML = div.innerHTML + '<br />';
    }
    document.log.appendChild(div);     // APPEND (ADD) THE CONTAINER TO THE BODY.
}
