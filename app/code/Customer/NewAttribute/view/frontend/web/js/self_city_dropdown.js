require(['jquery', 'mage/url'], function ($, urlBuilder) {
    $(document).ready(function () {
        // Handle the change event of the city dropdown
        $('#provincedropselfemployed').change(function () {
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
                     // Show the loader or disable the city dropdown
                     $('body').loader('show')
                },
                success: function (response) {
                       // Clear the existing options and reset input fields
                       $('#citydropselfemployed').empty().val('');
                       $('#city_title').val('');
                       $('#city_id').val('');

                       var selectedValue = provinceId;
                       $('#citydropselfemployed').val(selectedValue);

                    if (response.length > 0) {
                        // Add the new options
                        $.each(response, function (index, option) {
                            var $option = $('<option>', {
                                value: option.value,
                                text: option.label
                            });
                            $('#citydropselfemployed').append($option);
                        });
                    } else {
                          // Handle the case where no citys are found for the selected city
                          $('#citydropselfemployed').append($('<option>', {
                            value: '',
                            text: 'No citys found.'
                        }));
                    }
                },
                complete: function () {
                     // Hide the loader or enable the city dropdown
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
