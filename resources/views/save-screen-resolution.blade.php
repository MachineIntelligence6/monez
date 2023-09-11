<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    @csrf
    <script>
        // JavaScript code in your web page
        function sendScreenResolutionToServer() {
            var screenWidth = window.screen.width;
            var screenHeight = window.screen.height;
            var channelSearchId = `{{$channelSearchId}}`
            // Send the resolution data to your Laravel backend using an AJAX request
            // You can use jQuery.ajax or the Fetch API
            // Example using Fetch API:
            fetch('/api/save-screen-resolution', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('input[type="hidden"]').value
                },
                body: JSON.stringify({
                    width: screenWidth,
                    height: screenHeight,
                    channelSearchId: parseInt(channelSearchId),
                }),
            });
        }
        sendScreenResolutionToServer()
        var query = `{{$query}}`
        if(query){
            window.location = `{{$redirectToFeedURL}}`;
        } else {
            alert('Enter Keywords !')
        }

    </script>
</body>

</html>
