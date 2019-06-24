function deleteRecord(id) {
    $.ajax({
        url: "delete.php",
        data: {
            id: $('#id').val(),
            Name: $('#Name').val(),
            Email: $('#Email').val(),
            Password: $("#Password").val(),
            Credit: $("#Credit").val(),
            Status: $("#Status").val()
        },
        method: 'post',
        success: function() {
            alert("Record deleted successfully");
        },
        error: function() {
            alert("Record cannot be deleted");
        }
    });
}

//             $.ajax({
//                 type: 'POST',
//                 url: "edit.php",
//                 dataType: "json",
//                 data: { id: id, Name: Name, Email: Email, Password: Password, Credit: Credit, Status: Status, action: 'edit' },
//                 success: function(response) {
//                     if (response.status) {}
//                 }
//             });
//         },
//     });
// });