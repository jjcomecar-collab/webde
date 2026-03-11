<!-- ✅ Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<!-- ✅ PureCounter -->
<script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>

<!-- ✅ Stats Section -->
<section id="ncjbm-stats" class="ncjbm-stats ncjbm-section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">

            @foreach($quantities as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="ncjbm-stats-item">
                        <i class="fa-solid {{ $item->icono }}" style="color: #0bd12cff;"></i>
                        <div>
                            <span
                                data-purecounter-start="0"
                                data-purecounter-end="{{ $item->cantidad }}"
                                data-purecounter-duration="{{ $item->duracion }}"
                                class="purecounter">
                            </span>
                            <p>{{ $item->titulo }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>


<!-- ✅ CSS Optimizado con Prefijo ncjbm- -->
<style>
    :root {
    --ncjbm-font-base: "Roboto", system-ui, -apple-system, "Segoe UI", sans-serif;
    --ncjbm-font-heading: "Raleway", sans-serif;
    --ncjbm-bg: #fff;
    --ncjbm-text: #444;
    --ncjbm-heading: #333;
    --ncjbm-accent: #3fbbc0;
    }

    body {
    margin: 0;
    font-family: var(--ncjbm-font-base);
    color: var(--ncjbm-text);
    background: var(--ncjbm-bg);
    }

    /* 🔹 Sección base */
    .ncjbm-section { padding: 60px 0; }

    /* 🔹 Contenedor principal */
    .ncjbm-container {
    max-width: 1140px;
    margin: 0 auto;
    }

    /* 🔹 Ítem individual */
    .ncjbm-stats-item {
        background: #fff;
        box-shadow: 0 0 15px rgba(0,0,0,0.08);
        padding: 25px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
        align-items: center;    /* centra horizontalmente */
        justify-content: center; /* centra verticalmente */
        text-align: center;
        box-shadow: 0 4px 12px rgba(26, 187, 39, 0.41); /* 🌟 Sombra moderna */
    }

    .ncjbm-stats-item:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.12);
    }

    /* 🔹 Iconos */
    .ncjbm-stats-item i {
    color: var(--ncjbm-accent);
    font-size: 40px;
    margin-right: 18px;
    }

    /* 🔹 Contadores */
    .ncjbm-stats-item span {
    display: block;
    font-size: 34px;
    font-weight: 600;
    color: var(--ncjbm-heading);
    line-height: 1;
    }

    /* 🔹 Etiquetas */
    .ncjbm-stats-item p {
    margin: 0;
    font-size: 15px;
    font-family: var(--ncjbm-font-heading);
    }

    /* 🔹 Responsive */
    @media (max-width: 768px) {
    .ncjbm-stats-item {
        flex-direction: column;
        text-align: center;
    }
    .ncjbm-stats-item i {
        margin: 0 0 10px;
    }
    }
</style>



<!-- ✅ JS Simplificado -->
<script>
    window.addEventListener("load", () => {
    if (typeof AOS !== "undefined") AOS.init({ duration: 600, easing: "ease-in-out", once: true });
    if (typeof PureCounter !== "undefined") new PureCounter();
    });
</script>