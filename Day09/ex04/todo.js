$(document).ready(function() {
    var button = $("#add_item");
    var list = $("#ft_list");

    request("select.csv", 0, 0);

    /*Imported*/

    button.click(function() {
        var newtask = prompt("Add Task", "Enter the task name");
        console.log("they clicked the button");
        if (newtask)
            request("insert.php", newtask, addtask(newtask));
        else
            console.log("they hit cancel :(");
    });

    /*Altered*/

    function addtask(text) {
        console.log("adding task to DOM: " + text);
        var item_id = "todo";
        var new_item = document.createElement("LI");
        new_item.id = item_id;
        new_item.appendChild(document.createTextNode(text));
        new_item.addEventListener("click",
            function(event_object) {
                var sure = confirm("Are you sure you want to delete this TO DO?");
                if (sure) {
                    event_object.target.remove();
                    request("delete.php", event_object.val(), remove_item());
                }
            });
        var list = document.getElementById("ft_list");
        list.insertBefore(new_item, list.childNodes[0]);
    }

    function showtask(text) {
        //list.insertBefore(text, list.childNodes[0]);
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
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("q=" + text);
    }

    function remove_item(text) {
        //
    }

});