<style>
    :root {
        --primary_step-color: #00a1d6;
        --secondary_step-color: #333;
        --accent_step-color: #f39c12;
        --light_step-color: #f9f9f9;
        --dark_step-color: #2c3e50;
        --success_step-color: #27ae60;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        /* font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; */
    }

    body {
        background-color: var(--light_step-color);
        color: var(--secondary_step-color);
        line-height: 1.6;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .process-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
        padding: 20px 0;
    }

    .process-step {
        display: flex;
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
    }

    .process-step:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .process-step.active {
        border-left: 5px solid var(--accent_step-color);
    }

    .step-number {
        background-color: var(--primary_step-color);
        color: white;
        font-weight: bold;
        min-width: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        position: relative;
    }

    .step-number::after {
        content: '';
        position: absolute;
        right: -10px;
        top: calc(50% - 10px);
        width: 0;
        height: 0;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        border-left: 10px solid var(--primary_step-color);
    }

    .step-content {
        padding: 20px;
        flex-grow: 1;
    }

    .step-content h3 {
        color: var(--dark_step-color);
        margin-bottom: 10px;
        display: flex;
        align-items: center;
    }

    .step-content h3 i {
        margin-right: 10px;
        color: var(--primary_step-color);
    }

    .step-content p {
        color: #555;
    }

    .step-image {
        width: 160px;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .progress-container {
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    .progress-bar {
        height: 10px;
        background-color: #e0e0e0;
        border-radius: 5px;
        margin: 10px 0;
        overflow: hidden;
    }

    .progress {
        height: 100%;
        background: linear-gradient(90deg, var(--primary_step-color), var(--accent_step-color));
        width: 0%;
        transition: width 1s ease;
        border-radius: 5px;
    }

    .payment-info {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
        flex-wrap: wrap;
        gap: 10px;
    }

    .payment-stage {
        background-color: white;
        padding: 15px;
        border-radius: 8px;
        flex: 1;
        min-width: 200px;
        border-top: 3px solid var(--primary_step-color);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }

    .payment-stage h4 {
        color: var(--dark_step-color);
        margin-bottom: 10px;
    }

    .payment-stage p {
        font-size: 1.8rem;
        font-weight: bold;
        color: var(--primary_step-color);
    }

    .payment-stage span {
        font-size: 0.9rem;
        color: #777;
    }

    .icon {
        width: 24px;
        height: 24px;
        margin-right: 10px;
        vertical-align: middle;
    }

    .faq-section {
        margin-top: 40px;
        background-color: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .faq-section h2 {
        text-align: center;
        margin-bottom: 20px;
        color: var(--dark_step-color);
    }

    .faq-item {
        margin-bottom: 15px;
        border-bottom: 1px solid #eee;
        padding-bottom: 15px;
    }

    .faq-question {
        font-weight: bold;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .faq-question::after {
        content: '+';
        font-size: 1.5rem;
        color: var(--primary_step-color);
    }

    .faq-item.active .faq-question::after {
        content: '−';
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .faq-item.active .faq-answer {
        max-height: 200px;
        margin-top: 10px;
    }

    .cta-button {
    display: inline-block;
    padding: 12px 24px;
    background-color: var(--accent_step-color);
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    transition: background-color 0.3s ease;
    margin-top: 10px;

    /* YENİ ƏLAVƏ OLUNAN ANİMASİYA */
    animation: pulse-fade 2s infinite ease-in-out;
}

.cta-button:hover {
    background-color: #e67e22;
    animation-play-state: paused; /* Hover zamanı animasiyanı dayandırır (optional) */
}

    @keyframes pulse-fade {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(1.05); /* Düyməni 5% böyüdür */
        opacity: 0.85;           /* Bir az şəffaf edir */
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

    .step-checkbox {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        border: 2px solid #ddd;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .step-checkbox.completed {
        background-color: var(--success_step-color);
        border-color: var(--success_step-color);
    }

    @media (max-width: 768px) {
        .process-step {
            flex-direction: column;
        }

        .step-number {
            width: 100%;
            padding: 10px;
        }

        .step-number::after {
            display: none;
        }

        .step-image {
            width: 100%;
            height: 120px;
            order: -1;
        }

        .payment-stage {
            min-width: 100%;
        }
    }

    .amenities-catagery-list ul li {
        background: transparent
    }
</style>

<div class="container">
    <div class="progress-container">
        <h2>{{ convert_locale('step_by_step_procedure') }}</h2>
        <div class="payment-info">
            <div class="payment-stage">
                <h4>{{ convert_locale('down_payment') }}</h4>
                <p>15% - {{ ($data->prices['price'] * 15) / 100 }}$</p>
                <span>{{ convert_locale('service_fee') }}</span>
            </div>
            <div class="payment-stage">
                <h4>{{ convert_locale('property_reservation') }}</h4>
                <p>2%</p>
                <span>{{ convert_locale('property_value') }}</span>
            </div>
            <div class="payment-stage">
                <h4>{{ convert_locale('main_payment') }}</h4>
                <p>60% - {{ ($data->prices['price'] * 60) / 100 }}$</p>
                <span>{{ convert_locale('service_fee') }}</span>
            </div>
            <div class="payment-stage">
                <h4>{{ convert_locale('final_payment') }}</h4>
                <p>25% - {{ ($data->prices['price'] * 25) / 100 }}$</p>
                <span>{{ convert_locale('service_fee') }}</span>
            </div>
        </div>
    </div>

    <div class="process-container">
        @foreach (subscription_packages() as $package)
            <div class="process-step" data-step="{{ $package->order_number }}">
                <div class="step-number">{{ $package->order_number }}</div>
                <div class="step-content">
                    <h3>
                        {{ $package->name[app()->getLocale() . '_name'] ?? '' }}
                    </h3>
                    <p>{!! $package->description[app()->getLocale() . '_description'] ?? '' !!}</p>
                    @if ($package->order_number == 1)
                        <a href="#contact_form" class="cta-button">{{ convert_locale('fill_the_request') }}</a>
                    @endif
                </div>
            </div>
        @endforeach

    </div>
</div>

@include('frontend.parts.contactus', ['with_choises' => true])
