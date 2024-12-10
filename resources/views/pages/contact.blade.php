@extends('layouts.app')

@section('content')
<div class="contact-container">
    <div class="container">
        <!-- Contact Heading -->
        <div class="contact-header text-center">
            <h2 class="contact-title">Get In Touch</h2>
            <p class="contact-subtitle">Have any questions? We'd love to hear from you! Fill out the form below to contact us.</p>
        </div>

        <!-- Contact Form -->
        <div class="contact-form-container">
            <form action="" method="POST" class="contact-form">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Your Email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" class="form-control" placeholder="Your Message" rows="6" required></textarea>
                </div>
                <button type="submit" class="btn-submit">Send Message</button>
            </form>
        </div>

        <!-- Contact Information -->
        <div class="contact-info text-center">
            <p>If you prefer, you can also reach us at:</p>
            <p><strong>Email:</strong> support@ourwebsite.com</p>
            <p><strong>Phone:</strong> +1 234 567 890</p>
        </div>
    </div>
</div>

<style>
    /* Global Styling */
    .contact-container {
        background: #f9f9f9;
        padding: 60px 0;
    }

    .contact-header {
        margin-bottom: 50px;
    }

    .contact-title {
        font-size: 3rem;
        font-weight: 700;
        color: #007bff;
        margin-bottom: 15px;
        text-transform: uppercase;
    }

    .contact-subtitle {
        font-size: 1.2rem;
        color: #6c757d;
        margin-bottom: 30px;
    }

    /* Contact Form */
    .contact-form-container {
        background-color: #fff;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        max-width: 800px;
        margin: 0 auto;
    }

    .form-row {
        display: flex;
        gap: 20px;
    }

    .form-group {
        width: 48%;
    }

    .form-group label {
        font-size: 1rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        font-size: 1rem;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
        transition: border-color 0.3s ease-in-out;
    }

    .form-control:focus {
        border-color: #007bff;
    }

    .btn-submit {
        background-color: #007bff;
        color: #fff;
        padding: 12px 30px;
        font-size: 1.2rem;
        font-weight: bold;
        border-radius: 30px;
        border: none;
        cursor: pointer;
        display: inline-block;
        margin-top: 20px;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #0056b3;
        transform: translateY(-3px);
    }

    /* Contact Information */
    .contact-info {
        margin-top: 50px;
        font-size: 1.1rem;
        color: #333;
    }

    .contact-info p {
        margin: 5px 0;
        color: #6c757d;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .form-row {
            flex-direction: column;
        }

        .form-group {
            width: 100%;
        }

        .contact-title {
            font-size: 2.5rem;
        }

        .contact-subtitle {
            font-size: 1rem;
        }
    }
</style>
@endsection
