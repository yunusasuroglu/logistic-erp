document.addEventListener('DOMContentLoaded', function() {
    var customerSelect = document.getElementById('customer_select');
    var carrierSelect = document.getElementById('carrier_select');
    
    customerSelect.addEventListener('change', function() {
        var selectedCustomerId = this.value;
        var selectedCustomer = customers.find(customer => customer.id == selectedCustomerId);
        
        if (selectedCustomer && selectedCustomerId !== 'new_customer') {
            document.getElementById('customer-company-name').value = selectedCustomer.company_name;
            document.getElementById('customer-name-surname').value = selectedCustomer.name;
            document.getElementById('customer-email').value = selectedCustomer.email;
            document.getElementById('customer-phone').value = selectedCustomer.phone;

            var reverseChargeCheckbox = document.getElementById('reverse_charge');
            if (selectedCustomer.reverse_charge == 2) {
                reverseChargeCheckbox.checked = true;
            } else {
                reverseChargeCheckbox.checked = false;
            }
            
            // Adres bilgilerini doldur
            var addressString = selectedCustomer.address;
            var addressObject = JSON.parse(addressString);
            
            document.getElementById('customer-street-and-house-number').value = addressObject.street;
            document.getElementById('customer-zip-code').value = addressObject.zip_code;
            document.getElementById('customer-city').value = addressObject.city;
            
            // Ülke bilgisini de doldur
            var countrySelect = document.getElementById('customer-country-select');
            var countryOption = countrySelect.querySelector('option[value="' + addressObject.country + '"]');
            if (countryOption) {
                countryOption.selected = true;
            }
            
            // Input alanlarını devre dışı bırak
            var inputFields = document.querySelectorAll('#customer-company-name, #customer-name-surname, #customer-email, #customer-phone, #customer-street-and-house-number, #customer-zip-code, #customer-city, #customer-country-select');
            inputFields.forEach(function(input) {
                input.readOnly = true;
            });
        } else {
            // Yeni müşteri seçildiğinde input alanlarını temizle ve aktif et
            document.getElementById('customer-company-name').value = '';
            document.getElementById('customer-name-surname').value = '';
            document.getElementById('customer-phone').value = '';
            document.getElementById('customer-email').value = '';
            document.getElementById('customer-street-and-house-number').value = '';
            document.getElementById('customer-zip-code').value = '';
            document.getElementById('customer-city').value = '';
            document.getElementById('customer-country-select').value = '';
            
            // Input alanlarını aktif et
            var inputFields = document.querySelectorAll('#customer-company-name, #customer-name-surname, #customer-email, #customer-phone, #customer-street-and-house-number, #customer-zip-code, #customer-city, #customer-country-select');
            inputFields.forEach(function(input) {
                input.readOnly = false;
            });
        }
    });
    
    carrierSelect.addEventListener('change', function() {
        var selectedCarrierId = this.value;
        var selectedCarrier = carriers.find(carrier => carrier.id == selectedCarrierId);
        
        if (selectedCarrier && selectedCarrierId !== 'new_carrier') {
            document.getElementById('carrier-company-name').value = selectedCarrier.company_name;
            document.getElementById('carrier-name-surname').value = selectedCarrier.name;
            document.getElementById('carrier-email').value = selectedCarrier.email;
            document.getElementById('carrier-phone').value = selectedCarrier.phone;
            
            // Adres bilgilerini doldur
            var addressString = selectedCarrier.address;
            var addressObject = JSON.parse(addressString);
            
            document.getElementById('carrier-street-and-house-number').value = addressObject.street;
            document.getElementById('carrier-zip-code').value = addressObject.zip_code;
            document.getElementById('carrier-city').value = addressObject.city;
            
            // Ülke bilgisini de doldur
            var countrySelect = document.getElementById('carrier-country-select');
            var countryOption = countrySelect.querySelector('option[value="' + addressObject.country + '"]');
            if (countryOption) {
                countryOption.selected = true;
            }
            
            // Input alanlarını devre dışı bırak
            var inputFields = document.querySelectorAll('#carrier-company-name, #carrier-name-surname, #carrier-email, #carrier-phone, #carrier-street-and-house-number, #carrier-zip-code, #carrier-city, #carrier-country-select');
            inputFields.forEach(function(input) {
                input.readOnly = true;
            });
        } else {
            // Yeni müşteri seçildiğinde input alanlarını temizle ve aktif et
            document.getElementById('carrier-company-name').value = '';
            document.getElementById('carrier-name-surname').value = '';
            document.getElementById('carrier-phone').value = '';
            document.getElementById('carrier-email').value = '';
            document.getElementById('carrier-street-and-house-number').value = '';
            document.getElementById('carrier-zip-code').value = '';
            document.getElementById('carrier-city').value = '';
            document.getElementById('carrier-country-select').value = '';
            
            // Input alanlarını aktif et
            var inputFields = document.querySelectorAll('#carrier-company-name, #carrier-name-surname, #carrier-email, #carrier-phone, #carrier-street-and-house-number, #carrier-zip-code, #carrier-city, #carrier-country-select');
            inputFields.forEach(function(input) {
                input.readOnly = false;
            });
        }
    });
});


