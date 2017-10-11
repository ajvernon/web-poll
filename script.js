/*
 * This function throws errors as alerts, instead of just silently
 * throwing them into the console.
 */
window.onerror = function(msg, url, linenumber) {
    alert('Error message: '+msg+'\nURL: '+url+'\nLine Number: '+linenumber);
    return true;
}

var i = 1;



function addOption(){
    console.log(container);
    if(container == null){
        alert('sorry, pollForm cannot be found');
        return false;    
    }
    i += 1;
    // Create the div, add it to the end
    let addedDiv = '<div id="option">\n'+
                   '        <label for="option' + i + '">Option:</label>\n' +
                   '        <input type="text" id="option' + i + '" name="option' + i + '">\n' +
                   '</div>\n';
    container.insertAdjacentHTML('beforeend', addedDiv);
    console.log(container);
}

/*
 * This block catches the submit button, and throws it to the PHP file.
 * This could have been done in HTML, but I chose to use JS as I'm familar with it.
 */
window.addEventListener("load", function (){
    function makeRequest(inputData) {
        let httpRequest = new XMLHttpRequest();
        let dataToSend = new FormData(inputData);
    
        if (!httpRequest) {
            alert('Giving up :( Cannot create an XMLHTTP instance');
            return false;
        }
        httpRequest.open('POST', "./poll-send.php");
        httpRequest.send(dataToSend);
        httpRequest.onreadystatechange = function() {
            if (this.readyState == XMLHttpRequest.DONE && this.status == 200) {
                console.log(this.responseText);
                window.location.href = "./poll.php?id=" + this.responseText;
            }
        };
    }

    var form = document.getElementById("pollForm");
    var container = document.getElementById("container");
    var input = document.getElementById("option" + i);    
    input.addEventListener("input", function(event){
        event.preventDefault();
        if (input.value.length == 1){
            addOption(container);
            input = document.getElementById("option" + i);
        }
    });

    form.addEventListener("submit", function (event) {
        event.preventDefault();
        makeRequest(form);
        
    });

});
