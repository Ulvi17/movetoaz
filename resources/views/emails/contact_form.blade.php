<!DOCTYPE html>
<html>

<head>
    <title>New Property Inquiry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        h2 {
            color: #0056b3;
            border-bottom: 2px solid #0056b3;
            padding-bottom: 10px;
        }

        .section {
            margin-bottom: 20px;
        }

        .section-title {
            font-weight: bold;
            font-size: 1.1em;
            color: #555;
            margin-bottom: 10px;
        }

        .details-table {
            width: 100%;
            border-collapse: collapse;
        }

        .details-table td {
            padding: 8px;
            border: 1px solid #eee;
        }

        .details-table td:first-child {
            font-weight: bold;
            width: 40%;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>New Inquiry from Website</h2>

        <div class="section">
            <p>You have received a new property request. Here are the details:</p>
        </div>

        @php
            $basicInfo = ['fullName', 'email', 'phone', 'nationality', 'preferredLanguage', 'message'];
            $propertyPrefs = [
                'propertyType',
                'purpose',
                'cityLocation',
                'otherCity',
                'preferredDistrict',
                'rooms',
                'floorPreference',
                'furnishing',
                'viewPreference',
                'parkingRequired',
                'balcony',
                'minSqm',
                'maxSqm',
                'currency',
                'budgetFrom',
                'budgetTo',
                'paymentTerms',
            ];
            $residency = [
                'propertyBasedResidency',
                'includeFamily',
                'familyMembers',
                'dependentAges',
                'helpRelocating',
            ];
            $legal = ['legalDueDiligence', 'legalPresence', 'companySetup', 'notaryRepresentation'];
            $contact = ['contactMethod'];
        @endphp

        <div class="section">
            <div class="section-title">Basic Information</div>
            <table class="details-table">
                @foreach ($basicInfo as $field)
                    @if (isset($data[$field]) && !empty($data[$field]))
                        <tr>
                            <td>{{ ucfirst(preg_replace('/(?<!\ )[A-Z]/', ' $0', $field)) }}</td>
                            <td>{{ $data[$field] }}</td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>

        @if (isset($data['propertyType']))
            <div class="section">
                <div class="section-title">Property Preferences</div>
                <table class="details-table">
                    @foreach ($propertyPrefs as $field)
                        @if (isset($data[$field]) && !empty($data[$field]))
                            <tr>
                                <td>{{ ucfirst(preg_replace('/(?<!\ )[A-Z]/', ' $0', $field)) }}</td>
                                <td>{{ $data[$field] }}</td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>

            @if (isset($data['propertyBasedResidency']))
                <div class="section">
                    <div class="section-title">Residency Requirement</div>
                    <table class="details-table">
                        @foreach ($residency as $field)
                            @if (isset($data[$field]) && !empty($data[$field]))
                                <tr>
                                    <td>{{ ucfirst(preg_replace('/(?<!\ )[A-Z]/', ' $0', $field)) }}</td>
                                    <td>{{ $data[$field] }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            @endif

            <div class="section">
                <div class="section-title">Legal & Contact</div>
                <table class="details-table">
                    @foreach (array_merge($legal, $contact) as $field)
                        @if (isset($data[$field]) && !empty($data[$field]))
                            <tr>
                                <td>{{ ucfirst(preg_replace('/(?<!\ )[A-Z]/', ' $0', $field)) }}</td>
                                <td>{{ $data[$field] }}</td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        @endif
    </div>
</body>

</html>
