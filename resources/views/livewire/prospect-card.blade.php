{{-- Card --}}
<div class="shadow-[2px_2px_4px_rgba(0,0,0,0.1)] rounded-r-[10px] flex w-auto">

    <div class=" min-w-[10px] rounded-l-[20px] bg-[#0F355E]"></div>

    <div class="  p-8 text-center flex flex-col gap-y-[36px] bg-[#F8F8F8] rounded-r-[10px] w-full">

        <div class=" flex flex-col gap-y-[15px] text-[#0F355E]">
            <h2 class=" text-[28px] font-bold leading-[34px] ">Prospecto Ilustrativo - Evolución 360º</h2>
            <p class=" text-[12px] leading-[14px] text-[#475569]">Paginas {{ $actual_img }} de {{ $total_pages }}</p>
        </div>

        <div class="">

            <div class=" flex justify-center items-center mb-[36px]">
                <img src="{{ asset('build/assets/prospect_images/' . $actual_img . '.jpg') }}" alt=""
                    class=" h-[400px] w-[283] object-cover aspect-[283/400]">
            </div>

            <div class=" flex justify-between items-center">

                <button wire:click="previousPage"
                    class=" {{ $actual_img === 1 ? 'bg-[#EEEEEE] text-[rgba(0,0,0,0.40)]' : 'bg-[#0F355E] text-white' }} flex items-center justify-center px-[20px] py-[10px] rounded-[20px] w-[84px] h-[44px]">
                    @if ($actual_img === 1)
                        <img src="{{ asset('build/assets/forward.svg') }}" alt="" class=" rotate-180">
                    @else
                        <img src="{{ asset('build/assets/back.svg') }}" alt="">
                    @endif
                    <p class=" text-[14px] leading-[17px] ">Ant</p>
                </button>

                <div class="gap-x-[10px] hidden xs:flex">
                    @foreach ($this->paginationDots as $pageNumber)
                        <div
                            class="w-[12px] h-[12px] rounded-full {{ $pageNumber == $actual_img ? 'bg-[#0F355E]' : 'bg-[#D9D9D9]' }}">
                        </div>
                    @endforeach
                </div>

                <button wire:click="nextPage"
                    class=" {{ $actual_img === $total_pages ? 'bg-[#EEEEEE] text-[rgba(0,0,0,0.40)]' : 'bg-[#0F355E] text-white' }} flex items-center justify-center px-[20px] py-[10px] rounded-[20px] w-[84px] h-[44px]">
                    <p class=" text-[14px] leading-[17px] ">Sig</p>
                    @if ($actual_img === $total_pages)
                        <img src="{{ asset('build/assets/forward.svg') }}" alt="" class=" opacity-40">
                    @else
                        <img src="{{ asset('build/assets/back.svg') }}" alt="" class=" rotate-180">
                    @endif
                </button>

            </div>

        </div>

        <div class=" flex flex-col items-center justify-center gap-y-[16px]">
            <p class=" text-[12px] leading-[14px] font-medium text-center">¿Deseas conocer más a fondo el contenido de
                la Obra Evolución 360º?</p>

            <a href="{{ asset('build/assets/prospect.pdf') }}" target="_blank"
                class=" px-[25px] py-[12px] bg-[#0F355E] text-white rounded-[20px] flex items-center justify-center gap-x-[7px] max-w-[266px]">
                <img src="{{ asset('build/assets/book.svg') }}" alt="">
                <p class=" text-[18px] leading-[22px]">Ver Prospecto Completo</p>
            </a>

            <p class=" text-[11px] leading-[13px] text-[rgba(0,0,0,0.60)] italic">Estas son páginas de muestra. El
                prospecto real contiene más de 40 páginas con contenido detallado.</p>
        </div>

    </div>

</div>
