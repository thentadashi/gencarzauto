<!DOCTYPE html>
<html>
<head>
    <title>Location Form</title>
</head>
<body>
    <h1>Location Form</h1>
    <form id="locationForm">
        <label for="province">Province:</label>
        <select id="province">
            <!-- Default selected option for the specified Province -->
            <option value="015500000" selected>PANGASINAN</option>
        </select>
        <br>
        <label for="location">Municipality/City:</label>
        <select id="location">
            <option value="">Select Municipality/City</option>
        </select>
        <br>
        <label for="barangay">Barangay:</label>
        <select id="barangay">
            <option value="">Select Barangay</option>
        </select>
        <br>
        <button type="submit">Submit</button>
    </form>

    <script>
        const provinceDropdown = document.getElementById('province');
        const locationDropdown = document.getElementById('location');
        const barangayDropdown = document.getElementById('barangay');
        const form = document.getElementById('locationForm');

        // Function to populate Municipality/City dropdown based on selected Province
        function populateLocations(selectedProvince) {
            locationDropdown.innerHTML = '<option value="">Select Municipality/City</option>'; // Reset the dropdown

            // Make an AJAX request to the API to fetch cities and municipalities for the selected Province
            fetch(`https://psgc.gitlab.io/api/provinces/${selectedProvince}/cities-municipalities/`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(location => {
                        // Filter cities and municipalities based on their properties
                        if (location.isCity || location.isMunicipality) {
                            const option = document.createElement('option');
                            option.value = location.code; // Use code as the option value
                            option.textContent = location.name;
                            locationDropdown.appendChild(option);
                        }
                    });
                })
                .catch(error => console.error('Error fetching cities and municipalities:', error));
        }

        // Function to populate Barangay dropdown based on selected Municipality or City
        function populateBarangays(selectedLocation) {
            barangayDropdown.innerHTML = '<option value="">Select Barangay</option>'; // Reset the dropdown

            // Make an AJAX request to the API to fetch barangays for the selected Municipality or City
            fetch(`https://psgc.gitlab.io/api/municipalities/${selectedLocation}/barangays/`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(barangay => {
                        const option = document.createElement('option');
                        option.value = barangay.code; // Use code as the option value
                        option.textContent = barangay.name;
                        barangayDropdown.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching barangays:', error));
        }

        // Event listener to handle form submission
        form.addEventListener('submit', (event) => {
            event.preventDefault();

            const selectedLocation = locationDropdown.value;
            const selectedBarangay = barangayDropdown.value;

            const selectedLocationName = locationDropdown.options[locationDropdown.selectedIndex].text;
            const selectedBarangayName = barangayDropdown.options[barangayDropdown.selectedIndex].text;

            // Display the selected location name and barangay name
            console.log('Selected Location:', selectedLocationName);
            console.log('Selected Barangay:', selectedBarangayName);

            // Perform your database insertion here using the selected names
        });

        // Event listeners to handle dropdown changes
        provinceDropdown.addEventListener('change', () => {
            const selectedProvince = provinceDropdown.value;
            populateLocations(selectedProvince);
        });

        locationDropdown.addEventListener('change', () => {
            const selectedLocation = locationDropdown.value;
            populateBarangays(selectedLocation);
        });

        // Initialize the Municipality/City dropdown with the specified Province code
        const selectedProvince = provinceDropdown.value;
        populateLocations(selectedProvince);
    </script>
</body>
</html>
