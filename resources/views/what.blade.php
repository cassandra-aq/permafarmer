@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Le principe</h2>
            </div>
        </div>
        <div class="row py-4">
            <div class="col-12">
                <h3>Les paniers</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi mi, mollis vehicula erat vitae, viverra lacinia justo. Nunc et massa congue, aliquam turpis ut, convallis mauris. Fusce eu diam vehicula, laoreet arcu eu, cursus justo. Cras metus lectus, luctus vel mi ut, facilisis luctus augue. Cras posuere quam augue, ut mollis eros varius vitae. Pellentesque urna erat, ultricies eget pellentesque tempus, porttitor vitae turpis.
                </p>
                <p>
                    Maecenas convallis hendrerit quam, sed suscipit ex finibus vel. Duis ac magna sed neque malesuada porta vitae accumsan metus. Nunc sodales ligula accumsan, consequat justo sed, dignissim ipsum. Nam congue pharetra mi et luctus. Praesent efficitur tempor ipsum, sit amet lacinia nibh scelerisque facilisis. In hac habitasse platea dictumst. Etiam ligula nisl, rhoncus quis commodo nec, maximus ut lorem. Nam viverra magna nulla.
                </p>
            </div>
            <div class="col-12">
                <div class="d-sm-flex justify-content-around">
                    <figure class="dark-green-bg d-flex flex-column text-center align-items-center p-4"><img class="img-fluid p-3 cart-img" src="{{ url('images/static/panier-grand.jpg') }}" alt=""><span class="h4">Le grand panier<br>7kg - 24,90€/mois</span></figure>
                    <figure class="medium-green-bg d-flex flex-column text-center align-items-center p-4"><img class="img-fluid p-3 cart-img" src="{{ url('images/static/panier-petit.jpg') }}" alt=""><span class="h4">Le petit panier<br>2.5kg - 12,50€/mois</span></figure>
                </div>
            </div>
        </div>
        <div class="row mt-4 py-4">
            <div class="col-12 col-sm-6">
                <h3>Autre super titre de présentation</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi mi, mollis vehicula erat vitae, viverra lacinia justo. Nunc et massa congue, aliquam turpis ut, convallis mauris. Fusce eu diam vehicula, laoreet arcu eu, cursus justo. Cras metus lectus, luctus vel mi ut, facilisis luctus augue.
                </p>
                <p>
                    Cras posuere quam augue, ut mollis eros varius vitae. Pellentesque urna erat, ultricies eget pellentesque tempus, porttitor vitae turpis. Maecenas convallis hendrerit quam, sed suscipit ex finibus vel. Duis ac magna sed neque malesuada porta vitae accumsan metus. Nunc sodales ligula accumsan, consequat justo sed, dignissim ipsum. Nam congue pharetra mi et luctus. Praesent efficitur tempor ipsum, sit amet lacinia nibh scelerisque facilisis. In hac habitasse platea dictumst. magna nulla, a egestas metus dictum ac. Proin auctor ornare iaculis.
                </p>
            </div>
            <div class="col-12 col-sm-6">
                <img class="img-fluid" src="{{ url('images/static/légume.jpg') }}" alt=""></div>
            </div>
        </div>
    </div>
@endsection