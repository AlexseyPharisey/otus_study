<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Form 1</title>
    <script>
        function addUserParamField() {
            const userParamsContainer = document.getElementById('user-params-container');
            const newParamDiv = document.createElement('div');
            newParamDiv.classList.add('user-param-field');

            const newParamInput = document.createElement('input');
            newParamInput.type = 'text';
            newParamInput.name = 'params[]';
            newParamInput.placeholder = 'Enter param';

            newParamDiv.appendChild(newParamInput);
            userParamsContainer.appendChild(newParamDiv);
        }
    </script>
</head>
<body>
<form action="index.php" method="post">
    <div id="user-params-container">
        <div class="user-param-field">
            <label for="user-param">Param:</label>
            <input type="text" name="params[]" placeholder="Enter param" required>
        </div>
    </div>
    <button type="button" onclick="addUserParamField()">Add Param</button>
    <button type="submit" name="action" value="show">Search</button>
</form>
</body>
</html>
