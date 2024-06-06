<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship Form</title>
    <!-- Add Bootstrap CSS link here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('/images/bg.png');
            /* Replace 'path/to/your/image.jpg' with the actual path to your image */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            margin: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            background-color: #ffffff;
            max-width: 600px;
            position: relative;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 30px;
            height: 30px;
            background-color: lightskyblue;
            /* Red color for the close button */
            color: #ffffff;
            border: none;
            border-radius: 50%;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1>Scholarship Form</h1>
        <button class="close-button" onclick="window.location.href = '/thanksAdmin'">X</button>
        <form method="post">
            @csrf
            <div class="mb-3">
                <label for="scholarshipName" class="form-label">Scholarship Name</label>
                <input type="text" class="form-control" id="scholarshipName" placeholder=" Sholarship name" name="sname" required>
            </div>
            <div class="mb-3"><label for="scholarshipDescription" class="form-label">Scholarship Description / Eligibility</label>
                <textarea class="form-control" id="scholarshipDescription" placeholder="Scholarship Description or Eligibility" name="eligibility" required></textarea>
            </div>
            <div class="mb-3"><label for="classDropdown" class="form-label" name="class">Class</label>
                <select class="form-select" id="classDropdown" name="class" required>
                    <option value="" disabled selected>Select</option>
                    <option value="school">School</option>
                    <option value="college">College</option>
                    <option value="undergraduate">Undergraduate</option>
                    <option value="postgraduate">Postgraduate</option>
                    <option value="doctorate">Doctorate</option>
                </select>
            </div>
            <div class="mb-3"> <label for="religion" class="form-label">Religion</label>
                <input type="text" class="form-control" id="religion" placeholder="Enter religion" name="religion" required>
            </div>
            <div class="mb-3"><label for="caste" class="form-label">Caste</label>
                <input type="text" class="form-control" id="caste" placeholder="Enter caste" name="caste" required>

            </div>
            <div class="mb-3"><label for="income" class="form-label">Income</label>
                <input type="number" class="form-control" id="income" placeholder="Enter income" name="income" required>

            </div>
            <div class="mb-3"><label for="stateDropdown" class="form-label">State</label>
                <select class="form-select" id="stateDropdown" name="state" required>
                    <option value="" disabled selected>Select</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                    <option value="Assam">Assam</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Chhattisgarh">Chhattisgarh</option>
                    <option value="Goa">Goa</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="Mizoram">Mizoram</option>
                    <option value="Nagaland">Nagaland</option>
                    <option value="Odisha">Odisha</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Sikkim">Sikkim</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Telangana">Telangana</option>
                    <option value="Tripura">Tripura</option>
                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                    <option value="Uttarakhand">Uttarakhand</option>
                    <option value="West Bengal">West Bengal</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="customFields" class="form-label">Custom Fields</label>
                <div id="customFieldsContainer" name="customFields">
                    <!-- Custom fields will be added here dynamically -->
                </div>
                <button type="button" class="btn btn-secondary" onclick="addCustomField()">Add Custom Field</button>
                <button type="button" class="btn btn-danger" onclick="deleteLastCustomField()">Delete Last Field</button>
                <button type="button" class="btn btn-success" onclick="finalizeCustomFields()">Finalize Fields</button>
            </div>
            <button value="submit" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Add Bootstrap JS and Popper.js scripts here -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function addCustomField() {
            var customFieldsContainer = document.getElementById('customFieldsContainer');

            var customFieldDiv = document.createElement('div');
            customFieldDiv.classList.add('mb-3');

            var fieldNameInput = document.createElement('input');
            fieldNameInput.type = 'hidden';
            fieldNameInput.classList.add('form-control');
            fieldNameInput.placeholder = 'Enter Field Name';
            fieldNameInput.name = 'customFields[]'; // Use [] to indicate an array
            customFieldDiv.appendChild(fieldNameInput);

            var fieldValueInput = document.createElement('input');
            fieldValueInput.type = 'text'; // You can change the type if needed
            fieldValueInput.classList.add('form-control');
            fieldValueInput.placeholder = 'Enter Field Value';
            fieldValueInput.name = 'customFieldValues[]'; // Use [] to indicate an array
            customFieldDiv.appendChild(fieldValueInput);

            customFieldsContainer.appendChild(customFieldDiv);
        }


        function deleteLastCustomField() {
            var customFieldsContainer = document.getElementById('customFieldsContainer');
            var children = customFieldsContainer.children;

            if (children.length > 0) {
                customFieldsContainer.removeChild(children[children.length - 1]);
            }
        }

        function finalizeCustomFields() {
            var customFieldsContainer = document.getElementById('customFieldsContainer');
            var children = customFieldsContainer.children;

            // Check if any custom field value is empty
            var isValid = true;
            for (var i = 0; i < children.length; i++) {
                var inputField = children[i].querySelector('input[type="text"]');
                if (inputField && inputField.value.trim() === '') {
                    isValid = false;
                    break;
                }
            }

            if (!isValid) {
                alert('Please fill in all custom field values before finalizing.');
                return;
            }

            // Loop through the custom fields and update the input names
            for (var i = 0; i < children.length; i++) {
                var inputField = children[i].querySelector('input[type="text"]');
                if (inputField) {
                    inputField.name = 'customFields[' + i + ']'; // Update the name to include the index
                    inputField.readOnly = true; // Set input field to read-only
                }
            }

            // Disable the buttons
            document.querySelector('button.btn-secondary').disabled = true;
            document.querySelector('button.btn-success').disabled = true;
            document.querySelector('button.btn-danger').disabled = true;
        }
    </script>
</body>

</html>