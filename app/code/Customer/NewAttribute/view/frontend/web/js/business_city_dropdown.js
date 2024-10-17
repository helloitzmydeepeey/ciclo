require(['jquery', 'mage/url', 'mage/loader'], function ($, urlBuilder) {
    $(document).ready(function () {
        // Handle the change event of the province dropdown
        $('#provincedropbusiness').change(function () {
            var provinceId = $(this).val();
            // Generate the AJAX URL dynamically using the URL builder
            var ajaxUrl = urlBuilder.build('client/city/load');
            // Make an AJAX request to fetch the updated city options
            $.ajax({
                url: ajaxUrl,
                data: { province_id: provinceId },
                type: 'POST',
                dataType: 'json',
                beforeSend: function () {
                    // Show the loader
                    $('body').loader('show');
                },
                success: function (response) {
                    // Clear the existing options and reset input fields
                    $('#citydropbusiness').empty().val('');
                    $('#city_title').val('');
                    $('#city_id').val('');

                    var selectedValue = provinceId;
                    $('#citydropbusiness').val(selectedValue);

                    if (response.length > 0) {
                        // Add the new options
                        $.each(response, function (index, option) {
                            var $option = $('<option>', {
                                value: option.value,
                                text: option.label
                            });
                            $('#citydropbusiness').append($option);
                        });
                    } else {
                        // Handle the case where no cities are found for the selected province
                        $('#citydropbusiness').append($('<option>', {
                            value: '',
                            text: 'No cities found.'
                        }));
                    }
                },
                complete: function () {
                    // Hide the loader
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
