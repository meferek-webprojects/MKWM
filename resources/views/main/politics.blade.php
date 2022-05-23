@extends('main.layouts.dark-layout')

@section('added-css')
@endsection

@section('content')

    <div class="contact politics">
        <div class="text">
            <div class="type">
                NASZA POLITYKA PRYWATNOŚCI I CIASTECZEK
            </div>
        </div>
        <div class="background">
            <img class="img-fluid" src="{{ url('images/img/mateusz.jpg')}}" alt="">
        </div>
    </div>

    <div class="big-form">

        @if( @session('success') )

            <b>Wiadomość została wysłana pomyślnie!</b>

        @endif

        <form action="{{ url('/wiadomosc') }}" method="POST">
            @csrf 

            <div class="form">
                <div class="row">
                    <div class="col-12">
                        <p class="text-break policy">
                            <h3>Privacy Policy</h3>
                            Effective date: 2022-05-23<br>
                            <br>
                            Updated on: 2022-05-23<br>
                            <br>
                            This Privacy Policy explains the policies of Mateusz on the collection and use of the information we collect when you access https://www.mkwmstudios.pl (the “Service”). This Privacy Policy describes your privacy rights and how you are protected under privacy laws.<br>
                            <br>
                            By using our Service, you are consenting to the collection and use of your information in accordance with this Privacy Policy. Please do not access or use our Service if you do not consent to the collection and use of your information as outlined in this Privacy Policy. This Privacy Policy has been created with the help of CookieScript Privacy Policy Generator.<br>
                            <br>
                            Mateusz is authorized to modify this Privacy Policy at any time. This may occur without prior notice.<br>
                            <br>
                            Mateusz will post the revised Privacy Policy on the https://www.mkwmstudios.pl website<br>
                            <br>
                            Collection and Use of Your Personal Information<br>
                            Information We Collect<br>
                            When using our Service, you will be prompted to provide us with personal information used to contact or identify you. https://www.mkwmstudios.pl collects the following information:<br>
                            <br>
                            Usage Data<br>
                            Name<br>
                            Email<br>
                            Mobile Number<br>
                            Social Media Profile<br>
                            Usage Data includes the following:<br>
                            <br>
                            Internet Protocol (IP) address of computers accessing the site<br>
                            Web page requests<br>
                            Referring web pages<br>
                            Browser used to access site<br>
                            Time and date of access<br>
                            How We Collect Information<br>
                            https://www.mkwmstudios.pl collects and receives information from you in the following manner:<br>
                            <br>
                            When you fill a registration form or otherwise submit your personal information.<br>
                            When you interact with our Service.<br>
                            Your information will be stored for up to 365 days after it is no longer required to provide you the services. Your information may be retained for longer periods for reporting or record- keeping in accordance with applicable laws. Information which does not identify you personally may be stored indefinitely.<br>
                            <br>
                            How We Use Your Information<br>
                            https://www.mkwmstudios.pl may use your information for the following purposes:<br>
                            <br>
                            Providing and maintaining our Service, as well as monitoring the usage of our Service.<br>
                            For other purposes. Mateusz will use your information for data analysis to identify usage trends or determine the effective of our marketing campaigns when reasonable. We will use your information to evaluate and improve our Service, products, services, and marketing efforts.<br>
                            Managing your account. Your Personal Data can enable access to multiple functions of our Service that are available to registered users.<br>
                            For the performance of a contract. Your Personal Data will assist with the development, undertaking, and compliance of a purchase contract for products or services you have purchased through our Service.<br>
                            To contact you. Mateusz will contact you by email, phone, SMS, or another form of electronic communication related to the functions, products, services, or security updates when necessary or reasonable.<br>
                            To update you with news, general information, special offers, new services, and events.<br>
                            Testimonials and customer feedback collection. If you share a testimonial or review about your experience using our Service, it will be shared or otherwise used on the website.<br>
                            Managing customer orders. Your email address, phone number, social media profiles, and other user account information will be used in order to manage orders placed through our Service.<br>
                            Administration information. Your Personal Data will be used as part of the operation of our website Administration practices.<br>
                            User to user comments. Your information, such as your screen name, personal image, or email address, will be in public view when posting user to user comments.<br>
                            How We Share Your Information<br>
                            Mateusz will share your information, when applicable, in the following situations:<br>
                            <br>
                            With your consent. Mateusz will share your information for any purpose with your explicit consent.<br>
                            Sharing with other users. Information you provide may be viewed by other users of our Service. By interacting with other users or registering through a third-party service, such as a social media service, your contacts on the third-party service may see your information and a description of your activity.<br>
                            Third-party Sharing<br>
                            Your information may be disclosed for additional reasons, including:<br>
                            <br>
                            Complying with applicable laws, regulations, or court orders.<br>
                            Responding to claims that your use of our Service violates third-party rights.<br>
                            Enforcing agreements you make with us, including this Privacy Policy.<br>
                            Cookies<br>
                            Cookies are small text files that are placed on your computer by websites that you visit. Websites use cookies to help users navigate efficiently and perform certain functions. Cookies that are required for the website to operate properly are allowed to be set without your permission. All other cookies need to be approved before they can be set in the browser.<br>
                            <br>
                            Strictly necessary cookies. Strictly necessary cookies allow core website functionality such as user login and account management. The website cannot be used properly without strictly necessary cookies.<br>
                            Performance cookies. Performance cookies are used to see how visitors use the website, eg. analytics cookies. Those cookies cannot be used to directly identify a certain visitor.<br>
                            Targeting cookies. Targeting cookies are used to identify visitors between different websites, eg. content partners, banner networks. Those cookies may be used by companies to build a profile of visitor interests or show relevant ads on other websites.<br>
                            Functionality cookies. Functionality cookies are used to remember visitor information on the website, eg. language, timezone, enhanced content.<br>
                            Unclassified cookies. Unclassified cookies are cookies that do not belong to any other category or are in the process of categorization.<br>
                            Security<br>
                            Your information’s security is important to us. https://www.mkwmstudios.pl utilizes a range of security measures to prevent the misuse, loss, or alteration of the information you have given us. However, because we cannot guarantee the security of the information you provide us, you must access our service at your own risk.<br>
                            <br>
                            Mateusz is not responsible for the performance of websites operated by third parties or your interactions with them. When you leave this website, we recommend you review the privacy practices of other websites you interact with and determine the adequacy of those practices.<br>
                            <br>
                            Contact Us<br>
                            For any questions, please contact us through the following methods:<br>
                            <br>
                            Name: Mateusz i Wiktor<br>
                            Email: kontakt@mkwmstudios.pl<br>
                            <br>
                            or Contact Page<br>
                            <br>
                            Website: https://www.mkwmstudios.pl<br>
                        </p>
                    </div>
                </div>
            </div>
            
        </div>

    </form>

@endsection

@section('added-js')
@endsection