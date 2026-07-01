@extends('layouts.app')

@section('content')

<!-- HERO / CONTACT INTRO -->
<section class="container-fluid px-0">
    <div class="row no-gap g-0">
        <div class="col-md-6 hero-left d-flex flex-column justify-content-center" style="background: white; padding: 60px 50px;">
            <span class="hero-badge mb-2" style="background: var(--brown); border: var(--border); padding: 6px 16px; font-size: 0.8rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; width: fit-content;">
                ✉️ Let's Talk
            </span>
            <h1 style="font-size: 3.2rem; font-weight: 800; letter-spacing: -1px; line-height: 1.05;">
                Get in <span style="background: var(--brown); padding: 0 6px;">Touch</span>
            </h1>
            <p class="mt-2" style="font-size: 1.05rem; line-height: 1.8; color: #222; max-width: 500px;">
                Have a question, feedback, or just want to say hi? We'd love to hear from you. Drop us a message and we'll get back to you within 24 hours.
            </p>
            <div class="d-flex flex-wrap gap-3 mt-2">
                <a href="#contact-form" class="btn btn-brutal btn-brutal-primary">Send Message</a>
                <a href="#contact-info" class="btn btn-brutal btn-brutal-secondary">Quick Contact</a>
            </div>
        </div>
        <div class="col-md-6" style="background: var(--blue); overflow: hidden; min-height: 380px;">
            <img src="https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=900&q=80" 
                 alt="Contact us" 
                 style="width: 100%; height: 100%; object-fit: cover; mix-blend-mode: multiply; filter: grayscale(20%);">
        </div>
    </div>
</section>

<!-- CONTACT INFO CARDS -->
<div class="brutal-section-label" id="contact-info">📬 Reach Out</div>
<section class="container-fluid px-4 px-md-5 py-5 bg-white border-brutal-bottom">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="contact-card" style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 30px 24px; text-align: center; height: 100%; transition: transform 0.1s, box-shadow 0.1s;">
                <span style="font-size: 2.2rem; display: block; margin-bottom: 10px;">📧</span>
                <h5 style="font-weight: 800;">Email</h5>
                <a href="mailto:hello@studymind.ai" style="color: var(--black); text-decoration: none; font-weight: 600; display: block; margin: 6px 0;">
                    hello@studymind.ai
                </a>
                <p style="font-size: 0.8rem; color: #666; margin-top: 6px;">We reply within 24h</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="contact-card" style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 30px 24px; text-align: center; height: 100%; transition: transform 0.1s, box-shadow 0.1s;">
                <span style="font-size: 2.2rem; display: block; margin-bottom: 10px;">🐦</span>
                <h5 style="font-weight: 800;">Twitter / X</h5>
                <a href="#" style="color: var(--black); text-decoration: none; font-weight: 600; display: block; margin: 6px 0;">
                    @StudyMindAI
                </a>
                <p style="font-size: 0.8rem; color: #666; margin-top: 6px;">DMs open for quick Qs</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="contact-card" style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 30px 24px; text-align: center; height: 100%; transition: transform 0.1s, box-shadow 0.1s;">
                <span style="font-size: 2.2rem; display: block; margin-bottom: 10px;">💬</span>
                <h5 style="font-weight: 800;">Discord</h5>
                <a href="#" style="color: var(--black); text-decoration: none; font-weight: 600; display: block; margin: 6px 0;">
                    Join our community
                </a>
                <p style="font-size: 0.8rem; color: #666; margin-top: 6px;">Chat with fellow students</p>
            </div>
        </div>
    </div>
</section>