document.addEventListener('DOMContentLoaded', function() {
    // Yükleme Yerleri İçin
    var shipmentLocationCount = shipmentIndex;
    var addShipmentLocationButton = document.getElementById('edit-add-shipment-location');
    var shipmentLocationContainer = document.getElementById('shipments_edit_location_container');
    var shipmentLocationTemplate = document.getElementById('shipment-edit-location-1').innerHTML;

    // Sayfa yüklendiğinde varsayılan formdaki select değişikliklerini ele almak için
    for (var i = 1; i <= shipmentLocationCount; i++) {
        var defaultShipmentUploadAddress = document.getElementById('shipments_edit_select-' + i);
        if (defaultShipmentUploadAddress) {
            (function(index) {
                defaultShipmentUploadAddress.addEventListener('change', function() {
                    handleShipmentChange(this, index);
                });
            })(i);
        }
    }
    
    // Yeni bir sevkiyat adresi eklendiğinde değişiklik dinleyicisini ekle
    addShipmentLocationButton.addEventListener('click', function() {
        shipmentLocationCount++;
        addNewShipmentLocation(shipmentLocationCount);
    });

    function addNewShipmentLocation(shipmentIndex) {
        var newShipmentLocationHTML = '<div class="row gy-3" id="shipment-edit-location-' + shipmentIndex + '">' +
            shipmentLocationTemplate.replace(/shipments_edit_select-1/g, 'shipments_edit_select-' + shipmentIndex)
            .replace(/shipments-edit-company-1/g, 'shipments-edit-company-' + shipmentIndex)
            .replace(/shipments-edit-name-1/g, 'shipments-edit-name-' + shipmentIndex)
            .replace(/shipments-edit-phone-1/g, 'shipments-edit-phone-' + shipmentIndex)
            .replace(/shipments-edit-street-1/g, 'shipments-edit-street-' + shipmentIndex)
            .replace(/shipments-edit-zip-1/g, 'shipments-edit-zip-' + shipmentIndex)
            .replace(/shipments-edit-city-1/g, 'shipments-edit-city-' + shipmentIndex)
            .replace(/shipments-edit-country-1/g, 'shipments-edit-country-' + shipmentIndex)
            .replace(/name="shipments_edit_select-1"/g, 'name="shipments_edit_select-' + shipmentIndex + '"')
            .replace(/name="shipments_company_1"/g, 'name="shipments_company_' + shipmentIndex + '"')
            .replace(/name="shipments_name_1"/g, 'name="shipments_name_' + shipmentIndex + '"')
            .replace(/name="shipments_phone_1"/g, 'name="shipments_phone_' + shipmentIndex + '"')
            .replace(/name="shipments_street_1"/g, 'name="shipments_street_' + shipmentIndex + '"')
            .replace(/name="shipments_zip_1"/g, 'name="shipments_zip_' + shipmentIndex + '"')
            .replace(/name="shipments_city_1"/g, 'name="shipments_city_' + shipmentIndex + '"')
            .replace(/name="shipments_country_1"/g, 'name="shipments_country_' + shipmentIndex + '"')
            .replace(/name="shipments_upload_date_1"/g, 'name="shipments_upload_date_' + shipmentIndex + '"')
            .replace(/name="shipments_time_start_1"/g, 'name="shipments_time_start_' + shipmentIndex + '"')
            .replace(/name="shipments_time_end_1"/g, 'name="shipments_time_end_' + shipmentIndex + '"')
            .replace(/name="shipments_ref_no_1"/g, 'name="shipments_ref_no_' + shipmentIndex + '"')
            .replace(/name="shipments_content_1"/g, 'name="shipments_content_' + shipmentIndex + '"')
            .replace('Yükleme Yeri 1', 'Yükleme Yeri ' + shipmentIndex) +
            '</div>';

        shipmentLocationContainer.insertAdjacentHTML('beforeend', newShipmentLocationHTML);

        // Initialize Choices.js for the new select element
        initializeChoices();

        // Yeni eklenen sevkiyat adresi için değişiklik dinleyicisini ekle
        var newShipmentUploadAddress = shipmentLocationContainer.querySelector('#shipments_edit_select-' + shipmentIndex);
        newShipmentUploadAddress.addEventListener('change', function() {
            handleShipmentChange(this, shipmentIndex);
        });
    }

    function initializeChoices() {
        var elements = document.querySelectorAll('.shipment-upload-address:not([data-choice])');
        elements.forEach(function(element) {
            new Choices(element, { searchEnabled: true }); // Arama özelliğini etkinleştir
        });
    }

    function handleShipmentChange(selectElement, shipmentIndex) {
        var selectedItemId = selectElement.value; // Seçilen öğenin ID'sini al

        // İlgili inputlara bilgileri doldur ve etkinliği ayarla
        var container = document.getElementById('shipment-edit-location-' + shipmentIndex);

        if (container) {
            var companyInput = container.querySelector('#shipments-edit-company-' + shipmentIndex);
            var nameInput = container.querySelector('#shipments-edit-name-' + shipmentIndex);
            var phoneInput = container.querySelector('#shipments-edit-phone-' + shipmentIndex);
            var streetInput = container.querySelector('#shipments-edit-street-' + shipmentIndex);
            var zipInput = container.querySelector('#shipments-edit-zip-' + shipmentIndex);
            var cityInput = container.querySelector('#shipments-edit-city-' + shipmentIndex);
            var countryInput = container.querySelector('#shipments-edit-country-' + shipmentIndex);

            // Seçilen öğe "new_shipment" ise sadece company, name, phone ve street inputlarını etkinleştir
            if (selectedItemId === 'new_shipment') {
                clearInputs(companyInput, nameInput, phoneInput, streetInput, zipInput, cityInput, countryInput);
                enableInputs(companyInput, nameInput, phoneInput, streetInput, zipInput, cityInput, countryInput);
            } else {
                // Seçilen öğenin ID'sine sahip veriyi bul
                var selectedInfo = shipmentsInfo.find(item => item.id == selectedItemId);
                if (selectedInfo) {
                    // JSON formatındaki info alanından gerekli bilgileri çıkar
                    var info = JSON.parse(selectedInfo.info);

                    // İlgili inputlara bilgileri doldur
                    companyInput.value = info.company_name || '';
                    nameInput.value = info.name || '';
                    phoneInput.value = info.phone || '';
                    streetInput.value = info.street || '';
                    zipInput.value = info.zip_code || '';
                    cityInput.value = info.city || '';
                    countryInput.value = info.country || '';
                }
                // Diğer inputları etkinleştir
                enableAllInputs(container);
                // Ancak, company, name, phone ve street inputlarını devre dışı bırak
                disableInputs(container, [companyInput, nameInput, phoneInput, streetInput, zipInput, cityInput, countryInput]);
            }
        } else {
            console.error('Could not find #shipment-location element');
        }
    }

    function clearInputs(...inputs) {
        inputs.forEach(input => input.value = '');
    }

    function enableAllInputs(container) {
        var inputs = container.querySelectorAll('input');
        inputs.forEach(input => {
            input.readOnly = false;
        });
    }

    function enableInputs(...inputs) {
        inputs.forEach(input => {
            input.readOnly = false;
        });
    }

    function disableInputs(container, excludeInputs = []) {
        var inputs = container.querySelectorAll('input');
        inputs.forEach(input => {
            if (excludeInputs.includes(input)) {
                input.readOnly = true;
            }
        });
    }
});

