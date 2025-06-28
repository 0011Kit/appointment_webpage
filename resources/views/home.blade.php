@extends('layouts.default')

@section('header_title')
<h1 class="site-header">HOME</h1>      
@endsection

@section('main_content')
    <section class="hero">
        <div class="hero-content">
            <h1>Hi! I'm KIT YI</h1>
            <p>the Backend Developer</p>
            <div class="tagline">Created a lightweight appointment booking site using PHP Laravel.</div>
        </div>
    </section>

    <section class="about-section">
        <div class="container">
            <h2 class="section-title">Tech Skills & Developer Highlights</h2>
            
            <div class="travel-tips-grid">
                <div class="tip-card">
                    <img src="https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" 
                    alt="Spring Boot Architectures">
                    <div class="tip-content">
                        <h3>Spring Boot Architectures</h3>
                        <p>I design and build scalable APIs and systems using Java & Spring Boot, following clean coding practices and modular designs.</p>
                        <a href="{{route('contact.topic', ['topic' => 'Spring Boot Projects'])}}" class="read-more">Contact to Know More</a>
                    </div>
                </div>
                
                <div class="tip-card">
                    <img src="https://images.unsplash.com/photo-1579389083078-4e7018379f7e?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" 
                    alt="Precision in Testing">
                    <div class="tip-content">
                        <h3>Precision in Testing</h3>
                        <p>I write and execute detailed test cases to ensure software quality. Manual & automated testing are part of my daily workflow.</p>
                        <a href="{{route('contact.topic', ['topic' => 'System Testing'])}}" class="read-more">Contact to Know More</a>
                    </div>
                </div>
                
                <div class="tip-card">
                    <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" 
                    alt="Documentation that Works">
                    <div class="tip-content">
                        <h3>Documentation that Works</h3>
                        <p> I craft clear, concise system and user documentation that supports teams across development, QA, and business.</p>
                        <a href="{{route('contact.topic', ['topic' => 'Documentation'])}}" class="read-more">Contact to Know More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection