"use strict";

initializeWizard();

// Class definition
var KTWizard3 = function () {
	// Base elements
	var _wizardEl;
	var _formEl;
	var _wizard;
	var _validations = [];

	// Private functions
	var initWizard = function () {
		// Initialize form wizard
		_wizard = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: true  // allow step clicking
		});

		// Validation before going to next page
		_wizard.on('beforeNext', function (wizard) {
			// Don't go to the next step yet
            wizard.stop();

			// Validate form
			var validator = _validations[wizard.getStep() - 1]; // get validator for current step
			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						wizard.goNext();
						KTUtil.scrollTop();
					} else {
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn font-weight-bold btn-light"
							}
						}).then(function () {
							KTUtil.scrollTop();
						});

					}
				});
			}
		});

		// Change event
		_wizard.on('change', function (wizard) {
			KTUtil.scrollTop();
		});
	}

	var initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					portfolio_id: {
						validators: {
							notEmpty: {
								message: 'Please Select Portfolio'
							}
						}
					},
					deal_id: {
						validators: {
							notEmpty: {
								message: 'Deal is required.'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));

		// Step 2
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					plot_no: {
						validators: {
							notEmpty: {
								message: 'Plot No is required'
							}
						}
					},
					area_name: {
						validators: {
							notEmpty: {
								message: 'Area Name is required'
							},
						}
					},
					block: {
						validators: {
							notEmpty: {
								message: 'Block is required'
							},
						}
					},

					height: {
						property_value: {
							notEmpty: {
								message: 'Property Value is required'
							},
						}
					},
					finance_amount: {
						validators: {
							notEmpty: {
								message: 'Finance Amount is required'
							},
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));

		// // Step 3
		// _validations.push(FormValidation.formValidation(
		// 	_formEl,
		// 	{
		// 		fields: {
		// 			delivery: {
		// 				validators: {
		// 					notEmpty: {
		// 						message: 'Delivery type is required'
		// 					}
		// 				}
		// 			},
		// 			packaging: {
		// 				validators: {
		// 					notEmpty: {
		// 						message: 'Packaging type is required'
		// 					}
		// 				}
		// 			},
		// 			preferreddelivery: {
		// 				validators: {
		// 					notEmpty: {
		// 						message: 'Preferred delivery window is required'
		// 					}
		// 				}
		// 			}
		// 		},
		// 		plugins: {
		// 			trigger: new FormValidation.plugins.Trigger(),
		// 			bootstrap: new FormValidation.plugins.Bootstrap()
		// 		}
		// 	}
		// ));


	}

	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('kt_wizard_v3');
			_formEl = KTUtil.getById('kt_form');

			initWizard();
			initValidation();
		}
	};
}();

function initializeWizard(){
    jQuery(document).ready(function () {
        KTWizard3.init();
    });
}

