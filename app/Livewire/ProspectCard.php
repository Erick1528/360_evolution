<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\File;

class ProspectCard extends Component
{

    public $range_images;

    public $actual_img;
    public $total_pages;

    public function mount()
    {
        $this->actual_img = 1;
        $this->total_pages = count(File::files('build/assets/prospect_images'));
        $this->updateRangeImages();
    }

    public function updateRangeImages()
    {
        $this->range_images = [
            'start' => $this->actual_img,
            'end' => min($this->actual_img + 1, $this->total_pages)
        ];
    }

    // Funciones para desktop - navegación por pares
    public function previousPageDesktop()
    {
        if ($this->actual_img > 2) {
            $this->actual_img -= 2;
        } else {
            $this->actual_img = 1;
        }
        $this->updateRangeImages();
    }

    public function nextPageDesktop()
    {
        if ($this->actual_img + 2 <= $this->total_pages) {
            $this->actual_img += 2;
        } else {
            // Si no hay suficientes páginas, ir a la última página par posible
            $this->actual_img = $this->total_pages % 2 === 0 ? $this->total_pages - 1 : $this->total_pages;
        }
        $this->updateRangeImages();
    }

    public function previousPage()
    {
        if ($this->actual_img === 1) {
            $this->actual_img = 1;
        } else {
            $this->actual_img--;
        }
    }

    public function nextPage()
    {

        if ($this->actual_img === $this->total_pages) {
            $this->actual_img = $this->total_pages;
        } else {
            $this->actual_img++;
        }
    }

    public function getPaginationDotsProperty()
    {
        $maxDots = 4;
        $totalPages = $this->total_pages;
        $currentPage = $this->actual_img;

        if ($totalPages <= $maxDots) {
            return range(1, $totalPages);
        }

        $halfDots = floor($maxDots / 2);
        $start = max(1, $currentPage - $halfDots);
        $end = min($totalPages, $start + $maxDots - 1);

        if ($end - $start < $maxDots - 1) {
            $start = max(1, $end - $maxDots + 1);
        }

        return range($start, $end);
    }

    public function getPaginationDotsDesktopProperty()
    {
        $maxDots = 4;
        $totalRanges = ceil($this->total_pages / 2); // Total de rangos (1-2, 3-4, etc.)
        $currentRange = ceil($this->actual_img / 2); // Rango actual

        if ($totalRanges <= $maxDots) {
            return range(1, $totalRanges);
        }

        $halfDots = floor($maxDots / 2);
        $start = max(1, $currentRange - $halfDots);
        $end = min($totalRanges, $start + $maxDots - 1);

        if ($end - $start < $maxDots - 1) {
            $start = max(1, $end - $maxDots + 1);
        }

        return range($start, $end);
    }

    public function render()
    {
        return view('livewire.prospect-card');
    }
}
