define(['underscore'], function (_) {
    'use strict';
    return function (addressData) {
       var regionId;
       if (addressData.region['region_id'] && addressData.region['region_id'] !== '0') {
          regionId = addressData.region['region_id'] + '';
       }
       return {
          customerAddressId: addressData.id,
          email: addressData.email,
          countryId: addressData['country_id'],
          regionId: regionId,
          regionCode: addressData.region['region_code'],
          region: addressData.region.region,
          customerId: addressData['customer_id'],
          street: addressData.street,
          company: addressData.company,
          telephone: addressData.telephone,
          fax: addressData.fax,
          postcode: addressData.postcode,
          city: addressData.city,
          firstname: addressData.firstname,
          lastname: addressData.lastname,
          middlename: addressData.middlename,
          prefix: addressData.prefix,
          suffix: addressData.suffix,
          vatId: addressData['vat_id'],
          sameAsBilling: addressData['same_as_billing'],
          saveInAddressBook: addressData['save_in_address_book'],
          customAttributes: _.toArray(addressData['custom_attributes']).reverse(),
          isDefaultShipping: function () {
             return addressData['default_shipping'];
          },
          isDefaultBilling: function () {
             return addressData['default_billing'];
          },
          getAddressInline: function () {
             return addressData.inline;
          },
          getType: function () {
             return 'customer-address';
          },
          getKey: function () {
             return this.getType() + this.customerAddressId;
          },
          getCacheKey: function () {
             return this.getKey();
          },
          isEditable: function () {
             return false;
          },
          canUseForBilling: function () {
             return true;
          },
          getAddressID: function () {
             return this.customerAddressId;
          },
          getDeliveryAddressType: function () {
             return addressData.delivery_address_type;
          },
          getStoreLocatorUrl: function () {
             return window.checkout.baseUrl + '/storelocator?pincode=' + addressData.postcode + '&city=' + addressData.city;
          },
          getFaqUrl: function () {
             return window.checkout.baseUrl + '/faq/#click_and_pick';
          },
       }
    }
 });

 jQuery(document).on('keyup change', "input[name='postcode']", function () {
    var pincode = jQuery(this).val();
    if (jQuery("input[name='postcode']").next().hasClass('mage-error')) {
       jQuery("input[name='postcode']").next().remove();
    }
   
    if (pincode.length == 6) {
       jQuery.ajax({
          url: BASE_URL + 'mymodule/index/index',
          data: {
             pincode: pincode
          },
          success: function (response) {

            // console.log(success);

             if (response['success']) {
                console.log(response);

            //   console.log(response.city);
              console.log(response.state)
                // console.log("City: " + response['data']['city']);
         

                jQuery("input[name='city']").val(response.city);
                jQuery("select[name='region_id']").val(jQuery("select[name='region_id']").find('option[data-title="' + response.state + '"]').val());
                jQuery("select[name='region_id']").attr('tabindex', -1);

             } else {

                jQuery("input[name='postcode']").next('.mage-error').remove();
                jQuery("input[name='city']").val('');
                jQuery("select[name='region_id']").val('');
                jQuery("input[name='postcode']").after(jQuery("<div class='mage-error' generated='true'>" + "Shippment not Available to the Zipcode" + "</div>"));
               //  console.log("gone ");

             }
             jQuery("input[name='city']").change();
             jQuery("select[name='region_id']").change();


               //testing field disable  --working
             jQuery("input[name='city']").prop('disabled', true);
             jQuery("select[name='region_id']").prop('disabled', true);
          }
       });
    }
 });





//  jQuery(document).on('click', "input[name='telephone']", function () {
//     jQuery("input[name='postcode']").attr('maxlength', '6');
//     jQuery("input[name='postcode']").attr('minlength', '6');
//     jQuery("input[name='telephone']").attr('maxlength', '10');
//     jQuery("input[name='telephone']").attr('minlength', '10');
//  });