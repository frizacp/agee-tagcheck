<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb, #f5576c);
            background-size: 300% 300%;
            animation: gradient 3s ease infinite;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .main-title {
            font-size: 2.8rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .subtitle {
            font-size: 1.2rem;
            color: #718096;
            font-weight: 400;
        }

        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 25px;
        }

        .event-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            padding: 30px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .event-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #4facfe, #00f2fe);
        }

        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        }

        .event-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .event-icon {
            width: 32px;
            height: 32px;
            padding: 8px;
            border-radius: 10px;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            color: white;
        }

        .event-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .event-btn {
            flex: 1;
            min-width: 140px;
            padding: 15px 25px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            font-size: 1rem;
        }

        .event-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .event-btn:hover::before {
            left: 100%;
        }

        .btn-result {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
        }

        .btn-result:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(79, 172, 254, 0.4);
        }

        .btn-tag {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            color: white;
        }

        .btn-tag:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(67, 233, 123, 0.4);
        }

        @media (max-width: 768px) {
            .events-grid {
                grid-template-columns: 1fr;
            }
            
            .main-title {
                font-size: 2.2rem;
            }
            
            .event-buttons {
                flex-direction: column;
            }
            
            .event-btn {
                min-width: auto;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .event-card {
            animation: fadeInUp 0.6s ease forwards;
        }

        .event-card:nth-child(2) { animation-delay: 0.1s; }
        .event-card:nth-child(3) { animation-delay: 0.2s; }
        .event-card:nth-child(4) { animation-delay: 0.3s; }
        .event-card:nth-child(5) { animation-delay: 0.4s; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 class="main-title">Resultcheck & Tagcheck Management</h1>
            <p class="subtitle">Terintegrasi khusus dengan Agee</p>
        </div>

        <div class="events-grid">
            <!-- Slemantemplerun 2025 Event -->
            <div class="event-card">
                <div class="event-title">
                    Slemantemplerun 2025
                </div>
                <div class="event-buttons">
                    <a href="/resultcheck/str25" class="event-btn btn-result">Result Check</a>
                    <a href="/tagcheck/str25" class="event-btn btn-tag">Tag Check</a>
                </div>
            </div>
            <div class="event-card">
                <div class="event-title">
                    UGM Trailrun 2025
                </div>
                <div class="event-buttons">
                    <a href="/resultcheck/ugmtr25" class="event-btn btn-result">Result Check</a>
                    <a href="/tagcheck/ugmtr25" class="event-btn btn-tag">Tag Check</a>
                </div>
            </div>
            <div class="event-card">
                <div class="event-title">
                    UKIRUN 2025
                </div>
                <div class="event-buttons">
                    <a href="/resultcheck/ukr25" class="event-btn btn-result">Result Check</a>
                    <a href="/tagcheck/ukr25" class="event-btn btn-tag">Tag Check</a>
                </div>
            </div>

            <!-- Template untuk event lain - tinggal copy paste dan ganti isinya -->
            <!-- 
            <div class="event-card">
                <div class="event-title">
                    <svg class="event-icon" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                    Nama Event Baru
                </div>
                <div class="event-buttons">
                    <a href="/resultcheck/kode_event" class="event-btn btn-result">Result Check</a>
                    <a href="/tagcheck/kode_event" class="event-btn btn-tag">Tag Check</a>
                </div>
            </div>
            -->

        </div>
    </div>
</body>
</html>