console.log("job_id: <?php echo $_GET['job_id']?>");
jQuery('.apply-button').attr('data-target', '');
    jQuery('.apply-button').attr('href', '');
    var id = jQuery('.apply-button').attr('data-job-id');
    jQuery(document).on('click', '.apply-button', function(){
        jQuery.ajax({
            url: '/applicants/new',
            type: 'GET',
            data: {
                id: id,
                modal: 'true'
            },
            dataType: 'text',
            contentType: "text/javascript; charset=utf-8",
            success: function(response){
                var response_html = jQuery.parseHTML(response);
                // jQuery(response_html).find('script').remove();
                jQuery('#applyModal .modal-content').html(response_html);

                // resume field hide
                var form_groups = jQuery('#applyModal .form-group');
                jQuery(form_groups[2]).attr('style', 'display: none');
                jQuery(form_groups[3]).attr('style', 'display: none');
                jQuery('#applyModal #no_resume').attr('checked', 'true');


                // c1 text field hide
                var c1_text_label = jQuery('#applyModal .control-label:contains("<?php echo "C1 Text Field"?>")');
                jQuery(c1_text_label).parents('.form-group').hide();
                jQuery(c1_text_label).parents('.form-group').find('.form-control').val('Empty');

                // c1 multi field hide
                var c1_multi_label = jQuery('#applyModal .control-label:contains("C1 Multi Field")');
                jQuery(c1_multi_label).parents('.form-group').hide();
                jQuery(c1_multi_label).parents('.form-group').find('.form-control').val('Empty');

                // c1 radio field hide
                var c1_radio_label = jQuery('#applyModal .control-label:contains("C1 Radio Field")');
                jQuery(c1_radio_label).parents('.form-group').hide();
                jQuery(c1_radio_label).parents('.form-group').find('[type="radio"]').val('Empty');
                jQuery(c1_radio_label).parents('.form-group').find('[type="radio"]').attr('checked', 'true');

                // c1 drop field hide
                var c1_drop_label = jQuery('#applyModal .control-label:contains("C1 Drop Field")');
                jQuery(c1_drop_label).parents('.form-group').hide();
                jQuery(c1_drop_label).parents('.form-group').find('.form-control').append('<option value="Empty">Empty</option>');
                jQuery(c1_drop_label).parents('.form-group').find('.form-control option[value="Empty"]').prop('selected', 'true');

                // c1 multi drop field hide
                var c1_multi_drop_label = jQuery('#applyModal .control-label:contains("C1 Multi Drop Field")');
                jQuery(c1_multi_drop_label).parents('.form-group').hide();
                jQuery(c1_multi_drop_label).parents('.form-group').find('.form-control').append('<option value="Empty">Empty</option>');
                jQuery(c1_multi_drop_label).parents('.form-group').find('.form-control option[value="Empty"]').prop('selected', 'true');

                var $applyForm = $('[id="apply-form"]');
                $('[data-js="postApplySubmit"]').on('click', function() {
                  $(this).attr('disabled', 'disabled');
                  $applyForm.submit();
                });
				
                $(document).ready(function(){
                  $('#apply-submit').on('click', function() {
                            // var email = jQuery('[name="applicant[email]"]').val();
                            // var fname = jQuery('[name="applicant[fname]"]').val();
                            // var lname = jQuery('[name="applicant[lname]"]').val();
                            // var custom_phone = jQuery('[name="applicant[custom_field_answers][phone]"]').val();
                            // var custom_city = jQuery('[name="applicant[custom_field_answers][city]"]').val();
                            // var custom_state = jQuery('[name="applicant[custom_field_answers][state]"]').val();
                            // var custom_zip = jQuery('[name="applicant[custom_field_answers][zip_code]"]').val();
                            // // var custom_are_you_23_years_of_age_or_older = jQuery('[name="applicant[custom_field_answers][are_you_23_years_of_age_or_older]"]').val();
                            // var custom_are_you_23_years_of_age_or_older = '';
                            // var custom_do_you_have_a_cdl = jQuery('[name="applicant[custom_field_answers][do_you_have_a_cdl]"]').val();
                            // var custom_previous_tractor_trailer_experience_if_required = jQuery('[name="applicant[custom_field_answers][previous_tractor_trailer_experience_if_required]"]').val();
                                    
                            // if(email == '' || fname == '' || lname == '' || custom_phone == '' || custom_city == '' || custom_state == '' || custom_zip == '' || /*custom_are_you_23_years_of_age_or_older == '' ||*/ custom_do_you_have_a_cdl == '' || custom_previous_tractor_trailer_experience_if_required == '' || jQuery('#applicant_consents_attributes_0_consented').is(':checked') == false){
                            //     return;
                            // }

                            // console.log('email:', email, 'fname:', fname, 'lname:', lname, 'custom_phone:', custom_phone, 'custom_city:', custom_city, 'custom_state:', custom_state, 'custom_zip:', custom_zip, 'custom_do_you_have_a_cdl:', custom_do_you_have_a_cdl, 'custom_previous_tractor_trailer_experience_if_required:', custom_previous_tractor_trailer_experience_if_required);

                            // // getting company id
                            // var company_link = $('.jobDetail-headerMedia a').attr('href');
                            // var company_id = 0;
                            // if(company_link.indexOf('-1845') > 0){
                            //     company_id = 32560;
                            // }

                            // // if(company_link.indexOf('-titus') > 0){
                            // //     company_id = 33503;
                            // // }

                            // if(company_link.indexOf('-titus') > 0){
                            //     company_id = 33503;
                            // }

                            // if(company_link.indexOf('-rickman') > 0){
                            //     company_id = 51445;
                            // }

                            // if(company_link.indexOf('-amerifield') > 0){
                            //     company_id = 165626;
                            // }

                            // if(company_id != 0){
                            //     jQuery.ajax({
                            //         url: 'https://teenstreet.tdbapply.com/post.php',
                            //         type: 'POST',
                            //         data: {
                            //             email: email,
                            //             fname: fname,
                            //             lname: lname,
                            //             custom_phone: custom_phone,
                            //             custom_city: custom_city,
                            //             custom_state: custom_state,
                            //             custom_zip: custom_zip,
                            //             custom_are_you_23_years_of_age_or_older: custom_are_you_23_years_of_age_or_older,
                            //             custom_do_you_have_a_cdl: custom_do_you_have_a_cdl,
                            //             custom_previous_tractor_trailer_experience_if_required: custom_previous_tractor_trailer_experience_if_required,
                            //             company_id: company_id
                            //         },
                            //         success: function(response){
                            //             response = jQuery.parseXML(response);
                            //             var status = jQuery(response).find('Status').text().toLowerCase();
                            //             if(status == 'accepted'){
                            //                 console.log('teenstreet success');
                            //             }
                            //             else{
                            //                 console.log('teenstreet fail');   
                            //             }
                            //         }
                            //     });
                            // }


                            
                            
                    runActionIfAllowed('googleAnalytics', function() {
                      ga('send', 'event', 'submit-apply-button', 'click', 'submit-apply-button-click');
                      ga('jbo.send', 'event', 'submit-apply-button', 'click', 'submit-apply-button-click');
                    });
                  });
                  $('#apply-cancel').on('click', function() {
                    runActionIfAllowed('googleAnalytics', function() {
                      ga('send', 'event', 'cancel-apply-button', 'click', 'cancel-apply-button-click');
                      ga('jbo.send', 'event', 'cancel-apply-button', 'click', 'cancel-apply-button-click');
                    });
                  });
                
                  $('#no_resume').on('click', function() {
                    var $placeholder = $('#no_resume').attr("data-placeholder");
                    $('#applicant_cover_letter').attr("placeholder", $placeholder);
                  });
                });
                
                // DROP DOWN JS - this is also in dropdown.js, but that code won't be accessible from the modal
                $(".dropdown_advanced").each(function () {
                  $(this).multiselect({
                    includeSelectAllOption: $(this).data('select-all') == 1,
                    enableFiltering: $(this).data('filterable') == 1 && $(this).find('option').length > 10,
                    enableCaseInsensitiveFiltering: $(this).data('filterable') == 1 && $(this).find('option').length > 10,
                    filterPlaceholder: $(this).data('search-text'),
                    nonSelectedText: $(this).data('placeholder'),
                    buttonClass: 'btn btn-utility btn-alt',
                    buttonWidth: '100%',
                    maxHeight: 200,
                    numberDisplayed: 1
                  });
                });
                
                $(".consent_form").on("click", "#tc_pp_consented", function () {
                  var value = $(this).is(":checked");
                  return $(".consent_form").find("[data-doc_type=terms_and_conditions], [data-doc_type=privacy_policy]").val(value);
                });
                
                registerPostAction("mixpanel", function () {
                  if (mixpanel.__loaded) {
                    $("#mixpanel_distinct_id").val(mixpanel.get_distinct_id());
                    $("#field_referer").val(mixpanel.cookie.props["initial_referrer"]);
                    $("#field_referring_domain").val(mixpanel.cookie.props["initial_referring_domain"]);
                  }
                });
                        
                        jQuery('#applyModal').modal('toggle');
                    }
                })
    })