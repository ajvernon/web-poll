/*
 * This function throws errors as alerts, instead of just silently
 * throwing them into the console.
 */
window.onerror = function(msg, url, linenumber) {
    alert('Error message: '+msg+'\nURL: '+url+'\nLine Number: '+linenumber);
    return true;
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
        httpRequest.open('POST', "db.php");
        httpRequest.send(dataToSend);
    }

    var form = document.getElementById("pollForm");
    form.addEventListener("submit", function (event) {
        event.preventDefault();
        makeRequest(form);
    });

});
