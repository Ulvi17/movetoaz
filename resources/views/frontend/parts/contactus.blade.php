<style>
    .form-section {
        margin-bottom: 30px;
    }

    .section-title {
        border-bottom: 1px solid #eee;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    .hidden-section {
        display: none;
    }

    .form-select,
    .form-control {
        margin-bottom: 15px;
    }
</style>
<div class="contact-form-section py-5">
    <div class="container">
        <div class="alert" id="alert_box"></div>
        <div class="row">
            @if ($with_choises == false)
                <div class="col-lg-6">
                    <!-- Contact Form Content Start -->
                    <div class="contact-form-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                {{ convert_locale('get_in_touch') }}</h3>

                            <p class="wow fadeInUp" data-wow-delay="0.25s"
                                style="visibility: visible; animation-delay: 0.25s; animation-name: fadeInUp;">
                                {!! convert_locale('property_needs_contact') !!}</p>
                        </div>
                        <!-- Section Title End -->
                    </div>
                    <!-- Contact Form Content End -->
                </div>
            @endif
            @if ($with_choises == false)
                <div class="col-lg-6">
                @else
                    <div class="col-lg-12">
            @endif
            <!-- Contact Form Start -->
            <div class="contact-form" id="contact_form">
                <form action="{{ route('frontend.contactus') }}" method="POST" class="wow fadeInUp"
                    data-wow-delay="0.25s" onsubmit="submitPropertyRequest(event)">
                    @csrf
                    <inpt type="hidden" name="language" value="{{ app()->getLocale() }}" />
                    <inpt type="hidden" name="response_type" value="json" />
                    <!-- Basic Contact Info -->
                    <div class="form-section">

                        <h4 class="section-title">
                            {{ $with_choises == false ? convert_locale('quick_request') : convert_locale('send_request') }}
                        </h4>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="fullName" class="form-control"
                                    placeholder="{{ convert_locale('full_name') }}" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control"
                                    placeholder="{{ convert_locale('email') }}" required>
                            </div>
                            <div class="col-md-6">
                                <input type="tel" name="phone" class="form-control"
                                    placeholder="{{ convert_locale('phone_number') }}" required>
                            </div>
                            @if ($with_choises == true)
                                <div class="col-md-6">
                                    <input type="text" name="nationality" class="form-control"
                                        placeholder="{{ convert_locale('nationality') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <select name="preferredLanguage" class="form-select">
                                        <option value="" selected disabled>
                                            {{ convert_locale('preferred_language_communication') }}
                                        </option>
                                        <option value="English">English</option>
                                        <option value="Azerbaijani">Azerbaijani</option>
                                        <option value="Russian">Russian</option>
                                        <option value="Turkish">Turkish</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            @endif
                        </div>
                    </div>

                    @if ($with_choises == true)
                        <!-- Property Preferences -->
                        <div class="form-section">
                            <h4 class="section-title">{{ convert_locale('property_preferences') }}</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <select name="propertyType" id="propertyType" class="form-select" required>
                                        <option value="" selected disabled>{{ convert_locale('Property Type') }}
                                        </option>
                                        <option value="Apartment">{{ convert_locale('Apartment') }}</option>
                                        <option value="New building">
                                            &nbsp;&nbsp;&nbsp;&nbsp;{{ convert_locale('New building') }}</option>
                                        <option value="Old building">
                                            &nbsp;&nbsp;&nbsp;&nbsp;{{ convert_locale('Old building') }}</option>
                                        <option value="Villa">{{ convert_locale('Villa') }}</option>
                                        <option value="Commercial">{{ convert_locale('Commercial property') }}</option>
                                        <option value="Land">{{ convert_locale('Land') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select name="purpose" id="purpose" class="form-select" required>
                                        <option value="" selected disabled>{{ convert_locale('Purpose') }}
                                        </option>
                                        <option value="Investment">{{ convert_locale('Investment') }}</option>
                                        <option value="Living">{{ convert_locale('Living') }}</option>
                                        <option value="Vacation">{{ convert_locale('Vacation') }}</option>
                                        <option value="Residency">{{ convert_locale('Residency') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select name="cityLocation" id="cityLocation" class="form-select" required>
                                        <option value="" selected disabled>{{ convert_locale('City/Location') }}
                                        </option>
                                        <option value="Baku">Baku</option>
                                        <option value="Ganja">Ganja</option>
                                        <option value="Sumgait">Sumgait</option>
                                        <option value="Other">{{ convert_locale('Other') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-6" id="otherCityContainer" style="display:none;">
                                    <input type="text" name="otherCity" class="form-control"
                                        placeholder="{{ convert_locale('Please specify city') }}">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="preferredDistrict" class="form-control"
                                        placeholder="{{ convert_locale('Preferred District / Area') }}">
                                </div>

                                <!-- Residential property specific fields -->
                                <div class="col-md-6 residential-field">
                                    <select name="rooms" id="rooms" class="form-select">
                                        <option value="" selected disabled>
                                            {{ convert_locale('Number of rooms') }}</option>
                                        <option value="Studio">{{ convert_locale('Studio') }}</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5+">5+</option>
                                    </select>
                                </div>
                                <div class="col-md-6 residential-field apartment-field">
                                    <select name="floorPreference" class="form-select">
                                        <option value="" selected disabled>
                                            {{ convert_locale('Floor Preference') }}</option>
                                        <option value="Ground">{{ convert_locale('Ground Floor') }}</option>
                                        <option value="Low">{{ convert_locale('Low Floor (1-5)') }}</option>
                                        <option value="Mid">{{ convert_locale('Mid Floor (6-10)') }}</option>
                                        <option value="High">{{ convert_locale('High Floor (11+)') }}</option>
                                        <option value="Any">{{ convert_locale('Any') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-6 residential-field">
                                    <select name="furnishing" class="form-select">
                                        <option value="" selected disabled>{{ convert_locale('Furnishing') }}
                                        </option>
                                        <option value="Furnished">{{ convert_locale('Furnished') }}</option>
                                        <option value="Unfurnished">{{ convert_locale('Unfurnished') }}</option>
                                        <option value="Semi-furnished">{{ convert_locale('Semi-furnished') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select name="viewPreference" class="form-select">
                                        <option value="" selected disabled>
                                            {{ convert_locale('View Preference') }}</option>
                                        <option value="Sea View">{{ convert_locale('Sea View') }}</option>
                                        <option value="City View">{{ convert_locale('City View') }}</option>
                                        <option value="Garden">{{ convert_locale('Garden') }}</option>
                                        <option value="Doesn't Matter">{{ convert_locale("Doesn't Matter") }}</option>
                                    </select>
                                </div>
                                <div class="col-md-6 residential-field">
                                    <select name="parkingRequired" class="form-select">
                                        <option value="" selected disabled>
                                            {{ convert_locale('Parking Required') }}</option>
                                        <option value="Yes">{{ convert_locale('Yes') }}</option>
                                        <option value="No">{{ convert_locale('No') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-6 residential-field">
                                    <select name="balcony" class="form-select">
                                        <option value="" selected disabled>{{ convert_locale('Balcony') }}
                                        </option>
                                        <option value="Yes">{{ convert_locale('Yes') }}</option>
                                        <option value="No">{{ convert_locale('No') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" name="minSqm" class="form-control"
                                        placeholder="{{ convert_locale('Minimum Sq.m.') }}">
                                </div>
                                <div class="col-md-6">
                                    <input type="number" name="maxSqm" class="form-control"
                                        placeholder="{{ convert_locale('Maximum Sq.m.') }}">
                                </div>
                                <div class="col-md-6">
                                    <select name="currency" class="form-select">
                                        <option value="USD">USD</option>
                                        <option value="AZN">AZN</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="number" name="budgetFrom" class="form-control"
                                        placeholder="{{ convert_locale('Budget From') }}">
                                </div>
                                <div class="col-md-3">
                                    <input type="number" name="budgetTo" class="form-control"
                                        placeholder="{{ convert_locale('Budget To') }}">
                                </div>
                                <div class="col-md-6">
                                    <select name="paymentTerms" class="form-select">
                                        <option value="" selected disabled>
                                            {{ convert_locale('Ödəniş şərtləri') }}</option>
                                        <option value="Full Cash">{{ convert_locale('Full Cash') }}</option>
                                        <option value="Installment">{{ convert_locale('Installment') }}</option>
                                        <option value="Mortgage">{{ convert_locale('Mortgage (if available)') }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Residency Requirement -->
                        <div class="form-section" id="residencySection">
                            <h4 class="section-title">{{ convert_locale('Residency Requirement') }}</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <select name="propertyBasedResidency" id="propertyBasedResidency"
                                        class="form-select">
                                        <option value="" selected disabled>
                                            {{ convert_locale('Do you want property-based residency?') }}</option>
                                        <option value="Yes">{{ convert_locale('Yes') }}</option>
                                        <option value="No">{{ convert_locale('No') }}</option>
                                    </select>
                                </div>

                                <div class="col-md-6 residency-field" style="display:none;">
                                    <select name="includeFamily" id="includeFamily" class="form-select">
                                        <option value="" selected disabled>
                                            {{ convert_locale('Include family in residency?') }}
                                        </option>
                                        <option value="Yes">{{ convert_locale('Yes') }}</option>
                                        <option value="No">{{ convert_locale('No') }}</option>
                                    </select>
                                </div>

                                <div class="col-md-6 family-field" style="display:none;">
                                    <input type="number" name="familyMembers" class="form-control"
                                        placeholder="{{ convert_locale('Number of family members') }}">
                                </div>

                                <div class="col-md-6 family-field" style="display:none;">
                                    <input type="text" name="dependentAges" class="form-control"
                                        placeholder="{{ convert_locale('Age of dependents (for children)') }}">
                                </div>

                                <div class="col-md-6 residency-field" style="display:none;">
                                    <select name="helpRelocating" class="form-select">
                                        <option value="" selected disabled>
                                            {{ convert_locale('Do you need help relocating?') }}
                                        </option>
                                        <option value="Yes">{{ convert_locale('Yes') }}</option>
                                        <option value="No">{{ convert_locale('No') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Legal Assistance -->
                        <div class="form-section">
                            <h4 class="section-title">{{ convert_locale('Legal Assistance') }}</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <select name="legalDueDiligence" class="form-select">
                                        <option value="" selected disabled>
                                            {{ convert_locale('Need legal due diligence before buying?') }}</option>
                                        <option value="Yes">{{ convert_locale('Yes') }}</option>
                                        <option value="No">{{ convert_locale('No') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select name="legalPresence" class="form-select">
                                        <option value="" selected disabled>
                                            {{ convert_locale('Require legal presence in Azerbaijan?') }}</option>
                                        <option value="Yes">{{ convert_locale('Yes') }}</option>
                                        <option value="No">{{ convert_locale('No') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select name="companySetup" class="form-select">
                                        <option value="" selected disabled>
                                            {{ convert_locale('Require company setup support?') }}
                                        </option>
                                        <option value="Yes">{{ convert_locale('Yes') }}</option>
                                        <option value="No">{{ convert_locale('No') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select name="notaryRepresentation" class="form-select">
                                        <option value="" selected disabled>
                                            {{ convert_locale('Need legal representation at notary?') }}</option>
                                        <option value="Yes">{{ convert_locale('Yes') }}</option>
                                        <option value="No">{{ convert_locale('No') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Preferred Contact Method -->
                        <div class="form-section">
                            <h4 class="section-title">{{ convert_locale('Preferred Contact Method') }}</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <select name="contactMethod" class="form-select" required>
                                        <option value="" selected disabled>
                                            {{ convert_locale('Preferred Contact Method') }}</option>
                                        <option value="Email">{{ convert_locale('email_method') }}</option>
                                        <option value="WhatsApp">WhatsApp</option>
                                        <option value="Call">{{ convert_locale('call') }}</option>
                                        <option value="Zoom Meeting">{{ convert_locale('Zoom Meeting') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Message Box -->
                    <div class="form-group col-md-12 mb-5">
                        <textarea name="message" class="form-control" id="message" rows="4"
                            placeholder="{{ convert_locale('message') }}"></textarea>
                        <div class="help-block with-errors"></div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-md-12">
                        <button type="submit" class="btn-default disabled">{{ convert_locale('submit') }}</button>
                        <div id="msgSubmit" class="h3 hidden"></div>
                    </div>
                </form>
            </div>
            <!-- Contact Form End -->
        </div>
    </div>
</div>
</div>

<script>
    window.addEventListener("load", function() {
        // Property Type Change Handler
        $('#propertyType').change(function() {
            var selectedType = $(this).val();

            // Hide all property-specific fields first
            $('.residential-field').hide();
            $('.apartment-field').hide();

            // Show relevant fields based on property type
            if (selectedType === 'Apartment' || selectedType === 'Villa' || selectedType ==
                'New building' || selectedType == 'Old building') {
                $('.residential-field').show();
                if (selectedType === 'Apartment' || selectedType === 'New building' || selectedType ===
                    'Old building') {
                    $('.apartment-field').show();
                }
            }
        });

        // City Location Change Handler
        $('#cityLocation').change(function() {
            if ($(this).val() === 'Other') {
                $('#otherCityContainer').show();
            } else {
                $('#otherCityContainer').hide();
            }
        });

        // Purpose Change Handler - Show residency section only for residency purpose
        $('#purpose').change(function() {
            if ($(this).val() === 'Residency') {
                $('#residencySection').show();
            } else {
                $('#residencySection').hide();
            }
        });

        // Property-based Residency Change Handler
        $('#propertyBasedResidency').change(function() {
            if ($(this).val() === 'Yes') {
                $('.residency-field').show();
            } else {
                $('.residency-field').hide();
                $('.family-field').hide();
            }
        });

        // Include Family Change Handler
        $('#includeFamily').change(function() {
            if ($(this).val() === 'Yes') {
                $('.family-field').show();
            } else {
                $('.family-field').hide();
            }
        });

        // Initialize form state
        $('#propertyType').trigger('change');
        $('#cityLocation').trigger('change');
        $('#purpose').trigger('change');
        $('#residencySection').hide(); // Hide residency section initially

        // Form submission
        $('#propertyRequestForm').submit(function(e) {
            e.preventDefault();
            // Here you would normally send the form data to your server
            alert('Form submitted successfully!');
            // You can replace this with your actual submission logic
        });
    });

    async function submitPropertyRequest(event) {
        event.preventDefault();

        const form = event.target;
        const submitButton = form.querySelector('button[type="submit"]');
        const alertBox = document.getElementById('alert_box');

        // Köhnə bildirişləri təmizləyirik
        alertBox.innerHTML = '';
        alertBox.style.display = 'none';

        // Düyməni deaktiv edirik və mətnini dəyişirik
        submitButton.disabled = true;
        submitButton.innerHTML = '{{ convert_locale('sending') }}...';

        const formData = new FormData(form);

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json'
                }
            });

            const result = await response.json();

            if (response.ok && result.status === 'success') {
                alertBox.className = 'alert alert-success';
                alertBox.innerHTML = result.message;
                form.reset();

                // Form təmizləndikdən sonra gizli sahələri yenidən düzgün vəziyyətə gətiririk
                document.dispatchEvent(new Event('DOMContentLoaded'));

            } else {
                // Serverdən gələn xəta mesajını göstəririk
                let errorMessage = result.message || '{{ convert_locale('an_error_occurred') }}';
                if (result.errors) {
                    errorMessage += '<ul>';
                    for (const error in result.errors) {
                        errorMessage += `<li>${result.errors[error][0]}</li>`;
                    }
                    errorMessage += '</ul>';
                }
                throw new Error(errorMessage);
            }
        } catch (error) {
            alertBox.className = 'alert alert-danger';
            alertBox.innerHTML = error.message;
        } finally {
            // Sonda düyməni yenidən aktiv edirik
            alertBox.style.display = 'block';
            submitButton.disabled = false;
            submitButton.innerHTML = '{{ convert_locale('submit') }}';
        }
    }
</script>
