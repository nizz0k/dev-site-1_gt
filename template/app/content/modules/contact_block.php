<div class="container">
    <div class="row justify-content-md-center text-center">
      <div class="col-lg-8 section-head">
        <h1>Contact us</h1>
      </div>
    </div>

		<div class="row">
			<div class="col-lg-12">

                <div class="form-wrapper">
				<?php


                    $form_argsd = array(
                        // Whether the title should be displayed or not (true/false)
                        // 'display_title' => false,

                        // Whether the description should be displayed or not (true/false)
                        // 'display_description' => false,

                        // Text used for the submit button
                        'submit_text' => 'Send',
                        // 'submit_button' => 'test',

                        // The URL to which the form points. Defaults to the current URL which will automatically display a success message after submission
                        // If this is overriden you may use af_has_submission to check for a form submission
                        // 'target' => CURRENT_URL,
                        'target' => '#contact-us',

                        // Whether the form output should be echoed or returned
                        'echo' => true,

                        // Field values to pre-fill. Should be an array with format: $field_name_or_key => $field_prefill_value
                        // 'values' => array(),

                        // Array of field keys or names to exclude from form rendering
                        // 'exclude_fields' => array(),

                        // Either 'wp' or 'basic'. Whether to use the Wordpress media uploader or a regular file input for file/image fields.
                        // 'uploader' => 'wp',
                        // 'uploader' => 'basic',

                        // The URL to redirect to after a successful submission. Defaults to false for no redirection.
                        'redirect' => false,

                        // ID to use for form element. Defaults to form key.
                        // 'id' => FORM_KEY,

                        // Filter mode disables the success message after submission and instead displays all fields again with their submitted values.
                        // 'filter_mode' => false,
                    );
					// advanced_form('form_5a79b414e4d2d', $form_argsd);
				?>




                <?php /*

                <div class="tab-container container" style="position: relative;width: 100%; height: 590px;">
                  <!-- Nav tabs -->
                  <ul class="tab-navigation" role="tablist" style="position: absolute;top: 0;left: 0; right: 0;">
                    <li role="presentation" class="active">
                        <a href="#investees-form" class="btn btn-outline-primary" aria-controls="investees-form" role="tab" data-toggle="tab">Investees</a>
                    </li>
                    <li role="presentation">
                        <a href="#investors-form" class="btn btn-outline-primary" aria-controls="investors-form" role="tab" data-toggle="tab">Investors</a>
                    </li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">


                    <div role="tabpanel" class="tab-pane active" id="investees-form">
                       <?php advanced_form('form_5a79b414e4d2d', $form_argsd); ?>

                    </div>

                    <div role="tabpanel" class="tab-pane" id="investors-form">
                        <?php advanced_form('form_5a8d7fcce466c', $form_argsd); ?>
                    </div>


                  </div>

                </div>

                */ ?>

                <div class="tabs-slideshow">

                    <div class="swiper-container">
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>

                        <div class="swiper-wrapper">




                            <div class="swiper-slide investees-form" data-label="Investees">
                                <?php
                                    //advanced_form('form_5a79b414e4d2d', $form_argsd);
                                    print do_shortcode('[contact-form-7 id="813" title="Investee"]');
                                ?>
                            </div>
                            <div class="swiper-slide work-with-us-form" data-label="Work with us">
                                <?php
                                    //advanced_form('form_5acc24a39e2ad', $form_argsd);
                                    print do_shortcode('[contact-form-7 id="816" title="Work with us"]');
                                ?>
                            </div>
                            <div class="swiper-slide investors-form" data-label="Investors">
                                <?php
                                    //advanced_form('form_5a8d7fcce466c', $form_argsd);
                                    print do_shortcode('[contact-form-7 id="811" title="Investor"]');
                                ?>
                            </div>

                        </div>
                    </div>
                </div>


                </div>
			</div>

		</div>

</div>
