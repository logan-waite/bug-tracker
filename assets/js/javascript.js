function make_button(id, value, text) {
    //Create an input type dynamically.
    var btn = document.createElement("button");
    var t = document.createTextNode(text);
    
        
    if(id.charAt(0) === '#')
        id = id.slice(1);
 
    //Assign different attributes to the element.
    btn.setAttribute("value", value);
    btn.setAttribute("name", value);
    btn.setAttribute("id", value);
    btn.setAttribute("onclick", "button_action('" + value + "', '" + id +"')");

    var foo = document.getElementById(id);
 
    //Append the element in page (in span).
    btn.appendChild(t);
    foo.appendChild(btn);
} 

function button_action(value, id) {
    var comment = "comment";
    
    if(id.indexOf(comment) > -1) {
        if (value == 'delete') {
            var url = 'http://localhost:8888/bug-tracker/index.php/comments/delete_comment';
            for (i = 0; i < 7; i++) {   // Get comment id by itself
                id = id.slice(1);
            }
            console.log(id);
            $.post(url, {'id' : id}, function(result) {
                $("#comments").html(result);
            });
        }
        if (value == 'cancel') {
            $(".alert").html('').css('visibility', 'hidden');
        }
    }
}

function choose_issue(target, id) {
    var url = 'http://localhost:8888/bug-tracker/index.php/issues/' + target;
    //Send POST request to server
    $.post(url, {'issueID' : id}, function(result) {
        // Set current issue class to .active
        //$("#issue-list").on("click", ".nav-pills:not(.active)", function (event) {
        //    $(".active", event.delegateTarget).removeClass("active");
        //    $(this).addClass("active");
        //});
        // Plug resulting view into comment box
        $("#comment-list").html(result);
        $("#issue-tools").removeClass("hidden");
        $(".issue-id").attr('value', id);
        
        var issueTitle = $("#issue-header h4").html();
        var issueDescription = $("#issue-header p").html();
        $("#issueTitle").attr('value', issueTitle);
        $("#editDescription").html(issueDescription);
    });
}

function add_issue_view(target) {
    var url = 'http://localhost:8888/bug-tracker/index.php/issues/' + target;
    $.post(url, function(result) {
        $("#header").html("Add Issue");
        $("#main-wrapper").html(result);
    });
}

function current_issue_view(target) {
    var url = 'http://localhost:8888/bug-tracker/index.php/issues/' + target;
    $.post(url, function(result) {
        $("#main-wrapper").html(result);
        $("#header").html("Current Issues");
    });
}

function order_by(target, sort_by) {
    var url = 'http://localhost:8888/bug-tracker/index.php/issues/' + target + '/active';
    $.post(url, {'sort_by' : sort_by}, function(result) {
        $("#issue-list").html(result);
        if (sort_by == 'priority') {
            $('#date').removeClass('sort_active');
            $('#priority').addClass('sort_active');
        } else if (sort_by == 'date') {
            $('#priority').removeClass('sort_active');
            $('#date').addClass('sort_active');
        }
    });
}

function change_status(target, id) {
    var url = 'http://localhost:8888/bug-tracker/index.php/issues/' + target;
    var issueID = $(".issue-id").attr("value");
    console.log(issueID);
    var sort_by = $(".sort_active").attr('id');
    var state = 'active';
    
    $.post(url, {'status_id' : id, 'issue_id' : issueID, 'sort_by' : sort_by, 'active' : state}, function(result) {
        $("#issue-list").html(result);
    });
}

function edit_comment (target, id) {
    var url = 'http://localhost:8888/bug-tracker/index.php/issues/' + target;
    var title = "";
    $.post(url, {'commentID' : id}, function(result) {
        
    });
}

function delete_comment (target, id) {
    var elementID = "#comment" + id;
    $(".alert").html('').css('visibility', 'hidden');
    $(elementID).html("Are you sure you want to delete this comment? ").addClass('alert-danger').css('visibility', 'visible');
    make_button(elementID, 'delete', 'Yes');
    make_button(elementID, 'cancel', 'No');
}
