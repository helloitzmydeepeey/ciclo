require(['jquery', 'mage/url'], function ($, urlBuilder) {
    $(document).ready(function () {
        // Handle the change event of the city dropdown
        $('#citydrop').change(function () {
            var cityId = $(this).val();
            // Generate the AJAX URL dynamically using the URL builder
            var ajaxUrl = urlBuilder.build('customer/barangay/load');
            // Make an AJAX request to fetch the updated barangay options
            $.ajax({
                url: ajaxUrl,
                data: { city_id: cityId },
                type: 'POST',
                dataType: 'json',
                beforeSend: function () {
                     // Show the loader or disable the barangay dropdown
                     $('body').loader('show')
                },
                success: function (response) {
                       // Clear the existing options and reset input fields
                       $('#barangaydrop').empty().val('');
                       $('#barangay_title').val('');
                       $('#barangay_id').val('');

                       var selectedValue = cityId;
                       $('#barangaydrop').val(selectedValue);

                    if (response.length > 0) {
                        // Add the new options
                        $.each(response, function (index, option) {
                            var $option = $('<option>', {
                                value: option.value,
                                text: option.label
                            });
                            $('#barangaydrop').append($option);
                            if (index === 0) {
                                // Set the city name and sub-city ID based on the first result
                                $('#barangay_title').val(option.label);
                                $('#barangay_id').val(option.value);
                            }
                        });
                    } else {
                          // Handle the case where no barangays are found for the selected city
                          $('#barangaydrop').append($('<option>', {
                            value: '',
                            text: 'No barangays found.'
                        }));
                    }
                },
                complete: function () {
                     // Hide the loader or enable the barangay dropdown
                     $('body').loader('hide')
                },
                error: function (xhr, status, error) {
                    // Handle the error case
                    console.log(error);
                }
            });
        });
    });
});
