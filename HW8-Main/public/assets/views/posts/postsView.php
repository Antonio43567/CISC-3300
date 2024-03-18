<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Make a Post</title>

    <!-- <script>
        $(document).ready(function() {
            $("#form-id").submit(function(event) {
                event.preventDefault(); 
                var username = $("#username-input").val();
                var title = $("#title-input").val(); 
                var description = $("#description-input").val();  
                var submit = $("#submit-input").val();
                $(".data-container").load("/posts", {
                    username: username, 
                    title: title, 
                    description: description, 
                    submit: submit
                }); 
            }); 
        }); 
    </script> -->
</head>
    <body>
        <form id="form-id" action="" method="POST">
            <label for="Username">Username:</label>
            <br>
            <input type="text" id="username-input" name="username">
            <br><br>
            <label for="Title">Post Title:</label>
            <br>
            <input  type="text" id="title-input" name="title">
            <br><br>
            <label for="Description">Description:</label>
            <br>
            <textarea name="description" id="description-input" placeholder="Write something to post..."></textarea>
            <br><br>
            <button id="submit-input" value="submit">Share post</button>
        </form>
        <div id="data-container"></div>

        <script>
            $(document).ready(function () {
                $('#form-id').on('submit', function (e) {
                    e.preventDefault();
                    var username = $('#username-input').val();
                    var title = $('#title-input').val();
                    var description = $('#description-input').val();

                    const data = {
                        username: username,
                        title: title,
                        description: description,
                    }

                    $.ajax({
                        url: 'http://localhost:8888/posts',
                        type: "POST",
                        data: data,
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            $('#username-input').val('')
                            $('#title-input').val('')
                            $('#description-input').val('')
                            $('#data-container').html(
                                `<div>
                                    <p>Form submitted successfully!</p>
                                    <p>${data.name}</p>
                                    <p>${data.title}</p>
                                    <p>${data.description}</p>
                                 </div>`
                            )
                        },
                        error: function (data){

                            $('#data-container').html('')
                            $.each( data.responseJSON, function( key, value ) {
                                $('#data-container').append(`
                                   <p>${value}</p> `)
                            });

                        }
                    });

                });
            })
        </script>
    </body>      

</html>