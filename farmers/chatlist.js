
$(document).ready(function() {
    setInterval(function() {
        //if there is no customer name in the search box
        if(!$("#find").val()) {
            $.ajax({
                url: "show-chats.php",
                type: "POST",
                success: function(data) {
                    $("#users").html(data)
                }
            });
        } else {
            $("#find").on("keyup", function() {
                let search = $(this).val();
                $.ajax({
                    url: "chatList.php",
                    type: "POST",
                    data: {search: search},
                    success: function(data) {
                        $("#users").html(data)
                    }
                });
            });
        }
    }, 500);
});