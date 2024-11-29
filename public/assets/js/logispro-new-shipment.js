document.addEventListener('DOMContentLoaded', function() {
    var checkbox = document.getElementById('flexCheckChecked');
    var carrierInfoDiv = document.getElementById('carrier_info');
    var shipmentPriceDiv = document.getElementById('shipment_price');
    
    // Sayfa yüklendiğinde checkbox'ın durumunu kontrol edin
    if (checkbox.checked) {
        carrierInfoDiv.style.display = 'block';
        shipmentPriceDiv.style.display = 'block';
    }
    
    // Checkbox'a tıklanma olayını dinleyin
    checkbox.addEventListener('change', function() {
        if (this.checked) {
            carrierInfoDiv.style.display = 'block';
            shipmentPriceDiv.style.display = 'block';
        } else {
            carrierInfoDiv.style.display = 'none';
            shipmentPriceDiv.style.display = 'none';
        }
    });
});

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
            
            // reverse_charge checkbox'ını kontrol et
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
    var shipmentLocationCount = 1;
    var addShipmentLocationButton = document.getElementById('add-shipment-location');
    var shipmentLocationContainer = document.getElementById('shipments_location_container');
    var shipmentLocationTemplate = document.getElementById('shipment-location-1').innerHTML;
    
    // Sayfa yüklendiğinde varsayılan formdaki select değişikliklerini ele almak için
    var defaultShipmentUploadAddress = document.getElementById('shipments_select-1');
    if (defaultShipmentUploadAddress) {
        defaultShipmentUploadAddress.addEventListener('change', function() {
            handleShipmentChange(this, 1); // shipmentLocationCount 1 olarak belirtiliyor, çünkü varsayılan formda sadece bir tane var
        });
    }
    
    // Yeni bir sevkiyat adresi eklendiğinde değişiklik dinleyicisini ekle
    addShipmentLocationButton.addEventListener('click', function() {
        shipmentLocationCount++;
        addNewShipmentLocation(shipmentLocationCount);
    });
    
    function addNewShipmentLocation(count) {
        var newShipmentLocationHTML = '<div class="row gy-3" id="shipment-location-' + count + '">' +
        shipmentLocationTemplate.replace(/shipments_select-1/g, 'shipments_select-' + count)
        .replace(/shipments-company-1/g, 'shipments-company-' + count)
        .replace(/shipments-name-1/g, 'shipments-name-' + count)
        .replace(/shipments-phone-1/g, 'shipments-phone-' + count)
        .replace(/shipments-street-1/g, 'shipments-street-' + count)
        .replace(/shipments-zip-1/g, 'shipments-zip-' + count)
        .replace(/shipments-city-1/g, 'shipments-city-' + count)
        .replace(/shipments-country-1/g, 'shipments-country-' + count)
        .replace(/name="shipments_select-1"/g, 'name="shipments_select-1' + count + '"')
        .replace(/name="shipments_company_1"/g, 'name="shipments_company_' + count + '"')
        .replace(/name="shipments_name_1"/g, 'name="shipments_name_' + count + '"')
        .replace(/name="shipments_phone_1"/g, 'name="shipments_phone_' + count + '"')
        .replace(/name="shipments_street_1"/g, 'name="shipments_street_' + count + '"')
        .replace(/name="shipments_zip_1"/g, 'name="shipments_zip_' + count + '"')
        .replace(/name="shipments_city_1"/g, 'name="shipments_city_' + count + '"')
        .replace(/name="shipments_country_1"/g, 'name="shipments_country_' + count + '"')
        .replace(/name="shipments_upload_date_1"/g, 'name="shipments_upload_date_' + count + '"')
        .replace(/name="shipments_time_start_1"/g, 'name="shipments_time_start_' + count + '"')
        .replace(/name="shipments_time_end_1"/g, 'name="shipments_time_end_' + count + '"')
        .replace(/name="shipments_ref_no_1"/g, 'name="shipments_ref_no_' + count + '"')
        .replace(/name="shipments_content_1"/g, 'name="shipments_content_' + count + '"')
        .replace('Yükleme Yeri 1', 'Yükleme Yeri ' + count) +
        '</div>';
        
        shipmentLocationContainer.insertAdjacentHTML('beforeend', newShipmentLocationHTML);
        
        // Initialize Choices.js for the new select element
        initializeChoices();
        
        // Yeni eklenen sevkiyat adresi için değişiklik dinleyicisini ekle
        var newShipmentUploadAddress = shipmentLocationContainer.querySelector('#shipments_select-' + count);
        newShipmentUploadAddress.addEventListener('change', function() {
            handleShipmentChange(this, count);
        });
    }
    
    function initializeChoices() {
        var elements = document.querySelectorAll('.shipment-upload-address:not([data-choice])');
        elements.forEach(function(element) {
            new Choices(element, { searchEnabled: true }); // Arama özelliğini etkinleştir
        });
    }
    
    function handleShipmentChange(selectElement, count) {
        var selectedItemId = selectElement.value; // Seçilen öğenin ID'sini al
        
        // İlgili inputlara bilgileri doldur ve etkinliği ayarla
        var container = document.getElementById('shipment-location-' + count);
        
        if (container) {
            var companyInput = container.querySelector('#shipments-company-' + count);
            var nameInput = container.querySelector('#shipments-name-' + count);
            var phoneInput = container.querySelector('#shipments-phone-' + count);
            var streetInput = container.querySelector('#shipments-street-' + count);
            var zipInput = container.querySelector('#shipments-zip-' + count);
            var cityInput = container.querySelector('#shipments-city-' + count);
            var countryInput = container.querySelector('#shipments-country-' + count);
            
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
    var deliveryLocationCount = 1;
    var addDeliveryLocationButton = document.getElementById('add-delivery-location');
    var deliveryLocationContainer = document.getElementById('deliverys_location_container');
    var deliveryLocationTemplate = document.getElementById('delivery-location-1').innerHTML;
    
    // Sayfa yüklendiğinde varsayılan formdaki select değişikliklerini ele almak için
    var defaultDeliveryUploadAddress = document.getElementById('deliverys_select-1');
    if (defaultDeliveryUploadAddress) {
        defaultDeliveryUploadAddress.addEventListener('change', function() {
            handleDeliveryChange(this, 1); // deliveryLocationCount 1 olarak belirtiliyor, çünkü varsayılan formda sadece bir tane var
        });
    }
    
    // Yeni bir teslimat adresi eklendiğinde değişiklik dinleyicisini ekle
    addDeliveryLocationButton.addEventListener('click', function() {
        deliveryLocationCount++;
        addNewDeliveryLocation(deliveryLocationCount);
    });
    
    function addNewDeliveryLocation(count) {
        var newDeliveryLocationHTML = '<div class="row gy-3 " id="delivery-location-' + count + '">' +
        deliveryLocationTemplate.replace(/deliverys_select-1/g, 'deliverys_select-' + count)
        .replace(/deliverys-company-1/g, 'deliverys-company-' + count)
        .replace(/deliverys-name-1/g, 'deliverys-name-' + count)
        .replace(/deliverys-phone-1/g, 'deliverys-phone-' + count)
        .replace(/deliverys-street-1/g, 'deliverys-street-' + count)
        .replace(/deliverys-zip-1/g, 'deliverys-zip-' + count)
        .replace(/deliverys-city-1/g, 'deliverys-city-' + count)
        .replace(/deliverys-country-1/g, 'deliverys-country-' + count)
        .replace(/name="deliverys_select-1"/g, 'name="deliverys_select-' + count + '"')
        .replace(/name="deliverys_company_1"/g, 'name="deliverys_company_' + count + '"')
        .replace(/name="deliverys_name_1"/g, 'name="deliverys_name_' + count + '"')
        .replace(/name="deliverys_phone_1"/g, 'name="deliverys_phone_' + count + '"')
        .replace(/name="deliverys_street_1"/g, 'name="deliverys_street_' + count + '"')
        .replace(/name="deliverys_zip_1"/g, 'name="deliverys_zip_' + count + '"')
        .replace(/name="deliverys_city_1"/g, 'name="deliverys_city_' + count + '"')
        .replace(/name="deliverys_country_1"/g, 'name="deliverys_country_' + count + '"')
        .replace(/name="deliverys_upload_date_1"/g, 'name="deliverys_upload_date_' + count + '"')
        .replace(/name="deliverys_time_start_1"/g, 'name="deliverys_time_start_' + count + '"')
        .replace(/name="deliverys_time_end_1"/g, 'name="deliverys_time_end_' + count + '"')
        .replace(/name="deliverys_ref_no_1"/g, 'name="deliverys_ref_no_' + count + '"')
        .replace(/name="deliverys_content_1"/g, 'name="deliverys_content_' + count + '"')
        .replace('Teslim Yeri 1', 'Teslim Yeri ' + count) +
        '</div>';
        
        deliveryLocationContainer.insertAdjacentHTML('beforeend', newDeliveryLocationHTML);
        
        // Initialize Choices.js for the new select element
        initializeChoices();
        
        // Yeni eklenen teslimat adresi için değişiklik dinleyicisini ekle
        var newDeliveryUploadAddress = deliveryLocationContainer.querySelector('#deliverys_select-' + count);
        newDeliveryUploadAddress.addEventListener('change', function() {
            handleDeliveryChange(this, count);
        });
    }
    
    function initializeChoices() {
        var elements = document.querySelectorAll('.delivery-upload-address:not([data-choice])');
        elements.forEach(function(element) {
            new Choices(element, { searchEnabled: true }); // Arama özelliğini etkinleştir
        });
    }
    
    function handleDeliveryChange(selectElement, count) {
        var selectedItemId = selectElement.value; // Seçilen öğenin ID'sini al
        
        // İlgili inputlara bilgileri doldur ve etkinliği ayarla
        var container = document.getElementById('delivery-location-' + count);
        
        if (container) {
            var companyInput = container.querySelector('#deliverys-company-' + count);
            var nameInput = container.querySelector('#deliverys-name-' + count);
            var phoneInput = container.querySelector('#deliverys-phone-' + count);
            var streetInput = container.querySelector('#deliverys-street-' + count);
            var zipInput = container.querySelector('#deliverys-zip-' + count);
            var cityInput = container.querySelector('#deliverys-city-' + count);
            var countryInput = container.querySelector('#deliverys-country-' + count);
            
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


