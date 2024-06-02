<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Form 2</title>
    <script>
        function addAdminParamField() {
            const adminParamsContainer = document.getElementById('admin-params-container');
            const newParamDiv = document.createElement('div');
            newParamDiv.classList.add('admin-param-field');

            const newParamInput = document.createElement('input');
            newParamInput.type = 'text';
            newParamInput.name = 'params[]';
            newParamInput.placeholder = 'Enter param';

            newParamDiv.appendChild(newParamInput);
            adminParamsContainer.appendChild(newParamDiv);
        }
    </script>
</head>
<body>
<form action="index.php" method="post">
    <div>
        <label for="priority">Priority:</label>
        <input type="number" id="priority" name="priority" required>
    </div>
    <div id="admin-params-container">
        <div class="admin-param-field">
            <label for="admin-param">Param:</label>
            <input type="text" name="params[]" placeholder="Enter param" required>
        </div>
    </div>
    <button type="button" onclick="addAdminParamField()">Add Param</button>
    <button type="submit" name="action" value="store">Submit</button>
</form>
<pre></pre>
<pre></pre>
<form action="index.php" method="post">
    <button type="submit" name="action" value="index">Show</button>
</form>
<pre></pre>
<pre></pre>
<form action="index.php" method="post">
    <button type="submit" name="action" value="delete">ClearData</button>
</form>
<pre></pre>
<pre></pre>
</body>
</html>
