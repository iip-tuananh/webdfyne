@extends('site.layouts.master')
@section('title')

@endsection

@section('css')
    <style>
        /* ================= HERO ================= */
        .faq-hero {
            position: relative;
            height: 450px; /* bạn có thể chỉnh cao thấp tuỳ ý */
            background: url('https://dfynesupport.zendesk.com/hc/theming_assets/01JMHEJANFXR04RFGBJM1E5EY6')
            center center / cover no-repeat;
            /* nếu bạn muốn mờ nhẹ hoặc màu overlay, thêm gradient:
            background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)),
                        url('...') center/cover no-repeat;
            */
        }

        .faq-hero .hero-overlay {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            /* ví dụ text trắng */
            color: #fff;
        }

        .faq-hero .hero-overlay h1 {
            font-size: 3rem;
            margin: 0;
        }
        .faq-hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        .search-wrapper {
            position: relative;
            width: 60%;
            max-width: 600px;
        }
        .search-wrapper input {
            width: 100%;
            padding: 12px 45px 12px 16px;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
        }
        .search-wrapper .search-icon {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.2rem;
            color: #999;
        }

        /* ================= MENU BELOW HERO ================= */
        .faq-menu {
            padding: 80px 20px;
        }
        .menu-container {
            text-align: center;
            max-width: 1000px;
            margin: 0 auto;
        }
        .menu-top {
            width: 260px;
            padding: 15px 0;
            margin: 0 auto 60px;
            border: 2px solid #ccc;
            border-radius: 8px;
            font-weight: 500;
            cursor: default;
        }

        .menu-columns {
            display: flex;
            justify-content: center;
            gap: 80px;
        }
        .menu-column {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .card {
            padding: 12px 18px;
            border-radius: 6px;
            transition: background 0.3s, transform 0.3s;
            cursor: pointer;
        }
        .card:hover {
            background: #f5f5f5;
            transform: translateY(-4px);
        }

        .menu-columns .card {
            font-size: 1.25rem;
            font-weight: 600;
            color: #222;
            transition: color 0.3s, background 0.3s, transform 0.3s;
        }

        .menu-columns .card:hover {
            color: #000;            /* đậm hơn khi hover */
            background: #f5f5f5;
            transform: translateY(-4px);
        }
    </style>

    <style>
        /* ===== chi tiết topic ===== */
        .faq-detail {
            padding: 60px 20px;
            text-align: center;
        }
        .faq-detail .container {
            max-width: 600px;
            margin: 0 auto;
            text-align: left;
        }
        .detail-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 24px;
        }

        /* Custom details/summary */
        .accordion {
            border: 2px solid #000;
            border-radius: 6px;
            overflow: hidden;
            margin-bottom: 40px;
        }
        .accordion summary {
            list-style: none;                 /* ẩn tam giác mặc định */
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 20px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
        }
        .accordion summary::-webkit-details-marker {
            display: none;                    /* ẩn marker Chrome */
        }
        /* icon + / – */
        .accordion .toggle-icon::before {
            content: '+';
            font-size: 1.2rem;
        }
        .accordion[open] .toggle-icon::before {
            content: '−';
        }

        .accordion .content {
            border-top: 1px solid #ddd;
            padding: 12px 20px 20px;
        }
        .detail-list {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .detail-list li {
            margin-bottom: 12px;
        }
        .detail-list li a {
            text-decoration: none;
            color: #000;
            font-size: 1rem;
            transition: color 0.2s;
        }
        .detail-list li a:hover {
            color: #007bff;
        }
    </style>
@endsection

@section('content')
    <main class="main-content" id="MainContent">
        {{-- HERO FAQ --}}
        <section class="faq-hero">
            <div class="hero-overlay">
                <h1>FAQ's</h1>
            </div>
        </section>


        <section class="faq-detail">
            <div class="container">
                {{-- Tiêu đề topic --}}
                <h2 class="detail-title">{{ $topic->name }}</h2>


                @foreach($topic->questions as $k => $question)
                    <details {{ $k == 0 ? 'open' : '' }} class="accordion">
                        <summary>
                            <span>{{ $question->title }}</span>
                            <span class="toggle-icon"></span>
                        </summary>

                        <div class="content">
                            {!! $question->content !!}
                        </div>
                    </details>
                @endforeach

            </div>
        </section>
    </main>

@endsection

@section('extends')

@endsection

@push('scripts')
    <script>

    </script>
@endpush