// teslim yeri

document.addEventListener('DOMContentLoaded', function() {
    // Yükleme Yerleri İçin
    var deliveryLocationCount = deliveryIndex;
    var addDeliveryLocationButton = document.getElementById('edit-add-delivery-location');
    var deliveryLocationContainer = document.getElementById('deliverys_location_container');
    var deliveryLocationTemplate = document.getElementById('delivery-location-1').innerHTML;
    
    // Sayfa yüklendiğinde varsayılan formdaki select değişikliklerini ele almak için
    for (var i = 1; i <= deliveryLocationCount; i++) {
        var defaultDeliveryUploadAddress = document.getElementById('deliverys_select-' + i);
        if (defaultDeliveryUploadAddress) {
            (function(index) {
                defaultDeliveryUploadAddress.addEventListener('change', function() {
                    handleDeliveryChange(this, index);
                });
            })(i);
        }
    }
    
    // Yeni bir teslimat adresi eklendiğinde değişiklik dinleyicisini ekle
    addDeliveryLocationButton.addEventListener('click', function() {
        deliveryLocationCount++;
        addNewDeliveryLocation(deliveryLocationCount);
    });
    
    function addNewDeliveryLocation(deliveryIndex) {
        var newDeliveryLocationHTML = '<div class="row gy-3 " id="delivery-location-' + deliveryIndex + '">' +
        deliveryLocationTemplate.replace(/deliverys_select-1/g, 'deliverys_select-' + deliveryIndex)
        .replace(/deliverys-company-1/g, 'deliverys-company-' + deliveryIndex)
        .replace(/deliverys-name-1/g, 'deliverys-name-' + deliveryIndex)
        .replace(/deliverys-phone-1/g, 'deliverys-phone-' + deliveryIndex)
        .replace(/deliverys-street-1/g, 'deliverys-street-' + deliveryIndex)
        .replace(/deliverys-zip-1/g, 'deliverys-zip-' + deliveryIndex)
        .replace(/deliverys-city-1/g, 'deliverys-city-' + deliveryIndex)
        .replace(/deliverys-country-1/g, 'deliverys-country-' + deliveryIndex)
        .replace(/name="deliverys_select-1"/g, 'name="deliverys_select-' + deliveryIndex + '"')
        .replace(/name="deliverys_company_1"/g, 'name="deliverys_company_' + deliveryIndex + '"')
        .replace(/name="deliverys_name_1"/g, 'name="deliverys_name_' + deliveryIndex + '"')
        .replace(/name="deliverys_phone_1"/g, 'name="deliverys_phone_' + deliveryIndex + '"')
        .replace(/name="deliverys_street_1"/g, 'name="deliverys_street_' + deliveryIndex + '"')
        .replace(/name="deliverys_zip_1"/g, 'name="deliverys_zip_' + deliveryIndex + '"')
        .replace(/name="deliverys_city_1"/g, 'name="deliverys_city_' + deliveryIndex + '"')
        .replace(/name="deliverys_country_1"/g, 'name="deliverys_country_' + deliveryIndex + '"')
        .replace(/name="deliverys_upload_date_1"/g, 'name="deliverys_upload_date_' + deliveryIndex + '"')
        .replace(/name="deliverys_time_start_1"/g, 'name="deliverys_time_start_' + deliveryIndex + '"')
        .replace(/name="deliverys_time_end_1"/g, 'name="deliverys_time_end_' + deliveryIndex + '"')
        .replace(/name="deliverys_ref_no_1"/g, 'name="deliverys_ref_no_' + deliveryIndex + '"')
        .replace(/name="deliverys_content_1"/g, 'name="deliverys_content_' + deliveryIndex + '"')
        .replace('Teslim Yeri 1', 'Teslim Yeri ' + deliveryIndex) +
        '</div>';
        
        deliveryLocationContainer.insertAdjacentHTML('beforeend', newDeliveryLocationHTML);
        
        // Initialize Choices.js for the new select element
        initializeChoices();
        
        // Yeni eklenen teslimat adresi için değişiklik dinleyicisini ekle
        var newDeliveryUploadAddress = deliveryLocationContainer.querySelector('#deliverys_select-' + deliveryIndex);
        newDeliveryUploadAddress.addEventListener('change', function() {
            handleDeliveryChange(this, deliveryIndex);
        });
    }
    
    function initializeChoices() {
        var elements = document.querySelectorAll('.delivery-upload-address:not([data-choice])');
        elements.forEach(function(element) {
            new Choices(element, { searchEnabled: true }); // Arama özelliğini etkinleştir
        });
    }
    
    function handleDeliveryChange(selectElement, deliveryIndex) {
        var selectedItemId = selectElement.value; // Seçilen öğenin ID'sini al
        
        // İlgili inputlara bilgileri doldur ve etkinliği ayarla
        var container = document.getElementById('delivery-location-' + deliveryIndex);
        
        if (container) {
            var companyInput = container.querySelector('#deliverys-company-' + deliveryIndex);
            var nameInput = container.querySelector('#deliverys-name-' + deliveryIndex);
            var phoneInput = container.querySelector('#deliverys-phone-' + deliveryIndex);
            var streetInput = container.querySelector('#deliverys-street-' + deliveryIndex);
            var zipInput = container.querySelector('#deliverys-zip-' + deliveryIndex);
            var cityInput = container.querySelector('#deliverys-city-' + deliveryIndex);
            var countryInput = container.querySelector('#deliverys-country-' + deliveryIndex);
            
            // Seçilen öğe "new_delivery" ise sadece company, name, phone ve street inputlarını etkinleştir
            if (selectedItemId === 'new_delivery') {
                clearInputs(companyInput, nameInput, phoneInput, streetInput, zipInput, cityInput, countryInput);
                enableInputs(companyInput, nameInput, phoneInput, streetInput, zipInput, cityInput, countryInput);
            } else {
                // Seçilen öğenin ID'sine sahip veriyi bul
                var selectedInfo = deliverysInfo.find(item => item.id == selectedItemId);
                if (selectedInfo) {
                    // JSON formatındaki info alanından gerekli bilgileri çıkar
                    var info = JSON.parse(selectedInfo.info);
                    
                    // İlgili inputlara bilgileri doldur
                    companyInput.value = info.company_name || '';
                    nameInput.value = info.name || '';
                    phoneInput.value = info.phone || '';
                    streetInput.value = info.street || '';
                    zipInput.value = info.zip_code || '';
                    cityInput.value = info.city || '';
                    countryInput.value = info.country || '';
                }
                // Diğer inputları etkinleştir
                enableAllInputs(container);
                // Ancak, company, name, phone ve street inputlarını devre dışı bırak
                disableInputs(container, [companyInput, nameInput, phoneInput, streetInput, zipInput, cityInput, countryInput]);
            }
        } else {
            console.error('Could not find #delivery-location element');
        }
    }
    
    function clearInputs(...inputs) {
        inputs.forEach(input => input.value = '');
    }
    
    function enableAllInputs(container) {
        var inputs = container.querySelectorAll('input');
        inputs.forEach(input => {
            input.readOnly = false;
        });
    }
    
    function enableInputs(...inputs) {
        inputs.forEach(input => {
            input.readOnly = false;
        });
    }
    
    function disableInputs(container, excludeInputs = []) {
        var inputs = container.querySelectorAll('input');
        inputs.forEach(input => {
            if (excludeInputs.includes(input)) {
                input.readOnly = true;
            }
        });
    }
});


