/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
    'jquery',
    'underscore',
    'mageUtils',
    'mage/translate',
    'Magento_Checkout/js/model/postcode-validator',
    'jquery-ui-modules/widget',
    'validation'
], function ($, __, utils, $t, postCodeValidator) {
    'use strict';

    $.widget('mage.addressValidation', {
        options: {
            selectors: {
                button: '[data-action=save-address]',
                zip: '#zip',
                country: 'select[name="country_id"]:visible'
            }
        },

        zipInput: null,
        countrySelect: null,

        /**
         * Validation creation
         *
         * @protected
         */
        _create: function () {
            var button = $(this.options.selectors.button, this.element);

            this.zipInput = $(this.options.selectors.zip, this.element);
            this.countrySelect = $(this.options.selectors.country, this.element);

            this.element.validation({

                /**
                 * Submit Handler
                 * @param {Element} form - address form
                 */            //   console.log(response.state);

                submitHandler: function (form) {

                    button.attr('disabled', true);
                    form.submit();
                }
            });

            this._addPostCodeValidation();
        },

        /**
         * Add postcode validation
         *
         * @protected
         */
        _addPostCodeValidation: function () {
            var self = this;

            this.zipInput.on('keyup', __.debounce(function (event) {
                    var valid = self._validatePostCode(event.target.value);

                    self._renderValidationResult(valid);
                }, 500)
            );

            this.countrySelect.on('change', function () {
                var valid = self._validatePostCode(self.zipInput.val());

                self._renderValidationResult(valid);
            });
        },

        /**
         * Validate post code value.
         *
         * @protected
         * @param {String} postCode - post code
         * @return {Boolean} Whether is post code valid
         */
        _validatePostCode: function (postCode) {
            var countryId = this.countrySelect.val();

            if (postCode === null) {
                return true;
            }

            return postCodeValidator.validate(postCode, countryId, this.options.postCodes);
        },

        /**
         * Renders warning messages for invalid post code.
         *
         * @protected
         * @param {Boolean} valid
         */
        _renderValidationResult: function (valid) {
            var warnMessage,
                alertDiv = this.zipInput.next();
                
            // console.log("testing js module override!");

            if (!valid) {
                warnMessage = $t('TEST TESTING Provided Zip/Postal Code seems to be invalid.');

                if (postCodeValidator.validatedPostCodeExample.length) {
                    warnMessage += $t(' Example: ') + postCodeValidator.validatedPostCodeExample.join('; ') + '. ';
                }
                warnMessage += $t('If you believe it is the right one you can ignore this notice.');
            }

            alertDiv.children(':first').text(warnMessage);

            if (valid) {
                alertDiv.hide();
            } else {
                alertDiv.show();
            }
        }
    });

    return $.mage.addressValidation;
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

            //console.log(response);
            // console.log(response.city);
            // console.log(response.state);
            //console.log("City: " + response['data']['city']);


                // using case statement for chaning  state name to state code
                switch(response.state) {
                    case 'Andaman and Nicobar Islands':
                        response.state = '569';
                        break;
                    case 'Andhra Pradesh':
                        response.state = '570';
                        break;
                    case 'Arunachal Pradesh':
                        response.state = '571';
                        break;
                    case 'Assam':
                        response.state = '572';
                        break;
                    case 'Bihar':
                        response.state = '573';
                        break;
                    case 'Chandigarh':
                        response.state = '574';
                        break;
                    case 'Chhattisgarh':
                        response.state = '575';
                        break;
                    case 'Dadra and Nagar Haveli':
                        response.state = '576';
                        break;
                    case 'Daman and Diu':
                        response.state = '577';
                        break;
                    case 'Delhi':
                        response.state = '578';
                        break;
                    case 'Goa':
                        response.state = '579';
                        break;
                    case 'Gujarat':
                        response.state = '580';
                        break;
                    case 'Haryana':
                        response.state = '581';
                        break;
                    case 'Himachal Pradesh':
                        response.state = '582';
                        break;
                    case 'Jammu and Kashmir':
                        response.state = '583';
                        break;
                    case 'Jharkhand':
                        response.state = '584';
                        break;
                    case 'Karnataka':
                        response.state = '585';
                        break;
                    case 'Kerala':
                        response.state = '586';
                        break;
                    case 'Ladakh':
                        response.state = '587';
                        break;
                    case 'Lakshadweep':
                        response.state = '588';
                        break;
                    case 'Madhya Pradesh':
                        response.state = '589';
                        break;
                    case 'Maharashtra':
                        response.state = '590';
                        break;
                    case 'Manipur':
                        response.state = '591';
                        break;
                    case 'Meghalaya':
                        response.state = '592';
                        break;
                    case 'Mizoram':
                        response.state = '593';
                        break;
                    case 'Nagaland':
                        response.state = '594';
                        break;
                    case 'Odisha':
                        response.state = '595';
                        break;
                    case 'Puducherry':
                        response.state = '596';
                        break;
                    case 'Punjab':
                        response.state = '597';
                        break;
                    case 'Rajasthan':
                        response.state = '598';
                        break;
                    case 'Sikkim':
                        response.state = '599';
                        break;
                    case 'Tamil Nadu':
                        response.state = '600';
                        break;
                    case 'Telangana':
                        response.state = '601';
                        break;
                    case 'Tripura':
                        response.state = '602';
                        break;
                    case 'Uttar Pradesh':
                        response.state = '603';
                        break;
                    case 'Uttarakhand':
                        response.state = '604';
                        break;
                    case 'West Bengal':
                        response.state = '605';
                        break;
                    default:
                        break;
                }
              console.log(response.city);
              console.log(response.state);


                jQuery("input[name='city']").val(response.city);
                jQuery("select[name='region_id']").val(response.state);
                jQuery("select[name='region_id']").attr('tabindex', -1);
                //  console.log("condition working  ");


             } else {

                jQuery("input[name='postcode']").next('.mage-error').remove();
                jQuery("input[name='city']").val('');
                jQuery("select[name='region_id']").val('');
                jQuery("input[name='postcode']").after(jQuery("<div class='mage-error' generated='true'>" + "Shippment not Available to the Zipcode" + "</div>"));
               //  console.log("condition not working  ");

             }
             jQuery("input[name='city']").change();
             jQuery("select[name='region_id']").change();


               //testing field disable  --working
            //  jQuery("input[name='city']").prop('disabled', true);
            //  jQuery("select[name='region_id']").prop('disabled', true);
          }
       });
    }
 });

