{{-- Card --}}
<div class="shadow-[2px_2px_4px_rgba(0,0,0,0.1)] rounded-r-[10px] flex w-auto">

    <div class=" min-w-[10px] rounded-l-[20px] bg-[#0F355E]"></div>

    <div class="  p-8 text-center flex flex-col gap-y-[36px] bg-[#F8F8F8] rounded-r-[10px] w-full">

        <div class=" flex flex-col gap-y-[15px] text-[#0F355E]">
            <h2
                class=" lg:text-4xl lg:leading-[43px]
            sm:text-[32px] sm:leading-[38px]
            text-[28px] font-bold leading-[34px] ">
                Prospecto
                Ilustrativo - Evolución 360º</h2>
            <p class=" lg:hidden text-[12px] leading-[14px] text-[#475569]">Paginas {{ $actual_img }} de {{ $total_pages }}</p>
            <p class=" lg:mx-auto lg:flex hidden text-[12px] leading-[14px] text-[#475569]">Paginas {{ $range_images['start'] . ' - ' . $range_images['end']}} de {{ $total_pages }}</p>
        </div>

        <div class="">

            <div class=" lg:hidden
            flex justify-center items-center mb-[36px]">
                <img src="{{ asset('build/assets/prospect_images/' . $actual_img . '.webp') }}" alt=""
                    class=" sm:w-[400px] sm:h-[622px]
                    w-[196px] h-[277.34px] xs:h-[400px] xs:w-[283px] object-cover aspect-[283/400]">
            </div>

            <div class=" lg:flex lg:gap-x-[36px] lg:justify-center lg:mb-[36px]
            hidden">

                <img src="{{ asset('build/assets/prospect_images/' . $range_images['start'] . '.webp') }}" alt=""
                    class=" xl:max-h-[560px]
                    max-w-full h-auto max-h-[400px] object-contain">

                @if($range_images['end'] && $range_images['end'] != $range_images['start'])
                    <img src="{{ asset('build/assets/prospect_images/' . $range_images['end'] . '.webp') }}" alt=""
                        class=" xl:max-h-[560px]
                        max-w-full h-auto max-h-[400px] object-contain">
                @endif

            </div>

            <div class=" max-w-[394px] mx-auto 
            flex justify-between items-center">

                <button wire:click="previousPage"
                    class=" lg:hidden
                    {{ $actual_img === 1 ? 'bg-[#EEEEEE] text-[rgba(0,0,0,0.40)]' : 'bg-[#0F355E] text-white' }} flex items-center justify-center px-[20px] py-[10px] rounded-[20px] xs:w-[84px] xs:h-[44px] sm:h-auto sm:w-auto">
                    @if ($actual_img === 1)
                        <img src="{{ asset('build/assets/forward.svg') }}" alt=""
                            class=" lg:w-[24px] lg:h-[24px]
                            rotate-180 sm:h-[22ppx] sm:w-[22px] mr-[5px]">
                    @else
                        <img src="{{ asset('build/assets/back.svg') }}" alt=""
                            class=" lg:w-[24px] lg:h-[24px]
                        sm:h-[22ppx] sm:w-[22px]">
                    @endif
                    <p class=" text-[14px] leading-[17px] xs:flex hidden sm:hidden">Ant</p>
                    <p
                        class=" lg:text-base lg:leading-[19px]
                    text-[14px] leading-[17px] sm:flex hidden">
                        Anterior</p>
                </button>

                <button wire:click="previousPageDesktop"
                    class=" lg:flex
                    {{ $actual_img === 1 ? 'bg-[#EEEEEE] text-[rgba(0,0,0,0.40)]' : 'bg-[#0F355E] text-white' }} hidden items-center justify-center px-[20px] py-[10px] rounded-[20px] xs:w-[84px] xs:h-[44px] sm:h-auto sm:w-auto">
                    @if ($actual_img === 1)
                        <img src="{{ asset('build/assets/forward.svg') }}" alt=""
                            class=" lg:w-[24px] lg:h-[24px]
                            rotate-180 sm:h-[22ppx] sm:w-[22px] mr-[5px]">
                    @else
                        <img src="{{ asset('build/assets/back.svg') }}" alt=""
                            class=" lg:w-[24px] lg:h-[24px]
                        sm:h-[22ppx] sm:w-[22px]">
                    @endif
                    <p class=" text-[14px] leading-[17px] xs:flex hidden sm:hidden">Ant</p>
                    <p
                        class=" lg:text-base lg:leading-[19px]
                    text-[14px] leading-[17px] sm:flex hidden">
                        Anterior</p>
                </button>

                {{-- Dots para móvil --}}
                <div class="gap-x-[10px] hidden xs:flex lg:hidden">
                    @foreach ($this->paginationDots as $pageNumber)
                        <div
                            class=" sm:h-[14px] sm:w-[14px]
                            w-[12px] h-[12px] rounded-full {{ $pageNumber == $actual_img ? 'bg-[#0F355E]' : 'bg-[#D9D9D9]' }}">
                        </div>
                    @endforeach
                </div>

                {{-- Dots para desktop --}}
                <div class="gap-x-[10px] hidden lg:flex">
                    @foreach ($this->paginationDotsDesktop as $rangeNumber)
                        <div
                            class=" h-[14px] w-[14px] rounded-full {{ ceil($actual_img / 2) == $rangeNumber ? 'bg-[#0F355E]' : 'bg-[#D9D9D9]' }}">
                        </div>
                    @endforeach
                </div>

                <button wire:click="nextPage"
                    class=" lg:hidden
                    {{ $actual_img === $total_pages ? 'bg-[#EEEEEE] text-[rgba(0,0,0,0.40)]' : 'bg-[#0F355E] text-white' }} flex items-center justify-center px-[20px] py-[10px] rounded-[20px] xs:w-[84px] xs:h-[44px] sm:h-auto sm:w-auto">
                    <p class=" text-[14px] leading-[17px] xs:flex hidden sm:hidden">Sig</p>
                    <p
                        class=" lg:text-base lg:leading-[19px]
                    text-[14px] leading-[17px] sm:flex hidden">
                        Siguiente</p>
                    @if ($actual_img === $total_pages)
                        <img src="{{ asset('build/assets/forward.svg') }}" alt=""
                            class=" lg:w-[24px] lg:h-[24px]
                            sm:h-[22ppx] sm:w-[22px]">
                    @else
                        <img src="{{ asset('build/assets/back.svg') }}" alt=""
                            class=" lg:w-[24px] lg:h-[24px]
                            rotate-180 sm:h-[22ppx] sm:w-[22px]">
                    @endif
                </button>

                <button wire:click="nextPageDesktop"
                    class=" lg:flex
                    {{ $range_images['end'] >= $total_pages ? 'bg-[#EEEEEE] text-[rgba(0,0,0,0.40)]' : 'bg-[#0F355E] text-white' }} hidden items-center justify-center px-[20px] py-[10px] rounded-[20px] xs:w-[84px] xs:h-[44px] sm:h-auto sm:w-auto">
                    <p class=" text-[14px] leading-[17px] xs:flex hidden sm:hidden">Sig</p>
                    <p
                        class=" lg:text-base lg:leading-[19px]
                    text-[14px] leading-[17px] sm:flex hidden">
                        Siguiente</p>
                    @if ($range_images['end'] >= $total_pages)
                        <img src="{{ asset('build/assets/forward.svg') }}" alt=""
                            class=" lg:w-[24px] lg:h-[24px]
                            sm:h-[22ppx] sm:w-[22px]">
                    @else
                        <img src="{{ asset('build/assets/back.svg') }}" alt=""
                            class=" lg:w-[24px] lg:h-[24px]
                            rotate-180 sm:h-[22ppx] sm:w-[22px]">
                    @endif
                </button>

            </div>

        </div>

        <div class=" flex flex-col items-center justify-center gap-y-[16px]">
            <p class=" lg:text-[14px] lg:leading-[17px]
            text-[12px] leading-[14px] font-medium text-center">
                ¿Deseas conocer más a fondo el contenido de
                la Obra Evolución 360º?</p>

            <a href="{{ asset('build/assets/prospect.pdf') }}" target="_blank"
                class=" sm:max-w-full
                px-[25px] py-[12px] bg-[#0F355E] text-white rounded-[20px] flex items-center justify-center gap-x-[7px] max-w-[266px]">
                <img src="{{ asset('build/assets/book.svg') }}" alt=""
                    class=" lg:w-[32px] lg:h-[32px]
                sm:h-[28px] sm:w-[28px]">
                <p
                    class=" lg:text-[24px] lg:leading-[29px]
                sm:text-[20px] sm:leading-[24px]
                text-[18px] leading-[22px]">
                    Ver Prospecto
                    Completo</p>
            </a>

            <p
                class=" lg:text-[12px] lg:leading-[14px]
            text-[11px] leading-[13px] text-[rgba(0,0,0,0.60)] italic">
                Estas son páginas de muestra. El
                prospecto real contiene más de 40 páginas con contenido detallado.</p>
        </div>

    </div>

</div>
