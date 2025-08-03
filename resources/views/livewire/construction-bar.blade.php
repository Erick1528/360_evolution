<!-- Barra de Construcción -->
<div id="constructionBanner" class="bg-[#FACC14] text-[#0F355E] fixed z-[5000] min-w-full top-0 left-0 shadow-lg transition-transform duration-300 ease-in-out"
     style="transform: translateY(0);">
    <div class="lg:px-[120px] sm:px-[50px] px-[20px] py-[12px]">
        <div class="flex items-center justify-center gap-x-[10px] text-center">
            <!-- Icono de advertencia -->
            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2L1 21h22L12 2zm0 3.99L19.53 19H4.47L12 5.99zM11 16h2v2h-2v-2zm0-6h2v4h-2v-4z" />
            </svg>

            <div class="flex flex-col sm:flex-row sm:items-center sm:gap-x-[8px] gap-y-[2px]">
                <p class="lg:text-[14px] lg:leading-[17px] text-[12px] leading-[14px] font-bold">
                    🚧 Sitio en Construcción
                </p>
                <span class="hidden sm:inline text-[12px]">•</span>
                <p class="lg:text-[14px] lg:leading-[17px] text-[12px] leading-[14px]">
                    El contenido mostrado es demostrativo y puede cambiar en el futuro
                </p>
            </div>

            <!-- Botón cerrar -->
            <button onclick="closeBanner()"
                class="sm:right-[50px] hover:bg-[#0F355E] hover:text-[#FACC14] rounded-full p-1 transition-colors duration-300"
                aria-label="Cerrar banner">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
                </svg>
            </button>
        </div>
    </div>
</div>

<script>
    function closeBanner() {
        document.getElementById('constructionBanner').style.display = 'none';
    }
</script>
