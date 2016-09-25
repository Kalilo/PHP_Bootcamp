$(document).ready(function() {
    var button = $("#add_item");

    /*Imported*/
    button.click(function() {
        var newtask = prompt("Add Task", "Enter the task name");
        console.log("they clicked the button");
        if (newtask)
            addtask(newtask);
        else
            console.log("they hit cancel :(");
    });
    /*Altered*/
    function addtask(text) {
        console.log("adding task to DOM: " + text);
        request("insert.php", text, NULL);
    }
    /*New*/
    function request(file, text, func) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                func;
            }
        };
        xhttp.open("POST", file, true);
        xhttp.send("q=" + text);
    }

});