<!-- CONTACT FORM + SIDE INFO -->
<div class="brutal-section-label" id="contact-form">✍️ Send a Message</div>
<section class="container-fluid px-4 px-md-5 py-5 bg-white border-brutal-bottom">
    <div class="row g-4 align-items-stretch">
        <div class="col-lg-7">
            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 40px 35px;">
                <h3 style="font-weight: 800; letter-spacing: -0.5px; margin-bottom: 24px;">Drop us a line</h3>
                
                @if(session('success'))
                    <div class="alert alert-success mb-3" style="border: var(--border); border-radius: 0; font-weight: 600;">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger mb-3" style="border: var(--border); border-radius: 0; font-weight: 600;">
                        <ul class="mb-0" style="list-style: none; padding-left: 0;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- <form method="POST" action="{{ route('contact.submit') }}"> --}}
                    <form>
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" 
                                   style="border: var(--border); border-radius: 0; padding: 12px 16px; background: #fcfcfc;"
                                   placeholder="Jamie Diaz" value="{{ old('name') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   style="border: var(--border); border-radius: 0; padding: 12px 16px; background: #fcfcfc;"
                                   placeholder="hello@studymind.ai" value="{{ old('email') }}" required>
                        </div>
                        <div class="col-12">
                            <label for="subject" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Subject</label>
                            <select class="form-control" id="subject" name="subject"
                                    style="border: var(--border); border-radius: 0; padding: 12px 16px; background: #fcfcfc;" required>
                                <option value="">Select a subject...</option>
                                <option value="general" {{ old('subject') == 'general' ? 'selected' : '' }}>General Inquiry</option>
                                <option value="feedback" {{ old('subject') == 'feedback' ? 'selected' : '' }}>Feedback</option>
                                <option value="support" {{ old('subject') == 'support' ? 'selected' : '' }}>Technical Support</option>
                                <option value="collaboration" {{ old('subject') == 'collaboration' ? 'selected' : '' }}>Collaboration</option>
                                <option value="partnership" {{ old('subject') == 'partnership' ? 'selected' : '' }}>Partnership</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="message" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="4"
                                      style="border: var(--border); border-radius: 0; padding: 12px 16px; background: #fcfcfc;"
                                      placeholder="Tell us what's on your mind..." required>{{ old('message') }}</textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-brutal btn-brutal-primary w-100">
                                Send Message <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-5 d-flex flex-column">
            <div style="background: var(--brown); border: var(--border); box-shadow: var(--shadow); padding: 35px 30px; height: 100%; display: flex; flex-direction: column; justify-content: center; color: white;">
                <span style="font-size: 3rem; display: block; margin-bottom: 12px;">📍</span>
                <h4 style="font-weight: 800; color: white;">Visit us (virtually)</h4>
                <p style="color: #ddd; line-height: 1.8; margin-top: 8px;">
                    We're a fully remote team, but we're always available online. Drop by our Discord or send an email — we'd love to connect.
                </p>
                <div style="margin-top: 16px;">
                    <span style="display: block; font-weight: 700; font-size: 0.95rem;">
                        📞 +1 (555) 123-4567
                    </span>
                    <span style="display: block; font-weight: 700; margin-top: 4px; font-size: 0.95rem;">
                        📧 hello@studymind.ai
                    </span>
                </div>
                <div style="margin-top: 20px; display: flex; gap: 12px; flex-wrap: wrap;">
                    <span style="background: var(--black); padding: 6px 14px; border: var(--border); font-weight: 700; font-size: 0.75rem; text-transform: uppercase; color: white;">
                        Response in 24h
                    </span>
                    <span style="background: var(--green); color: var(--black); padding: 6px 14px; border: var(--border); font-weight: 700; font-size: 0.75rem; text-transform: uppercase;">
                        100% Free
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ / QUICK HELP -->
<div class="brutal-section-label">❓ Frequently Asked</div>
<section class="container-fluid px-4 px-md-5 py-5 bg-white border-brutal-bottom">
    <div class="row g-4">
        <div class="col-md-6">
            <div style="border: var(--border); padding: 28px 24px; background: white; box-shadow: var(--shadow); height: 100%;">
                <h5 style="font-weight: 800; display: flex; align-items: center; gap: 8px;">
                    <span style="font-size: 1.2rem;">💡</span> Is StudyMind AI really free?
                </h5>
                <p style="color: #444; line-height: 1.7; margin-top: 8px;">
                    Yes! We believe education should be accessible to everyone. All core features are completely free for students. No hidden fees, no premium tiers.
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div style="border: var(--border); padding: 28px 24px; background: white; box-shadow: var(--shadow); height: 100%;">
                <h5 style="font-weight: 800; display: flex; align-items: center; gap: 8px;">
                    <span style="font-size: 1.2rem;">⏱️</span> How quickly do you reply?
                </h5>
                <p style="color: #444; line-height: 1.7; margin-top: 8px;">
                    We aim to respond to all inquiries within 24 hours. For urgent questions, join our Discord for faster replies from our community team.
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div style="border: var(--border); padding: 28px 24px; background: white; box-shadow: var(--shadow); height: 100%;">
                <h5 style="font-weight: 800; display: flex; align-items: center; gap: 8px;">
                    <span style="font-size: 1.2rem;">🔧</span> Can I request a feature?
                </h5>
                <p style="color: #444; line-height: 1.7; margin-top: 8px;">
                    Absolutely! We love hearing from our users. Share your feature requests through our contact form or Discord, and we'll review them for future updates.
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div style="border: var(--border); padding: 28px 24px; background: white; box-shadow: var(--shadow); height: 100%;">
                <h5 style="font-weight: 800; display: flex; align-items: center; gap: 8px;">
                    <span style="font-size: 1.2rem;">🤝</span> How can I collaborate?
                </h5>
                <p style="color: #444; line-height: 1.7; margin-top: 8px;">
                    We're always open to collaborations with students, educators, and organizations. Reach out through our contact form with your ideas!
                </p>
            </div>
        </div>
    </div>
</section>

<!-- MAP / LOCATION (Optional) -->
<div class="brutal-section-label">🌍 Find Us</div>
<section class="container-fluid px-0 border-brutal-bottom">
    <div style="background: white; padding: 40px; text-align: center; border-bottom: var(--border);">
        <div style="max-width: 800px; margin: 0 auto;">
            <span style="font-size: 3rem; display: block; margin-bottom: 12px;">🏢</span>
            <h4 style="font-weight: 800;">Our Virtual Headquarters</h4>
            <p style="color: #555; line-height: 1.8; max-width: 500px; margin: 8px auto;">
                While we're a fully remote team, our heart is everywhere students are learning.
            </p>
            <div style="display: flex; justify-content: center; gap: 40px; flex-wrap: wrap; margin-top: 16px;">
                <div>
                    <span style="font-weight: 800; display: block;">🌍</span>
                    <span style="font-size: 0.85rem; color: #666;">Global</span>
                </div>
                <div>
                    <span style="font-weight: 800; display: block;">🕐</span>
                    <span style="font-size: 0.85rem; color: #666;">24/7 Support</span>
                </div>
                <div>
                    <span style="font-weight: 800; display: block;">📱</span>
                    <span style="font-size: 0.85rem; color: #666;">Always Connected</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Additional CSS for hover effects -->
<style>
    .contact-card:hover {
        transform: translate(-3px, -3px);
        box-shadow: var(--shadow-lg);
    }
    .form-control:focus {
        box-shadow: none;
        border-color: var(--black);
        background: white;
    }
    select.form-control {
        appearance: none;
        -webkit-appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%230a0a0a' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 16px center;
        padding-right: 40px;
    }
</style>

@endsection