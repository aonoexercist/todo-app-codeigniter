$("document").ready(function() {

    $("form").submit(function() {
        let todoValue = $("form input").val();
        console.log("submit clicked", todoValue);

        let jsonData = {
            todo: todoValue
        }

        if ( todoValue != '' ) {
            $.ajax({
                type: "post",
                url: "home/create_todo",
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                async: false,
                data: JSON.stringify(jsonData),
            });
        }

    });
    
  
    $("button.delete").click(function() {
        let id = $(this).data("id");
        console.log("remove clicked", id);
        if (confirm("Are you sure you want to delete?")) {
            let jsonData = {
                id: id
            }

            $.ajax({
                type: "delete",
                url: "home/delete_todo",
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                async: false,
                data: JSON.stringify(jsonData),
                success: function(res) {
                    location.href = base_url + 'home';
                }
            });
        }
    });
  
    $("button.update").click(function() {
        let id = $(this).data("id");
        let todoItem = $(".todo-item-"+id).text();
        console.log("edit clicked", id, todoItem);

        let todo = prompt("Rename the todo: ", todoItem);
    
        if (todo != null) {

            let jsonData = {
                id: id,
                todo: todo
            }
            $.ajax({
                type: "put",
                url: "home/update_todo",
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                async: false,
                data: JSON.stringify(jsonData),
                success: function(res) {
                    location.href = base_url + 'home';
                }
            });
        }
    });
  
    $("input[type=checkbox]").click(function() {
        let state = $(this).prop("checked");
        let id = $(this).data("id");
        console.log("check", id, state);
        
        let jsonData = {
            id: id,
            check: state
        }
        $.ajax({
            type: "put",
            url: "home/update_checkbox",
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            // async: false,
            data: JSON.stringify(jsonData),
        });
    });

});