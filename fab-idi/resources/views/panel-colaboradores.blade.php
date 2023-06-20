@extends('layouts.plantilla')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">


@section('title', 'Panel de Colaboradores')

@section('content')

<main id='main-panel-colaboradores'>

    <h4 class="subtitulo mt-5">EMBAJADORES</h4>
    <div class="carrusel-colaboradores">
        @foreach ($embajadores as $embajador)
        <div class="team-boxed">
            <div class="box">
                <img class="rounded-circle card-img-top" src=" {{ asset('img/usuarios/' . $embajador->imagen) }}"
                    alt="Foto de perfil">
                <h3 class="name">{{ $embajador->nombre }}</h3>
                <p class="title">Embajador</p>
                <p class="description">{{ $embajador->descripcion }}</p>
                <div class="social">
                {!! !empty($embajador->facebook) ? "<a href='$embajador->facebook'><i class='fa-brands fa-facebook'></i></a>" : "" !!}
                {!! !empty($embajador->instagram) ? "<a href='$embajador->instagram'><i class='fa-brands fa-instagram'></i></a>" : "" !!}
                {!! !empty($embajador->twitter) ? "<a href='$embajador->twitter'><i class='fa-brands fa-twitter'></i></a>" : "" !!}
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <h4 class="subtitulo mt-5">MENTORES</h4>
    <div class="carrusel-colaboradores">
        @foreach ($mentores as $mentor)
        <div class="team-boxed">
            <div class="box">
                <img class="rounded-circle card-img-top" src=" {{ asset('img/usuarios/' . $mentor->imagen) }}"
                    alt="Foto de perfil">
                <h3 class="name">{{ $mentor->nombre }}</h3>
                <p class="title">Mentor</p>
                <p class="description">{{ $mentor->descripcion }}</p>
                <div class="social">
                {!! !empty($mentor->facebook) ? "<a href='$mentor->facebook'><i class='fa-brands fa-facebook'></i></a>" : "" !!}
                {!! !empty($mentor->instagram) ? "<a href='$mentor->instagram'><i class='fa-brands fa-instagram'></i></a>" : "" !!}
                {!! !empty($mentor->twitter) ? "<a href='$mentor->twitter'><i class='fa-brands fa-twitter'></i></a>" : "" !!}
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <h4 class="subtitulo mt-5">INSTITUTOS</h4>
    <div class="carrusel-colaboradores">
        @foreach ($institutos as $instituto)
        <div class="team-boxed">
            <div class="box">
                <img class="rounded-circle card-img-top" src=" {{ asset('img/entidades/' . $instituto->imagen) }}"
                    alt="Foto de perfil">
                <h3 class="name">{{ $instituto->nombre }}</h3>
                <p class="title">Instituto</p>
                <p class="description">{{ $instituto->descripcion }}</p>
                <div class="social">
                    {!! !empty($instituto->web) ? "<a href='$instituto->web'>Web</a>" : "" !!}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
$(document).ready(function() {
    $(".carrusel-colaboradores").slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1000, // Cambia el valor a 3000 para que avance cada 3 segundos
        dots: true,
        arrows: true,
        afterChange: function(currentSlide) {
            let totalSlides = $carruselColaboradores.slick('getSlick').slideCount;
            if (currentSlide === totalSlides - 1) {
                $carruselColaboradores.slick('slickGoTo', 0);
        }
        }
    });

    $('.slick-next.slick-arrow').text('');
    $('.slick-prev.slick-arrow').text('');
});
</script>

</main>

@endsection