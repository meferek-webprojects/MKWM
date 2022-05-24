@extends('dashboard.layouts.main-layout')

@section('title')
    <title>MKWM - Panel</title>
@endsection

@section('added-css')
@endsection

@section('content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col">
                        <div class="page-description">
                            <h1>FAQ</h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="accordion" id="accordionIconsExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="icons-headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#icons-collapseOne" aria-expanded="true" aria-controls="icons-collapseOne">
                                                <i class="material-icons-two-tone">lightbulb</i>Czym jest FAQ?
                                            </button>
                                        </h2>
                                        <div id="icons-collapseOne" class="accordion-collapse collapse show" aria-labelledby="icons-headingOne" data-bs-parent="#accordionIconsExample">
                                            <div class="accordion-body">
                                                Wiele osób zadaje te same pytania dotyczące działalności MKWM. W celu jak najsprawniejszej pracy powstało FAQ, czyli najczęściej zadawane pytania wraz z odpowiedziami na nie. <br> Jeśli masz pytanie, które nie zostało tutaj wyjaśnione z chęcią na nie odpowiemy pod adresem <strong>kontakt@mkwmstudios.pl</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="icons-headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#icons-collapseTwo" aria-expanded="false" aria-controls="icons-collapseTwo">
                                                <i class="material-icons-two-tone">download</i>Jak pobrać wszystkie zdjęcia z sesji?
                                            </button>
                                        </h2>
                                        <div id="icons-collapseTwo" class="accordion-collapse collapse" aria-labelledby="icons-headingTwo" data-bs-parent="#accordionIconsExample" style="">
                                            <div class="accordion-body">
                                                Wchodząc w konkretną sesję pojawi się nam galeria ze wszystkimi fotografiami. Pod nimi (na samym dole) możemy dojrzeć przycisk <strong>Pobierz wszystko jako .zip</strong>. <br><br> Po naciśnięciu go należy odczekać do 5 sekund na rozpoczęcie pobierania. Gdy nasz cały plik zapisze się na naszym urządzeniu musimy wejść w aplikację, która pozwoli nam na rozpakowanie wszystkich zdjęć. (np. Files by Google). Po rozpakowaniu wszystkie zdjęcia powinny pojawić się w galerii. Jednak najprosztszym rozwiązaniem jest sięgniecie po laptopa bądź komputer stacjonarny. <br><br> Poniżej FAQ znajdą się filmy instruktażowe na poszczególne platformy jak pobrać wszystkie zdjęcia od razu.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="icons-headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#icons-collapseThree" aria-expanded="false" aria-controls="icons-collapseThree">
                                                <i class="material-icons-two-tone">visibility</i>Czym się różni sesja prywatna od sesji publicznej?
                                            </button>
                                        </h2>
                                        <div id="icons-collapseThree" class="accordion-collapse collapse" aria-labelledby="icons-headingThree" data-bs-parent="#accordionIconsExample" style="">
                                            <div class="accordion-body">
                                                Każda sesja publiczna pojawi się automatycznie na stronie głównej MKWM pod adresem <strong>www.mkwmstudios.pl</strong>. <br> W przypadku sesji prywatnych sesje te są tylko i wyłącznie do wglądu osób należących w skład danej sesji (Fotograf/Modelki/Wizażystki/Fryzjerzy).
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('added-js')
@endsection