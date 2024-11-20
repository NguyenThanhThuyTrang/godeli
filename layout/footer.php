<?php
// footer.php
?>

<style>
    .footer-container {
        display: flex;
        flex-wrap: wrap;
        background-color: #ff600ae3;
        color: white;
        padding: 40px 20px;
        border-top: 5px solid #ffcc00; /* Gold border for emphasis */
    }

    .footer-section {
        flex: 1 1 220px;
        margin: 15px;
    }

    .footer-logo {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .footer-logo h2 {
        margin-bottom: 15px;
        font-size: 2rem; 
        color: #fff; /* Gold color for the logo */
    }

    .footer-logo iframe {
        border: 0;
        margin-bottom: 15px;
        border-radius: 8px; /* Rounded corners for the iframe */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Adding shadow */
    }

    .btn-contact {
        background-color: #ffcc00;
        color: #343a40;
        border: none;
        padding: 12px 25px; /* Increased padding for better touch */
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s;
        font-weight: bold; /* Make button text bold */
        font-size: 1rem; /* Consistent font size */
    }

    .btn-contact:hover {
        background-color: #ffd700; /* Lighter yellow on hover */
    }

    .footer-social h3 {
        margin-bottom: 10px;
        font-size: 1.5rem; /* Increased font size for headings */
    }

    .social-list {
        display: flex;
        gap: 20px; /* Increased gap between social icons */
    }

    .social-link {
        color: white;
        font-size: 1.5rem;
        transition: color 0.3s;
    }

    .social-link:hover {
        color: #ffcc00; /* Change color on hover */
    }

    .recipe-list {
        list-style: none;
        padding: 0;
    }

    .footer-right h3 {
        margin-bottom: 10px;
    }

    .right-list {
        list-style: none;
        padding: 0;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .right-link {
        color: white;
        text-decoration: none;
        transition: color 0.3s;
    }

    .right-link:hover {
        color: #ffcc00; /* Change color on hover */
    }

    .footer-lang {
        margin-top: 20px;
        font-size: 1rem; /* Increased font size for readability */
    }

    .copyright {
        margin-top: 10px;
        color: #cfd8dc;
        font-size: 0.9rem;
        text-align: center; /* Center align copyright text */
    }

    @media (max-width: 768px) {
        .footer-container {
            flex-direction: column; /* Stack sections on smaller screens */
            align-items: center; /* Center items */
        }
    }
</style>

<div class="footer-container">
    <div class="footer-section footer-logo">
        <h2>GoDeli</h2>
        <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.858237982652!2d106.68427047490847!3d10.822158889329433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3174deb3ef536f31%3A0x8b7bb8b7c956157b!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2hp4buHcCBUUC5IQ00!5e0!3m2!1svi!2s!4v1683539852372!5m2!1svi!2s"
            width="380" height="250" allowfullscreen loading="lazy"></iframe>
        <div class="footer-contact">
            <a href="#">
                <button class="btn-contact">Góp ý</button>
            </a>
        </div>
    </div>

    <div class="footer-section footer-social">
        <h3>Theo dõi chúng tôi</h3>
        <ul class="social-list">
            <li><a href="#" class="social-link"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a href="#" class="social-link"><i class="fa-brands fa-github"></i></a></li>
            <li><a href="#" class="social-link"><i class="fa-brands fa-youtube"></i></a></li>
            <li><a href="#" class="social-link"><i class="fa-brands fa-instagram"></i></a></li>
        </ul>
    </div>

    <div class="footer-section">
        <h3>Công thức</h3>
        <ul class="recipe-list">
            <li class="recipe-item"><a href="danhmuc.html" class="recipe-link">Foody</a></li>
            <li class="recipe-item"><a href="danhmuc.html" class="recipe-link">Healthy</a></li>
            <li class="recipe-item"><a href="danhmuc.html" class="recipe-link">Drink</a></li>
            <li class="recipe-item"><a href="danhmuc.html" class="recipe-link">Desserts</a></li>
        </ul>
    </div>

    <!-- <div class="footer-section">
        <h3>Ứng dụng</h3>
        <ul class="recipe-list">
            <li class="recipe-item"><a href="#"><img src="../assets/img/Application/download-on-appstore.png" alt="Download on App Store"></a></li>
            <li class="recipe-item"><a href="#"><img src="../assets/img/Application/download-on-ggplay.png" alt="Download on Google Play"></a></li>
        </ul>
    </div> -->

    <div class="footer-section footer-right">
        <h3>Giới thiệu</h3>
        <ul class="right-list">
            <li><a href="about.html" class="right-link">Câu chuyện của chúng tôi</a></li>
            <li><a href="FAQS.html" class="right-link">Câu hỏi thường gặp</a></li>
            <li><a href="advertise.html" class="right-link">Quảng cáo</a></li>
        </ul>
        <h3>Điều khoản & Chính sách</h3>
        <ul class="right-list">
            <li><a href="#" class="right-link">Chính sách bảo mật</a></li>
            <li><a href="#" class="right-link">Điều khoản sử dụng</a></li>
            <li><a href="#" class="right-link">Sitemap</a></li>
        </ul>
        
        <div class="copyright">&#169; 2023 GoDeli, Inc. Tất cả các quyền được bảo lưu.</div>
    </div>
</div>