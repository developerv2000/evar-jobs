
<footer class="footer" id="footer">
    <div class="main-container footer__inner">

        <div class="footer__block footer-contacts">
            <div class="footer-contacts__body">
                <h3 class="footer-contacts__title">Свяжитесь с нами:</h3>
                <a class="footer-contacts__link"><i class="fa fa-phone-square"></i> Call - center:</a>
                <a class="footer-contacts__link" href="tel:+992985556060"> (+992) 98-555-60-60</a>
                <a class="footer-contacts__link" href="mailto:info@evar.tj"><i class="fa fa-envelope"></i> info@evar.tj</a>
                <a class="footer-contacts__link" href="https://ecard.tj/" target="_blank"><i class="fa fa-globe"></i> ecard.tj</a>
            </div>
            <img class="footer-contacts__image" src="{{asset('img/main/basket.png')}}" alt="Ёвар корзина">
        </div>

        <div class="footer__block footer-form">
            <form id="feedback-form" action="{{ route('feedback') }}" method="POST">
                {{ csrf_field() }}
                <input class="footer__form-input" type="text" name="name" placeholder="Имя" />
                <input class="footer__form-input" type="text" name="email" placeholder="Почта*" type="email" required/>
                <textarea class="footer__form-textarea" rows="4" name="text" placeholder="Текст*" required></textarea>

                <button class="g-recaptcha footer__form-button" type="submit" data-sitekey="6LeTtHcpAAAAANDcYSO5J8Kbpd6tYjERQ4-vocAG" data-callback='onRecaptchaSubmit' data-action='submit'>Отправить</button>
             </form>
        </div>

        <div class="footer__block footer-socials">
            <div class="footer-socials__list">
                <a class="footer-socials__link" target="_blank" href="https://msng.link/o/?992985556060=vi"><i class="fab fa-viber footer-socials__icon"></i></a>
                <a class="footer-socials__link" target="_blank" href="https://www.facebook.com/evar.tj/"><i class="fab fa-facebook footer-socials__icon"></i></a>
                <a class="footer-socials__link" target="_blank" href="https://www.instagram.com/evar.tj/"><i class="fab fa-instagram footer-socials__icon"></i></a>
            </div>

            <p class="footer__copyright">© ЁВАР <?php echo date('Y'); ?>. Все права защищены.</p>
        </div>

    </div>
</footer>
